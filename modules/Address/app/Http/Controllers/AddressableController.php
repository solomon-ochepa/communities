<?php

namespace Modules\Address\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\app\Models\Addressable;

class AddressableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('address::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('address::create');
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
     * @param int Addressable $addressable
     * @return Renderable
     */
    public function show(Addressable $addressable)
    {
        return view('address::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int Addressable $addressable
     * @return Renderable
     */
    public function edit(Addressable $addressable)
    {
        return view('address::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int Addressable $addressable
     * @return Renderable
     */
    public function update(Request $request, Addressable $addressable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Addressable $addressable
     * @return Renderable
     */
    public function destroy(Addressable $addressable)
    {
        //
    }
}
