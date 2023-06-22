@extends('layouts.master')
@section('main')
    <div class="container">
        <div class="card mt-5 border-0">
            <div class="card-header bg-primary-subtle py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5 fw-semibold">Pembentukan Matriks</span>
                    <a href="{{ route('matriks.create') }}" class="btn btn-success">+Matriks</a>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Alternatif</th>
                                <th scope="col">kriteria 1</th>
                                <th scope="col">kriteria 2</th>
                                <th scope="col">kriteria 3</th>
                                <th scope="col">kriteria 4</th>
                                <th scope="col">kriteria 5</th>
                                <th scope="col">kriteria 6</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $matriks)
                                <tr>
                                    <td>{{ $matriks->kode }}</td>
                                    <td>{{ $matriks->kriteria_1 }}</td>
                                    <td>{{ $matriks->kriteria_2 }}</td>
                                    <td>{{ $matriks->kriteria_3 }}</td>
                                    <td>{{ $matriks->kriteria_4 }}</td>
                                    <td>{{ $matriks->kriteria_5 }}</td>
                                    <td>{{ $matriks->kriteria_6 }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('matriks.edit', $matriks->id)}}" class="btn btn-warning">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('matriks.destroy', $matriks->id) }}">
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
