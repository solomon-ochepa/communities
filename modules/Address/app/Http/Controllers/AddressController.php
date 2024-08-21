<?php

namespace Modules\Address\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\app\Models\Address;

class AddressController extends Controller
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
     * @param int Address $address
     * @return Renderable
     */
    public function show(Address $address)
    {
        return view('address::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int Address $address
     * @return Renderable
     */
    public function edit(Address $address)
    {
        return view('address::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int Address $address
     * @return Renderable
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int Address $address
     * @return Renderable
     */
    public function destroy(Address $address)
    {
        //
    }
}
