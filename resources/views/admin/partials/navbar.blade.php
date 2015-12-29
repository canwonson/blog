<ul class="nav navbar-nav">
    <li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 后台首页</a></li>
    @if (Auth::check())
        @foreach ($menus as $menu)
        <!-- <li @if (Request::is('admin/menu*')) class="active" @endif>
            <a href="/admin/menu">菜单</a>
        </li> -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="{{ $menu->icon }}"></span> {{ $menu->title}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($menu->child_list as $child)
                    <li><a href="/admin/{{ $child->menu }}"><span class="{{ $child->icon }}"></span> {{ $child->title }}</a></li>
                @endforeach
            </ul>
        </li>
        @endforeach
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">登陆</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                    aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">登出</a></li>
            </ul>
        </li>
    @endif
</ul>