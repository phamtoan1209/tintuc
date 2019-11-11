<?php

use App\Model\Slide;
use App\Model\Information;
use App\Model\Category;
use App\Model\Intro;
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

//static page
Route::get('/', 'Front\FrontController@index')->name('home');
Route::get('/gioi-thieu', 'Front\FrontController@intro')->name('intro');
Route::get('/lien-he', 'Front\FrontController@contact')->name('contact');
Route::get('/', 'Front\FrontController@index')->name('home');

//product page
Route::get('/san-pham', 'Front\FrontController@allProduct')->name('allProduct');
Route::get('/san-pham/danh-muc/{slug}', 'Front\FrontController@allProduct')->name('allCategoryProduct');
Route::get('/san-pham/{slug}', 'Front\FrontController@detailProduct')->name('detailProduct');

// post page
Route::get('/tin-tuc', 'Front\FrontController@allPost')->name('allPost');
Route::get('/tin-tuc/danh-muc/{slug}', 'Front\FrontController@allPost')->name('allCategoryPost');
Route::get('/tin-tuc/{slug}', 'Front\FrontController@detailPost')->name('detailPost');

Route::post('/add-contact', 'Front\FrontController@addContact')->name('addContact');
Route::get('/{slug}.html', 'Front\FrontController@getPage')->name('getPage');

Auth::routes();

Route::any('/admin/login','Admin\AuthController@login')->name('adminLogin');

