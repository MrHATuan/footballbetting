<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Mr.HAT" />
    <link rel="stylesheet" href="{!! asset('style/templates/css/style.css') !!}" />
    <script type="text/javascript" src="{!! asset('assets/js/jquery-validate/jquery-3.0.0.min.js') !!}"></script>
	<title>Admin :: @yield('title')</title>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin :: @yield('title')
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="{!! route('getAdmin') !!}">Trang chủ</a> || <a href="{!! route('getListMatch') !!}">Danh Sách Trận Đấu</a> || <a href="{!! route('getNewMatch') !!}">Đăng Ký Trận Đấu</a> || <a href="{!! route('getMain') !!}">Trang User</a>
				</td>
				<td align="right">
					Xin chào {!! Auth::user()->username !!} | <a href="{!! url('logout') !!}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">

    	@include('errors.error')
    	@include('errors.flash')
    	@yield('content')

   	</div>
    <div id="bottom">
        Copyright © 2016 by Mr.HAT 
    </div>
</div>
<script src="{!! asset('assets/js/jquery-validate/myscript.js') !!}"></script>
</body>
</html>