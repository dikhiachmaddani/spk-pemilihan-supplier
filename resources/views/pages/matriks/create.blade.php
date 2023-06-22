@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Create Matriks</span>
                </div>
            </div>
            <form method="POST" action="{{ route('matriks.store') }}" class="my-4 bg-primary-subtle p-3 rounded">
                @csrf
                <div class="form-group">
                    <label>kode alternatif</label>
                    <input type="text" class="form-control" placeholder="masukkan kode" name="kode">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 1</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 1" name="kriteria_1">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 2</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 2" name="kriteria_2">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 3</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 3" name="kriteria_3">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 4</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 4" name="kriteria_4">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 5</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 5" name="kriteria_5">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 6</label>
                    <input type="text" class="form-control" placeholder="masukkan kriteria 6" name="kriteria_6">
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
