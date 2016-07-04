@extends('admin.layouts.layout')
@section('title', 'New Match')
@section('content')
<br><br>
<form action="" method="POST" id="form-newmatch" enctype="multipart/form-data" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Thông Tin Trận Đấu</legend>
		<span class="form_label">Đội chủ nhà:</span>
		<span class="form_item">
			<input type="text" name="txtHome" id="txtHome" value="{!! old('txtHome') !!}" class="textbox" />
		</span><br /><br />
		<span class="form_label">Đội khách:</span>
		<span class="form_item">
			<input type="text" name="txtAway" id="txtAway" value="{!! old('txtAway') !!}" class="textbox"/>
		</span><br /><br />
		<span class="form_label">Thời gian bắt đầu:</span>
		<span class="form_item">
			<input type="datetime-local" name="timestart" value="{!! old('timestart') !!}" class="textbox" />
		</span><br /><br />
		<span class="form_label">Thời gian kết thúc:</span>
		<span class="form_item">
			<input type="datetime-local" name="timeend" value="{!! old('timeend') !!}" class="textbox" />
		</span><br /><br />
		<span class="form_label">Thời gian ngưng đặt cược:</span>
		<span class="form_item">
			<input type="datetime-local" name="timebet" value="{!! old('timebet') !!}" class="textbox" />
		</span><br /><br />
		<span class="form_label">Tỉ lệ thắng:</span>
		<span class="form_item">
			<input type="text" name="txtWin" value="{!! old('txtWin') !!}" class="textbox"/>
		</span><br /><br />
		<span class="form_label">Tỉ lệ hòa:</span>
		<span class="form_item">
			<input type="text" name="txtDraw" value="{!! old('txtDraw') !!}" class="textbox"/>
		</span><br /><br />
		<span class="form_label">tỉ lệ thua:</span>
		<span class="form_item">
			<input type="text" name="txtLose" value="{!! old('txtLose') !!}" class="textbox"/>
		</span><br /><br />
        <br /><br /><br /><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnNewMatch" value="Đăng ký" class="button" />
		</span>
	</fieldset>
</form>
<br><br><br><br><br><br>
<!--
<script type="text/javascript">
    $("#form-newmatch").validate({
        rules:{
            txtHome:{
                required:true,
            },
            txtAway:{
                required:true,
            },
            timestart:{
            	required:true,
            },
            timeend:{
            	required:true,
            },
            timebet:{
            	required:true,
            },
            txtwin:{
            	required:true,
            },
            txtDraw:{
            	required:true,
            },
            txtLoss:{
            	required:true,
            }
        },
        messages:{
            txtHome:{
                required: "Không được bỏ trống",
            },
            txtAway:{
                required: "Không được bỏ trống",
            },
            timestart:{
            	required: "Không được bỏ trống",
            },
            timeend:{
            	required: "Không được bỏ trống",
            },
            timebet:{
            	required: "Không được bỏ trống",
            },
            txtwin:{
            	required: "Không được bỏ trống",
            },
            txtDraw:{
            	required: "Không được bỏ trống",
            },
            txtLoss:{
            	required: "Không được bỏ trống",
            }
        }
    });
</script>
-->
@endsection
