@extends('admin.layouts.layout')
@section('title', 'Edit Match')
@section('content')
<br><br>
<form action="" method="POST" enctype="multipart/form-match" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Chỉnh Sữa Thông Tin Trận Đấu</legend>
		<span class="form_label">Đội chủ nhà:</span>
		<span class="form_item">
			<input type="text" name="txtHome" class="textbox" value="{!! old('txtHome', isset($match) ? $match['hometeam'] : null) !!}" />
		</span><br /><br />
		<span class="form_label">Đội khách:</span>
		<span class="form_item">
			<input type="text" name="txtAway" class="textbox" value="{!! old('txtAway', isset($match) ? $match['awayteam'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Thời gian bắt đầu:</span>
		<span class="form_item">
			{!! $match['timestart'] !!}
			<input type="hidden" name="timestart" value="{!! old('timestart', isset($match) ? $match['timestart'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Thời gian kết thúc:</span>
		<span class="form_item">
			<input type="datetime" name="timeend" class="textbox" value="{!! old('timeend', isset($match) ? $match['timeend'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Thời gian ngưng đặt cược:</span>
		<span class="form_item">
			<input type="datetime" name="timebet" class="textbox" value="{!! old('timebet', isset($match) ? $match['timebet'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Tỉ lệ thắng:</span>
		<span class="form_item">
			<input type="text" name="txtWin" class="textbox" value="{!! old('txtWin', isset($match) ? $match['win'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Tỉ lệ hòa:</span>
		<span class="form_item">
			<input type="text" name="txtDraw" class="textbox" value="{!! old('txtDraw', isset($match) ? $match['draw'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">tỉ lệ thua:</span>
		<span class="form_item">
			<input type="text" name="txtLose" class="textbox" value="{!! old('txtLose', isset($match) ? $match['lose'] : null) !!}"/>
		</span><br /><br />
		<span class="form_label">Công bố trận đấu:</span>
		<span class="form_item">
			<input type="radio" name="rdoPublic" value="0" checked="checked" 
			@if (old('rdoPublic', isset($match) ? $match['level'] : null) == "0") {
				checked
			}
			@endif
			/> Có 
			<input type="radio" name="rdoPublic" value="1" 
			@if (old('rdoPublic', isset($match) ? $match['level'] : null) == "1") {
				checked
			}
			@endif
			/> Không
		</span><br /><br /><br /><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnEditMatch" value="Sữa trận đấu" class="button" />
		</span>
	</fieldset>
</form>
<br><br><br><br><br><br>
@endsection