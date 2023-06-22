<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Models\KriteriaType;
use Exception;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::orderBy('kode', 'ASC')->get();
        return view('pages.kriteria.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = KriteriaType::all();
        $data = Kriteria::all();
        return view('pages.kriteria.create', compact('data','type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Kriteria::create($data);
            DB::commit();
            return redirect()->route('kriteria.index')->with('success', 'create user successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('kriteria.index')->with('error', 'user failed to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kriteria::find($id);
        $type = KriteriaType::all();
        return view('pages.kriteria.edit', compact('data', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, $id)
    {
        $data = Kriteria::find($id);
        $data->update($request->validated());
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect()->route('kriteria.index');
    }
}
