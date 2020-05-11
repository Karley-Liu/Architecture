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
    return view('index');
});

Route::get('/header','Auth\LoginController@header');

Route::group(['prefix'=>'/user'],function(){
	Route::get('/','Auth\LoginController@login');
	Route::post('/usersignin','Auth\LoginController@test');
	Route::post('/userregister','Auth\RegisterController@register');
	Route::any('/dataform/id={users}','Auth\RegisterController@dataform');
	Route::any('/releasestory/id={users}','Index\IndexController@releaseStory');
	Route::any('/releasebuliding/id={users}','Index\IndexController@releaseBuliding');
	Route::any('/releasecompetition','Index\IndexController@releaseCompetition');
	Route::any('/release101','Index\IndexController@release101');
	Route::any('/releaseproject/id={users}','Index\IndexController@releaseProject');
	Route::any('/img_save','Index\IndexController@img_save');
	Route::any('/logout','Auth\LoginController@logout');
	Route::any('/manager','Index\IndexController@manager');
	Route::any('/usermanage/id={users}','Index\IndexController@userManage');
	Route::any('/projectmanage/p_id={projects}','Index\IndexController@projectManage');
	Route::any('/buildingmanage/ar_id={architects}','Index\IndexController@buildingManage');
});

Route::group(['prefix'=>'project'],function(){
	Route::get('/','Index\IndexController@project');
	Route::get('/projectcontent1','Index\IndexController@projectContent1');
  Route::get('/projectcontent2','Index\IndexController@projectContent2');
	Route::get('/projectdetails/p_id={projects}','Index\IndexController@projectDetails') ->name('projectDetails');
	Route::any('/projectdelete/p_id={projects}','Index\IndexController@projectDelete');
});

Route::group(['prefix'=>'architectors'],function(){
	Route::any('/','Index\IndexController@architectors');
	Route::get('/architector/id={users}','Index\IndexController@architector');
});
Route::group(['prefix'=>'architects'],function(){
	Route::any('/','Index\IndexController@architects');
	Route::get('/architect/ar_id={architects}','Index\IndexController@architect')->name('architect');
	Route::any('/architectdelete/ar_id={architects}','Index\IndexController@architectDelete');
});
Route::group(['prefix'=>'stories'],function(){
	Route::get('/','Index\IndexController@stories');
	Route::get('/story/s_id={stories}','Index\IndexController@story')->name('story');
	Route::post('/ajax','Index\IndexController@storiesAjax');
});
Route::group(['prefix'=>'competitions'],function(){
	Route::get('/','Index\IndexController@competitions');
	Route::get('/competition','Index\IndexController@competition')->name('competition');
});
Route::group(['prefix'=>'rankings'],function(){
	Route::get('/','Index\IndexController@rankings');
	Route::get('/ranking','Index\IndexController@ranking')->name('ranking');
});

Route::group(['prefix'=>'/region'],function(){
	Route::get('/get_continent_list','Index\regionController@getContinents');
	Route::any('/get_country_list','Index\regionController@getCountries');
	Route::any('/get_city_list','Index\regionController@getCities');
});

Route::get('/error',function(){
	return view('error.error');
});

Route::any('/mail/id={users}','Index\IndexController@mail');

Route::any('/getreason/id={users}','Index\IndexController@getReason');

Route::any('/download/id={users}','Index\IndexController@downloadFile');