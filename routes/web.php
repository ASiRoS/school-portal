<?php

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

// Костыль
Route::get('/home', function() { return redirect('/'); });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('home.about');

Route::get('locale/{locale}', 'LocalizationController@change')->name('locale.change');

Route::resource('partners', 'PartnerController');

Route::resource('news', 'NewsController');
Route::post('/news/{article}/comment', 'NewsController@comment')->name('news.comment');

Route::resource('announcements', 'AnnouncementController');

Route::resource('users', 'UserController');

Route::resource('grades', 'GradeController');

Route::resource('homeworks', 'HomeworkController');
Route::get('/homeworks/teacher', 'HomeworkController@teachers')->name('homeworks.teacher');

Route::resource('programs', 'TeachingProgramController');

Route::resource('links', 'UsefulLinkController');

Route::resource('books', 'BookController');

Route::resource('subjects', 'SubjectController');

Route::get('/contacts', 'ContactController@index')->name('contacts.index');
Route::post('/contacts/store', 'ContactController@store')->name('contacts.store');

Route::get('/admin', 'AdminController@index')->name('admin.links');
