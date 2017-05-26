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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/comments', function () {
    return view('comments');
});



Route::post('/comments',function(Request $request){
    $comment = Comment::create($request->all());

    return Response::json($comment);
});

Route::put('/comments/{comment_id?}/',function(Request $request,$comment_id){
    $comment = Comment::find($comment_id);

    $comment->message = $request->message;
    $comment->is_flagged = $request->is_flagged;

    $comment->save();

    return Response::json($comment);
});

Route::delete('/comments/{comment_id?}',function($comment_id){
    $comment = Comment::destroy($comment_id);

    return Response::json($comment);
});

