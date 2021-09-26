@extends('layouts.app')
@section('content')
    <style>
        body {
            background: rgb(102, 205, 236);
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
    <div class="row ">
        <div class="col-md-6 justify-content-center" style="padding: 4em">
            <div class="card" >
                <h2 class="card-title text-center" >Register as Car Agency</h2>
                <hr>
                <div class="card-body py-md-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Confirm-Password">
                        </div>
                        <div class="form-group">
                            <input id="agency_name" type="text"
                                class="form-control @error('agency_name') is-invalid @enderror" name="agency_name"
                                value="{{ old('agency_name') }}" required autocomplete="agency_name"
                                placeholder="Company Name">

                            @error('agency_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="company_email" type="email"
                                class="form-control @error('company_email') is-invalid @enderror" name="company_email"
                                value="{{ old('company_email') }}" required autocomplete="company_email"
                                placeholder="Company Mail">

                            @error('company_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="registration_number" type="text"
                                class="form-control @error('registration_number') is-invalid @enderror"
                                name="registration_number" value="{{ old('registration_number') }}" required
                                autocomplete="registration_number" placeholder="Company registration Number">

                            @error('registration_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_of_establishment"> Date of Establish</label>
                            <input id="date_of_establishment" type="date"
                                class="form-control @error('date_of_establishment') is-invalid @enderror"
                                name="date_of_establishment" value="{{ old('date_of_establishment') }}" required
                                autocomplete="date_of_establishment" placeholder="Company Founded Date">

                            @error('date_of_establishment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address"
                                placeholder="Company Address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror"
                                name="contact" value="{{ old('contact') }}" required autocomplete="contact"
                                placeholder="Company Phone">

                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input id="role" type="text" hidden  class="form-control" name="role" value="agency" required>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="/login">Login</a>
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6 justify-content-center" style="padding: 4em">
            <div class="card">
                <h2 class="card-title text-center">Register as User</h2>
                <hr>
                <div class="card-body py-md-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Confirm-Password">
                        </div>
                        <div class="form-group">
                            <input id="contact" type="text"
                                class="form-control @error('contact') is-invalid @enderror" name="contact"
                                value="{{ old('contact') }}" required autocomplete="contact"
                                placeholder="Contact Number">

                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob"> Date of Birth</label>
                            <input id="dob" type="date"
                                class="form-control @error('dob') is-invalid @enderror"
                                name="dob" value="{{ old('dob') }}" required
                                autocomplete="dob" placeholder="Date Of Birth">

                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="license_number" type="text" class="form-control @error('license_number') is-invalid @enderror"
                                name="license_number" value="{{ old('license_number') }}" required autocomplete="license_number"
                                placeholder="License Number">

                            @error('license_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address"
                                placeholder="Address">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input id="role" type="text" hidden  class="form-control" name="role" value="user" required>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="/login">Login</a>
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
