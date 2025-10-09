@extends('app.app_fo')


@section('content_fo')


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__option">
                        <a href="{{ route('fo.home.index') }}"><span class="fa fa-home"></span> Home</a>
                        <span>Pengembang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Testimonial Section Begin -->
    <section class="spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Our Team</h3>
                    </div>
                </div>
            </div>
            <div class="row p-5">
                <div class="col-lg-3 d-flex">
                    <div class="col-card testimonial__item">
                        <img src="{{asset('fo/img/testimonial/bumarlin.jpeg')}}" alt="">
                        <h5>YUMARLIN MZ, S.Kom., M.P.d., M.Kom</h5>
                        <span>Dosen Pengampu</span>
                        {{-- <p>Sebagai Project manager dalam tugas besar ini.</p> --}}
                        <div class="icons">
                            <a href="https://wa.me/628157986629" class="facebook" target="__blank"><i class="fa fa-whatsapp"></i></a>
                            <a href="mailto:yumarlin@janabadra.ac" class="twitter" target="__blank"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <div class="col-card testimonial__item">
                        <img src="{{asset('fo/img/testimonial/peni.jpeg')}}" alt="">
                        <h5>Peni Kurniawati</h5>
                        <span>24330021</span>
                        {{-- <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p> --}}
                            <div class="icons">
                                <a href="https://wa.me/6287845666600" class="facebook" target="__blank"><i class="fa fa-whatsapp"></i></a>
                                <a href="mailto:devribudi@gmail.com" class="twitter" target="__blank"><i class="fa fa-envelope"></i></a>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <div class="col-card testimonial__item">
                        <img src="{{asset('fo/img/testimonial/nia.jpeg')}}" alt="">
                        <h5>Umniyati</h5>
                        <span>23330025</span>
                        {{-- <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p> --}}
                            <div class="icons">
                                <a href="https://wa.me/6282136352767" class="facebook"><i class="fa fa-whatsapp"></i></a>
                                <a href="mailto:21330055@janabadra.web.id" class="twitter"><i class="fa fa-envelope"></i></a>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <div class="col-card testimonial__item">
                        <img src="{{asset('fo/img/testimonial/desy.jpg')}}" alt="">
                        <h5>Desy Anggraeni</h5>
                        <span>24330043</span>
                        {{-- <p>Ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labuore
                            et dolore magna aliqua.</p> --}}
                            <div class="icons">
                                <a href="https://wa.me/6281231726441" class="facebook"><i class="fa fa-whatsapp"></i></a>
                                <a href="mailto:dwi_atmoko@student.janabadra.ac.id" class="twitter"><i class="fa fa-envelope"></i></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->
@endsection
