<?php

namespace App\Http\Controllers;

use App\Spectrum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpectrumController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource
     *
     * @return Renderable
     */
    public function create()
    {
        return view('spectrum/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function show(Spectrum $spectrum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function edit(Spectrum $spectrum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Spectrum  $spectrum
     *
     * @return Response
     */
    public function update(Request $request, Spectrum $spectrum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function destroy(Spectrum $spectrum)
    {
        //
    }
}
