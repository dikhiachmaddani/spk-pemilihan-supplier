<?php

namespace App\Http\Controllers;

use App\Models\Matriks;
use App\Http\Requests\StoreMatriksRequest;
use App\Http\Requests\UpdateMatriksRequest;
use App\Models\Alternatif;
use App\Models\Normalisasi;
use Illuminate\Http\Request;

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
        $type = Matriks::all();
        return view('pages.matriks.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Matriks::create($request->all());
        return redirect()->route('matriks.index');
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
    public function edit($id)
    {
        $matriks = Matriks::find($id);
        return view('pages.matriks.edit', compact('matriks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $matriks = Matriks::find($id);
        $matriks->update($request->all());
        return redirect()->route('matriks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matriks = Matriks::destroy($id);
        return redirect()->route('matriks.index');
    }
}
