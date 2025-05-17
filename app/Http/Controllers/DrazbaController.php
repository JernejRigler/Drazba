<?php

namespace App\Http\Controllers;

use App\Models\Drazba;
use App\Models\Uporabnik;
use App\Mail\NewAuctionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DrazbaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = now();
        
        $auctions = Drazba::where('datum_zacetka', '<=', $now)
            ->where(function($query) use ($now) {
                $query->whereRaw('trajanje > ?', [$now]);
            })
            ->get();
        
        return view('home', compact('auctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drazbas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime_izdelka' => 'required|string|max:255',
            'izvajalec' => 'required|string|max:255',
            'datum_zacetka' => 'required|date',
            'trajanje' => 'required|date',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'            
        ]);
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('auction_images', 'public');
            $validated['image'] = $path;
        }

        $auction = Drazba::create($validated);

        $subscribedUsers = Uporabnik::where('obvescanje', 1)->get();

        foreach ($subscribedUsers as $user) {
            Mail::to($user->email)->send(new NewAuctionNotification($auction));
        }

        return redirect()->route('home')->with('success', 'Auction created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drazba  $drazba
     * @return \Illuminate\Http\Response
     */
    public function show(Drazba $drazba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drazba  $drazba
     * @return \Illuminate\Http\Response
     */
    public function edit(Drazba $drazba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drazba  $drazba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drazba $drazba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drazba  $drazba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drazba $drazba)
    {
        //
    }
}
