@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Update Matriks</span>
                </div>
            </div>
            <form method="POST" action="{{ route('matriks.update', $matriks->id) }}"
                class="my-4 bg-primary-subtle p-3 rounded">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>type kriteria</label>
                    <select class="form-select" name="kode">
                        <option selected>pilih tipe alternatif</option>
                        @foreach ($type as $type_alternatif)
                            <option value="{{ $type_alternatif->kode }}" @if ($matriks->kode == $type_alternatif->kode) selected @endif>
                                {{ $type_alternatif->kode }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 1</label>
                    <input type="text" value="{{ $matriks->kriteria_1 }}" class="form-control"
                        placeholder="masukkan kriteria 1" name="kriteria_1">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 2</label>
                    <input type="text" value="{{ $matriks->kriteria_2 }}" class="form-control"
                        placeholder="masukkan kriteria 2" name="kriteria_2">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 3</label>
                    <input type="text" value="{{ $matriks->kriteria_3 }}" class="form-control"
                        placeholder="masukkan kriteria 3" name="kriteria_3">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 4</label>
                    <input type="text" value="{{ $matriks->kriteria_4 }}" class="form-control"
                        placeholder="masukkan kriteria 4" name="kriteria_4">
                </div>
                <div class="form-group mt-3">
                    <label>kriteria 5</label>
                    <input type="text" value="{{ $matriks->kriteria_5 }}" class="form-control"
                        placeholder="masukkan kriteria 5" name="kriteria_5">
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>

    </div>
@endsection
