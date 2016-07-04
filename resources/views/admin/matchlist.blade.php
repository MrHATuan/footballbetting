@extends('admin.layouts.layout')
@section('title', 'List Match')
@section('content')
<br><br>
<fieldset>
    <legend>Các trận chưa đấu</legend>
        <table class="list_table">
        	<tr class="list_heading">
        		<td>Đội chủ nhà</td>
        		<td>Tỉ số</td>
        		<td>Đội Khách</td>
        		<td>Thời gian bắt đầu</td>
        		<td>Thời gian kết thúc</td>
        		<td>Thời gian ngừng đặt cược</td>
        		<td>Tỉ lệ thắng</td>
        		<td>Tỉ lệ hòa</td>
        		<td>Tỉ lệ thua</td>
        		<td>Trạng thái</td>
        		<td>Sữa</td>
                <td>Xóa</td>
                <td>Chi tiết</td>
        	</tr>
            <tbody>
            @foreach($match as $item)
                @if($item["status"] == 0)
            	<tr class="list_data">
                    <td>{!! $item["hometeam"] !!}</td>
                    <td> - </td>
                    <td>{!! $item["awayteam"] !!}</td>
            		<td>{!! $item["timestart"] !!}</td>
                    <td>{!! $item["timeend"] !!}</td>
                    <td>{!! $item["timebet"] !!}</td>
                    <td>{!! $item["win"] !!}</td>
                    <td>{!! $item["draw"] !!}</td>
                    <td>{!! $item["lose"] !!}</td>
                    @if($item["level"] == 0) 
                    <td>Hiện</td>
                    @else 
                    <td>Ẩn</td>
                    @endif
                    <td class="list_td aligncenter">
                        <a href="{!! route('getEditMatch', $item['id']) !!}"><img src="{!! asset('images/edit.png') !!}" /></a>
                    </td>
                    <td>
                        <a href="{!! route('getDelMatch', $item['id']) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không? ')"><img src="{!! asset('images/delete.png') !!}" /></a>
                    </td>
                    <td>
                        <a href="{!! route('getDetailMatch', $item['id']) !!}">
                            <input type="button" name="btnDetail" value="Chi tiết" class="button" />
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
</fieldset>
<br><br><br><br><br><br><br><br>
<fieldset>
    <legend>Các trận chưa đấu</legend>
        <table class="list_table">
            <tr class="list_heading">
                <td>Đội chủ nhà</td>
                <td>Tỉ số</td>
                <td>Đội Khách</td>
                <td>Thời gian bắt đầu</td>
                <td>Thời gian kết thúc</td>
                <td>Thời gian ngừng đặt cược</td>
                <td>Tỉ lệ thắng</td>
                <td>Tỉ lệ hòa</td>
                <td>Tỉ lệ thua</td>
                <td>Trạng thái</td>
                <td>Chi tiết</td>
            </tr>
            <tbody>
            @foreach($match as $item)
                @if($item["status"] == 1)
                <tr class="list_data">
                    <td>{!! $item["hometeam"] !!}</td>
                    <td>{!! $item["homegoal"] !!} - {!! $item["awaygoal"] !!}</td>
                    <td>{!! $item["awayteam"] !!}</td>
                    <td>{!! $item["timestart"] !!}</td>
                    <td>{!! $item["timeend"] !!}</td>
                    <td>{!! $item["timebet"] !!}</td>
                    <td>{!! $item["win"] !!}</td>
                    <td>{!! $item["draw"] !!}</td>
                    <td>{!! $item["lose"] !!}</td>
                    @if($item["level"] == 0) 
                    <td>Hiện</td>
                    @else 
                    <td>Ẩn</td>
                    @endif
                    <td>
                        <a href="{!! route('getDetailMatch', $item['id']) !!}">
                            <input type="button" name="btnDetail" value="Chi tiết" class="button" />
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
</fieldset>
<br><br><br><br><br><br>
@endsection