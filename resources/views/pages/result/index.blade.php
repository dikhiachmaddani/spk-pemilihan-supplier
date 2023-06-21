@extends('layouts.master')
@section('main')
    <div class="container">
        <p class="mt-5 text-center fs-4 fw-bold">Penggunaannya Klik Button Kiri Sampai Kanan.</p>
        <form class="text-center mb-5" method="POST" action="{{ route('destroy') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Reset Data
            </button>
        </form>
        <div
            class="d-flex flex-wrap rounded mb-4 gap-3 justify-content-center align-items-between p-3 align-items-center bg-primary-subtle">
            <form method="POST" action="{{ route('normalisasikan') }}">
                @csrf
                <button type="submit" class="btn btn-danger " @if (count($normalisasi) != 0) disabled @endif>
                    Normalisasikan
                </button>
            </form>
            <form method="POST" action="{{ route('normalisasikan.step2') }}">
                @csrf
                <button type="submit" class="btn btn-danger" @if (count($normalisasi_step2) != 0) disabled @endif>
                    Normalisasikan step 2
                </button>
            </form>
            <form method="POST" action="{{ route('normalisasikan.terbobot') }}">
                @csrf
                <button type="submit" class="btn btn-danger" @if (count($normalisasi_terbobot) != 0) disabled @endif>
                    Normalisasikan terbobot
                </button>
            </form>
            <form method="POST" action="{{ route('yimax') }}">
                @csrf
                <button type="submit" class="btn btn-danger" @if (count($yi) != 0) disabled @endif>
                    Yi Max
                </button>
            </form>
            <form method="POST" action="{{ route('matriks.result') }}">
                @csrf
                <button type="submit" class="btn btn-danger" @if (count($result) != 0) disabled @endif>
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
                                <th scope="col">kriteria 6</th>
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
                                    <td>{{ $data->kriteria_6 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">tidak ada data</td>
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
                                <th scope="col">kriteria 1</th>
                                <th scope="col">kriteria 2</th>
                                <th scope="col">kriteria 3</th>
                                <th scope="col">kriteria 4</th>
                                <th scope="col">kriteria 5</th>
                                <th scope="col">kriteria 6</th>
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
                                    <td>{{ $data->kriteria_6 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">tidak ada data</td>
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
                                <th scope="col">kriteria 1</th>
                                <th scope="col">kriteria 2</th>
                                <th scope="col">kriteria 3</th>
                                <th scope="col">kriteria 4</th>
                                <th scope="col">kriteria 5</th>
                                <th scope="col">kriteria 6</th>
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
                                    <td>{{ $data->kriteria_6 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">tidak ada data</td>
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
                    <span class="fs-5 fw-semibold">Pencarian Nilai Yi</span>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">kode</th>
                                <th scope="col">max</th>
                                <th scope="col">min</th>
                                <th scope="col">Min - Max</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($yi as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode }}</td>
                                    <td>{{ $data->max }}</td>
                                    <td>{{ $data->min }}</td>
                                    <td>{{ $data->minmax }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">tidak ada data</td>
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
                                <th scope="col">Ranking</th>
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
