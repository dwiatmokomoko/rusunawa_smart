@extends('app.app')

@section('content')
    <!--  Header End -->
    <div class="container-fluid">
        <div class="card mt-4 text-center">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Selamat Datang</h5>

                {{-- Menampilkan logo --}}
                <img src="{{ asset('bo/images/logos/silayak-logo.png') }}" alt="Logo Silayak" style="max-width: 200px; height: auto;">

                <p class="mt-3 mb-0">Sistem Penilaian Kelayakan Rusunawa</p>
            </div>
        </div>
    </div>
@endsection
