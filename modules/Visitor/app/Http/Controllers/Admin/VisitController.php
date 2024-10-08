<?php

namespace Modules\Visitor\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Visitor\app\Models\Visit;

class VisitController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = 'Visits Management';

        return view('visitor::admin.visit.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('visitor::admin.visit.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        // livewire
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Visit $visit)
    {
        return view('visitor::admin.visit.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Visit $visit)
    {
        return view('visitor::admin.visit.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Visit $visit)
    {
        // delete relationships

        // Gatepass Requests
        $visit->gatepass_request->delete();

        // delete record
        $visit->delete();

        session()->flash('status', 'Visit request deleted successfully!');

        return redirect(route('admin.visit.index'));
    }
}
