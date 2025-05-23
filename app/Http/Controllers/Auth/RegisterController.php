<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Uporabnik;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Preverimo ce so poslani podatki (POST request) v skladu s pravili pod. baze
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    \Log::debug('Validation Data:', $data);

    $validator = Validator::make($data, ['name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:uporabniki'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'spol' => ['required', 'in:M,Ž'],
        'obvescanje' => ['nullable', 'boolean'],]);
    
    if ($validator->passes()) {
        \Log::debug('Validation passed!', $data);
    } else {
        \Log::debug('Validation failed:', $validator->errors()->toArray());
    }
    
    return $validator;
    
}

    // kreiramo novega uporabnika
    protected function create(array $data)
    {
        \Log::debug('d1dd9:', $data);
        return Uporabnik::create([
            'ime' => $data['name'],
            'email' => $data['email'],
            'geslo' => Hash::make($data['password']),
            'spol' => $data['spol'],
            'obvescanje' => $data['obvescanje'] ?? false,
        ]);
    }
}
