@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Dražbe</h1>
        @auth
            <a href="{{ route('drazbas.create') }}" class="btn btn-success">Nova dražba</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-success">Prijava za ustvarjanje dražbe</a>
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($auctions as $auction)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($auction->image)
                <img src="{{ asset('storage/' . $auction->image) }}" class="card-img-top" alt="{{ $auction->ime_izdelka }}" style="height: 200px; object-fit: cover;">
                @else
                <div class="bg-secondary text-white text-center p-4" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                    Ni slike
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $auction->ime_izdelka }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Izvajalec: {{ $auction->izvajalec }}</h6>
                    <p class="card-text">
                        <strong>Začetek dražbe:</strong> {{ \Carbon\Carbon::parse($auction->datum_zacetka)->format('M d, Y H:i') }}<br>
                        <strong>Se konča:</strong> {{ \Carbon\Carbon::parse($auction->trajanje)->format('M d, Y H:i') }}<br>
                        <strong>Trenutna cena:</strong> ${{ number_format($auction->price, 2) }}
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <small class="text-muted">
                        Ustvarjeno {{ $auction->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection