<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class Roomcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //function to get all the rooms
        $rooms = Room::all();
        return response()->json(array(
            'status' =>'success',
            'rooms' => $rooms,
        ));
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
        //function to create a new room
        try {
            $room = new Room();
            $room->type = $request->type;
            $room->number_of_beds = $request->number_of_beds;
            $room->price = $request->price;
            $room->hotel_id = $request->hotel_id;
            $room->save();
            // return redirect()->route('hotels.room');
            return response()->json([
                "success" => true,
                "message" => "Thêm phòng thành công",
                'data' => $room,
            ]);
        } catch (\Exception $e) {
            
        }
 
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
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //finction to edit a room
         try {
            $room = Room::find($id);
            return response()->json([
                "success" => true,
                "message" => "Sửa phòng thành công",
                'data' => $room,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Sửa phòng thất bại",
                'data' => $e,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //function to delete a room
        try {
            $room = Room::find($id);
            $room->delete();
            return response()->json([
                "success" => true,
                "message" => "Xóa phòng thành công",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Xóa phòng thất bại",
                'data' => $e,
            ]);
        }
    }
}
