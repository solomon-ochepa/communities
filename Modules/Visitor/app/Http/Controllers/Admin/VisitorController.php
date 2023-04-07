<?php

namespace Modules\Visitor\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Visitor\app\Models\Visitor;

class VisitorController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('visitor::index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('visitor::create', $this->data);
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
     * @param Visitor $visitor
     * @return Renderable
     */
    public function show(Visitor $visitor)
    {
        return view('visitor::show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Visitor $visitor
     * @return Renderable
     */
    public function edit(Visitor $visitor)
    {
        return view('visitor::edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Visitor $visitor
     * @return Renderable
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Visitor $visitor
     * @return Renderable
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
