<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'Auth\LoginController@Index')->name('login');
Route::post('/login', 'Auth\LoginController@LogIn');
Route::get('/register', 'Auth\RegisterController@Index')->name('reigster');
Route::post('/register', 'Auth\RegisterController@Register');
Route::get('/logout', 'Auth\LoginController@LogOut')->name('logout');


Route::middleware(['auth'])->group(function(){
    // Auth::routes();
    Route::get('/select-category', 'CategoryController@Index')->name('select-category')->middleware('auth');
    Route::get('/ask-subject/{id?}', 'SubjectController@Index')->name('ask-subject')->middleware('auth');
    Route::get('/solution-subject/{id?}', 'SubjectController@SolutionSubject')->name('solution-subject')->middleware('auth');
    Route::get('/simulate/{id?}', 'SubjectController@Simulate')->name('simulate')->middleware('auth');
    Route::get('/institution/{id?}', 'SimluateController@Institution')->name('institution')->middleware('auth');
    Route::get('/question', 'QuestionController@Index')->name('question')->middleware('auth');
    Route::get('/question-answerlist/{id?}', 'QuestionController@QuestionAnswerList')->middleware('auth');
    Route::get('/show-detail-answer/{id?}', 'QuestionController@GetAnswersList')->middleware('auth');
    Route::get('/alert-show-answer/{id?}', 'AnswerController@EachAnswerShow')->middleware('auth');

    Route::get('/question-post/{id?}', 'QuestionController@PostQuestion')->name('question-post')->middleware('auth');
    Route::post('/upload-question-file', 'QuestionController@UploadFile')->middleware('auth');
    Route::post('/question-upload', 'QuestionController@UploadQuestion')->middleware('auth');
    Route::get('/answers/{id?}', 'AnswerController@Index')->name('answers')->middleware('auth');
    Route::get('/allquestions', 'QuestionController@AllQuestions')->name('allquestions')->middleware('auth');
    Route::get('/totalquestions', 'QuestionController@TotalQuestions')->name('totalquestions')->middleware('auth');
    Route::get('/show-answers/{id?}','AnswerController@ShowAnswer')->middleware('auth');
    Route::post('/answer-readed', 'AnswerController@AnswerState')->middleware('auth');
    Route::get('/solution/{id?}', 'AnswerController@ReplyAnswers')->middleware('auth');
    Route::post('/upload-answers-file', 'AnswerController@UploadFile')->middleware('auth');
    Route::post('/reply-answer', 'AnswerController@ReplyAnswer')->middleware('auth');
    Route::post('/send-answer', 'AnswerController@SendAnswer')->middleware('auth');
    Route::post('/detail-answer', 'AnswerController@DetailAnswer')->middleware('auth');
    Route::post('/answerslist', 'AnswerController@AnswersList')->middleware('auth');
    Route::post('/remove-answers', 'AnswerController@RemoveAnswer')->middleware('auth');
    Route::post('/remove-question', 'QuestionController@RemoveQuestion')->middleware('auth');

    Route::get('/account-setting', 'Auth\RegisterController@AccountSetting')->name('account-setting')->middleware('auth');;
    Route::post('/change-userinfo', 'Auth\RegisterController@ChangeInfo')->middleware('auth');
});




