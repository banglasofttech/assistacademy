<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/adminpanel', 'AdminController@showLoginForm');

Route::post('/filesection', 'FileController@getoSection')->name('filesection');

// Route::get('/register', function(){
// 	return redirect('/');
// });

// Route::post('/custom/login',[
// 	'uses'=>'',
// 	'as'=>'custom.login'
// ]);

// Route::post('/getsubcatagories', 'FileController@getSubcatagories');



Route::middleware(['adminauthor'])->group(function(){
    Route::get('/upload', 'FileController@showFileUploaderForm')->name('upload');
	Route::post('/upload', 'FileController@uploadFile')->name('upload');

	Route::get('/searchauthor', 'AuthorController@authorList');
	Route::post('/searchauthor', 'AuthorController@searchAuthor')->name('searchauthor');

	Route::get('/managefiles', 'AdminController@manageFilesView');
	Route::get('/managefiles/books', 'AdminController@manageBooksView');
	Route::get('/managefiles/videos', 'AdminController@manageVideosView');
	Route::get('/managefiles/ppts', 'AdminController@managePPTsView');
	Route::get('/managefiles/courses', 'AdminController@manageCourseView');
	Route::get('/managefiles/trainings', 'AdminController@manageTrainingView');

	Route::get('/managefiles/books/remove/{id}', 'AdminController@removeBook');
	Route::get('/managefiles/videos/remove/{id}', 'AdminController@removeVideo');
	Route::get('/managefiles/ppts/remove/{id}', 'AdminController@removePPT');
	Route::get('/managefiles/trainings/remove/{id}', 'AdminController@removeTraining');

	Route::get('/mypanel', 'AdminController@viewDashborad');

	Route::get('/addcourse', 'CourseController@addCourseView');
	Route::post('/addcourse', [
		'uses'=>'CourseController@addNewCourse',
		'as'=>'addcourse'

	]);

	Route::get('/addtraining', 'TrainingController@addTrainingView');
	Route::post('/addtraining', [
		'uses'=>'TrainingController@addTraining',
		'as'=>'addtraining'

	]);

	Route::post('/getsubcatagories', [
		'uses'=>'FileController@getSubcatagories',
		'as'=>'getsubcatagories'

	]);

	Route::post('/addcatagory', [
		'uses'=>'FileController@addCatagory',
		'as'=>'addcatagory'

	]);

});

Route::middleware('auth')->group(function(){
	// Route::get("/author/{id}",'AuthorController@viewProfile');
	

	// Route::get("/search",'FileController@showFileSearchForm')->middleware('auth');
	

	// Route::get("/sendauhtorrequest",'AuthorController@sendAuthorRequest')->name('sendauhtorrequest')->middleware('auth');

	Route::get("/videos/view/{id}",'VideoController@viewVideo');
	Route::get("/ppts/view/{id}",'PPTController@viewPPT');
	Route::get("/courses/view/{id}",'CourseController@viewCourse');
	Route::get("/training/view/{id}",'TrainingController@viewTraining');
});

Route::middleware(['admin'])->group(function(){
    Route::get('/authorrequest', 'AdminController@showAuthorRequsetTable');
	Route::get('/authorrequest/accept/{id}', 'AdminController@acceptAuthorRequest');
	Route::get('/authorrequest/reject/{id}', 'AdminController@rejectAuthorRequest');

	Route::get('/corporaterequest', 'AdminController@showCorporateRequsetTable');
	Route::get('/corporaterequest/accept/{id}', 'AdminController@acceptCorporate');
	Route::get('/corporaterequest/reject/{id}', 'AdminController@rejectCorporate');

	Route::get('/learnerrequest', 'AdminController@showLearnerRequsetTable');
	Route::get('/learnerrequest/accept/{id}', 'AdminController@acceptLearner');
	Route::get('/learnerrequest/reject/{id}', 'AdminController@rejectLearner');

	Route::get('/authorlist', 'AdminController@showAuthorListTable');
	Route::get('/removeauthor/{id}', 'AdminController@removeAuthor');

	Route::get('/learnerlist', 'AdminController@showLearnerListTable');
	Route::get('/makeauthor/{id}', 'AdminController@acceptAuthorRequest');

	Route::get('/corporateuserlist', 'AdminController@showCorporateUserListTable');
});

Route::get("/books",'BookController@index');
Route::get("/books/catagory/{id}",'BookController@catagoryBook');
Route::get("/books/author/{email}",'BookController@authorBook');
Route::get("/books/view/{id}",'BookController@viewBook');
Route::get("/books/download/{id}",'BookController@downloadBook')->middleware('auth');

Route::get("/videos",'VideoController@index');
Route::get("/videos/catagory/{id}",'VideoController@catagoryVideo');
Route::get("/videos/author/{email}",'VideoController@authorVideo');
Route::get("/videos/download/{id}",'VideoController@downloadVideo')->middleware('auth');

Route::get("/ppts",'PPTController@index');
Route::get("/ppts/catagory/{id}",'PPTController@catagoryPPT');
Route::get("/ppts/author/{email}",'PPTController@authorPPT');
Route::get("/ppts/download/{id}",'PPTController@downloadPPT')->middleware('auth');

Route::get("/courses",'CourseController@index');
Route::get("/courses/catagory/{id}",'CourseController@catagorywiseCourse');
Route::get("/courses/author/{email}",'CourseController@authorwiseCourse');

Route::get("/training",'TrainingController@index');
Route::get("/training/catagory/{id}",'TrainingController@catagorywiseTraining');
Route::get("/training/author/{email}",'TrainingController@authorwiseTraining');

Route::post("/search",'FileController@searchFile')->name('search');
