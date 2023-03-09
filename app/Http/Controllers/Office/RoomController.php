<?php

namespace App\Http\Controllers\Office;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Apartment;

class RoomController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['title'] = 'Rooms';

        $this->middleware('auth');
        $this->middleware(['permission:room.list'])->only('index');
        $this->middleware(['permission:room.create'])->only('create', 'store');
        $this->middleware(['permission:room.edit'])->only('edit', 'update');
        $this->middleware(['permission:room.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {
        $this->data['title'] = "Rooms - {$apartment->name}";

        return view('office.apartment.room.index', [
            'data' => $this->data,
            'apartment' => $apartment,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apartment $apartment)
    {
        $this->data['title'] = "Create room - {$apartment->name}";

        return view('office.apartment.room.create', [
            'data' => $this->data,
            'apartment' => $apartment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Room $room)
    {
        $this->data['title'] = $room->name . " - " . $room->apartment->name;

        return view('office.apartment.room.show', [
            'data' => $this->data,
            'room' => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
