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

Route::middleware(['auth'])->group(function(){

    Route::get('/admin/conversations', 'ConversationController@index')->name('conversations');
    Route::post('/admin/addConversation', 'ConversationController@create')->name('addConversation');
    Route::get('/admin/delConversation/{id}', 'ConversationController@delete')->name('delConversation');
    Route::get('/admin/addMessage/{id}', 'ConversationController@showAddMessage')->name('showAddMessage');
    Route::post('/admin/addMessage', 'ConversationController@AddMessage')->name('addMessage');
    Route::get('/admin/editConversation/{id}', 'ConversationController@editConversation')->name('editConversation');
    Route::get('/admin/editMessage/{id}', 'ConversationController@editMessage')->name('editMessage');
    Route::post('/admin/editMessage', 'ConversationController@confirmEditMessage')->name('confirmEditMessage');
    Route::get('/admin/delMessage/{id}', 'ConversationController@delMessage')->name('delMessage');

});



