<?php

namespace Modules\Occupant\App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Occupant\App\Models\Occupant;

class OccupantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:apartment.occupant.index'])->only('index');
        $this->middleware(['permission:apartment.occupant.create'])->only('create', 'store');
        $this->middleware(['permission:apartment.occupant.edit'])->only('edit', 'update');
        $this->middleware(['permission:apartment.occupant.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['head']['title'] = __('Occupants Management');

        return view('occupant::admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['head']['title'] = __('Create Occupant');

        return view('occupant::admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show(Occupant $occupant)
    {
        return view('occupant::admin.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Occupant $occupant)
    {
        return view('occupant::admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Occupant $occupant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Occupant $occupant)
    {
        // Room: change status to pending if occupant is the only occupant.
        if ($occupant->room and ! $occupant->room->occupants->except([$occupant->id])->count()) {
            $occupant->room->update(['status_code' => 1]);
        }

        // Apartment: change status to pending if occupant is the only occupant.
        if (! $occupant->apartment->occupants->except([$occupant->id])->count()) {
            $occupant->apartment->update(['status_code' => 1]);
        }

        $occupant->delete();

        session()->flash('status', 'Occupant deleted successfully.');

        return back();
    }
}
