<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Models\AlternatifType;
use Exception;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Alternatif::orderBy('id', 'ASC')->get();
        return view('pages.alternatif.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternatifRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Alternatif::create($data);
            DB::commit();
            return redirect()->route('alternatif.index')->with('success', 'create user successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('alternatif.index')->with('error', 'user failed to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Alternatif::find($id);
        return view('pages.alternatif.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, $id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->update($request->validated());
        return redirect()->route('alternatif.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::destroy($id);
        return redirect()->route('alternatif.index');
    }
}
