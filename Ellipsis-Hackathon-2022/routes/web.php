<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});


Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');


//user change password route
Route::get('/home/change', 'ChangePassController@edit')->name('changePw');
Route::put('/home', 'ChangePassController@update')->name('updatePw');

// Users Related
Route::get('/Dashboard/admin', 'UserController@dashboard')->name('adminDash');
Route::get('/user', 'UserController@index')->name('viewUser');
Route::post('/user', 'UserController@store')->name('create');
Route::get('/user/create', 'UserController@create')->name('createForm');
Route::get('/user/{user}/edit', 'UserController@edit')->name('editUser');
Route::get('/user/{user}/ban', 'UserController@ban')->name('banUser');
Route::put('/user/{user}', 'UserController@update')->name('update');
Route::put('/user/changeBan/{user}', 'UserController@changeBan')->name('changeBan');

// Industry Related
Route::get('/industry', 'IndustryController@index')->name('viewIndustry');
Route::get('/industry/create', 'IndustryController@create')->name('createIndustry');
Route::post('/industry', 'IndustryController@store')->name('storeIndustry');
Route::delete('/industry/{industry}', 'IndustryController@destroy')->name('deleteIndustry');


//Company related
Route::get('/company/create', 'CompanyController@create')->name('createCompany');
Route::post('/company/create', 'CompanyController@store')->name('storeCompany');
Route::get('/company', 'CompanyController@index')->name('viewCompany');
Route::get('/company/{company}/edit', 'CompanyController@edit')->name('editCompany');
Route::put('/company/{company}', 'CompanyController@update')->name('updateCompany');
Route::get('/company/{company}', 'CompanyController@show')->name('showCompany');


//Contacts related
Route::get('/company/{company}/contact/create', 'ContactController@create')->name('createContact');
Route::post('/company/{company}/contact/create', 'ContactController@store')->name('storeContact');
Route::get('/contact/{contact}/edit', 'ContactController@edit')->name('editContact');
Route::put('/contact/{contact}', 'ContactController@update')->name('updateContact');
Route::delete('/contact/{contact}', 'ContactController@destroy')->name('deleteContact');

//Applications related
Route::get('/company/{company}/application', 'ApplicationController@index')->name('viewApplication');
Route::get('application', 'ApplicationController@list')->name('allApplication');
Route::get('/application/create/{company?}', 'ApplicationController@loadCreate')->name('loadCreate');
Route::post('/application/create', 'ApplicationController@create')->name('createApplication');
Route::post('/company/{company}/application/create', 'ApplicationController@store')->name('storeApplication');
Route::delete('/application/{application}', 'ApplicationController@destroy')->name('deleteApplication');
Route::get('/application/reassign/{application}', 'ApplicationController@reassign')->name('reassignApplication');
Route::put('/application/reassign/{application}', 'ApplicationController@updateAssignment')->name('updateAssignment');
Route::get('application/{application}/edit', 'ApplicationController@edit')->name('editApplication');
Route::put('/application/{application}', 'ApplicationController@update')->name('updateApplication');
Route::post('/application/{application}/submit-review', 'ApplicationController@submitReview')->name('submitReview');
Route::post('/application/{application}/submit-approval', 'ApplicationController@submitApproval')->name('submitApproval');
Route::get('/application/{application}', 'ApplicationController@show')->name('showApplication');
Route::post('/application/{application}/abort', 'ApplicationController@abort')->name('abortApplication');
Route::get('/application/filter/{col}/{filter}', 'ApplicationController@filter')->name('filterApplication');
Route::get('/application/getLoanAmt/123', 'ApplicationController@getLoanAmt')->name('getLoanAmt');



// Notes related
Route::get('/application/{application}/note/create', 'NoteController@create')->name('createNote');
Route::post('/application/{application}/note/create', 'NoteController@store')->name('storeNote');
Route::get('/note/{note}/edit', 'NoteController@edit')->name('editNote');
Route::put('/note/{note}', 'NoteController@update')->name('updateNote');
Route::delete('/note/{note}', 'NoteController@destroy')->name('deleteNote');

// Reminders related
Route::get('/application/{application}/reminder/create', 'ReminderController@create')->name('createReminder');
Route::post('/application/{application}/reminder/create', 'ReminderController@store')->name('storeReminder');
Route::get('reminder/{reminder}/edit', 'ReminderController@edit')->name('editReminder');
Route::put('/reminder/{reminder}', 'ReminderController@update')->name('updateReminder');
Route::delete('/reminder/{reminder}', 'ReminderController@destroy')->name('deleteReminder');

//Calendar Related
Route::post('/calendar/update-calendar', 'CalendarController@update')->name('updateCalendar');
Route::get('/calendar/calendar-events', 'CalendarController@load')->name('loadCalendar');
Route::delete('/calendar/delete-reminder/{id}', 'CalendarController@destroy')->name('deleteCalendarReminder');
Route::put('/calendar/update-reminder', 'CalendarController@updateCalendar')->name('updateCalendarReminder');

// checklist and fileuploads
Route::get('/application/{application}/checklist', 'ChecklistController@index')->name('listChecklist');
Route::get('/application/checklist/view', 'ChecklistController@view')->name('viewChecklist');
Route::get('/application/checklist/create', 'ChecklistController@create')->name('createChecklist');
Route::post('/checklist/add-checklist', 'ChecklistController@add')->name('addChecklist');
Route::delete('/checklist/delete-checklist/{checklist}', 'ChecklistController@remove')->name('removeChecklist');
Route::get('/{checklist}/edit', 'ChecklistController@edit')->name('editChecklist');
Route::put('/checklist/update-checklist/{checklist}', 'ChecklistController@update')->name('updateChecklist');
Route::post('/checklist/store', 'ChecklistController@store')->name('storeChecklist');
Route::get('/checklist/{application}', 'ChecklistController@generate')->name('generateClURL');
Route::get('/checklist/file/{file}', 'ChecklistController@show')->name('viewFile');
Route::post('/completed', 'ChecklistController@completed')->name('completed');
Route::delete('/checklist/file/{file}', 'ChecklistController@destroy')->name('deleteFile');


// Guest temporary URL for uploading
Route::get('/guest/{application}', 'GuestController@guestForm')->name('guestForm');
Route::post('/guest/{application}', 'GuestController@guestAuth')->name('guestAuth');
Route::get('/guest/{application}/checklist', 'GuestController@index')->name('guestUpload');
Route::post('/guest/store/bucket', 'GuestController@store')->name('guestStore');
Route::get('/guest/file/{file}', 'GuestController@show')->name('guestView');
Route::delete('/guest/file/{file}', 'GuestController@destroy')->name('guestDelete');



// Active Approvers and application approving status related
Route::post('/approver/{user}', 'ApproverController@store')->name('addApprover');
Route::delete('/approver/{user}', 'ApproverController@destroy')->name('removeApprover');
Route::put('/{application}/approve', 'ApproverController@approve')->name('approveApplication');
Route::put('/{application}/reject', 'ApproverController@reject')->name('rejectApplication');


//Dashboard related
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

// Credit memo
Route::get('application/{application}/creditmemo', 'CreditMemoController@index')->name('viewCreditMemo');
Route::get('application/{application}/creditmemo/reset', 'CreditMemoController@reset')->name('resetCreditMemo');
Route::post('application/{application}/creditmemo/save', 'CreditMemoController@store')->name('saveCreditMemo');
Route::post('application/{application}/creditmemo/export', 'CreditMemoController@export')->name('exportCreditMemo');

// Audit
Route::get('/audit-logs/view','AuditController@index')->name('viewAuditLogs');
