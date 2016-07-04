<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\BettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\User;
use App\Models\Betting;
use DateTime;


class BettingController extends Controller
{
    public function getMain() {
    	$match = Match::select('id','hometeam','awayteam','homegoal','awaygoal','timestart','timeend','timebet','win','draw','lose','status','level')->orderBy('timestart')->get()->toArray();
    	return view('user.main',compact('match'));
    }

    public function getBetting($id) {
    	$match = Match::find($id);
        $bet = Betting::select('username','money_bet','bets')->join('users', 'bettings.user_id', '=', 'users.id')->where('match_id','=',$id)->get()->toArray();
    	return view('user.betting',compact('match', 'bet'));
    }

    public function postBetting(BettingRequest $request, $id) {
        $user = User::find(Auth::user()->id);
        $match = Match::find($id);
        $sosanh = date('Y-m-d H:i:s');
        if (strtotime(($match->timebet)) < strtotime($sosanh)) {
            return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Đã hết thời gian đặt cược cho trận đấu này']);
        } else {
            $data = Betting::select('id')->where([['user_id','=',$user->id],['match_id','=',$id],])->count();
            if ($data != 0){
                return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Bạn đã đặt cược trận đấu này! Hãy xem lại lịch sử đặt cược']);
            } else {
                if (($user->money) >= ($request->txtMoney)) {
                    $bet = new Betting;
                    $bet->match_id = $id;
                    $bet->user_id = Auth::user()->id;
                    $bet->bets = $request->sltBets;
                    $bet->money_bet = $request->txtMoney;
                    $bet->created_at = new DateTime();
                    $bet->save();
                    $money = ($user->money) - ($request->txtMoney);
                    $user->money = $money;
                    $user->updated_at = new DateTime();
                    $user->save();
                    return redirect()->route('getHisBet')->with(['flash_level' => 'result_msg', 'flash_message' => 'Đã đặt cược thành công']);
                } else {
                    return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Số tiền đặt cược lớn hơn số tiền bạn có']);
                }
            }
        }
    }

    public function getHisBet() {
        $bet = Betting::select('users.id', 'bettings.id','matchs.id', 'hometeam', 'awayteam', 'homegoal', 'awaygoal','timestart', 'timebet', 'win', 'draw', 'lose', 'status', 'matchs.level','bets', 'money_bet','money' )->join('users', 'bettings.user_id', '=', 'users.id')->join('matchs', 'bettings.match_id', '=', 'matchs.id')->where('users.id','=',Auth::user()->id)->orderBy('timestart','desc')->get()->toArray();
    	return view('user.history', compact('bet'));
    }

    public function getHelpBet() {
    	return view('user.help');
    }
}
