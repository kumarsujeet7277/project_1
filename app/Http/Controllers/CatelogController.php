<?php

namespace App\Http\Controllers;

use App\Models\Catelog;
use Illuminate\Http\Request;

class CatelogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create-catelog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catelog  $catelog
     * @return \Illuminate\Http\Response
     */
    public function show(Catelog $catelog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catelog  $catelog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catelog $catelog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catelog  $catelog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catelog $catelog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catelog  $catelog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catelog $catelog)
    {
        //
    }
}
