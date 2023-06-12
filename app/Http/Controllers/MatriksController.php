<?php

namespace App\Http\Controllers;

use App\Models\Matriks;
use App\Http\Requests\StoreMatriksRequest;
use App\Http\Requests\UpdateMatriksRequest;
use App\Models\Normalisasi;

class MatriksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Matriks::all();
        return view('pages.matriks.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.matriks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatriksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Matriks $matriks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matriks $matriks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksRequest $request, Matriks $matriks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matriks $matriks)
    {
        //
    }
}
