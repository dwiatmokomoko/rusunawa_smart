<div class="offcanvas__menu__wrapper">
    <div class="canvas__close">
        <span class="fa fa-times-circle-o"></span>
    </div>
    <div class="offcanvas__logo">
        <a href="#"><img src="{{ asset('fo/img/silayak-logo.png') }}" alt=""></a>
    </div>
    <nav class="offcanvas__menu mobile-menu">
        <ul>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('fo.home.index') }}">Beranda</a></li>
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
    <div id="mobile-menu-wrap"></div>
</div>
