@extends('app.app_fo')

@push('styles')
<style>
    .hero-section {
        position: relative;
        overflow: hidden;
    }

    .hero__item {
        height: 100vh; /* 100% tinggi layar */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
    }

    .hero__text {
        color: #fff;
    }
</style>
@endpush


@section('content_fo')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="https://warta.jogjakota.go.id/assets/instansi/warta/article/20230201171412.JPG">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>Bersama Wujudkan Hunian Layak untuk Semua</h5>
                                <h2>Klasifikasi Kelayakan Rusunawa Kini Lebih Mudah dan Objektif</h2>
                                <a href="{{ route('pre-eligibility.form') }}" class="primary-btn">Cek Kelayakan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="https://warta.jogjakota.go.id/assets/instansi/warta/article/20230201171412.JPG">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h5>Tepat Sasaran, Transparan, dan Berbasis Data</h5>
                                <h2>Sistem Bantu Penilaian Penerima Rusunawa dengan K-NN</h2>
                                <a href="{{ route('pre-eligibility.form') }}" class="primary-btn">Mulai Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="about-us spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="about__text">
                        <div class="section-title">
                            <h3>Tentang Aplikasi</h3>
                        </div>
                        <div class="about__content text-center">
                            <p>
                                Sistem ini dirancang untuk membantu proses seleksi penerima bantuan Rusunawa secara objektif,
                                akurat, dan efisien. Menggunakan metode K-Nearest Neighbor (K-NN), sistem ini mengklasifikasikan
                                kelayakan berdasarkan indikator seperti penghasilan dan jumlah tanggungan, sebagaimana diatur dalam
                                Peraturan Walikota Yogyakarta No. 36 Tahun 2019.
                            </p>
                            <div class="mt-5">
                                <a href="{{ route('fo.about.index') }}" class="primary-btn">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
@endsection
