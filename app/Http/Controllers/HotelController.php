<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show data of hotels with pagination jax
        $hotels = Hotel::paginate(10);
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //add new hotel
        $this->validate($request, [
            'name' =>'required',
            'address' =>'required',
            'city' =>'required',
            'country' =>'required'
        ]);

        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->country = $request->country;
        $hotel->save();

        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update existing hotel
        $this->validate($request, [
            'name' =>'required',
            'address' =>'required',
            'city' =>'required',
            'country' =>'required'
        ]);

        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->country = $request->country;
        $hotel->save();

        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete existing hotel
        $hotel = Hotel::find($id);
        $hotel->delete();

        return redirect()->route('hotel.index');
    }
}
