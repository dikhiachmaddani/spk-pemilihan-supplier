@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Data Kriteria</span>
                    <a href="{{ route('kriteria.create') }}" class="btn btn-success">+Kriteria</a>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Kriteria</th>
                                <th scope="col">Bobot</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $kriteria)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $kriteria->kode }}</td>
                                    <td>{{ $kriteria->kriteria }}</td>
                                    <td>{{ $kriteria->bobot }}</td>
                                    <td>{{ $kriteria->tipe }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route("kriteria.edit",$kriteria->id)}}" class="btn btn-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('kriteria.destroy', $kriteria->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">data masih kosong.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </li>
            </ul>
        </div>

    </div>
@endsection
