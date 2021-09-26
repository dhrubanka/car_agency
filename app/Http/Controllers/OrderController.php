<?php

namespace App\Http\Controllers;

use App\Car;
use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('agency_id', '=',  Auth::user()->profile_id)->paginate(12);

        return view('orders.myorders', ["cars" => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'car_id' => 'required',
            'days_rent' => 'required',
            'start_date' => 'required',
        ]);
        Order::create([
            'car_id' => request('car_id'),
            'user_id' => Auth::user()->id,
            'days_rent' =>  request('days_rent'),
            'start_date' =>  request('start_date'),
        ]);

        return redirect('/')->with('success', 'Successfully rented a car!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $orders = Order::where('car_id','=', $id)->get();

        return view('orders.users', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
