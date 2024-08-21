<?php

namespace Modules\Apartment\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\App\Models\Room;

class ApartmentRoomController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.room.list'])->only('index');
        $this->middleware(['permission:apartment.room.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.room.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.room.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(Apartment $apartment)
    {
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.room.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(Apartment $apartment)
    {
        $this->data['head']['title'] = 'Create Room';
        $this->data['apartment'] = $apartment;

        return view('apartment::admin.room.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Apartment $apartment, Room $room)
    {
        $this->data['head']['title'] = "{$room->name}";
        $this->data['room'] = $room;

        return view('apartment::admin.room.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Apartment $apartment, Room $room)
    {
        $this->data['head']['title'] = __('Edit').": {$room->name} &middot; {$apartment->name}";
        $this->data['apartment'] = $apartment;
        $this->data['room'] = $room;

        return view('apartment::admin.room.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Apartment $apartment, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Apartment $apartment, Room $room)
    {
        // Can't delete a room with active occupants!
        if ($room->occupants->count()) {
            session()->flash('error', 'Room with occupants can\'t be deleted. Please, transfer or remove occupants and try again.');

            return back()->withInput();
        }

        $room->delete();

        session()->flash('status', 'Apartment room deleted successfully.');

        return redirect(route('admin.apartment.room.index', ['apartment' => $apartment->id]));
    }
}
