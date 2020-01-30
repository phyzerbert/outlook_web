<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"src="{{asset('images/avatar.png')}}" alt="User Image">
    <div>
        <p class="app-sidebar__user-name">Administrator</p>
        <p class="app-sidebar__user-designation">
            Database Management
        </p>
    </div>
</div>
<ul class="app-menu">
    <li><a class="app-menu__item active" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    {{-- {{-- @if ($role == 'exec')  
        <li><a class="app-menu__item @if($c_page == 'transaction') active @endif" href="{{route('transaction.create')}}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">New Transaction</span></a></li>
    @endif --}}
</ul>