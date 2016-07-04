<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mr.HAT" />
    <link rel="stylesheet" href="{!! asset('style/templates/css/style.css') !!}" />
    <script type="text/javascript" src="{!! asset('assets/js/jquery-validate/jquery-3.0.0.min.js') !!}"></script>
	<title>@yield('title')</title>
</head>

<body>
<div id="layout">
@if (!Auth::check())
    <div id='top'>
        <div id="topmenu">
            <ul>
                <li><a href="{!! route('getHome') !!}">Trang Chủ</a></li>
                <li><a href="{!! route('getHelpBet') !!}">Hướng Dẫn</a></li>
            </ul>
        </div>
    </div>
    <div id="menu">
        <table width="100%">
                <tr>
                    <td align="right">
                        <a href="{!! route('getLogin') !!}">Đăng Nhập</a> || <a href="{!! route('getRegister') !!}">Đăng Ký</a>
                    </td>
                </tr>
        </table>
    </div>
@endif
@if (Auth::check())
    <div id="top">
        <div id="topmenu">
            <ul>
                <li><a href="{!! route('getMain') !!}">Trang Chủ</a></li>
                <li><a href="{!! route('getHisBet') !!}">Lịch Sử Đặt Cược</a></li>
                <li><a href="{!! route('getHelpBet') !!}">Hướng Dẫn</a></li>
            </ul>
        </div>
        <div id="topuser">
                {!! Auth::user()->username !!} || {!! Auth::user()->money !!} APC   
        </div>
    </div>
    <div id="menu">
        <table width="100%">
            <tr>
            @if ( (Auth::user()->level) == 1)
                <td>
                    <a href="{!! route('getAdmin') !!}">Trang Admin</a>
                </td>
            @endif
                <td align="right">
                    <a href="{!! url('logout') !!}">Logout</a>
                </td>
            </tr>
        </table>
    </div>
@endif
    <div id="main">
    <br><br><br>

        @include('errors.error')
        @include('errors.flash')
        <br><br>
        @yield('content')
        
    <br><br><br><br><br><br><br><br>    
    </div>
    <div id="bottom">
       Copyright © 2016 by Mr.HAT
    </div>
</div>
<script src="{!! asset('assets/js/jquery-validate/myscript.js') !!}"></script>
</body>
</html>