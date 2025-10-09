<div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{ asset('bo/images/logos/silayak-logo.png') }}" width="180" alt="" class="ms-2" />
    </a>
    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
    </div>
</div>
<!-- Sidebar navigation-->
<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Data</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link " href="{{ route('criteria.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-list"></i>
                </span>
                <span class="hide-menu">Kriteria</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('sub-criteria.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-list-details"></i>
                </span>
                <span class="hide-menu">Sub Kriteria</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('data-training.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-database"></i>
                </span>
                <span class="hide-menu">Data Latih</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('data-testing.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-database-import"></i>
                </span>
                <span class="hide-menu">Data Uji</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">PENGGUNA</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('user.index')}}" aria-expanded="false">
                <span>
                    <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Data Pengguna</span>
            </a>
        </li>
        {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                    <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Profil Pengguna</span>
            </a>
        </li> --}}
    </ul>
</nav>
