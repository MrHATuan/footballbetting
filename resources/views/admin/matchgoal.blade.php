@extends('admin.layouts.layout')
@section('title', 'Update Match')
@section('content')
<br><br>
<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<fieldset>
		<legend>Chỉnh sữa kết quả trận đấu</legend>
		<span class="form_label">Đội chủ nhà:</span>
		<span class="form_item">{!! $match["hometeam"] !!}</span><br /><br />
		<span class="form_label">Đội khách:</span>
		<span class="form_item">{!! $match["awayteam"] !!}</span><br /><br />
		<span class="form_label">Thời gian bắt đầu:</span>
		<span class="form_item">{!! $match["timestart"] !!}</span><br /><br />
		<span class="form_label">Thời gian kết thúc:</span>
		<span class="form_item">{!! $match["timeend"] !!}</span><br /><br />
		<span class="form_label">Thời gian ngưng đặt cược:</span>
		<span class="form_item">{!! $match["timebet"] !!}</span><br /><br />
		<span class="form_label">Tỉ lệ thắng:</span>
		<span class="form_item">{!! $match["win"] !!}</span><br /><br />
		<span class="form_label">Tỉ lệ hòa:</span>
		<span class="form_item">{!! $match["draw"] !!}</span><br /><br />
		<span class="form_label">tỉ lệ thua:</span>
		<span class="form_item">{!! $match["lose"] !!}</span><br /><br />
		<span class="form_label">Công bố trận đấu:</span>
		<span class="form_item">
			@if($match["level"] == 0) 
                Hiện
            @else 
                Ẩn
            @endif
		</span><br /><br />
		<span class="form_label">Bàn thắng đội nhà:</span>
		<span class="form_item">
			<input type="text" name="txtHomegoal" class="textbox" value="{!! old('txtHomegoal') !!}"/>
		</span><br /><br />
		<span class="form_label">Bàn thắng đội khách:</span>
		<span class="form_item">
			<input type="text" name="txtAwaygoal" class="textbox" value="{!! old('txtAwaygoal') !!}"/>
		</span><br /><br /><br /><br />
		<span class="form_label"></span>
		<span class="form_item">
			<input type="submit" name="btnGoals" value="Cập Nhật" class="button" />
		</span>
	</fieldset>
</form>
<br><br><br><br><br><br>
@endsection