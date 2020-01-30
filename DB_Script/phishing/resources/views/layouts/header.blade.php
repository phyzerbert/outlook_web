<a class="app-header__logo" href="{{ url('/') }}">{{config('app.name')}}</a>
<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

<ul class="app-nav">
    <!-- User Menu-->
    {{-- <li class="dropdown">
        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="#" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                ><i class="fa fa-sign-out fa-lg"></i> Sign Out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form> 
        </ul>
    </li> --}}
</ul>


