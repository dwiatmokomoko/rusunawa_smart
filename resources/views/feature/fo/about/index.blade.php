@extends('app.app_fo')

@section('content_fo')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                        <span>Tentang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Tentang Sistem Klasifikasi Penerima Rusunawa</h3>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__text">
                        <div class="blog__details__title">
                            <p>
                                Ketersediaan hunian yang layak merupakan salah satu kebutuhan dasar manusia yang harus
                                dipenuhi demi menjamin kesejahteraan hidup. Di Kota Yogyakarta, urbanisasi yang terus
                                meningkat setiap tahunnya turut memberikan tekanan terhadap ketersediaan lahan dan hunian,
                                khususnya bagi masyarakat berpenghasilan rendah (MBR).
                            </p>
                            <p>
                                Sebagai bentuk solusi, pemerintah menyediakan Rumah Susun Sederhana Sewa (Rusunawa) untuk
                                memenuhi kebutuhan tempat tinggal bagi warga yang belum memiliki hunian tetap. Namun
                                demikian, proses seleksi calon penghuni Rusunawa selama ini masih bersifat manual dan
                                administratif, yang menyulitkan dalam menentukan kelayakan secara objektif dan efisien.
                            </p>
                        </div>

                        <div class="blog__details__quote">
                            <p>
                                "Sistem klasifikasi berbasis K-Nearest Neighbor (K-NN) hadir untuk membantu pemerintah dalam
                                menyeleksi calon penghuni Rusunawa secara objektif, akurat, dan adil."
                            </p>
                        </div>

                        <div class="blog__details__title__more">
                            <h4>Latar Belakang</h4>
                            <p>
                                Permasalahan utama dalam proses seleksi penerima Rusunawa adalah belum optimalnya metode
                                penilaian kelayakan yang digunakan. Hal ini menimbulkan risiko ketidaktepatan sasaran, di
                                mana fasilitas Rusunawa bisa saja diberikan kepada pihak yang kurang memenuhi kriteria,
                                sementara masyarakat yang lebih membutuhkan justru tidak terakomodasi.
                            </p>
                            <p>
                                Padahal, Peraturan Walikota Yogyakarta Nomor 36 Tahun 2019 telah mengatur sejumlah indikator
                                kelayakan seperti penghasilan dan jumlah tanggungan keluarga. Oleh karena itu, diperlukan
                                sebuah sistem berbasis teknologi yang dapat membantu proses klasifikasi kelayakan secara
                                sistematis, objektif, dan akurat.
                            </p>
                        </div>

                        <div class="blog__details__title__more">
                            <h4>Tujuan Sistem</h4>
                            <ul class="pl-5 pb-5 pt-3">
                                <li>Menyeleksi calon penghuni Rusunawa secara objektif berdasarkan data.</li>
                                <li>Mengurangi potensi kesalahan dan ketidaktepatan sasaran dalam pemberian hunian.</li>
                                <li>Mempermudah pemerintah dalam proses pengambilan keputusan berbasis data.</li>
                            </ul>
                        </div>

                        <div class="blog__details__title__more">
                            <h4>Metodologi</h4>
                            <p>
                                Sistem ini menggunakan algoritma <strong>K-Nearest Neighbor (K-NN)</strong>, yaitu metode
                                dalam machine learning yang melakukan klasifikasi berdasarkan kedekatan data baru terhadap
                                data historis. Dengan pendekatan ini, sistem dapat menentukan kelayakan calon penerima
                                Rusunawa dengan membandingkan data yang diinput dengan data penerima terdahulu.
                            </p>
                        </div>

                        <div class="blog__details__title__more">
                            <h4>Manfaat Sistem</h4>
                            <ul class="pl-5 pb-5 pt-3">
                                <li>Memberikan rekomendasi kelayakan penerima Rusunawa secara akurat dan adil.</li>
                                <li>Mempermudah proses verifikasi dan seleksi calon penghuni.</li>
                                <li>Meningkatkan transparansi dan efisiensi dalam penyaluran fasilitas hunian.</li>
                            </ul>
                        </div>

                        <div class="blog__details__item">
                            <div class="blog__details__item__pic">
                                <img src="{{ asset('fo/img/rusun.jpeg') }}" alt="Ilustrasi Rusunawa">
                            </div>
                        </div>
                        <div class="blog__details__item">
                            <div class="blog__details__item__text">
                                <p>
                                    Dengan sistem klasifikasi ini, diharapkan proses seleksi calon penghuni Rusunawa dapat
                                    dilakukan secara lebih adil, transparan, dan berbasis data yang kuat. Hal ini akan
                                    mendukung program pemerintah dalam menyediakan hunian yang layak bagi masyarakat yang
                                    benar-benar membutuhkan.
                                </p>
                            </div>
                        </div>

                        <div class="blog__details__desc pt-5">
                            <h4>Penutup</h4>
                            <p>
                                Kami berharap bahwa sistem klasifikasi berbasis K-NN ini dapat menjadi solusi dalam
                                penyaluran bantuan hunian Rusunawa yang lebih tepat sasaran. Dengan inovasi berbasis
                                teknologi, penyaluran fasilitas publik dapat menjadi lebih efisien dan berdampak nyata bagi
                                masyarakat Kota Yogyakarta.
                            </p>
                            <p>
                                Untuk pertanyaan lebih lanjut atau saran terkait aplikasi ini, silakan kunjungi halaman <a
                                    href="{{ route('fo.ourteam.index') }}">kontak</a> kami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
