@extends('layouts.app')

@section('content')
<style>
    body {
        background: rgb(204, 99, 253);
        font-family: 'PT Sans', sans-serif;
        overflow-x: hidden;
    }

    @import url('https://fonts.googleapis.com/css?family=PT+Sans');

    h2 {
        padding-top: 1.5rem;
    }

    a {
        color: #333;
    }

    a:hover {
        color: #da5767;
        text-decoration: none;
    }

    .card {
        border: 0.40rem solid #f8f9fa;

    }

    .form-control {
        background-color: #f8f9fa;
        padding: 20px;
        padding: 25px 15px;
        margin-bottom: 1.3rem;
    }

    .form-control:focus {

        color: #000000;
        background-color: #ffffff;
        border: 3px solid #da5767;
        outline: 0;
        box-shadow: none;

    }

    .btn {
        padding: 0.6rem 1.2rem;
        background: #da5767;
        border: 2px solid #da5767;
    }

    .btn-primary:hover {

        background-color: #df8c96;
        border-color: #df8c96;
        transition: .3s;

    }

</style>

<div class="container " >
    <div class="col-md-12 justify-content-center" style="padding: 2em">
        <div class="card">
            <h2 class="card-title text-center">Insert Car</h2>
            <hr>
            <div class="card-body py-md-4">
                <form method="POST" action="{{ route('mycars-store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Vehicle Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="vehicle_model" type="text"
                            class="form-control @error('vehicle_model') is-invalid @enderror" name="vehicle_model"
                            value="{{ old('vehicle_model') }}" required autocomplete="vehicle_model"
                            placeholder="Vehicle Model">

                        @error('vehicle_model')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="vehicle_number" type="text" class="form-control @error('vehicle_number') is-invalid @enderror"
                            name="vehicle_number" value="{{ old('vehicle_number') }}" required autocomplete="vehicle_number"
                            placeholder="Vehicle Number">

                        @error('vehicle_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="seating_capacity" type="number" class="form-control @error('seating_capacity') is-invalid @enderror"
                            name="seating_capacity" value="{{ old('seating_capacity') }}" required autocomplete="seating_capacity"
                            placeholder="Seat Capacity">

                        @error('seating_capacity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="rent_per_day" type="number" class="form-control @error('rent_per_day') is-invalid @enderror"
                            name="rent_per_day" value="{{ old('rent_per_day') }}" required autocomplete="rent_per_day"
                            placeholder="Rent/Day">

                        @error('rent_per_day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex flex-row align-items-center justify-content-between">

                        <button class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>


@endsection
