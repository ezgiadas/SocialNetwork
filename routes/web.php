<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
/*Route::get('/home', function () {
    return view('home');
});*/
Route::get('/meme/{user_id?}/{meme_id?}',function($user_id,$meme_id){
    $vote = Vote::where(function ($vote) use ($user_id,$meme_id) {
      $query->where('user_id', '=', $user_id)
          ->andWhere('meme_id;', '=', $meme_id);
    });

    return Response::json($vote);
});

Route::post('/meme',function(Request $request){
    $vote = Vote::create($request->all());

    return Response::json($vote);
});

Route::put('/meme/{user_id?}/{meme_id?}',function(Request $request,$user_id,$meme_id){
    $vote = Vote::find($user_id,$meme_id);

    $vote->vote = $request->vote;

    $vote->save();

    return Response::json($vote);
});

Route::delete('/meme/{user_id?}/{meme_id?}',function($user_id,$meme_id){
    $vote = Vote::where(function ($vote) use ($user_id,$meme_id) {
      $query->where('user_id', '=', $user_id)
          ->andWhere('meme_id;', '=', $meme_id);
    });
    $vote->destroy();

    return Response::json($vote);
});
