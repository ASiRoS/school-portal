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

use App\Http\Middleware\Admin;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('locale/{locale}', 'LocalizationController@change')->name('locale.change');

Route::get('/partners', 'PartnerController@index')->name('partners.index');

Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::post('/news/{article}/comment', 'NewsController@comment')->name('news.comment');

Route::get('/announcements', 'AnnouncementController@index')->name('announcements.index');

Route::get('/grades', 'GradeController@index')->name('grades.index');

Route::get('/homeworks', 'HomeworkController@index')->name('homeworks.index');

Route::get('/program', 'TeachingProgramController@index')->name('programs.index');

Route::get('/contacts', 'ContactController@index')->name('contacts.index');
Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');

Route::get('/about', 'HomeController@about')->name('home.about');

Route::get('/links', 'UsefulLinkController@index')->name('links.index');

Route::get('/books', 'BookController@index')->name('books.index');

Route::namespace('Admin')->prefix('admin')->group(function() {
    Route::get('/', 'HomeController@index');
});