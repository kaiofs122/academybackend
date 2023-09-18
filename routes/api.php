<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ============================ ROTAS PARA A VERSÃO 1 DA API ============================
Route::prefix('v1')->group(function() {

    // ============================ Class ============================
    Route::get('/classes', [ClassController::class, 'index']);
    Route::post('/classes', [ClassController::class, 'create']);
    Route::post('/classes', [ClassController::class, 'store']);
    Route::get('/classes/{id}', [ClassController::class, 'show']);
    Route::put('/classes/{id}', [ClassController::class, 'edit']);
    Route::put('/classes/{id}', [ClassController::class, 'update']);
    Route::delete('/classes/{id}', [ClassController::class, 'destroy']);

    // ============================ ClassDate ============================
    Route::get('/classesDates', [ClassDateController::class, 'index']);
    Route::post('/classesDates', [ClassDateController::class, 'create']);
    Route::post('/classesDates', [ClassDateController::class, 'store']);
    Route::get('/classesDates/{id}', [ClassDateController::class, 'show']);
    Route::put('/classesDates/{id}', [ClassDateController::class, 'edit']);
    Route::put('/classesDates/{id}', [ClassDateController::class, 'update']);
    Route::delete('/classesDates/{id}', [ClassDateController::class, 'destroy']);

    // ============================ Exercise ============================
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::post('/exercises', [ExerciseController::class, 'create']);
    Route::post('/exercises', [ExerciseController::class, 'store']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'show']);
    Route::put('/exercises/{id}', [ExerciseController::class, 'edit']);
    Route::put('/exercises/{id}', [ExerciseController::class, 'update']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy']);

    // ============================ GeneralAssessment ============================
    Route::get('/generalAssessments', [GeneralAssessmentController::class, 'index']);
    Route::post('/generalAssessments', [GeneralAssessmentController::class, 'create']);
    Route::post('/generalAssessments', [GeneralAssessmentController::class, 'store']);
    Route::get('/generalAssessments/{id}', [GeneralAssessmentController::class, 'show']);
    Route::put('/generalAssessments/{id}', [GeneralAssessmentController::class, 'edit']);
    Route::put('/generalAssessments/{id}', [GeneralAssessmentController::class, 'update']);
    Route::delete('/generalAssessments/{id}', [GeneralAssessmentController::class, 'destroy']);

    // ============================ Instructors ============================
    Route::get('/instructors', [InstructorController::class, 'index']);
    Route::post('/instructors', [InstructorController::class, 'create']);
    Route::post('/instructors', [InstructorController::class, 'store']);
    Route::get('/instructors/{id}', [InstructorController::class, 'show']);
    Route::put('/instructors/{id}', [InstructorController::class, 'edit']);
    Route::put('/instructors/{id}', [InstructorController::class, 'update']);
    Route::delete('/instructors/{id}', [InstructorController::class, 'destroy']);

    // ============================ Lessons ============================
    Route::get('/lessons', [LessonController::class, 'index']);
    Route::post('/lessons', [LessonController::class, 'create']);
    Route::post('/lessons', [LessonController::class, 'store']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    Route::put('/lessons/{id}', [LessonController::class, 'edit']);
    Route::put('/lessons/{id}', [LessonController::class, 'update']);
    Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);

    // ============================ NotificationInstructor ============================
    Route::get('/notificationsInstructors', [NotificationInstructorController::class, 'index']);
    Route::post('/notificationsInstructors', [NotificationInstructorController::class, 'create']);
    Route::post('/notificationsInstructors', [NotificationInstructorController::class, 'store']);
    Route::get('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'show']);
    Route::put('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'edit']);
    Route::put('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'update']);
    Route::delete('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'destroy']);

    // ============================ NotificationStudents ============================
    Route::get('/notificationsStudents', [NotificationStudentController::class, 'index']);
    Route::post('/notificationsStudents', [NotificationStudentController::class, 'create']);
    Route::post('/notificationsStudents', [NotificationStudentController::class, 'store']);
    Route::get('/notificationsStudents/{id}', [NotificationStudentController::class, 'show']);
    Route::put('/notificationsStudents/{id}', [NotificationStudentController::class, 'edit']);
    Route::put('/notificationsStudents/{id}', [NotificationStudentController::class, 'update']);
    Route::delete('/notificationsStudents/{id}', [NotificationStudentController::class, 'destroy']);

    // ============================ Reports ============================
    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'create']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::get('/reports/{id}', [ReportController::class, 'show']);
    Route::put('/reports/{id}', [ReportController::class, 'edit']);
    Route::put('/reports/{id}', [ReportController::class, 'update']);
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']);

    // ============================ Students ============================
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'create']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::put('/students/{id}', [StudentController::class, 'edit']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // ============================ Trainings ============================
    Route::get('/trainings', [TrainingController::class, 'index']);
    Route::post('/trainings', [TrainingController::class, 'create']);
    Route::post('/trainings', [TrainingController::class, 'store']);
    Route::get('/trainings/{id}', [TrainingController::class, 'show']);
    Route::put('/trainings/{id}', [TrainingController::class, 'edit']);
    Route::put('/trainings/{id}', [TrainingController::class, 'update']);
    Route::delete('/trainings/{id}', [TrainingController::class, 'destroy']);

    // ============================ TrainingExercise ============================
    Route::get('/trainingsExercises', [TrainingExerciseController::class, 'index']);
    Route::post('/trainingsExercises', [TrainingExerciseController::class, 'create']);
    Route::post('/trainingsExercises', [TrainingExerciseController::class, 'store']);
    Route::get('/trainingsExercises/{id}', [TrainingExerciseController::class, 'show']);
    Route::put('/trainingsExercises/{id}', [TrainingExerciseController::class, 'edit']);
    Route::put('/trainingsExercises/{id}', [TrainingExerciseController::class, 'update']);
    Route::delete('/trainingsExercises/{id}', [TrainingExerciseController::class, 'destroy']);

    // ============================ Users ============================
    Route::get('/users', [UserController::class, 'index']);
    // Route::post('/users', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

});
