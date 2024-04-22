<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand d-md-down-none">
        <a href="/home" class="h4 mt-2 mr-5" style="text-decoration: none; color: white;">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <ul class="c-sidebar-nav ml-3">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.people.index") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-user-alt"></i>
                People
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('logout') }}" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt"></i>
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>