<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'checkstatus', 'Role:5']], function () {
    Route::get('/', ['uses'=>'ConfigurationController@welcome', 'as'=>'dash']);

    Route::resource('configurations', 'ConfigurationController');
    Route::resource('advertisements', 'AdvertisementController');
    Route::resource('jobs', 'JobController');
    Route::resource('job-requests', 'JobRequestController');
    Route::get('divisions/stats', 'DivisionController@stats')->name('divisions.stats');
    Route::resource('divisions', 'DivisionController');
    Route::get('division-times/{id}/export', 'DivisionTimeController@export')->name('division-times.export');
    Route::resource('division-times', 'DivisionTimeController');
    Route::get('sections/{id}/export', 'SectionController@export')->name('sections.export');
    Route::resource('sections', 'SectionController');
    Route::resource('activities', 'ActivityController');
    Route::resource('telecoms', 'TelecomController');
    Route::resource('periods', 'PeriodController');
    Route::resource('nationalities', 'NationalityController');

    Route::get('users/export', ['uses'=>'UsersController@export', 'as' => 'users.export']);
    Route::resource('users', 'UsersController');
    Route::resource('students', 'StudentController');
    Route::get('registrations/stats', 'RegistrationController@stats')->name('registrations.stats');
    Route::get('registrations/marks', 'RegistrationController@marks')->name('registrations.marks');
    Route::get('registrations/classrooms', 'RegistrationController@classrooms')->name('registrations.classrooms');
    Route::post('registrations/search', 'RegistrationController@search')->name('registrations.search');
    Route::resource('registrations', 'RegistrationController');
    Route::resource('classrooms', 'ClassroomController');

    Route::get('certifications', 'CertificationController@index')->name('certifications.index');

    Route::get('marks', 'MarkController@index')->name('marks.index');
    Route::get('marks/create', 'MarkController@create')->name('marks.create');
    Route::post('marks', 'MarkController@store')->name('marks.store');

    Route::get('stats', 'StatsController@index')->name('stats.index');
});

/*
|------------------------------------------------------------------------------------
| Site
|------------------------------------------------------------------------------------
*/
Route::post('contact', 'HomeController@postContact')->name('contact.store');
Route::get('/', 'HomeController@index')->name('home');
Route::get('advertisement/{id}', 'HomeController@advertisement')->name('advertisement.show');
Route::get('division/{id}', 'HomeController@division')->name('division.show');
Route::post('division', 'HomeController@postDivision')->name('division.store');

Route::get('job/{id}', 'HomeController@job')->name('job.show');
Route::post('job-request', 'HomeController@postJobRequest')->name('job.store');

Route::group(['middleware'=>['auth', 'checkstatus']], function () {
    Route::get('profile', 'HomeController@profile')->name('profile.show');
    Route::post('profile', 'HomeController@postProfile')->name('profile.store');
    
    Route::get('certifications/{id}/print', 'CertificationController@print')->name('certifications.print');
    
    Route::get('profile/{registration_id}/{section_id}/marks', 'HomeController@marks')->name('profile.marks');

    Route::get('registrations/marks', 'RegistrationController@marks')->name('registration.marks');
});
