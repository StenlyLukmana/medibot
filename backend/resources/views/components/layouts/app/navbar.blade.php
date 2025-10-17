<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Medibot</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <div class="nav-items">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('health_facilities.index') ? 'active' : '' }}" aria-current="page" href="{{ route('health_facilities.index') }}">Fasilitas Kesehatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('appointments.index') ? 'active' : '' }}" href="{{ route('appointments.index') }}">Jadwal Pemeriksaan</a>
                </li>
            </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $user->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="route('profile.edit')">{{ __('Pengaturan') }}</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>
