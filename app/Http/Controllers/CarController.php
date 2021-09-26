<?php

namespace App\Http\Controllers;

use App\Car;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('agency_id', '=',  Auth::user()->profile_id)->paginate(12);
        return view('agency.cars.index', ['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agency.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_model' => 'required',
            'vehicle_number' => 'required',
            'seating_capacity' => 'required',
            'rent_per_day' => 'required',
        ]);
        Car::create([
            'agency_id' => Auth::user()->profile_id,
            'name' =>  request('name'),
            'vehicle_model' =>  request('vehicle_model'),
            'vehicle_number' =>  request('vehicle_number'),
            'seating_capacity' =>  request('seating_capacity'),
            'rent_per_day' => request('rent_per_day'),
        ]);

        return redirect('/mycars')->with('success', 'Successfully inserted a new car!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('/mycars')->with('success', 'Successfully deleted car!');
    }
}
