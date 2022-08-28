<!-- header start -->
<header class=" main-header bg-white d-flex justify-content-between p-2">
    @auth
    <div class="header-toggle">
        <div class="menu-toggle mobile-menu-icon">
            <div></div>
            <div></div>
            <div>
            </div>
        </div>
        <div class="text-primary">Hi {{Auth::user()->name}}! ({{Auth::user()->email}})</div>

    </div>
    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>
        <!-- Grid menu Dropdown -->
        <div class="dropdown dropleft">
            <i class="i-Administrator text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="menu-icon-grid">
                    <a href="{{ route('changePw') }}" class="text-center">
                        <i class="nav-icon i-Key"></i>
                        Change Password
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon i-Door"></i>
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @endauth
</header>
<!-- header close -->