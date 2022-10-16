<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Http\Requests\StoreToolsRequest;
use App\Http\Requests\UpdateToolsRequest;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToolsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToolsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function show(Tools $tools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function edit(Tools $tools)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToolsRequest  $request
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToolsRequest $request, Tools $tools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tools  $tools
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tools $tools)
    {
        //
    }
}
