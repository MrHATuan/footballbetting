@extends('user.layouts.layout')
@section('title', 'Lịch Sử')
@section('content')
<fieldset>
    <legend>Lịch sữ cá cược</legend>
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
            <td>Đặt cửa</td>
            <td>Tiền cược</td>
            <td>Tiền thắng</td>
            <td>Tiền thua</td>
            <td>Trạng thái</td>
        </tr>
        <tbody>
        @foreach($bet as $item)
            @if ($item["status"] == 0)
                <tr class="list_data" style="text-align: center;">
                    <td>{!! $item["hometeam"] !!}</td>
                    <td> - </td>
                    <td>{!! $item["awayteam"] !!}</td>
                    <td>{!! $item["timestart"] !!}</td>
                    <td>{!! $item["timebet"] !!}</td>
                    <td>{!! $item["win"] !!}</td>
                    <td>{!! $item["draw"] !!}</td>
                    <td>{!! $item["lose"] !!}</td>
                    @if ($item["bets"] == 1)
                        <td>Thắng</td>
                    @elseif ($item["bets"] == 2)
                        <td>Hòa</td>
                    @else
                        <td>Thua</td>
                    @endif
                    <td>{!! $item["money_bet"] !!}</td>
                    <td>0 APV</td>
                    <td>0 APV</td>
                    <td>Chưa diễn ra</td>
                </tr>
            @endif
            @if ($item["status"] == 1)
                <tr class="list_data" style="text-align: center;">
                    <td>{!! $item["hometeam"] !!}</td>
                    <td>{!! $item["homegoal"] !!} - {!! $item["awaygoal"] !!}</td>
                    <td>{!! $item["awayteam"] !!}</td>
                    <td>{!! $item["timestart"] !!}</td>
                    <td>{!! $item["timebet"] !!}</td>
                    <td>{!! $item["win"] !!}</td>
                    <td>{!! $item["draw"] !!}</td>
                    <td>{!! $item["lose"] !!}</td>
                    @if ($item["bets"] == 1)
                        <?php
                        $money = $item["money_bet"] * $item["win"];
                        ?>
                        <td>Thắng</td>
                        @if ($item["homegoal"] > $item["awaygoal"])
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
                        $money = $item["money_bet"] * $item["draw"];
                        ?>
                        <td>Hòa</td>
                        @if ($item["homegoal"] == $item["awaygoal"])
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
                        $money = $item["money_bet"] * $item["lose"];
                        ?>
                        <td>Thua</td>
                        @if ($item["homegoal"] < $item["awaygoal"])
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>{!! $money !!} APV</td>
                            <td>0 APV</td>
                        @else
                            <td>{!! $item["money_bet"] !!}</td>
                            <td>0 APV</td>
                            <td>{!! $item["money_bet"] !!}</td>
                        @endif
                    @endif                    
                    <td>Kết thúc</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</fieldset>
@endsection