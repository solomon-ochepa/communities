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
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = "Visits Management";

        return view('visitor::visit.admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('visitor::visit.admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Visit $visit
     * @return Renderable
     */
    public function show(Visit $visit)
    {
        return view('visitor::visit.admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Visit $visit
     * @return Renderable
     */
    public function edit(Visit $visit)
    {
        return view('visitor::visit.admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Visit $visit
     * @return Renderable
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Visit $visit
     * @return Renderable
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
