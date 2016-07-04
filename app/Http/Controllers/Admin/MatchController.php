<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatchNewRequest;
use App\Http\Requests\MatchEditRequest;
use App\Http\Requests\MatchGoalRequest;
use App\Models\Match;
use App\Models\User;
use App\Models\Betting;
use DateTime;


class MatchController extends Controller
{
	public function getNewMatch() {
		return  view('admin.matchnew');
	}

	public function postNewMatch(MatchNewRequest $request) {
		$match = new Match;
		$match->hometeam = $request->txtHome;
		$match->awayteam = $request->txtAway;
		$match->timestart = $request->timestart;
		$match->timeend = $request->timeend;
		$match->timebet = $request->timebet;
		$match->win = $request->txtWin;
		$match->draw = $request->txtDraw;	
		$match->lose = $request->txtLose;
		$match->status = 0;
		$match->level = 1;
		$match->created_at = new DateTime();
		$match->save();
		return redirect()->route('getListMatch')->with(['flash_level' => 'result_msg', 'flash_message' => 'Thêm Trận Đấu Thành Công']);
	}

	public function getListMatch() {
		$match = Match::select('id','hometeam','awayteam','homegoal','awaygoal','timestart','timeend','timebet','win','draw','lose','status','level')->orderBy('timestart','asc')->get()->toArray();
		return view('admin.matchlist',compact('match'));
	}

	public function getDelMatch($id) {
		$match = Match::find($id);
		$bet = Betting::select('id')->where('match_id','=',$id)->count();
		if ($bet != 0){
			return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Trận đấu đã có người đặt cược, không thể xóa.']);
			
		} else {
			$match->delete($id);
			return redirect()->route('getListMatch')->with(['flash_level' => 'result_msg', 'flash_message' => 'Xóa Trận Đấu Thành Công']);
		}
	}


	public function getEditMatch($id) {
		$bet = Betting::select('id')->where('match_id','=',$id)->count();
		if ($bet != 0){
			return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Trận đấu đã có người đặt cược, không thể chỉnh sữa.']);
			
		} else {
			$match = Match::find($id);
			return view('admin.matchedit',compact('match'));	
		}
	}

	public function postEditMatch(MatchEditRequest $request, $id) {
		$match = Match::find($id);
		$match->hometeam = $request->txtHome;
		$match->awayteam = $request->txtAway;
		$match->timeend = $request->timeend;
		$match->timebet = $request->timebet;
		$match->win = $request->txtWin;
		$match->draw = $request->txtDraw;   
		$match->lose = $request->txtLose;
		$match->level = $request->rdoPublic;
		$match->updated_at = new DateTime();
		$match->save();
		return redirect()->route('getListMatch')->with(['flash_level' => 'result_msg', 'flash_message' => 'Sữa Trận Đấu Thành Công']);
	}


	public function getDetailMatch($id) {
		$match = Match::find($id);
		$bet = Betting::select('username','money_bet','bets')->join('users', 'bettings.user_id', '=', 'users.id')->where('match_id','=',$id)->get()->toArray();
		return view('admin.matchdetail',compact('match','bet'));
	}


	public function getGoalMatch($id) {
		$match = Match::find($id);
		$sosanh = date('Y-m-d H:i:s');
		if (strtotime(($match->timeend)) >= strtotime($sosanh)) {
			return redirect()->back()->with(['flash_level' => 'error_msg', 'flash_message' => 'Trận đấu chưa kết thúc, không thể cập nhật kết quả']);
		} else
		return view('admin.matchgoal',compact('match'));
		
	}

	public function postGoalMatch(MatchGoalRequest $request, $id) {
		$match = Match::find($id);
		$match->homegoal = $request->txtHomegoal;
		$match->awaygoal = $request->txtAwaygoal;
		$match->status = 1;
		$match->updated_at = new DateTime;
		$match->save();
		
		$hieuso = ($request->txtHomegoal) - ($request->txtAwaygoal);
		if ($hieuso > 0) { 
			$bets = 1;
			$tile = $match["win"];
		}
		if ($hieuso == 0) { 
			$bets = 2;
			$tile = $match["draw"];
		}
		if ($hieuso < 0) { 
			$bets = 3;
			$tile = $match["lose"];
		}

		$user = Betting::select('user_id','bets', 'money_bet')->where('match_id','=',$id)->get()->toArray();
		foreach ($user as $data) {
			if ($data["bets"] == $bets) {				
				$set = User::find($data["user_id"]);
				$money = $set["money"] + ($data["money_bet"] * $tile);
				$set->money = $money;
				$set->updated_at = new DateTime();
				$set->save();
			}
		}
		return redirect()->route('getListMatch')->with(['flash_level' => 'result_msg', 'flash_message' => 'Cập Nhật Kết Quả Trận Đấu Thành Công']);
	}
	
}
