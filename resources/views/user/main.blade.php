@extends('user.layouts.layout')
@section('title', 'Trang Chủ')
@section('content')
<fieldset>
    <legend>Các trận chưa đấu</legend>
    <table class="list_table">
        <tr class="list_heading">
            <td>Đội chủ nhà</td>
            <td>Tỉ số</td>
            <td>Đội Khách</td>
            <td>Thời gian bắt đầu</td>
            <td>Thời gian ngừng đặt cược</td>
            <td>Tỉ lệ thắng</td>
            <td>Tỉ lệ hòa</td>
            <td>Tỉ lệ thua</td>
            <td></td>
        </tr>
        <tbody>
        @foreach($match as $item)
            @if($item["status"] == 0)
                @if ($item["level"] == 0)
                    <tr class="list_data">
                        <td>{!! $item["hometeam"] !!}</td>
                        <td> - </td>
                        <td>{!! $item["awayteam"] !!}</td>
                        <td>{!! $item["timestart"] !!}</td>
                        <td>{!! $item["timebet"] !!}</td>
                        <td>{!! $item["win"] !!}</td>
                        <td>{!! $item["draw"] !!}</td>
                        <td>{!! $item["lose"] !!}</td>
                        <td>
                            <a href="{!! route('getBetting', $item['id']) !!}">
                                <input type="button" name="btnDetail" value="Chi tiết" class="button" />
                            </a>
                        </td>
                    </tr>
                @endif
            @endif
        @endforeach
        </tbody>
    </table>
</fieldset>
<br><br><br><br><br><br><br><br>
<fieldset>
    <legend>Các trận đã kết thúc</legend>
    <table class="list_table">
        <tr class="list_heading">
            <td>Đội chủ nhà</td>
            <td>Tỉ số</td>
            <td>Đội Khách</td>
            <td>Thời gian bắt đầu</td>
            <td>Thời gian ngừng đặt cược</td>
            <td>Tỉ lệ thắng</td>
            <td>Tỉ lệ hòa</td>
            <td>Tỉ lệ thua</td>
            <td></td>
        </tr>
        <tbody>
        @foreach($match as $item)
            @if($item["status"] == 1)
                <tr class="list_data">
                    <td>{!! $item["hometeam"] !!}</td>
                    <td>{!! $item["homegoal"] !!} - {!! $item["awaygoal"] !!}</td>
                    <td>{!! $item["awayteam"] !!}</td>
                    <td>{!! $item["timestart"] !!}</td>
                    <td>{!! $item["timebet"] !!}</td>
                    <td>{!! $item["win"] !!}</td>
                    <td>{!! $item["draw"] !!}</td>
                    <td>{!! $item["lose"] !!}</td>
                    <td>
                        <a href="{!! route('getBetting', $item['id']) !!}">
                            <input type="button" name="btnDetail" value="Chi tiết" class="button" />
                        </a>
                    </td>
                </tr>
            @endif
         @endforeach
        </tbody>
    </table>
</fieldset>
@endsection