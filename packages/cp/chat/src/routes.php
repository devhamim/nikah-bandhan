<?php
//chat //message
Route::group(['middleware' => 'web'], function ()
{
	// Route::get('/imo/imo', function(){
	//  return 'hello';
	// });


	Route::get('my/message/dashboard', [
        'uses' =>'Cp\Chat\Controllers\ChatController@userMessageDashboard',
        'as' => 'userMessageDashboard'
    ]);
    
    Route::get('shop/message/dashboard/{shop}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@shopMessageDashboard',
        'as' => 'shopMessageDashboard'
    ]);

Route::get('message/new/{user}', [
    'uses' =>'Cp\Chat\Controllers\ChatController@userMessage',
        'as' => 'userMessage'
    ]);

    Route::get('message/new/for/shop/{shop}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@shopMessage',
        'as' => 'shopMessage'
    ]);

    Route::get('message/new/for/bazar/{bazar}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@bazarMessage',
        'as' => 'bazarMessage'
    ]);

    Route::any('message/new/create',[
        'uses' =>'Cp\Chat\Controllers\MessageController@msgNewCreate',
        'as' => 'msgNewCreate'
    ]);

    Route::any('message/new/create/shop/{shop}',[
        'uses' =>'Cp\Chat\Controllers\MessageController@msgNewCreateShop',
        'as' => 'msgNewCreateShop'
    ]);

    Route::get('all/chat/participants', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatParticipantsAuto',
        'as' => 'chatParticipantsAuto'
    ]);

    Route::get('all/chat/notify/participants', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatNotifyParticipantsAuto',
        'as' => 'chatNotifyParticipantsAuto'
    ]);

    
    Route::get('all/chat/of/shop/participants/{shop}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatParticipantsOfShopAuto',
        'as' => 'chatParticipantsOfShopAuto'
    ]);

    Route::get('all/chat/of/bazar/participants/{bazar}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatParticipantsOfBazarAuto',
        'as' => 'chatParticipantsOfBazarAuto'
    ]);

    Route::get('single/chat/participants/{chatable}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatSingle',
        'as' => 'chatSingle'
    ]);

    Route::get('single/chat/participants/at/shop/{chatable}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@chatSingleAtShop',
        'as' => 'chatSingleAtShop'
    ]);

    Route::any('single/chat/create/continue/{chat}',[
    	'uses'=>'Cp\Chat\Controllers\MessageController@msgCreateContinue',
    	'as'=>'msgCreateContinue'
    ]);

    Route::get('all/messages/for/single/user/{chatable}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@publishedMessageAuto',
        'as' => 'publishedMessageAuto'
    ]);

    Route::get('new/message/for/single/user/{chatable}', [
        'uses' =>'Cp\Chat\Controllers\ChatController@newMsg',
        'as' => 'newMsg'
    ]);

    Route::any('message/new/files/for/new/message/{chat}',[
        'uses' =>'Cp\Chat\Controllers\MessageController@newMsgFile',
        'as' => 'newMsgFile'
    ]);

    Route::any('messagess/newasdf/{chat}',[
        'uses' =>'Cp\Chat\Controllers\MessageController@newMsgFiless',
        'as' => 'newMsgFiless'
    ]);




    Route::any('message/new/files/for/new/user/message/{user}',[
        'uses' =>'Cp\Chat\Controllers\MessageController@newUserMsgFile',
        'as' => 'newUserMsgFile'
    ]);

    Route::any('message/new/files/for/new/shop/message/{shop}',[
        'uses' =>'Cp\Chat\Controllers\MessageController@newShopMsgFile',
        'as' => 'newShopMsgFile'
    ]);

    Route::get('message/gif/image/get/{filename}',[
        'uses' =>'Cp\Chat\Controllers\ChatController@fileMsgImageGet',
        'as' => 'fileMsgImageGet'
    ]);

    Route::get('message/video/get/{filename}',[
        'uses' =>'Cp\Chat\Controllers\ChatController@fileMsgVideoGet',
        'as' => 'fileMsgVideoGet'
    ]);

    Route::get('message/audio/get/{filename}',[
        'uses' =>'Cp\Chat\Controllers\ChatController@fileMsgAudioGet',
        'as' => 'fileMsgAudioGet'
    ]);

    Route::get('message/pdf/get/{filename}',[
        'uses' =>'Cp\Chat\Controllers\ChatController@fileMsgPdfGet',
        'as' => 'fileMsgPdfGet'
    ]);
});