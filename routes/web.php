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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('locale', 'LocalizationController@change')->name('locale.change');

Route::get('/partners', 'PartnerController@index')->name('partner.index');

Route::get('/news', 'NewsController@index')->name('news.index');

Route::get('/announcements', 'AnnouncementController@index')->name('announcement.index');

Route::get('/grades', 'GradeController@index')->name('grades.index');