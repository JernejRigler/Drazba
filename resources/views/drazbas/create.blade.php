@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Auction</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('drazbas.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="ime_izdelka">Ime izdelka</label>
                            <input type="text" class="form-control" id="ime_izdelka" name="ime_izdelka" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="izvajalec">Izvajalec</label>
                            <input type="text" class="form-control" id="izvajalec" name="izvajalec" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="datum_zacetka">Datum začetka draženja</label>
                            <input type="datetime-local" class="form-control" id="datum_zacetka" name="datum_zacetka" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="trajanje">Končni datum draženja</label>
                            <input type="datetime-local" class="form-control" id="trajanje" name="trajanje" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price">Izklicna cena</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ustvari dražbo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection