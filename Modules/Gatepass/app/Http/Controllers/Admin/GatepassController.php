<?php

namespace Modules\Gatepass\app\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gatepass\app\Models\Gatepass;

class GatepassController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->data['head']['title'] = 'Gatepass Management';

        return view('gatepass::admin.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->data['head']['title'] = '';

        return view('gatepass::admin.create', $this->data);
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
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->data['head']['title'] = '';

        return view('gatepass::admin.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->data['head']['title'] = '';

        return view('gatepass::admin.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Gatepass $gatepass)
    {
        // Categories
        $gatepass->categorizables->each(function ($categorizable) {
            $categorizable->delete();
        });

        // Access Logs
        $gatepass->access_logs->each(function ($log) {
            $log->delete();
        });

        $gatepass->delete();

        session()->flash('status', 'Gatepass deleted successfully.');
        return redirect(route('admin.gatepass.index'));
    }
}
