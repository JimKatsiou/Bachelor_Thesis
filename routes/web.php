<?php
use Illuminate\Support\Facades\Auth;

Route::get('/learing', 'PageController@learning');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ HomeController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//Route:auth();
Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->middleware('role:admin');
//Route::get('/home', 'HomeController@index')->name('home');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ PageController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// HOME PAGE
Route::get('/', 'PageController@index');

//NAVBAR-PAGES - EDIT PAGES (ADMIN)

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~ AnnouncementsController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Route::get('/announcements', 'PageController@announcements');
Route::get('/announcements/create', 'AnnouncementsController@create')->middleware('role:admin');
Route::post('/announcements/store', 'AnnouncementsController@store');
Route::get('/announcements/{id}', 'AnnouncementsController@show');
Route::get('/announcements/edit/{id}', 'AnnouncementsController@edit');
Route::post('/announcements/update/{id}', 'AnnouncementsController@update');
Route::delete('/announcements/destroy/{id}', 'AnnouncementsController@destroy');

Route::get('/announcements_details', 'PageController@announcements_details')->middleware('role:admin');
Route::post('/update_announcements_details/{id}', 'PageController@update_announcements_details');

Route::get('/links', 'PageController@links'); # call controller kai function links
Route::get('link_details' , 'PageController@link_details');
Route::post('update_link_details/{id}', 'PageController@update_link_details');

Route::get('/contact', 'PageController@contact'); # call controller kai function contact
Route::get('/contact_details' , 'PageController@contact_details');
Route::post('update_contact_details/{id}', 'PageController@update_contact_details');

Route::get('/erasmuseclass', 'PageController@erasmuseclass'); # call controller kai function erasmus-eclass
Route::get('erasmuseclass_details' , 'PageController@erasmuseclass_details');
Route::post('update_erasmuseclass_details/{id}', 'PageController@update_erasmuseclass_details');

Route::get('/experiences', 'PageController@experiences'); # call controller kai function experiences
Route::get('experiences_details' , 'PageController@experiences_details');
Route::post('update_experiences_details/{id}', 'PageController@update_experiences_details');

//OTHER PAGES
Route::get('/services', 'PageController@services'); # klhsh controller kai function services
Route::get('/about', 'PageController@about'); # klhsh controller kai function about

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ LessonController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

// View Lessons (Lessons Table)
Route::get('/lesson/index', 'LessonController@index');

// (ALL) Application List
Route::get('/lesson/application/list', 'LessonController@application_list');
// More Details
Route::get('/lesson/details/{id}','LessonController@details');

// GET ALL
//Route::get('/lesson/getall', 'LessonController@getAll'); // find all sta getAll prepei na dhmiourghsw ta lessons prepei na epistrefontai san array apo lesson

// Lesson Creation
Route::get('/lesson/create' , 'LessonController@create');

// Add Lesson (μετά την Ολοκλήρωση)
Route::post('add_lesson', 'LessonController@add_lesson');

// Lesson Status (Enable/Disable)
Route::get('/lesson/lesson_display/{id}/{display}','LessonController@lesson_display');

// Lesson Editing
Route::get('/lesson/edit_lesson/{id}','LessonController@edit_lesson');

// Updating Lesson (After Edit)
Route::post('/lesson/update_lesson/{id}', 'LessonController@update_lesson');

//Route::delete('/lesson/delete/{id}', 'LessonController@delete'); // delete by id dexetai san parameter to id tou model kai to diagrafei apo thn bash
//Route::get('/lesson/edit/{id}', 'LessonController@getById'); // 1 //get by Id epilegei mia entity apo to table kai to epistrefei san model
////Route::post('/lesson/index', 'LessonController@store'); //post data test store data
////Route::get('/lesson/update/{id}', 'LessonController@update');
////Route::get('/lesson/get/{id}', 'LessonController@edit'); // 1 // edit by id the exei san parameter to id kai tha epistrefei ena lesson model
////Route::get('/lesson/delete_lesson/{id}','LessonController@delete_lesson');



//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~(FORM) ParticipationController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Auth::routes();

// APPLICATION - FORM
Route::get('/participation/index', 'ParticipationController@index')->middleware('role:admin,student');

// STORE DATA FROM APPLICATION
Route::post('/participation/store', 'ParticipationController@store');

// APPLICATION STATUS UPDATE
Route::get('/participation/update_app_status/{id}', 'ParticipationController@update_app_status');

//Route::get('/participation/delete/{id}', 'ParticipationController@delete'); //delete by id dexetai san parameter to id tou model kai to diagrafei apo thn bash
//Route::get('/participation/update/{id}', 'ParticipationController@update'); // update entity prepei na pernaei san parameter ena LessonTr kai to id pou tou lesson to opoio tha ginei update
//Route::get('/participation/create', 'ParticipationController@create');
//Route::get('/participation/edit/{id}', 'ParticipationController@edit'); // edit by id the exei san parameter to id kai tha epistrefei ena lesson model
//Route::get('/participation/get/{id}', 'ParticipationController@getById');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ UniversityController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Route::get('/university/index', 'UniversityController@index');


