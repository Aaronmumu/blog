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
Route::get('/', 'Aaron\BlogController@blog');
Route::get('/osw', 'Aaron\HomeController@osw');
Route::get('/business/{type}', 'Aaron\HomeController@business')->name('business');
Route::get('/newDetail/{id}', 'Aaron\HomeController@newDetail')->name('newDetail');
Route::get('/faqDetail/{id}', 'Aaron\HomeController@faqDetail')->name('faqDetail');

Route::get('/help/{type}', 'Aaron\HomeController@help')->name('help');
Route::get('/help/{type}/page/{page}/pageSize/{pageSize}', 'Aaron\HomeController@help')->name('help2');
Route::get('/about', 'Aaron\HomeController@about');

Route::get('/jobList', 'Aaron\HomeController@jobList');
Route::get('/jobList/page/{page}/pageSize/{pageSize}', 'Aaron\HomeController@jobList');
Route::get('/logout', 'Blog\HomeController@index');

Route::get('/blog', 'Aaron\BlogController@blog')->name('blog');
Route::get('/blog/page/{page}/pageSize/{pageSize}', 'Aaron\BlogController@blog');

Auth::routes();

Route::get('/blogs', 'Blog\HomeController@index')->name('home');
Route::get('/blogs/index', 'Blog\BlogController@index')->name('index');
Route::get('/blogs/blog', 'Blog\BlogController@blog')->name('blog');
Route::get('/home', 'Blog\HomeController@index');

Route::get('/blogs/news', 'Blog\BlogController@news')->name('news');
Route::any('/blogs/addBlog', 'Blog\BlogController@addBlog')->name('addBlog');
Route::get('/getBlogJson/{id}', 'Blog\BlogController@getBlogJson')->name('getBlogJson');
Route::get('/delBlog/{id}', 'Blog\BlogController@delBlog')->name('delBlog');


Route::get('/blogs/pic', 'Blog\HomeController@pic')->name('pic');
Route::any('/blogs/addBannerPic', 'Blog\HomeController@addBannerPic')->name('addBannerPic');

Route::get('/blogs/news', 'Blog\HomeController@news')->name('news');
Route::any('/blogs/addNews', 'Blog\HomeController@addNews')->name('addNews');
Route::get('/getNewsJson/{id}', 'Blog\HomeController@getNewsJson')->name('getNewsJson');
Route::get('/delNews/{id}', 'Blog\HomeController@delNews')->name('delNews');

Route::get('/blogs/faq', 'Blog\HomeController@faq')->name('faq');
Route::any('/blogs/addFaq', 'Blog\HomeController@addFaq')->name('addFaq');
Route::get('/getFaqJson/{id}', 'Blog\HomeController@getFaqJson')->name('getFaqJson');
Route::get('/delFaq/{id}', 'Blog\HomeController@delFaq')->name('delFaq');

Route::get('/blogs/join', 'Blog\HomeController@join')->name('join');
Route::any('/blogs/addJoin', 'Blog\HomeController@addJoin')->name('addJoin');
Route::get('/getJoinJson/{id}', 'Blog\HomeController@getJoinJson')->name('getJoinJson');
Route::get('/delJoin/{id}', 'Blog\HomeController@delJoin')->name('delJoin');

Route::get('/blogs/about', 'Blog\HomeController@about')->name('about');
Route::any('/blogs/addAbout', 'Blog\HomeController@addAbout')->name('addAbout');
Route::get('/getAboutJson/{id}', 'Blog\HomeController@getAboutJson')->name('getAboutJson');
Route::get('/delAbout/{id}', 'Blog\HomeController@delAbout')->name('delAbout');

Route::any('/blogs/upload', 'Blog\HomeController@upload')->name('upload');

#文件上传路由
Route::post('/blogs/uploadFile','Blog\HomeController@uploadFile');
#从word中复制内容时，自动上传图片路由
Route::post('/blogs/uploadFile&responseType=json','Blog\HomeController@uploadFile');


/*Route::get('/', 'Platform\HomeController@index');
Route::get('/osw', 'Platform\HomeController@osw');
Route::get('/business/{type}', 'Platform\HomeController@business')->name('business');
Route::get('/newDetail/{id}', 'Platform\HomeController@newDetail')->name('newDetail');
Route::get('/faqDetail/{id}', 'Platform\HomeController@faqDetail')->name('faqDetail');

Route::get('/help/{type}', 'Platform\HomeController@help')->name('help');
Route::get('/help/{type}/page/{page}/pageSize/{pageSize}', 'Platform\HomeController@help')->name('help2');
Route::get('/about', 'Platform\HomeController@about');

Route::get('/jobList', 'Platform\HomeController@jobList');
Route::get('/jobList/page/{page}/pageSize/{pageSize}', 'Platform\HomeController@jobList');
Route::get('/logout', 'Easyto\HomeController@index');

Auth::routes();

Route::get('/easytos', 'Easyto\HomeController@index')->name('home');
Route::get('/home', 'Easyto\HomeController@index');

Route::get('/easytos/pic', 'Easyto\HomeController@pic')->name('pic');
Route::any('/easytos/addBannerPic', 'Easyto\HomeController@addBannerPic')->name('addBannerPic');

Route::get('/easytos/news', 'Easyto\HomeController@news')->name('news');
Route::any('/easytos/addNews', 'Easyto\HomeController@addNews')->name('addNews');
Route::get('/getNewsJson/{id}', 'Easyto\HomeController@getNewsJson')->name('getNewsJson');
Route::get('/delNews/{id}', 'Easyto\HomeController@delNews')->name('delNews');

Route::get('/easytos/faq', 'Easyto\HomeController@faq')->name('faq');
Route::any('/easytos/addFaq', 'Easyto\HomeController@addFaq')->name('addFaq');
Route::get('/getFaqJson/{id}', 'Easyto\HomeController@getFaqJson')->name('getFaqJson');
Route::get('/delFaq/{id}', 'Easyto\HomeController@delFaq')->name('delFaq');

Route::get('/easytos/join', 'Easyto\HomeController@join')->name('join');
Route::any('/easytos/addJoin', 'Easyto\HomeController@addJoin')->name('addJoin');
Route::get('/getJoinJson/{id}', 'Easyto\HomeController@getJoinJson')->name('getJoinJson');
Route::get('/delJoin/{id}', 'Easyto\HomeController@delJoin')->name('delJoin');

Route::get('/easytos/about', 'Easyto\HomeController@about')->name('about');
Route::any('/easytos/addAbout', 'Easyto\HomeController@addAbout')->name('addAbout');
Route::get('/getAboutJson/{id}', 'Easyto\HomeController@getAboutJson')->name('getAboutJson');
Route::get('/delAbout/{id}', 'Easyto\HomeController@delAbout')->name('delAbout');

Route::any('/easytos/upload', 'Easyto\HomeController@upload')->name('upload');

#文件上传路由
Route::post('/easytos/uploadFile','Easyto\HomeController@uploadFile');
#从word中复制内容时，自动上传图片路由
Route::post('/easytos/uploadFile&responseType=json','Easyto\HomeController@uploadFile');*/
