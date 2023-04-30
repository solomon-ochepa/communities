<?php

namespace Modules\Apartment\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Apartment\app\Models\Apartment;

class ApartmentController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.list'])->only('index');
        $this->middleware(['permission:apartment.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = 'Apartments Management';

        return view('apartment::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = 'Create Apartment';

        return view('apartment::admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // livewire
    }

    /**
     * Show the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function show(Apartment $apartment)
    {
        $this->data['head']['title']    = $apartment->name;

        $this->data['apartment']        = $apartment;
        $this->data['active_rooms'] = $apartment->rooms()->whereActive(1)->count();
        $this->data['inactive_rooms'] = $apartment->rooms()->whereActive(0)->count();
        $this->data['total_rooms'] = $apartment->rooms()->count();
        $this->data['active_rooms_percentage'] = $this->data['total_rooms'] > 0 ? (100 / $this->data['total_rooms']) * $this->data['active_rooms'] : 0;

        // $active_visitors = $apartment
        //     ->visitors()
        //     ->whereActive(1)
        //     ->count();
        // dd($active_visitors);
        // $total_visitors = $apartment->visitors()->count();
        // $active_visitors_percentage = $total_visitors > 0 ? (100 / $total_visitors) * $active_visitors : 0;

        return view('apartment::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function edit(Apartment $apartment)
    {
        $this->data['head']['title']    = "Edit: {$apartment->name}";
        $this->data['apartment']        = $apartment;

        return view('apartment::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Apartment $apartment
     * @return Renderable
     */
    public function update(Request $request, Apartment $apartment)
    {
        // livewire
    }

    /**
     * Remove the specified resource from storage.
     * @param Apartment $apartment
     * @return Renderable
     */
    public function destroy(Apartment $apartment)
    {
        if ($apartment->rooms) {
            $apartment->rooms->each(fn ($room) => $room->delete());
        }

        $apartment->delete();

        session()->flash('status', 'Apartment deleted successfully.');
        return redirect(route('admin.apartment.index'));
    }
}
