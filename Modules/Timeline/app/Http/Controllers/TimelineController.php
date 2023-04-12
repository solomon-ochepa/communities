<?php

namespace Modules\Timeline\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Timeline\app\Models\Timeline;

class TimelineController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = '';

        return view('timeline::index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = '';

        return view('timeline::create', $this->data);
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
     * @param Timeline $timeline
     * @return Renderable
     */
    public function show(Timeline $timeline)
    {
        $this->data['head']['title'] = '';

        return view('timeline::show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Timeline $timeline
     * @return Renderable
     */
    public function edit(Timeline $timeline)
    {
        $this->data['head']['title'] = '';

        return view('timeline::edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Timeline $timeline
     * @return Renderable
     */
    public function update(Request $request, Timeline $timeline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param Timeline $timeline
     * @return Renderable
     */
    public function destroy(Timeline $timeline)
    {
        //
    }
}
