<?php


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::group(['middleware' =>'admin'], function() {
    
      Route::get('/admin',function() {
    return view('admin.index');
})->name('admin');

   Route::resource('admin/users','AdminUsersController');
   Route::resource('admin/posts','AdminPostsController');
   Route::resource('admin/categories','AdminCategoriesController');
   
   Route::resource('admin/media', 'AdminMediaController');
   
   Route::resource('admin/comments','PostCommentController');
   
   Route::resource('admin/comment/replies','CommentRepliesController');
});


Route::group(['middleware' =>'auth'], function() {
    
    Route::post('comment/reply','CommentRepliesController@createReply');
    
    
    

    
    
});














