<?php

Route::get('/',['as' => 'getHome', 'uses' => 'User\BettingController@getMain']);

Route::get('login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('register', ['as' => 'getRegister', 'uses' => 'LoginController@getRegister']);
Route::post('register', ['as' => 'postRegister', 'uses' => 'LoginController@postRegister']);
Route::get('logout', ['as' => 'getLogout', 'uses'=> 'LoginController@getLogout']);


Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' =>  'admin', 'namespace' => 'Admin'], function() {
		Route::get('/',['as' => 'getAdmin', function() {
			return view('admin.main');
		}]);
		Route::group(['prefix' => 'match'], function() {
			Route::get('newmatch',['as' => 'getNewMatch', 'uses' => 'MatchController@getNewMatch']);
			Route::post('newmatch',['as' => 'postNewMatch', 'uses' => 'MatchController@postNewMatch']);

			Route::get('listmatch',['as' => 'getListMatch', 'uses' => 'MatchController@getListMatch']);

			Route::get('detailmatch/{id}',['as' => 'getDetailMatch', 'uses' => 'MatchController@getDetailMatch'])->where('id', '[0-9]+');

			Route::get('editmatch/{id}',['as' => 'getEditMatch', 'uses' => 'MatchController@getEditMatch'])->where('id', '[0-9]+');
			Route::post('editmatch/{id}',['as' => 'postEditMatch', 'uses' => 'MatchController@postEditMatch'])->where('id', '[0-9]+');

			Route::get('delete/{id}',['as' => 'getDelMatch', 'uses' => 'MatchController@getDelMatch'])->where('id', '[0-9]+');

			Route::get('goalmatch/{id}',['as' => 'getGoalMatch', 'uses' => 'MatchController@getGoalMatch'])->where('id', '[0-9]+');
			Route::post('goalmatch/{id}',['as' => 'postGoalMatch', 'uses' => 'MatchController@postGoalMatch'])->where('id', '[0-9]+');
		});
	});

	Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
		Route::get('/',['as' => 'getMain', 'uses' => 'BettingController@getMain']);
		Route::group(['prefix' => 'betting'], function() {
			Route::get('history',['as' => 'getHisBet', 'uses' => 'BettingController@getHisBet']);
			
			Route::get('betting/{id}',['as' => 'getBetting', 'uses' => 'BettingController@getBetting'])->where('id', '[0-9]+');
			Route::post('betting/{id}',['as' => 'postBetting', 'uses' => 'BettingController@postBetting'])->where('id', '[0-9]+');			

		});
	});
});

Route::get('help',['as' => 'getHelpBet', 'uses' => 'User\BettingController@getHelpBet']);
