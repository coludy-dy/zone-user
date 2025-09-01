<!-- Topbar -->
<div class="topbar d-flex justify-content-between bg-light px-3" style="height: 45px" style="background-color: grey">
    <div class="topbar-left d-flex align-items-center gap-3 small">
        <span><i class="fas fa-envelope me-1"></i> support@mobilezone.com</span>
        <span><i class="fas fa-phone-alt me-1"></i> +95 123 456 789</span>
        <span><i class="fas fa-map-marker-alt me-1"></i> Yangon, Myanmar</span>
    </div>
    @guest
        <div class="topbar-right d-flex align-items-center gap-3">
            <a href="{{route('login-form')}}" class="text-black" style="text-decoration: none">Login</a>
            <a href="{{route('register')}}" class="text-black" style="text-decoration: none">Register</a>
        </div>
    @endguest
</div>