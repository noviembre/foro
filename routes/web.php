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

Route::get('discussion/{slug}', [

    'uses' => 'DiscussionsController@show',
    'as' => 'discussion'

]);

Route::get('channel/{slug}', [

    'uses' => 'ForumsController@channel',
    'as' => 'channel'

]);



//=======
Route::group(['middleware' => 'auth'], function (){

    Route::resource('channels', 'ChannelsController');

    //discussions crear
    Route::get('discussion/create/new', [

        'uses' => 'DiscussionsController@create',
        'as' => 'discussions.create'

    ]);

    // guardar
    Route::post('discussion/store', [

        'uses' => 'DiscussionsController@store',
        'as' => 'discussions.store'

    ]);



    Route::post('/discussion/reply/{id}', [

        'uses' => 'DiscussionsController@reply',
        'as' => 'discussion.reply'

    ]);

    Route::get('/reply/like/{id}', [

        'uses' => 'RepliesController@like',
        'as' => 'reply.like'

    ]);

    Route::get('/reply/unlike/{id}', [

        'uses' => 'RepliesController@unlike',
        'as' => 'reply.unlike'

    ]);

    Route::get('/discussion/watch/{id}', [

        'uses' => 'WatchersController@watch',
        'as' => 'discussion.watch'

    ]);

    Route::get('/discussion/unwatch/{id}', [

        'uses' => 'WatchersController@unwatch',
        'as' => 'discussion.unwatch'

    ]);

    Route::get('/discussion/best/reply/{id}', [

        'uses' => 'RepliesController@best_answer',
        'as' => 'discussion.best.answer'

    ]);

    Route::get('discussions/edit/{slug}', [

        'uses' => 'DiscussionsController@edit',
        'as' => 'discussion.edit'

    ]);

    Route::post('discussions/update/{slug}', [

        'uses' => 'DiscussionsController@update',
        'as' => 'discussions.update'

    ]);

    //Editar
    Route::get('/reply/edit/{id}', [

        'uses' => 'RepliesController@edit',
        'as' => 'reply.edit'

    ]);

    // Actualizar
    Route::post('/reply/update/{id}', [

        'uses' => 'RepliesController@update',
        'as' => 'reply.update'

    ]);


});

