<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//block bad commits

Route::get('/', function()
{
	return View::make('ui');
});

Route::post('/', function(){
	$rules = array('moves' => 'required|integer',);
	$validator = Validator::make(Input::all(), $rules);
	if($validator->passes()){
		$full = File::get('../app/full.json');
		$current = File::get('../app/current.json');
		$currentJSON = json_decode($current);
		$fullJSON = json_decode($full);
		if(!$currentJSON->gameover){
			$movenumber = $currentJSON->lastmovenumber;
			$moves = Input::get('moves');
			$lastmove = $fullJSON->lastmovenumber;
			for($i = $movenumber; ($i < ($movenumber + $moves)) && ($i < $lastmove); $i++){
				$currentJSON->moves[$i] = $fullJSON->moves[$i];
			}
			$currentJSON->lastmovenumber = count($currentJSON->moves);
			if($currentJSON->lastmovenumber % 2 == 0){
				$currentJSON->whitesturn = true;
			}else{
				$currentJSON->whitesturn = false;
			}
			if($currentJSON->lastmovenumber == $fullJSON->lastmovenumber){
				$currentJSON->gameover = true;
			}
			$newCurrent = json_encode($currentJSON);
			File::put('../app/current.json', $newCurrent);

		}
		return Redirect::to('/')->withInput(Input::all());
	}else{
		return Redirect::to('/')->withInput(Input::all())->withErrors($validator);
	}
});

Route::post('/startgame', function(){
	$contents = File::get('../app/base.json');
	File::put('../app/current.json', $contents);
	return Redirect::to('/');
});

Route::get('/game', function(){
	$contents = File::get('../app/current.json');
	return $contents;
});