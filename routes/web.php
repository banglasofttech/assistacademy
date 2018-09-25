<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/adminpanel', 'AdminController@showLoginForm');

Route::get('/profile', function(){
	return view('user.authorProfile');
});

Route::post('/filesection', 'FileController@getoSection')->name('filesection');

// Route::get('/register', function(){
// 	return redirect('/');
// });

// Route::post('/custom/login',[
// 	'uses'=>'',
// 	'as'=>'custom.login'
// ]);

// Route::post('/getsubcatagories', 'FileController@getSubcatagories');

Route::get('test',function(){
	return view('user.test');
});

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
	Route::get('/managefiles/training/remove/{id}', 'AdminController@rejectTraining');
	Route::get('/managefiles/courses/remove/{id}', 'AdminController@rejectCourse');

	Route::get('/managefiles/books/edit/{id}', 'BookController@show_book_editor_form');
	Route::get('/managefiles/videos/edit/{id}', 'VideoController@show_video_editor_form');
	Route::get('/managefiles/ppts/edit/{id}', 'pptController@show_ppt_editor_form');
	Route::get('/managefiles/training/edit/{id}', 'TrainingController@show_training_editor_form');
	Route::get('/managefiles/courses/edit/{id}', 'CourseController@show_course_editor_form');

	Route::post('/editBook',[
		'uses' => 'BookController@editBook',
		'as' => 'editBook'
	]);

	Route::post('/editPPT',[
		'uses' => 'pptController@editPPT',
		'as' => 'editPPT'
	]);

	Route::post('/editVideo',[
		'uses' => 'VideoController@editVideo',
		'as' => 'editVideo'
	]);

	Route::post('/editTraining',[
		'uses' => 'TrainingController@editTraining',
		'as' => 'editTraining'
	]);

	Route::post('/editCourse',[
		'uses' => 'CourseController@editCourse',
		'as' => 'editCourse'
	]);

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
	Route::get("/author/{id}",'AuthorController@viewProfile');

	Route::post('/review',[
		'uses'=>'ReviewController@addReview',
		'as'=>'review'
	]);

	Route::post('/comment',[
		'uses'=>'CommentController@addComment',
		'as'=>'comment'
	]);
	

	// Route::get("/search",'FileController@showFileSearchForm')->middleware('auth');
	

	// Route::get("/sendauhtorrequest",'AuthorController@sendAuthorRequest')->name('sendauhtorrequest')->middleware('auth');

	Route::get("/videos/view/{id}",'VideoController@viewVideo');
	Route::get("/ppts/view/{id}",'PPTController@viewPPT');
	
	Route::get("/courses/view/{id}",'CourseController@viewCourse');
	Route::get("/courses/comment/{id}",'CourseController@viewComment');
	Route::get("/courses/review/{id}",'CourseController@viewReview');

	Route::get("/training/view/{id}",'TrainingController@viewTraining');
	Route::get("/training/comment/{id}",'TrainingController@viewComment');
	Route::get("/training/review/{id}",'TrainingController@viewReview');
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

	Route::get('/remove-category', 'AdminController@viewCategoryList');
	Route::get('/remove-category/remove/{id}', 'AdminController@removeCategory');

	Route::get('/bookrequest', 'AdminController@showBookRequsetTable');
	Route::get('/bookrequest/accept/{id}', 'AdminController@acceptBook');
	Route::get('/bookrequest/reject/{id}', 'AdminController@rejectBook');

	Route::get('/videorequest', 'AdminController@showVideoRequsetTable');
	Route::get('/videorequest/accept/{id}', 'AdminController@acceptVideo');
	Route::get('/videorequest/reject/{id}', 'AdminController@rejectVideo');

	Route::get('/pptrequest', 'AdminController@showPPTRequsetTable');
	Route::get('/pptrequest/accept/{id}', 'AdminController@acceptPPT');
	Route::get('/pptrequest/reject/{id}', 'AdminController@rejectPPT');

	Route::get('/courserequest', 'AdminController@showCourseRequsetTable');
	Route::get('/courserequest/accept/{id}', 'AdminController@acceptCourse');
	Route::get('/courserequest/reject/{id}', 'AdminController@rejectCourse');

	Route::get('/trainingrequest', 'AdminController@showTrainingRequsetTable');
	Route::get('/trainingrequest/accept/{id}', 'AdminController@acceptTraining');
	Route::get('/trainingrequest/reject/{id}', 'AdminController@rejectTraining');
});

Route::get("/books",'BookController@index');
Route::get("/books/catagory/{id}",'BookController@catagoryBook');
Route::get("/books/author/{email}",'BookController@authorBook');
Route::get("/books/view/{id}",'BookController@viewBook');
Route::get("/books/download/{id}",'BookController@downloadBook')->middleware('web');

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
Route::get("/courses/preview/{id}",'CourseController@previewCourse');

Route::get("/training",'TrainingController@index');
Route::get("/training/catagory/{id}",'TrainingController@catagorywiseTraining');
Route::get("/training/author/{email}",'TrainingController@authorwiseTraining');
Route::get("/training/preview/{id}",'TrainingController@previewTraining');

Route::post("/search",'FileController@searchFile')->name('search');
