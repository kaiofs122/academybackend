<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ClassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Class
Route::get('/classes', 'ClassController@index');
Route::post('/classes', 'ClassController@create');
Route::post('/classes', 'ClassController@store');
Route::get('/classes/{id}', 'ClassController@show');
Route::put('/classes/{id}', 'ClassController@edit');
Route::put('/classes/{id}', 'ClassController@update');
Route::delete('/classes/{id}', 'ClassController@destroy');

//ClassDate
Route::get('/classesDates', 'ClassDateController@index');
Route::post('/classesDates', 'ClassDateController@create');
Route::post('/classesDates', 'ClassDateController@store');
Route::get('/classesDates/{id}', 'ClassDateController@show');
Route::put('/classesDates/{id}', 'ClassDateController@edit');
Route::put('/classesDates/{id}', 'ClassDateController@update');
Route::delete('/classesDates/{id}', 'ClassDateController@destroy');

//Exercise
Route::get('/exercises', 'ExerciseController@index');
Route::post('/exercises', 'ExerciseController@create');
Route::post('/exercises', 'ExerciseController@store');
Route::get('/exercises/{id}', 'ExerciseController@show');
Route::put('/exercises/{id}', 'ExerciseController@edit');
Route::put('/exercises/{id}', 'ExerciseController@update');
Route::delete('/exercises/{id}', 'ExerciseController@destroy');

//GeneralAssessment
Route::get('/generalAssessments', 'GeneralAssessmentController@index');
Route::post('/generalAssessments', 'GeneralAssessmentController@create');
Route::post('/generalAssessments', 'GeneralAssessmentController@store');
Route::get('/generalAssessments/{id}', 'GeneralAssessmentController@show');
Route::put('/generalAssessments/{id}', 'GeneralAssessmentController@edit');
Route::put('/generalAssessments/{id}', 'GeneralAssessmentController@update');
Route::delete('/generalAssessments/{id}', 'GeneralAssessmentController@destroy');

//Instructors
Route::get('/instructors', 'InstructorController@index');
Route::post('/instructors', 'InstructorController@create');
Route::post('/instructors', 'InstructorController@store');
Route::get('/instructors/{id}', 'InstructorController@show');
Route::put('/instructors/{id}', 'InstructorController@edit');
Route::put('/instructors/{id}', 'InstructorController@update');
Route::delete('/instructors/{id}', 'InstructorController@destroy');

//Lessons
Route::get('/lessons', 'LessonController@index');
Route::post('/lessons', 'LessonController@create');
Route::post('/lessons', 'LessonController@store');
Route::get('/lessons/{id}', 'LessonController@show');
Route::put('/lessons/{id}', 'LessonController@edit');
Route::put('/lessons/{id}', 'LessonController@update');
Route::delete('/lessons/{id}', 'LessonController@destroy');

//NotificationInstructor
Route::get('/notificationsInstructors', 'NotificationInstructorController@index');
Route::post('/notificationsInstructors', 'NotificationInstructorController@create');
Route::post('/notificationsInstructors', 'NotificationInstructorController@store');
Route::get('/notificationsInstructors/{id}', 'NotificationInstructorController@show');
Route::put('/notificationsInstructors/{id}', 'NotificationInstructorController@edit');
Route::put('/notificationsInstructors/{id}', 'NotificationInstructorController@update');
Route::delete('/notificationsInstructors/{id}', 'NotificationInstructorController@destroy');

//NotificationStudents
Route::get('/notificationsStudents', 'NotificationStudentController@index');
Route::post('/notificationsStudents', 'NotificationStudentController@create');
Route::post('/notificationsStudents', 'NotificationStudentController@store');
Route::get('/notificationsStudents/{id}', 'NotificationStudentController@show');
Route::put('/notificationsStudents/{id}', 'NotificationStudentController@edit');
Route::put('/notificationsStudents/{id}', 'NotificationStudentController@update');
Route::delete('/notificationsStudents/{id}', 'NotificationStudentController@destroy');

//Reports
Route::get('/reports', 'ReportController@index');
Route::post('/reports', 'ReportController@create');
Route::post('/reports', 'ReportController@store');
Route::get('/reports/{id}', 'ReportController@show');
Route::put('/reports/{id}', 'ReportController@edit');
Route::put('/reports/{id}', 'ReportController@update');
Route::delete('/reports/{id}', 'ReportController@destroy');

//Students
Route::get('/students', 'StudentController@index');
Route::post('/students', 'StudentController@create');
Route::post('/students', 'StudentController@store');
Route::get('/students/{id}', 'StudentController@show');
Route::put('/students/{id}', 'StudentController@edit');
Route::put('/students/{id}', 'StudentController@update');
Route::delete('/students/{id}', 'StudentController@destroy');

//Trainings
Route::get('/trainings', 'TrainingController@index');
Route::post('/trainings', 'TrainingController@create');
Route::post('/trainings', 'TrainingController@store');
Route::get('/trainings/{id}', 'TrainingController@show');
Route::put('/trainings/{id}', 'TrainingController@edit');
Route::put('/trainings/{id}', 'TrainingController@update');
Route::delete('/trainings/{id}', 'TrainingController@destroy');

//TrainingExercise
Route::get('/trainingsExercises', 'TrainingExerciseController@index');
Route::post('/trainingsExercises', 'TrainingExerciseController@create');
Route::post('/trainingsExercises', 'TrainingExerciseController@store');
Route::get('/trainingsExercises/{id}', 'TrainingExerciseController@show');
Route::put('/trainingsExercises/{id}', 'TrainingExerciseController@edit');
Route::put('/trainingsExercises/{id}', 'TrainingExerciseController@update');
Route::delete('/trainingsExercises/{id}', 'TrainingExerciseController@destroy');

//Users
Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@create');
Route::post('/users', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');
Route::put('/users/{id}', 'UserController@edit');
Route::put('/users/{id}', 'UserController@update');
Route::delete('/users/{id}', 'UserController@destroy');