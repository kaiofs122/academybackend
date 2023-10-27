<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\InstructorController;
use App\Http\Controllers\Api\V1\ClassController;
use App\Http\Controllers\Api\V1\ClassDateController;
use App\Http\Controllers\Api\V1\ExerciseController;
use App\Http\Controllers\Api\V1\InstructorAssessmentController;
use App\Http\Controllers\Api\V1\GeneralAssessmentController;
use App\Http\Controllers\Api\V1\LessonController;
use App\Http\Controllers\Api\V1\NotificationInstructorController;
use App\Http\Controllers\Api\V1\NotificationStudentController;
use App\Http\Controllers\Api\V1\ReportController;
use App\Http\Controllers\Api\V1\TrainingController;
use App\Http\Controllers\Api\V1\TrainingExerciseController;
use App\Http\Controllers\FirebaseController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ============================ ROTAS PARA A VERSÃO 1 DA API ============================
Route::prefix('v1')->group(function() {

    // ============================ TESTE FIREBASE ============================
    Route::post('/testeFirebase', [FirebaseController::class, 'store']);

    // ============================ Class ============================
    Route::get('/classes', [ClassController::class, 'index']);
    Route::post('/classes', [ClassController::class, 'store']);
    Route::get('/classes/{id}', [ClassController::class, 'show']);
    Route::put('/classes/{id}', [ClassController::class, 'update']);
    Route::delete('/classes/{id}', [ClassController::class, 'destroy']);

    // ============================ ClassDate ============================
    Route::get('/classesDates', [ClassDateController::class, 'index']);
    Route::post('/classesDates', [ClassDateController::class, 'store']);
    Route::get('/classesDates/{id}', [ClassDateController::class, 'show']);
    Route::put('/classesDates/{id}', [ClassDateController::class, 'update']);
    Route::delete('/classesDates/{id}', [ClassDateController::class, 'destroy']);

    // ============================ Exercise ============================
    Route::get('/exercises', [ExerciseController::class, 'index']);
    Route::post('/exercises', [ExerciseController::class, 'store']);
    Route::get('/exercises/{id}', [ExerciseController::class, 'show']);
    Route::put('/exercises/{id}', [ExerciseController::class, 'update']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy']);

    // ============================ InstructorAssessment ============================
    Route::get('/instructorAssessments', [InstructorAssessmentController::class, 'index']);
    Route::post('/instructorAssessments', [InstructorAssessmentController::class, 'store']);
    Route::get('/instructorAssessments/{id}', [InstructorAssessmentController::class, 'show']);
    Route::put('/instructorAssessments/{id}', [InstructorAssessmentController::class, 'update']);
    Route::delete('/instructorAssessments/{id}', [InstructorAssessmentController::class, 'destroy']);

    // ============================ GeneralAssessment ============================
    Route::get('/generalAssessments', [GeneralAssessmentController::class, 'index']);
    Route::post('/generalAssessments', [GeneralAssessmentController::class, 'store']);
    Route::get('/generalAssessments/{id}', [GeneralAssessmentController::class, 'show']);
    Route::put('/generalAssessments/{id}', [GeneralAssessmentController::class, 'update']);
    Route::delete('/generalAssessments/{id}', [GeneralAssessmentController::class, 'destroy']);

    // ============================ Instructors ============================
    Route::get('/instructors', [InstructorController::class, 'index']);
    Route::post('/instructors', [InstructorController::class, 'store']);
    Route::get('/instructors/{id}', [InstructorController::class, 'show']);
    Route::put('/instructors/{id}', [InstructorController::class, 'update']);
    Route::delete('/instructors/{id}', [InstructorController::class, 'destroy']);

    // ============================ Lessons ============================
    Route::get('/lessons', [LessonController::class, 'index']);
    Route::post('/lessons', [LessonController::class, 'store']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    Route::put('/lessons/{id}', [LessonController::class, 'update']);
    Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);

    // ============================ NotificationInstructor ============================
    Route::get('/notificationsInstructors', [NotificationInstructorController::class, 'index']);
    Route::post('/notificationsInstructors', [NotificationInstructorController::class, 'store']);
    Route::get('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'show']);
    Route::put('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'update']);
    Route::delete('/notificationsInstructors/{id}', [NotificationInstructorController::class, 'destroy']);

    // ============================ NotificationStudents ============================
    Route::get('/notificationsStudents', [NotificationStudentController::class, 'index']);
    Route::post('/notificationsStudents', [NotificationStudentController::class, 'store']);
    Route::get('/notificationsStudents/{id}', [NotificationStudentController::class, 'show']);
    Route::put('/notificationsStudents/{id}', [NotificationStudentController::class, 'update']);
    Route::delete('/notificationsStudents/{id}', [NotificationStudentController::class, 'destroy']);

    // ============================ Reports ============================
    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::get('/reports/{id}', [ReportController::class, 'show']);
    Route::put('/reports/{id}', [ReportController::class, 'update']);
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']);

    // ============================ Students ============================
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // ============================ Trainings ============================
    Route::get('/trainings', [TrainingController::class, 'index']);
    Route::post('/trainings', [TrainingController::class, 'store']);
    Route::get('/trainings/{id}', [TrainingController::class, 'show']);
    Route::put('/trainings/{id}', [TrainingController::class, 'update']);
    Route::delete('/trainings/{id}', [TrainingController::class, 'destroy']);

    // ============================ TrainingExercise ============================
    Route::get('/trainingsExercises', [TrainingExerciseController::class, 'index']);
    Route::post('/trainingsExercises', [TrainingExerciseController::class, 'store']);
    Route::get('/trainingsExercises/{id}', [TrainingExerciseController::class, 'show']);
    Route::put('/trainingsExercises/{id}', [TrainingExerciseController::class, 'update']);
    Route::delete('/trainingsExercises/{id}', [TrainingExerciseController::class, 'destroy']);

    // ============================ Users ============================
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // ============================ Anamnesis ============================
    Route::get('/anamnesis', [AnamnesisController::class, 'index']);
    Route::post('/anamnesis', [AnamnesisController::class, 'store']);
    Route::get('/anamnesis/{id}', [AnamnesisController::class, 'show']);
    Route::put('/anamnesis/{id}', [AnamnesisController::class, 'update']);
    Route::delete('/anamnesis/{id}', [AnamnesisController::class, 'destroy']);

    // ============================ AnamnesisJobActivity ============================
    Route::get('/anamnesisJobActivities', [AnamnesisJobActivityController::class, 'index']);
    Route::post('/anamnesisJobActivities', [AnamnesisJobActivityController::class, 'store']);
    Route::get('/anamnesisJobActivities/{id}', [AnamnesisJobActivityController::class, 'show']);
    Route::put('/anamnesisJobActivities/{id}', [AnamnesisJobActivityController::class, 'update']);
    Route::delete('/anamnesisJobActivities/{id}', [AnamnesisJobActivityController::class, 'destroy']);

    // ============================ AnamnesisPhysicalActivity ============================
    Route::get('/anamnesisPhysicalActivities', [AnamnesisPhysicalActivityController::class, 'index']);
    Route::post('/anamnesisPhysicalActivities', [AnamnesisPhysicalActivityController::class, 'store']);
    Route::get('/anamnesisPhysicalActivities/{id}', [AnamnesisPhysicalActivityController::class, 'show']);
    Route::put('/anamnesisPhysicalActivities/{id}', [AnamnesisPhysicalActivityController::class, 'update']);
    Route::delete('/anamnesisPhysicalActivities/{id}', [AnamnesisPhysicalActivityController::class, 'destroy']);

    // ============================ AnamnesisStudentSymtom ============================
    Route::get('/anamnesisStudentSymtoms', [AnamnesisStudentSymtomController::class, 'index']);
    Route::post('/anamnesisStudentSymtoms', [AnamnesisStudentSymtomController::class, 'store']);
    Route::get('/anamnesisStudentSymtoms/{id}', [AnamnesisStudentSymtomController::class, 'show']);
    Route::put('/anamnesisStudentSymtoms/{id}', [AnamnesisStudentSymtomController::class, 'update']);
    Route::delete('/anamnesisStudentSymtoms/{id}', [AnamnesisStudentSymtomController::class, 'destroy']);
    
    // ============================ StudentPhysicalActivity ============================
    Route::get('/studentPhysicalActivities', [StudentPhysicalActivityController::class, 'index']);
    Route::post('/studentPhysicalActivities', [StudentPhysicalActivityController::class, 'store']);
    Route::get('/studentPhysicalActivities/{id}', [StudentPhysicalActivityController::class, 'show']);
    Route::put('/studentPhysicalActivities/{id}', [StudentPhysicalActivityController::class, 'update']);
    Route::delete('/studentPhysicalActivities/{id}', [StudentPhysicalActivityController::class, 'destroy']);

    // ============================ Symtom ============================
    Route::get('/symtoms', [SymtomController::class, 'index']);
    Route::post('/symtoms', [SymtomController::class, 'store']);
    Route::get('/symtoms/{id}', [SymtomController::class, 'show']);
    Route::put('/symtoms/{id}', [SymtomController::class, 'update']);
    Route::delete('/symtoms/{id}', [SymtomController::class, 'destroy']);

});
