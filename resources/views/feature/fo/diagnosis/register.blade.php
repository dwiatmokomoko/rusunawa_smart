@extends('app.app_fo')

@section('content_fo')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                        <span>Registrasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Registration Section Begin -->
    <section class="registration-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Registrasi Pengguna</h3>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="registration__form">
                        <form action="{{ route('fo.diagnosis.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="primary-btn">Daftar dan Lanjutkan Diagnosa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Registration Section End -->
@endsection
