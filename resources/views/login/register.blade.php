@extends('login.layouts.layout')
@section('title', 'Đăng Ký')
@section('content')        
<form action="{{ Asset('register') }}" method="POST" id="form-signup" style="width: 650px; margin: 30px auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <legend>Thông Tin Đăng Ký</legend>                
		<table>
            <tr>
                <td class="login_img"></td>
                <td>
                    <span class="form_label">Tên đăng nhập:</span>
                    <span class="form_item">
                        <input type="text" name="txtUser" id="txtUser" placeholder="Username" class="textbox" value="{!! old('txtUser') !!}" />
                    </span><br /><br />
                    <span class="form_label">Mật khẩu:</span>
                    <span class="form_item">
                        <input type="password" name="txtPass" id="txtPass" placeholder="Password" class="textbox"/>
                    </span><br /><br />
                    <span class="form_label">Xác nhận mật khẩu:</span>
                    <span class="form_item">
                        <input type="password" name="txtPassConf" id="txtPassConf" placeholder="Confirmation Password" class="textbox"/>
                    </span><br /><br />
                    <span class="form_label">Email:</span>
                    <span class="form_item">
                        <input type="email" name="txtEmail" id="txtEmail" placeholder="Email" class="textbox" value="{!! old('txtEmail') !!}"/>
                    </span><br /><br />
                    <br /><br />
                    <span class="form_label"></span>
                    <span class="form_item">
                        <input type="submit" name="btnLogin" value="Đăng ký" class="button" />
                    </span>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
@endsection