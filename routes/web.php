<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
use App\ChuDe;
use App\TuVung;

Route::get('/', function () {
    return view('admin.login3');
});

// Route::get('test', function()
// {
//     $chude = ChuDe::find(1);
//     // echo $chude->ten;
//     foreach($chude->tuvung as $tuvung)
//     {
//         echo $tuvung->ten . '<br>';
//     }
// });




Route::get('dangnhap','UserController@getDangNhap')->name('user.getDangNhap');
Route::post('dangnhap','UserController@postDangNhap')->name('user.postDangNhap');
Route::get('dangxuat','UserController@getDangXuat')->name('user.getDangXuat');

//dangky
Route::get('dangky','UserController@getDangKy')->name('user.getDangKy');
Route::post('dangky','UserController@postDangKy')->name('user.postDangKy');





//admin
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function()
// Route::group(['prefix'=>'admin'],function()
{
	Route::get('home', function () {
		return view('admin.home');
	})->name('admin.home');
	Route::group(['prefix'=>'chude'], function()
	{
		Route::get('danhsach', 'ChuDeController@getDanhSach')->name('chude.getDanhSach');

		Route::get('sua/{id}', 'ChuDeController@getSua')->name('chude.getSua');
		Route::post('sua/{id}','ChuDeController@postSua')->name('chude.postSua');

		Route::get('them', 'ChuDeController@getThem');
		Route::post('them','ChuDeController@postThem');

		Route::get('xoa/{id}','ChuDeController@getXoa');
	});

	Route::group(['prefix'=>'tuvung'], function()
	{
		Route::get('danhsach', 'TuVungController@getDanhSach');

		Route::get('sua/{id}', 'TuVungController@getSua')->name('tuvung.getSua');
		Route::post('sua/{id}','TuVungController@postSua')->name('tuvung.postSua');

		Route::get('them', 'TuVungController@getThem');
		Route::post('them','TuVungController@postThem');

		Route::get('xoa/{id}','TuVungController@getXoa');
	});


	Route::group(['prefix'=>'user'], function()
	{
		Route::get('danhsach', 'UserController@getDanhSach')->name('user.getDanhSach');

		Route::get('sua/{id}', 'UserController@getSua')->name('user.getSua');
		Route::post('sua/{id}','UserController@postSua')->name('user.postSua');

		Route::get('them', 'UserController@getThem')->name('user.getThem');;
		Route::post('them','UserController@postThem')->name('user.postThem');;

		Route::get('xoa/{id}','UserController@getXoa')->name('user.getXoa');;
	});

});



//pages
Route::group(['prefix'=>'pages', 'middleware'=>'userLogin'],function()
// Route::group(['prefix'=>'pages'],function()
{
	Route::get('trangchu', 'PagesController@trangchu')->name('home');
	Route::get('topicLesson', 'LessonController@topicLesson')->name('pages.topicLesson');
	Route::get('lesson/{id}', 'LessonController@lesson')->name('pages.lesson');

	Route::get('topicGame1', 'Game1Controller@topicGame1')->name('pages.topicGame1');
	Route::get('game1/{id}', 'Game1Controller@game1')->name('pages.game1');
	Route::get('nguoidung','PagesController@getNguoiDung')->name('pages.getNguoiDung');
	Route::post('nguoidung','PagesController@postNguoiDung')->name('pages.postNguoiDung');

	Route::get('choosegame1', 'Game1Controller@chooseGame1')->name('pages.chooseGame1');
	Route::get('game1_1', 'Game1Controller@game1_1')->name('pages.game1_1');

	Route::get('chooselesson', 'LessonController@chooseLesson')->name('pages.chooseLesson');
	Route::get('lessonagain', 'LessonController@lessonAgain')->name('pages.lessonAgain');

	//ajax
	Route::post('ajax1', 'AjaxController@game1')->name('ajax.game1');
	Route::post('ajax1_1', 'AjaxController@game1_1')->name('ajax.game1_1');
	Route::post('ajax1_1_1', 'AjaxController@game1_1_1')->name('ajax.game1_1_1');


	//ket qua trac nghiem

	Route::get('ketqua','Game1Controller@ketqua')->name('pages.ketqua');
});
    // xac nhan emal

    Route::get('info', function () {
        //
    })->middleware('email_verified');

    Auth::routes(['verify' => true]);

    Route::get('home', 'HomeController@index')->name('pages');
    // resetpass

    Route::get('forget-password', 'ForgotPasswordController@getEmail');
    Route::post('forget-password', 'ForgotPasswordController@postEmail');

    Route::get('reset-password/{token}', 'ResetPasswordController@getPassword');
    Route::post('reset-password', 'ResetPasswordController@updatePassword')->name('resetPassword.updatePassword');