View::share([
    'slides' => Slide::getSlideHome(),
    'categorys' => Category::getTreeCategoryHome('product',false,true),
    'website' => Information::getInfor(),
    'categoryPostHot' => Category::getParentCategory('post',false,true),
    'pagestatic' => Intro::getAllPage()
]);

Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function (){
    Route::get('/','Admin\AdminController@index')->name('admin');
    Route::post('/logout','Admin\AuthController@logout')->name('adminLogout');
    Route::any('/profile','Admin\AuthController@profile')->name('admin.profile');

    /**
     * manager roles
     */
    Route::group([
        'prefix' => 'roles',
        'as' => 'roles.',
        'middleware' => 'role:can_manage_roles'
    ],function (){
        Route::get('/list','Admin\RoleController@index')->name('list');
        Route::any('/create','Admin\RoleController@create')->name('create');
        Route::any('/update/{id}','Admin\RoleController@create')->name('update');
        Route::post('/delete/{id}','Admin\RoleController@delete')->name('delete');
    });


    /**
     * manager admins
     */
    Route::group([
        'prefix' => 'admins',
        'as' => 'admins.',
        'middleware' => 'role:can_manage_admins'
    ],function (){
        Route::get('/list','Admin\ManageAdminController@index')->name('list');
        Route::any('/create','Admin\ManageAdminController@create')->name('create');
        Route::any('/update/{id}','Admin\ManageAdminController@create')->name('update');
        Route::post('/delete/{id}','Admin\ManageAdminController@delete')->name('delete');
        Route::post('/block/{id}','Admin\ManageAdminController@block')->name('block');
    });

    /**
     * manager categorys
     */
    Route::group([
        'prefix' => 'categorys',
        'as' => 'categorys.',
        'middleware' => 'role:can_manage_categorys'
    ],function (){
        Route::get('/list','Admin\CategoryController@index')->name('list');
        Route::any('/create','Admin\CategoryController@create')->name('create');
        Route::any('/update/{id}','Admin\CategoryController@create')->name('update');
        Route::post('/delete/{id}','Admin\CategoryController@delete')->name('delete');
    });

    /**
     * manager posts
     */
    Route::group([
        'prefix' => 'posts',
        'as' => 'posts.',
        'middleware' => 'role:can_manage_posts'
    ],function (){
        Route::get('/list','Admin\PostController@index')->name('list');
        Route::any('/create','Admin\PostController@create')->name('create');
        Route::any('/update/{id}','Admin\PostController@create')->name('update');
        Route::post('/delete/{id}','Admin\PostController@delete')->name('delete');
        Route::post('/status/{id}','Admin\PostController@status')->name('status');
    });

    /**
     * manager products
     */
    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
        'middleware' => 'role:can_manage_products'
    ],function (){
        Route::get('/list','Admin\ProductController@index')->name('list');
        Route::any('/create','Admin\ProductController@create')->name('create');
        Route::any('/update/{id}','Admin\ProductController@create')->name('update');
        Route::post('/delete/{id}','Admin\ProductController@delete')->name('delete');
        Route::post('/status/{id}','Admin\ProductController@status')->name('status');
        Route::post('/add-detail/{product_id}','Admin\ProductController@addDetail')->name('adddetail');
        Route::post('/delete-detail/{id}','Admin\ProductController@delDetail')->name('deldetail');
        Route::post('/add-image/{id}','Admin\ProductController@addImage')->name('addimage');
        Route::post('/delete-image/{id}','Admin\ProductController@delImage')->name('delimage');
    });

    /**
     * manager contacts
     */
    Route::group([
        'prefix' => 'contacts',
        'as' => 'contacts.',
        'middleware' => 'role:can_manage_contacts'
    ],function (){
        Route::get('/list','Admin\ContactController@index')->name('list');
        Route::any('/detail/{id}','Admin\ContactController@detail')->name('detail');
        Route::post('/delete/{id}','Admin\ContactController@delete')->name('delete');
    });

    /**
     * manager websites
     */
    Route::group([
        'prefix' => 'websites',
        'as' => 'websites.',
        'middleware' => 'role:can_manage_websites'
    ],function (){
        Route::get('/list','Admin\WebsiteController@index')->name('list');
        Route::any('/update/{id}','Admin\WebsiteController@create')->name('update');
    });

    /**
     * manager slides
     */
    Route::group([
        'prefix' => 'slides',
        'as' => 'slides.',
        'middleware' => 'role:can_manage_slides'
    ],function (){
        Route::get('/list','Admin\SlideController@index')->name('list');
        Route::any('/create','Admin\SlideController@create')->name('create');
        Route::any('/update/{id}','Admin\SlideController@create')->name('update');
        Route::post('/delete/{id}','Admin\SlideController@delete')->name('delete');
        Route::post('/status/{id}','Admin\SlideController@status')->name('status');
    });


    /**
     * manager supports
     */
    Route::group([
        'prefix' => 'supports',
        'as' => 'supports.',
        'middleware' => 'role:can_manage_supports'
    ],function (){
        Route::get('/list','Admin\SupportController@index')->name('list');
        Route::any('/create','Admin\SupportController@create')->name('create');
        Route::any('/update/{id}','Admin\SupportController@create')->name('update');
        Route::post('/delete/{id}','Admin\SupportController@delete')->name('delete');
        Route::post('/status/{id}','Admin\SupportController@status')->name('status');
    });


    /**
     * manager stores
     */
    Route::group([
        'prefix' => 'stores',
        'as' => 'stores.',
        'middleware' => 'role:can_manage_stores'
    ],function (){
        Route::get('/list','Admin\StoreControler@index')->name('list');
        Route::any('/create','Admin\StoreControler@create')->name('create');
        Route::any('/update/{id}','Admin\StoreControler@create')->name('update');
        Route::post('/delete/{id}','Admin\StoreControler@delete')->name('delete');
        Route::post('/status/{id}','Admin\StoreControler@status')->name('status');
    });

    /**
     * manager intros
     */
    Route::group([
        'prefix' => 'intros',
        'as' => 'intros.',
        'middleware' => 'role:can_manage_intros'
    ],function (){
        Route::get('/list','Admin\IntroController@index')->name('list');
        Route::any('/update/{id}','Admin\IntroController@create')->name('update');
        Route::any('/create','Admin\IntroController@create')->name('create');
        Route::any('/delete/{id}','Admin\IntroController@delete')->name('delete');
    });


});