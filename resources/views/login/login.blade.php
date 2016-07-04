@extends('login.layouts.layout')
@section('title', 'Đăng Nhập')
@section('content')       
<form action="{{Asset('login')}}" method="POST" id="form-login" style="width: 650px; margin: 30px auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <legend>Thông Tin Đăng Nhập</legend>                
		<table>
            <tr>
                <td class="login_img"></td>
                <td>
                    <span class="form_label">Username:</span>
                    <span class="form_item">
                        <input type="text" name="txtUser" class="textbox" value="{!! old('txtUser') !!}" />
                    </span><br /><br />
                    <span class="form_label">Password:</span>
                    <span class="form_item">
                        <input type="password" name="txtPass" class="textbox" />
                    </span><br /><br /><br />
                    <span class="form_label"></span>
                    <span class="form_item">
                        <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                    </span>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
@endsection  