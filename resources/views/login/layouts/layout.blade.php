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
    <div id="top">
        :: @yield('title')
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
    <div id="main"> 
    <br>

        @include('errors.error')
        @include('errors.flash')
        @yield('content')

    <br><br><br>
    </div>
    <div id="bottom">
        Copyright © 2016 by Mr.HAT 
    </div>
</div>
<script src="{!! asset('assets/js/jquery-validate/myscript.js') !!}"></script>
</body>
</html>