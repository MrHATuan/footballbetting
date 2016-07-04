@extends('admin.layouts.layout')
@section('title', 'Detail Match')
@section('content')
<br><br>
<form>
    <fieldset>
        <legend>Chi Tiết Trận Đấu</legend>
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
			</tr>
            <tbody>
            @if ($match["status"] == 0)
    			<tr class="list_data">
                    <td>{!! $match["hometeam"] !!}</td>
                    <td> - </td>
                    <td>{!! $match["awayteam"] !!}</td>
                    <td>{!! $match["timestart"] !!}</td>
                    <td>{!! $match["timeend"] !!}</td>
                    <td>{!! $match["timebet"] !!}</td>
                    <td>{!! $match["win"] !!}</td>
                    <td>{!! $match["draw"] !!}</td>
                    <td>{!! $match["lose"] !!}</td>
                    @if($match["level"] == 0) 
                    <td>Hiện</td>
                    @else 
                    <td>Ẩn</td>
                    @endif
                </tr>
            @else
                <tr class="list_data">
                    <td>{!! $match["hometeam"] !!}</td>
                    <td>{!! $match["homegoal"] !!} - {!! $match["awaygoal"] !!}</td>
                    <td>{!! $match["awayteam"] !!}</td>
                    <td>{!! $match["timestart"] !!}</td>
                    <td>{!! $match["timeend"] !!}</td>
                    <td>{!! $match["timebet"] !!}</td>
                    <td>{!! $match["win"] !!}</td>
                    <td>{!! $match["draw"] !!}</td>
                    <td>{!! $match["lose"] !!}</td>
                    @if($match["level"] == 0) 
                    <td>Hiện</td>
                    @else 
                    <td>Ẩn</td>
                    @endif
                </tr>
            @endif
            </tbody>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
            @if ($match["status"] == 0)
                <td>
                    <a href="{!! route('getGoalMatch', $match['id']) !!}">
                        <input type="button" name="btnGoal" value="Cập nhật kết quả" class="button" />
                    </a>
                </td>
                <td>
                    <a href="{!! route('getEditMatch', $match['id']) !!}">
                        <input type="button" name="btnEdit" value="Sữa" class="button" />
                    </a>
                </td>
            @endif
                <td>
                    <a href="{!! route('getDelMatch', $match['id']) !!}" onclick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không? ')">
                        <input type="button" name="btnDel" value="Xóa" class="button" />
                    </a>
                </td>
            </tr>
		</table>
    </fieldset>
</form>
<br><br><br><br><br><br>
<fieldset style="width: 800px">
    <legend>Danh sách đặt cược</legend>
    <table class="list_table">
        <tr class="list_heading">
            <td>Tên người chơi</td>
            <td>Đặt cửa</td>
            <td>Tiền cược</td>
            <td>Số tiền thắng</td>
            <td>Số tiền thua</td>
        </tr>
        <tbody>        
        @foreach ($bet as $item)
            @if ($match["status"] == 0)
                <tr class="list_data">
                    <td>{!! $item["username"] !!}</td>
                    @if ($item["bets"] == 1)
                        <td>Thắng</td>
                    @elseif ($item["bets"] == 2)
                        <td>Hòa</td>
                    @else
                        <td>Thua</td>
                    @endif
                    <td>{!! $item["money_bet"] !!}</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            @elseif ($match["status"] == 1)
                <tr class="list_data">
                    <td>{!! $item["username"] !!}</td>
                    @if ($item["bets"] == 1)
                        <?php
                        $money = $item["money_bet"] * $match["win"];
                        ?>
                        <td>Thắng</td>
                        @if ($match["homegoal"] > $match["awaygoal"])
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>{!! $money !!} APV</td>
                            <td>0 APV</td>
                        @else
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>0 APV</td>
                            <td>{!! $item["money_bet"] !!}</td>
                        @endif                        
                    @elseif ($item["bets"] == 2)
                        <?php
                        $money = $item["money_bet"] * $match["draw"];
                        ?>
                        <td>Hòa</td>
                        @if ($match["homegoal"] == $match["awaygoal"])
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>{!! $money !!} APV</td>
                            <td>0 APV</td>
                        @else
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>0 APV</td>
                            <td>{!! $item["money_bet"] !!}</td>
                        @endif
                    @else
                        <?php
                        $money = $item["money_bet"] * $match["lose"];
                        ?>
                        <td>Thua</td>
                        @if ($match["homegoal"] < $match["awaygoal"])
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>{!! $money !!} APV</td>
                            <td>0 APV</td>
                        @else
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>0 APV</td>
                            <td>{!! $item["money_bet"] !!}</td>
                        @endif
                    @endif 
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</fieldset>
<br><br><br><br><br><br>
@endsection