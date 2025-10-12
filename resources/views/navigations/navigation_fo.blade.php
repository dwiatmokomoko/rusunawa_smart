<div class="offcanvas__menu__wrapper">
    <div class="canvas__close">
        <span class="fa fa-times-circle-o"></span>
    </div>
    <div class="offcanvas__logo">
        <a href="#"><img src="{{ asset('fo/img/silayak-logo.png') }}" alt=""></a>
    </div>
    <nav class="offcanvas__menu mobile-menu">
        <ul>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ route('fo.home.index') }}">Beranda</a>
            </li>

            <li class="{{ request()->is('about') ? 'active' : '' }}">
                <a href="{{ route('fo.about.index') }}">Tentang</a>
            </li>

            @auth('web')
                <li class="{{ request()->is('pra-kelayakan*') ? 'active' : '' }}">
                    <a href="{{ route('pre-eligibility.form') }}">Pendaftaran</a>
                </li>
            @else
                <li>
                    <a href="{{ route('user.login') }}">Pendaftaran</a>
                </li>
            @endauth

            <li class="{{ request()->is('contact') ? 'active' : '' }}">
                <a href="{{ route('fo.contact.index') }}">Petunjuk</a>
            </li>

            <li class="{{ request()->is('ourteam') ? 'active' : '' }}">
                <a href="{{ route('fo.ourteam.index') }}">Pengembang</a>
            </li>

            {{-- Login/Logout --}}
            @guest('web')
                <li class="{{ request()->is('user/login') ? 'active' : '' }}">
                    <a href="{{ route('user.login') }}">LOGIN</a>
                </li>
            @else
                <li>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                        onsubmit="return confirm('Anda sudah login. Apakah Anda ingin logout?');">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-decoration-none">
                            LOGOUT {{ strtok(auth('web')->user()->name, ' ') }}
                        </button>
                    </form>
                </li>
            @endguest

        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
</div>
