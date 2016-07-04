@extends('user.layouts.layout')
@section('title', 'Chi Tiết')
@section('content')
@if($match["status"] == 0)
    <fieldset>
        <legend>Chi Tiết Trận Đấu</legend>
        <table class="list_table">
            <tr class="list_heading">
                <td>Đội chủ nhà</td>
                <td>Tỉ số</td>
                <td>Đội Khách</td>
                <td>Thời gian bắt đầu</td>
                <td>Thời gian ngưng đặt cược</td>
                <td>Tỉ lệ thắng</td>
                <td>Tỉ lệ hòa</td>
                <td>Tỉ lệ thua</td>
            </tr>
            <tbody>
                <tr class="list_data">
                    <td>{!! $match["hometeam"] !!}</td>
                    <td> - </td>
                    <td>{!! $match["awayteam"] !!}</td>
                    <td>{!! $match["timestart"] !!}</td>
                    <td>{!! $match["timebet"] !!}</td>
                    <td>{!! $match["win"] !!}</td>
                    <td>{!! $match["draw"] !!}</td>
                    <td>{!! $match["lose"] !!}</td>
                </tr>
            </tbody>
        </table>
        <br>
    </fieldset>
    <br><br>
    <form action="" method="POST" id="form-betting" enctype="multipart/form-match">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset style="width: 500px">
            <legend>Đặt Cược</legend>
            <span class="form_label">Chọn cửa:</span>
                    <span class="form_item">
                        <select name="sltBets" class="select">
                            <option value="">Chọn Cửa</option>
                            <option value="1">Thắng</option>
                            <option value="2">Hòa</option>
                            <option value="3">Thua</option>
                        </select>
            </span><br />
            <span class="form_label">Tiền Cược:</span>
            <span class="form_item">
                <form>
                <input type="text" name="txtMoney" id="txtMoney" class="textbox" value="{!! old('txtMoney') !!}" />
                </form>
            </span><br /><br><br>
            <span class="form_item">
                <input type="submit" name="btnBetting" value="Xác nhận" class="button" onclick="return xacnhanxoa('Bạn Có Chắc Đặt Cược Không? ')" />
            </span>
        </fieldset>
    </form>
@else
    <fieldset>
        <legend>Chi Tiết Trận Đấu</legend>
        <table class="list_table">
            <tr class="list_heading">
                <td>Đội chủ nhà</td>
                <td>Tỉ số</td>
                <td>Đội Khách</td>
                <td>Thời gian bắt đầu</td>
                <td>Thời gian ngưng đặt cược</td>
                <td>Tỉ lệ thắng</td>
                <td>Tỉ lệ hòa</td>
                <td>Tỉ lệ thua</td>
            </tr>
            <tbody>
                <tr class="list_data">
                    <td>{!! $match["hometeam"] !!}</td>
                    <td>{!! $match["homegoal"] !!} - {!! $match["awaygoal"] !!}</td>
                    <td>{!! $match["awayteam"] !!}</td>
                    <td>{!! $match["timestart"] !!}</td>
                    <td>{!! $match["timebet"] !!}</td>
                    <td>{!! $match["win"] !!}</td>
                    <td>{!! $match["draw"] !!}</td>
                    <td>{!! $match["lose"] !!}</td>
                </tr>
            </tbody>
        </table>
        <br>
    </fieldset>
    <br><br><br><br>
@endif
<br><br><br><br><br><br>
<fieldset style="width: 800px">
    <legend>Danh sách người chơi đặt cược</legend>
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
<!--
<fieldset style="width: 500px">
    <table class="list_table">
            <tr>
                <td>
                    <button class="button" onclick="Bettings()">Xem thử kết quả</button>
                </td>
            </tr>
            <tr class="list_heading">
                <td>Tiền thắng</td>
                <td>Tiền thua</td>
            </tr>
            <tr class="list_data">
                <td><p id="win"></p></td>
                <td>
                    <p id="lose"></p>
                </td>
            </tr>
        </table>
</fieldset>



<p id="win"></p>
<p onblur="demo()"></p>
<script type="text/javascript">
    function Bettings() {
        var x = document.getElementById("form-betting");
        var a = x.elements[3].value;    //money_bet
        var b = x.elements[2].value;    //bets
        var t = "";  //money

        if (b == 1){
            t = a*($match["win"]);
        }
        if (b == 2) {
            t = a*($match["draw"]);
        }
        if (b == 3) {
            t = a*($match["lose"]);
        }
        document.getElementById("lose").innerHTML = a;  
        document.getElementById("win").innerHTML = t;
    }

    function demo() {
        var x = document.getElementById("txtMoney");
        var i;
        i = x.value
    }
</script>

-->
@endsection