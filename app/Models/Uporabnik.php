<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Uporabnik extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'uporabniki';

    protected $fillable = [
        'ime',
        'email',
        'geslo',
        'spol',
        'obvescanje'
    ];

    protected $hidden = [
        'geslo',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'obvescanje' => 'boolean',
    ];

    public function getAuthPassword()
    {
        return $this->geslo;
    }
}