Route::get('/university/getall', 'UniversityController@getAll');

// University Creation
Route::get('/university/create', 'UniversityController@create');

// Add University (μετά την Ολοκλήρωση)
Route::post('add_university', 'UniversityController@add_university');

// University Status (Enable/Disable)
Route::get('/university/university_display/{id}/{display}','UniversityController@university_display');

Route::post('/university/university_update/{id}', 'UniversityController@university_update');

Route::get('/university/edit/{id}', 'UniversityController@edit'); // 0


//Route::get('/university/delete_uni/{id}','UniversityController@delete_uni');
//Route::post('/university/index', 'UniversityController@store'); //post data test store data
//Route::delete('/university/delete/{id}', 'UniversityController@delete'); // RETURN TO ID
Route::patch('/university/update/{id}', 'UniversityController@update'); // 0

Route::get('/university/get/{id}', 'UniversityController@getById'); // 0




//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ UserController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//Route::get('/user/my_application','UsersController@my_application');
Route::get('/my_application','UsersController@my_application');
Route::get('/user/index', 'UsersController@index');// 1
Route::get('/user/getall', 'UsersController@getAll');//
Route::get('/user/delete/{id}', 'UsersController@delete'); //delete by id dexetai san parameter to id tou model kai to diagrafei apo thn bash
Route::get('/user/edit/{id}', 'UsersController@edit'); // 1 // edit by id the exei san parameter to id kai tha epistrefei ena lesson model
Route::get('/user/update/{id}', 'UsersController@update'); // update entity prepei na pernaei san parameter ena LessonTr kai to id pou tou lesson to opoio tha ginei update
Route::get('/user/get/{id}', 'UsersController@getById'); // 1

Route::get('/stopTeaching', 'UsersController@stopTeaching');
Route::get('/startTeaching', 'UsersController@startTeaching');

////~~~~~~~~~~~~~~~~~~~~~~~~~~AUTHAICATIONS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


//Authedication-Roles-
Route::get('/admin' , function(){
    return 'You are admin';
})->middleware(['auth', 'auth.admin']);


//mono admin
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){

    Route::resource('/users' , 'AdminUsersController' , ['except' => ['show' , 'create' , 'store']]);
    //Impersonation
    Route::get('/impersonate/user/{id}' , 'AdminImpersonateController@index')->name('impersonate');

});
Route::get('/admin/admin_delete_user/{id}', 'Admin\AdminImpersonateController@admin_delete_user');

Route::get('admin/edit_user/{id}','Admin\AdminUsersController@edit_user');

Route::get('admin/professor','Admin\AdminUsersController@professor');

Route::post('admin/add_professor/', 'Admin\AdminUsersController@add_professor');

Route::post('admin/update_user/{id}', 'Admin\AdminUsersController@update_user');

Route::get('/admin/status_update/{id}/{status}','Admin\AdminParticipationController@status_update');

Route::get('/admin/impersonate_user/{id}/{role}','Admin\AdminParticipationController@impersonate_user');

Route::get('admin/pages/participationslist' , 'Admin\AdminParticipationController@index');
Route::get('admin/pages/participations/{id}' , 'Admin\AdminParticipationController@index2');


Route::get('admin/impersonate/destroy' , 'Admin\AdminImpersonateController@destroy')->name('admin.impersonate.destroy');


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ RemoteProfessorsController ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Route::get('/remoteProfessors/index', 'RemoteProfessorsController@index');
Route::get('/remoteProfessors/getall', 'RemoteProfessorsController@getAll');
Route::get('/remoteProfessors/delete/{id}', 'RemoteProfessorsController@delete');
Route::get('/remoteProfessors/create', 'RemoteProfessorsController@create');
Route::post('/remoteProfessors/store', 'RemoteProfessorsController@store');
Route::get('/remoteProfessors/update/{id}', 'RemoteProfessorsController@update');
Route::get('/remoteProfessors/edit/{id}', 'RemoteProfessorsController@edit');
Route::get('/remoteProfessors/get/{id}', 'RemoteProfessorsController@getById');



//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Download  DONT WORK~~~~~~~~~~~~~~~~
Route::get('/download' , function(){
    $file = public_path()."/storage/file/empeiries_foititon-converted.pdf";

    $headers = array(
        'Content-Τype: application/pdf',
    );

    return Response::download($file, "empeiries_foititon-converted.pdf", $headers);
});
//######################################################################################################


Route::get('index/connection', 'ConnectionController@index'); // TO DO !!!!
Route::get('get/connection/{id}', 'ConnectionController@getById');
Route::get('delete/connection/{id}', 'ConnectionController@delete'); //delete by id dexetai san parameter to id tou model kai to diagrafei apo thn bash
Route::get('edit/connection/{id}', 'ConnectionController@edit'); // edit by id the exei san parameter to id kai tha epistrefei ena lesson model
Route::get('update/connection/{id}', 'ConnectionController@update'); // update entity prepei na pernaei san parameter ena LessonTr kai to id pou tou lesson to opoio tha ginei update


Route::get('/export' , 'PageController@exportExcel');



