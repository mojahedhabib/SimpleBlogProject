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


// this is the added route for login and register authentication
/*Route::get('user', array('as' => 'user.login', 'uses' => 'UserController@index'));
Route::get('user/register', array('as'=>'user.register', 'uses' => 'UserController@register'));
Route::post('user/store', ['as'=>'user.store', 'uses' => 'UserController@store']);
Route::get('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
Route::post('user/authenticate', array('as' => 'user.authenticate', 'uses' => 'UserController@authenticate'));
Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
Route::get('user/account', array('as' => 'user.account', 'uses' => 'UserController@account'))->middleware('auth');
/*
 * user.account page is set as auth middleware.
 * Laravel will automatically check for user login when this page is accessed.
 * If the user is not logged in the he/she is redirected to login page.
 * The login redirect path can be adjusted from App\Http\Middleware\Authenticate::handle().
 *
 *
 * /
Route::get('/', function () {
    return view('welcome');
});
 Auth::routes();
 Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
 Route::get('/home', 'HomeController@index')->name('home');

*/




Route::group(['middleware' => ['web']], function () {
    //authentication routes
    Route::resource('loginRegister', 'UserController');

    Route::get('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));
    Route::post('user/authenticate', array('as' => 'user.authenticate', 'uses' => 'UserController@authenticate'));
    Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));
    // Route::get('auth/login', 'Auth\LoginController@getLogin');
   // Route::post('auth/login', 'Auth\LoginController@postLogin');
    //Route::get('auth/logout', 'Auth\LoginController@getLogout');

// routes for category

    Route::resource('categories', 'CategoryController', ['except'=>'create']);

    // routes for tags
    Route::resource('tags', 'TagController', ['except'=>'create']);

    //registration routes
    //Route::get('auth/register', 'Auth\RegisterController@getRegister');
    
  /*  Route::post('auth/register', [
        'uses' => 'UserController@postSignup',
        'as' =>  'signup'
    ]);*/

  // routes for comments
    Route::post('comments/{id}', array('uses'=>'CommentsController@store',
        'as'=>'comments.store'));
    Route::get('comment/{id}/edit', ['uses'=>'CommentsController@edit', 'as'=>'comments.edit']);
    Route::put('comment/{id}', ['uses'=>'CommentsController@update', 'as'=>'comments.update']);
    Route::delete('comment/{id}', ['uses'=>'CommentsController@destroy', 'as'=>'comments.destroy']);
    Route::get('comment/{id}/delete', ['uses'=>'CommentsController@delete', 'as'=>'comments.delete']);

    Route::resource('post', 'PostController');
    Route::patch('/post/{id}', 'PostController@update')->name('post.update');

    Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');
//Route::get('/update', 'PostController@update');
    Route::get('blog', ['uses' => 'blogController@getIndex', 'as' => 'blog.index'] );
// routes for contact us
    Route::get('contact', 'PagesController@getContact')->name('contact.show');
    Route::post('contact', 'PagesController@postContact')->name('contact.store');

    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');


    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('mga-post',['uses'=> 'mgaPostController@index', 'as'=> 'samplePage']);

});


//Route::get('post', 'PostController@index');


//Route::group(['middleware'=>['web'], function() {
   // Route::get('contact', 'PagesController@getContact');
   // Route::resource('about', 'PagesController@getAbout');
   // Route::resource('/', 'PagesController@getIndex');

//}]);


//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');
