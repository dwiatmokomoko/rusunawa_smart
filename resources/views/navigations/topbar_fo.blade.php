<header class="header-section header-normal">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('fo.home.index') }}">
                        <img src="{{ asset('fo/img/silayak-logo2.png') }}" alt="Logo SiLayak" class="rounded-circle"
                            style="height: 80px; width: 80px;">


                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <nav class="header__menu">
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
                            <li class="{{ request()->is('user/logout') ? 'active' : '' }}">
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

                @auth('web')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const trigger = document.getElementById('logout-trigger');
                            if (trigger) {
                                trigger.addEventListener('click', function() {
                                    if (confirm('Anda sudah login. Apakah Anda ingin logout?')) {
                                        document.getElementById('logout-form').submit();
                                    }
                                });
                            }
                        });
                    </script>
                @endauth

            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</header>
