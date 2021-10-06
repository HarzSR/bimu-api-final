<?php

namespace App\Http\Controllers;

use App\Models\DefaultRecipe;
use Illuminate\Http\Request;

class DefaultRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DefaultRecipe  $defaultRecipe
     * @return \Illuminate\Http\Response
     */
    public function show(DefaultRecipe $defaultRecipe)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DefaultRecipe  $defaultRecipe
     * @return \Illuminate\Http\Response
     */
    public function edit(DefaultRecipe $defaultRecipe)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DefaultRecipe  $defaultRecipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DefaultRecipe $defaultRecipe)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DefaultRecipe  $defaultRecipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultRecipe $defaultRecipe)
    {
        //

        return response('Invalid Request', 403);
    }
}
