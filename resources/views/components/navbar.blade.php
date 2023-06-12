<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto py-3 gap-3">
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-semibold {{ Route::is('home') ? 'text-info-emphasis active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-semibold {{ Route::is('kriteria.index') ? 'text-info-emphasis active' : '' }}" href="{{ route('kriteria.index') }}">Data Kriteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-semibold {{ Route::is('alternatif.index') ? 'text-info-emphasis active' : '' }}" href="{{ route('alternatif.index') }}">Data Alternatif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-semibold {{ Route::is('matriks.index') ? 'text-info-emphasis active' : '' }}" href="{{ route('matriks.index') }}">Bentuk Matriks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-semibold {{ Route::is('result.index') ? 'text-info-emphasis active' : '' }}" href="{{ route('result.index') }}">Result</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
