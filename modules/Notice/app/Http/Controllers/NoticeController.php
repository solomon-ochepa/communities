<?php

namespace Modules\Notice\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notice\app\Models\Notice;

class NoticeController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = 'Notices Management';

        return view('notice::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = '';

        return view('notice::admin.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @return Renderable
     */
    public function show(Notice $notice)
    {
        $this->data['head']['title'] = '';

        return view('notice::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit(Notice $notice)
    {
        $this->data['head']['title'] = '';

        return view('notice::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Renderable
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Renderable
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
