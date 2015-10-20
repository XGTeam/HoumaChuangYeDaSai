<nav class="navbar {!! ($inverse == true) ? 'navbar-inverse' : 'navbar-default' !!} navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="{!! $main[0]['url'] !!}">{{ $title }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @foreach($main as $item)
                    <li{!! ($item['active'] ? ' class="active"' : '') !!}>
                        <a href="{!! $item['url'] !!}">
                            {!! ((!$item['icon'] == '') ? '<i class="fa fa-'.$item['icon'].' fa-inverse fa-fw"></i> ' : '') !!}{{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
                @if ($bar)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {!! $side !!} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($bar as $item)
                                <li>
                                    <a href="{!! $item['url'] !!}">
                                        {!! ((!$item['icon'] == '') ? '<i class="fa fa-'.$item['icon'].' fa-fw"></i> ' : '') !!}{{ $item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="divider"></li>
                            <li>
                                <a href="{!! URL::route('account.logout') !!}">
                                    <i class="fa fa-power-off fa-fw"></i> 退出登录
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li {!! (Request::is('account/register') ? 'class="active"' : '') !!}>
                        <a href="{!! URL::route('account.register') !!}">
                        报名
                        </a>
                    </li>
                    <li {!! (Request::is('account/login') ? 'class="active"' : '') !!}>
                        <a href="{!! URL::route('account.login') !!}">
                        登录
                        </a>
                    </li>
                @endif
        </ul>
        </div>
    </div>
</nav>
