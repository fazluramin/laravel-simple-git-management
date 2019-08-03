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
Route::group(['middleware' => 'auth'], function () {
    Route::name('super.')->group(function () {  
        Route::group(['prefix' => 'super'], function () {
            //============== S U P E R - A D M I N ===============
            Route::get('/','Web\Admin\SuperAdmin\BaseController@index')->name('index');
            Route::post('/','Web\Admin\SuperAdmin\BaseController@update')->name('account');

            //====================================================
            Route::get('/server_list','Web\Admin\SuperAdmin\ServerController@index')->name('server.list');
            Route::get('/server/edit/{id}','Web\Admin\SuperAdmin\ServerController@edit')->name('edit.server');
            Route::post('/server/add','Web\Admin\SuperAdmin\ServerController@add')->name('add.server');
            Route::post('/server/delete','Web\Admin\SuperAdmin\ServerController@delete')->name('del.server');
            Route::post('/server/update','Web\Admin\SuperAdmin\ServerController@update')->name('update.server');
            Route::post('/server/update/getOne','Web\Admin\SuperAdmin\ServerController@getOne')->name('get.one.server');
            Route::get('/server/git/{id}','Web\Admin\SuperAdmin\ServerController@serverGit')->name('server.git');
            Route::get('/server/json','Web\Admin\SuperAdmin\ServerController@json');
            Route::get('/server','Web\Admin\SuperAdmin\ServerController@datatableServer');

            //====================================================
            Route::get('/git_project','Web\Admin\SuperAdmin\GitController@index')->name('git.project');
            Route::post('/git/add','Web\Admin\SuperAdmin\GitController@add')->name('add.git');
            Route::post('/git/delete','Web\Admin\SuperAdmin\GitController@delete')->name('del.git');
            Route::post('/git/update','Web\Admin\SuperAdmin\GitController@update')->name('update.git');
            Route::get('/git/edit/{id}','Web\Admin\SuperAdmin\GitController@edit')->name('edit.git');
            Route::post('/git/add/user','Web\Admin\SuperAdmin\GitController@addUser')->name('add.user.git');
            Route::post('/git/update/getOne','Web\Admin\SuperAdmin\GitController@getOne')->name('get.one.git');
            Route::get('/user/git/{id}','Web\Admin\SuperAdmin\GitController@userGit')->name('user.git');
            
            //====================================================
            Route::get('/admin_account','Web\Admin\SuperAdmin\AdminAccountController@index')->name('admin.account');
            Route::post('/admin/add','Web\Admin\SuperAdmin\AdminAccountController@add')->name('add.admin');
            Route::post('/admin/delete','Web\Admin\SuperAdmin\AdminAccountController@delete')->name('del.admin');
            Route::get('/admin/edit/{id}','Web\Admin\SuperAdmin\AdminAccountController@reset')->name('reset.admin');
            Route::post('/admin/update','Web\Admin\SuperAdmin\AdminAccountController@update')->name('update.admin');
            Route::get('/admin/activate/{id}','Web\Admin\SuperAdmin\AdminAccountController@activate')->name('activate.admin');
            Route::post('/admin/update/getOne','Web\Admin\SuperAdmin\AdminAccountController@getOne')->name('get.one.admin');

            //====================================================
            Route::get('/user_account','Web\Admin\SuperAdmin\UserAccountController@index')->name('user.account');
            Route::post('/user/add','Web\Admin\SuperAdmin\UserAccountController@add')->name('add.user');
            Route::post('/user/delete','Web\Admin\SuperAdmin\UserAccountController@delete')->name('del.user');
            Route::get('/user/edit/{id}','Web\Admin\SuperAdmin\UserAccountController@reset')->name('reset.user');
            Route::post('/user/update','Web\Admin\SuperAdmin\UserAccountController@update')->name('update.user');
            Route::get('/user/activate/{id}','Web\Admin\SuperAdmin\UserAccountController@activate')->name('activate.user');
            Route::post('/user/update/getOne','Web\Admin\SuperAdmin\UserAccountController@getOne')->name('get.one.user');
        });
    });

    Route::name('admin.')->group(function () {  
        Route::group(['prefix' => 'admin'], function () {
            //===================  A D M I N  ====================
            Route::get('/','Web\Admin\Admin\BaseController@index')->name('index');
            Route::post('/','Web\Admin\Admin\BaseController@update')->name('account');
            
            //====================================================
            Route::get('/git','Web\Admin\Admin\GitController@index')->name('git.project');
            Route::post('/git/add','Web\Admin\Admin\GitController@add')->name('add.git');
            Route::post('/git/delete','Web\Admin\Admin\GitController@delete')->name('del.git');
            Route::get('/git/edit/{id}','Web\Admin\Admin\GitController@edit')->name('edit.git');
            Route::post('/git/update','Web\Admin\Admin\GitController@update')->name('update.git');
            Route::post('/git/update/getOne','Web\Admin\Admin\GitController@getOne')->name('get.one.git');
            Route::post('/git/add/user','Web\Admin\Admin\GitController@addUser')->name('add.user.git');
            Route::get('/user/git/{id}','Web\Admin\Admin\GitController@userGit')->name('user.git');
            
            //====================================================
            
            //====================================================
            Route::get('/user_account','Web\Admin\Admin\UserAccountController@index')->name('user.account');
            Route::post('/user/add','Web\Admin\Admin\UserAccountController@add')->name('add.user');
            Route::post('/user/delete','Web\Admin\Admin\UserAccountController@delete')->name('del.user');
            Route::get('/user/edit/{id}','Web\Admin\Admin\UserAccountController@reset')->name('reset.user');
            Route::post('/user/update','Web\Admin\Admin\UserAccountController@update')->name('update.user');
            Route::get('/user/activate/{id}','Web\Admin\Admin\UserAccountController@activate')->name('activate.user');
            Route::post('/user/update/getOne','Web\Admin\Admin\UserAccountController@getOne')->name('get.one.user');

        });
    });

    Route::name('user.')->group(function () {  
        Route::group(['prefix' => 'user'], function () {
            //===================  U S E R   ====================
            Route::get('/git_project','Web\App\BaseController@git')->name('git.project');
            
            //====================================================
            Route::get('/','Web\App\BaseController@index')->name('index');
            Route::post('/','Web\App\BaseController@update')->name('account');
        });
    });

    Route::get('/logout', 'Web\App\Auth\LoginController@logout')->name('logout');
});

//Routes for UnAuthenticated User A.K.A Guest ->
Route::group(['middleware' => 'guest'], function () {
    //================== L O G I N ===================
    Route::get('/login', 'Web\App\Auth\LoginController@index')->name('login');
    Route::post('/login', 'Web\App\Auth\LoginController@detect')->name('detect');

    //============= === L O G O U T  ==================
    Route::get('/new/{code}', 'Web\App\Auth\ForgotPassController@register')->name('register');
    Route::post('/new/admin','Web\App\Auth\ForgotPassController@postRegister')->name('post.register');

    //================ R E D I R E C T ===============
    Route::get('/', 'Web\App\Auth\DashboardController@index');

    //================== F O R G O T =================
    Route::get('/forgot', 'Web\App\Auth\ForgotPassController@index')->name('forgot');
    Route::post('/forgot', 'Web\App\Auth\ForgotPassController@forgotPassword')->name('recover.password');
    Route::get('/forgot/recover/{code}', 'Web\App\Auth\ForgotPassController@redirectToNewPassword')->name('new.password');
    Route::post('/forgot/recover/new', 'Web\App\Auth\ForgotPassController@newPassword')->name('new.pass');

});
