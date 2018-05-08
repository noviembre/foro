<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/discuss',function (){

    return view('discuss');

});

Auth::routes();


//listar discussiones
Route::get('/forum', [

    'uses' => 'ForumsController@index',
    'as' => 'forum'

]);

Route::get('{provider}/auth',[

    'uses' => 'SocialsController@auth',
    'as' => 'social.auth'

]);

Route::get('{provider}/redirect',[

    'uses' => 'SocialsController@auth_callback',
    'as' => 'social.callback'

]);

//=======
Route::group(['middleware' => 'auth'], function (){

    Route::resource('channels', 'ChannelsController');

    //discussions crear
    Route::get('discussion/create', [

        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'

    ]);

    // guardar
    Route::post('discussion/store', [

        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'

    ]);

    Route::get('discussion/{slug}', [

        'uses' => 'DiscussionsController@show',
        'as' => 'discussion'

    ]);

    Route::post('/discussion/reply/{id}', [

        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'

    ]);

});

