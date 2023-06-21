@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Create Kriteria</span>
                </div>
            </div>
            <form method="POST" action="{{route('kriteria.store')}}" class="my-4 bg-primary-subtle p-3 rounded">
                @csrf
                <div class="form-group">
                    <label>type kriteria</label>
                    <select class="form-select" name="kode">
                        <option selected>pilih tipe kriteria</option>
                        @foreach ($type as $type_kriteria)
                            <option value="{{ $type_kriteria->kode }}">{{ $type_kriteria->kode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>Kriteria</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria" name="kriteria">
                </div>
                <div class="form-group mt-3">
                    <label>bobot</label>
                    <input type="text" class="form-control" placeholder="masukkan bobot" name="bobot">
                </div>
                <div class="form-group mt-3">
                    <label>Cost / benefit</label>
                    <select class="form-select" name="tipe">
                        <option selected>pilih tipe kriteria</option>
                        <option value="benefit">benefit</option>
                        <option value="cost">cost</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
