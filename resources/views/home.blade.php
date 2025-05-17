@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Auctions</h1>
        <a href="{{ route('drazbas.create') }}" class="btn btn-success">Create Auction</a>
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