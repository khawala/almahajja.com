<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/

Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'checkstatus', 'Role:6']], function () {
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
    Route::resource('levels', 'LevelController');
        Route::resource('settings', 'SettingController');
    Route::resource('levelSections', 'LevelSectionController');
    Route::resource('activities', 'ActivityController');
    Route::resource('telecoms', 'TelecomController');
    Route::resource('periods', 'PeriodController');
    Route::resource('nationalities', 'NationalityController');
     Route::get('invoice/report', 'RegistrationController@invoiceReport')->name('invoice.getReport');
          Route::post('invoice/report', 'RegistrationController@invoiceReportPost')->name('invoice.report');
    Route::get('users/export', ['uses'=>'UsersController@export', 'as' => 'users.export']);
        Route::get('teachers/export', ['uses'=>'TeacherController@export', 'as' => 'teachers.export']);
    Route::resource('users', 'UsersController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('students', 'StudentController');
    Route::get('registrations/stats', 'RegistrationController@stats')->name('registrations.stats');
    Route::get('registrations/marks', 'RegistrationController@marks')->name('registrations.marks');
    Route::get('registrations/classrooms', 'RegistrationController@classrooms')->name('registrations.classrooms');
    Route::get('registrations/invoice/{id}', 'RegistrationController@invoice')->name('registrations.invoice');
    Route::post('registrations/search', 'RegistrationController@search')->name('registrations.search');
    Route::resource('registrations', 'RegistrationController');
    Route::resource('classrooms', 'ClassroomController');
        Route::post('sectionclassrooms', 'ClassroomController@sectionClassroom')->name('classrooms.sectionClassroom');
          Route::post('sectionLevel', 'ClassroomController@sectionLevel')->name('classrooms.sectionLevel');
  Route::resource('departments', 'DepartmentController');
   Route::get('department/complete_mark/{id}', 'DepartmentController@completeMark')->name('departments.complete_mark');
     Route::get('department/report/{id}', 'DepartmentController@report')->name('departments.report');
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
Route::get('department/{id}', 'HomeController@department')->name('department.show');
Route::post('department', 'HomeController@postdepartment')->name('department.store');
Route::post('division', 'HomeController@postDivision')->name('division.store');
Route::get('/job/list','JobController@list');
Route::get('/departments/list','DepartmentController@list');
Route::get('/teacher/register','HomeController@teacherRegister');
Route::post('/teacher/register','HomeController@teacherRegisterPost');
Route::get('job/{id}', 'HomeController@job')->name('job.show');
Route::post('job-request', 'HomeController@postJobRequest')->name('job.store');

Route::group(['middleware'=>['auth', 'checkstatus']], function () {
    Route::get('profile', 'HomeController@profile')->name('profile.show');
     Route::get('invoice/{id}', 'RegistrationController@invoice')->name('student.invoivce');
Route::get('/check',  "HomeController@check")->name('tap.check');
Route::get('/success', "HomeController@success")->name('tap.success');
Route::get('/cancel',  "HomeController@cancel")->name('tap.cancel');
    Route::get('profile/edit', 'HomeController@editProfile')->name('profile.edit');
    Route::post('profile', 'HomeController@postProfile')->name('profile.store');
//   Route::group(['middleware'=>['Role:0']], function () {  
    Route::get('certifications/{id}/print', 'CertificationController@print')->name('certifications.print');
    Route::post('sectionLevel', 'HomeController@sectionLevel')->name('department.sectionLevel');
    Route::get('profile/{registration_id}/{section_id}/marks', 'HomeController@marks')->name('profile.marks');
    Route::get('registrations/marks', 'RegistrationController@marks')->name('registration.marks');
//   });
});


