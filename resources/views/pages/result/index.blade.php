@extends('layouts.master')
@section('main')
    <div class="container">
        <p class="mt-5 text-center fs-4 fw-bold">Penggunaannya Klik Button Kiri Sampai Kanan.</p>
        <div
            class="d-flex flex-wrap rounded mb-4 gap-3 justify-content-center align-items-between p-3 align-items-center bg-primary-subtle">
            <form method="POST" action="{{ route('normalisasikan') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Normalisasikan
                </button>
            </form>
            <form method="POST" action="{{ route('normalisasikan.step2') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Normalisasikan step 2
                </button>
            </form>
            <form method="POST" action="{{ route('normalisasikan.step3') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Normalisasikan step 3
                </button>
            </form>
            <form method="POST" action="{{ route('normalisasikan.terbobot') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Normalisasikan terbobot
                </button>
            </form>
            <form method="POST" action="{{ route('matriks.apb') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Matriks Apb
                </button>
            </form>
            <form method="POST" action="{{ route('matriks.ja') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Matriks Ja
                </button>
            </form>
            <form method="POST" action="{{ route('matriks.result') }}">
                @csrf
                <button type="submit" class="btn btn-danger">
                    result
                </button>
            </form>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Normalisasi</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria 1</th>
                                <th scope="col">kriteria 2</th>
                                <th scope="col">kriteria 3</th>
                                <th scope="col">kriteria 4</th>
                                <th scope="col">kriteria 5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($normalisasi as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">normalisasi step 2</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria_1</th>
                                <th scope="col">kriteria_2</th>
                                <th scope="col">kriteria_3</th>
                                <th scope="col">kriteria_4</th>
                                <th scope="col">kriteria_5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($normalisasi_step2 as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">normalisasi step 3</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria_1</th>
                                <th scope="col">kriteria_2</th>
                                <th scope="col">kriteria_3</th>
                                <th scope="col">kriteria_4</th>
                                <th scope="col">kriteria_5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($normalisasi_step3 as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">normalisasi terbobot</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria_1</th>
                                <th scope="col">kriteria_2</th>
                                <th scope="col">kriteria_3</th>
                                <th scope="col">kriteria_4</th>
                                <th scope="col">kriteria_5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($normalisasi_terbobot as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Matriks Area Perkiraan Batas (G)</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria_1</th>
                                <th scope="col">kriteria_2</th>
                                <th scope="col">kriteria_3</th>
                                <th scope="col">kriteria_4</th>
                                <th scope="col">kriteria_5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($matriks_apb as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Perhitungan Elemen Matriks Jarak Alternatif dari Daerah Perkiraan
                        Perbatasan (Q)</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">kriteria_1</th>
                                <th scope="col">kriteria_2</th>
                                <th scope="col">kriteria_3</th>
                                <th scope="col">kriteria_4</th>
                                <th scope="col">kriteria_5</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($matriks_ja as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->kriteria_1 }}</td>
                                    <td>{{ $data->kriteria_2 }}</td>
                                    <td>{{ $data->kriteria_3 }}</td>
                                    <td>{{ $data->kriteria_4 }}</td>
                                    <td>{{ $data->kriteria_5 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
        <div class="card mt-2 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Result</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($result as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->supplier }}</td>
                                    <td>{{ $data->preference_value }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>
    </div>
@endsection
