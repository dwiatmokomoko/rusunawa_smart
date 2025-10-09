<header class="header-section header-normal">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('fo.home.index') }}">
                        <img src="{{ asset('fo/img/silayak-logo.png') }}" alt="Logo SiLayak" class="rounded-circle" style="height: 80px; width: 80px;">


                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                href="{{ route('fo.home.index') }}">Beranda</a></li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}"><a
                                href="{{ route('fo.about.index') }}">Tentang</a></li>
                        <li class="{{ request()->is('count*') ? 'active' : '' }}"><a
                                href="{{ route('pre-eligibility.form') }}">Hitung Kelayakan</a></li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a
                                href="{{ route('fo.contact.index') }}">Petunjuk Penggunaan</a></li>
                        <li class="{{ request()->is('ourteam') ? 'active' : '' }}"><a
                                href="{{ route('fo.ourteam.index') }}">Pengembang</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</header>
