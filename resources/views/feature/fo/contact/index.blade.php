@extends('app.app_fo')

@section('content_fo')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__option">
                    <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                    <span>Petunjuk Penggunaan</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Petunjuk Penggunaan Section Begin -->
<section class="usage-guide-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="usage-guide__text">
                    <h3>Petunjuk Penggunaan Sistem Klasifikasi Penerima Rusunawa</h3>
                    <p>Panduan penggunaan halaman klasifikasi kelayakan penerima Rusunawa berbasis metode <strong>KNN</strong>:</p>

                    <ol class="ms-5">

                            <h5>A. Akses Halaman Kelayakan</h5><br>
                            <ol class="ms-5">
                                <li>   Buka aplikasi tanpa perlu login (akses publik).</li>
                                <li>   Klik menu <strong>"Hitung Kelayakan"</strong> di halaman utama.</li>
                                <li>   Anda akan diarahkan ke halaman formulir pengisian data.</li>
                            </ol>
                            <br><br>


                            <h5>B. Mengisi Formulir Kelayakan</h5>
                            <p>Lengkapi data pada formulir sesuai kondisi Anda:</p>
                            <ul class="ms-5">
                                <li><strong>Nama & NIK:</strong> Diisi sesuai identitas.</li>
                                <li><strong>Penghasilan:</strong> Pilih kategori penghasilan yang sesuai.</li>
                                <li><strong>Pekerjaan:</strong> Pilih jenis pekerjaan saat ini.</li>
                                <li><strong>Status Perkawinan:</strong> Pilih status perkawinan Anda.</li>
                                <li><strong>Tinggal Bersama:</strong> Tentukan apakah Anda tinggal bersama keluarga/kerabat.</li>
                                <li><strong>Status Kependudukan:</strong> Pilih status kependudukan (KTP/pendatang).</li>
                                <li><strong>Status Kepemilikan Rumah:</strong> Pilih apakah sudah memiliki rumah sendiri atau tidak.</li>
                            </ul>

                            <br><br>

                            <h5>C. Mengajukan Perhitungan Kelayakan</h5>
                            <ol class="ms-5">
                                <li>Setelah semua data diisi, klik tombol <strong>"Prediksi Kelayakan"</strong>.</li>
                                <li>Sistem akan memproses data Anda menggunakan metode <strong>KNN</strong>.</li>
                            </ol>

                            <br><br>

                            <h5>D. Melihat Hasil Prediksi</h5>
                            <ol class="ms-5">
                                <li>Sistem akan menampilkan hasil prediksi kelayakan berdasarkan data yang Anda isi.</li>
                                <li>Hasil meliputi kemungkinan layak/tidak layak beserta informasi dukungannya.</li>
                                <li>Anda dapat menyimpan atau mencetak hasil prediksi untuk keperluan administrasi.</li>
                            </ol>

                    </ol>

                    <p class="mt-4">
                        Sistem ini dikembangkan untuk membantu pemerintah dalam menyeleksi calon penghuni Rusunawa secara lebih objektif,
                        transparan, dan berbasis data. Semua proses berjalan otomatis menggunakan metode <strong>KNN</strong>
                        yang telah dilatih dari data sebelumnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Petunjuk Penggunaan Section End -->

@endsection
