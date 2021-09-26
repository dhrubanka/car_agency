@extends('layouts.app')

@section('content')
<style>
.card {
    width: 250px
}

body {
    background: #eee
}
</style>
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
    <div class="row">
        @foreach ($cars as $car )

        <div class="col-md-3">
            <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
                <div class="about-product text-center mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="200" height="180" viewBox="0 0 24 24"><path d="M23.5 7c.276 0 .5.224.5.5v.511c0 .793-.926.989-1.616.989l-1.086-2h2.202zm-1.441 3.506c.639 1.186.946 2.252.946 3.666 0 1.37-.397 2.533-1.005 3.981v1.847c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1h-13v1c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1.847c-.608-1.448-1.005-2.611-1.005-3.981 0-1.414.307-2.48.946-3.666.829-1.537 1.851-3.453 2.93-5.252.828-1.382 1.262-1.707 2.278-1.889 1.532-.275 2.918-.365 4.851-.365s3.319.09 4.851.365c1.016.182 1.45.507 2.278 1.889 1.079 1.799 2.101 3.715 2.93 5.252zm-16.059 2.994c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm10 1c0-.276-.224-.5-.5-.5h-7c-.276 0-.5.224-.5.5s.224.5.5.5h7c.276 0 .5-.224.5-.5zm2.941-5.527s-.74-1.826-1.631-3.142c-.202-.298-.515-.502-.869-.566-1.511-.272-2.835-.359-4.441-.359s-2.93.087-4.441.359c-.354.063-.667.267-.869.566-.891 1.315-1.631 3.142-1.631 3.142 1.64.313 4.309.497 6.941.497s5.301-.184 6.941-.497zm2.059 4.527c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm-18.298-6.5h-2.202c-.276 0-.5.224-.5.5v.511c0 .793.926.989 1.616.989l1.086-2z"/></svg>
                    <div>
                        <h4 style="color: green">Car Available</h4>
                        <h6 class="mt-0 text-black-50">{{$car->name}}</h6>
                    </div>
                </div>
                <div class="stats mt-2">
                    <div class="d-flex justify-content-between p-price"><span>Vehicle Number</span><span>{{$car->vehicle_number}}</span></div>
                    <div class="d-flex justify-content-between p-price"><span>Vehicle Model</span><span>{{$car->vehicle_model}}</span></div>
                    <div class="d-flex justify-content-between p-price"><span>Seat Capacity</span><span>{{$car->seating_capacity}}</span></div>
                </div>
                <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Rent </span><span>Rs {{$car->rent_per_day}} / Day</span></div>
                @auth
                @unlessrole('agency')



                    <form method="POST" style="margin: 10px" id="formreject" action="/order/store">
                        @csrf
                        <input type="text" hidden name="car_id" value="{{$car->id}}">
                        <label for="start_date"> Start Date</label>
                        <input id="start_date" type="date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            name="start_date" value="{{ old('start_date') }}" required
                            autocomplete="start_date" placeholder="Start Date">
                        <select name="days_rent" class="custom-select custom-select-sm">
                            <option selected>Select Number of days for rent</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                          </select>
                    <button type="submit"  class="btn btn-danger" style="margin: 10px">Rent Car </a>
                </form>
                @endunlessrole
                @endauth
                @guest
                <a href="/login"  class="btn btn-danger" style="margin: 10px">Rent Car </a>
                @endguest




            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
