@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Create Alternatif</span>
                </div>
            </div>
            <form method="POST" action="{{ route('alternatif.store') }}" class="my-4 bg-primary-subtle p-3 rounded">
                @csrf
                <div class="form-group">
                    <label>type kriteria</label>
                    <select class="form-select" name="kode">
                        <option selected>pilih tipe alternatif</option>
                        @foreach ($type as $type_alternatif)
                            <option value="{{ $type_alternatif->kode }}">{{ $type_alternatif->kode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>alternatif</label>
                    <input type="text" class="form-control" placeholder="masukkan alternatif" name="alternatif">
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
