@extends('app.app_fo')

@section('content_fo')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                        <span>Diagnosa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <form action="{{ route('feature.fo.diagnosis.submit') }}" method="POST">
        @csrf
        <h3>Pilih Gejala:</h3>
        @foreach ($gejalas as $gejala)
            <div>
                <input type="checkbox" name="symptoms[]" value="{{ $gejala->Kode }}"> {{ $gejala->Deskripsi }}
            </div>
        @endforeach
        <button type="submit">Diagnosa Sekarang</button>
    </form>

    <!-- Diagnosis Section End -->
@endsection
