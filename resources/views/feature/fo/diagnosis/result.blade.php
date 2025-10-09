@extends('app.app_fo')

@section('content_fo')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                        <span>Hasil Diagnosa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Diagnosis Result Section Begin -->
    <h3>Hasil Diagnosa</h3>
    <ul>
        @foreach ($results as $penyakit => $probabilitas)
            <li>{{ $penyakit }}: {{ number_format($probabilitas * 100, 2) }}%</li>
        @endforeach
    </ul>
    <a href="{{ route('feature.fo.diagnosis.index') }}">Kembali ke Diagnosa</a>
    <!-- Diagnosis Result Section End -->
@endsection
