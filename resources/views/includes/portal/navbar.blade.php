<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="{{ route('portal.index') }}" class="d-flex align-items-center justify-content-center scrollto me-auto me-lg-0" style="width: 3cm">
            <img src="{{ url('frontend/images/Logo LKBB.png') }}" alt="" class="icon-image"/>
        </a>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <a class="nav-link scrollto" href="{{ url('#home') }}">
                <span class="nav-text">Home</span>
                <i class="bi bi-house-door nav-icon"></i> <!-- Ikon Home -->
            </a>
            <a class="nav-link scrollto" href="{{ url('#waktutempat') }}">
                <span class="nav-text">Waktu & Tempat</span>
                <i class="bi bi-calendar-event nav-icon"></i> <!-- Ikon Waktu & Tempat -->
            </a>
            <a class="nav-link scrollto" href="{{ url('#berkas') }}">
                <span class="nav-text">Berkas</span>
                <i class="bi bi-file-earmark-text nav-icon"></i> <!-- Ikon Berkas -->
            </a>
            <a class="nav-link scrollto" href="{{ url('#trophy') }}">
                <span class="nav-text">Trophy</span>
                <i class="bi bi-trophy nav-icon"></i> <!-- Ikon Trophy -->
            </a>
        </div>
        @auth
        <a class="d-flex align-items-center justify-content-center scrollto me-auto me-lg-0" href="{{ route('dashboard.index') }}" style="width: 3cm;">
            <img src="{{ url('frontend/images/Dashboard.png') }}" alt="Dashboard" class="icon-image" />
        </a>
        @else
        <a class="d-flex align-items-center justify-content-center scrollto me-auto me-lg-0" href="{{ route('login.index') }}" style="width: 3cm;">
            <img src="{{ url('frontend/images/Login.png') }}" alt="Login" class="icon-image" />
        </a>
        @endauth
    </div>
</header>
<!-- End Header -->