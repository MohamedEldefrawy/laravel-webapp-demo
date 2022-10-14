<?php

use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\V1\AppointmentController;
use App\Http\Controllers\Api\V1\ClinicController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\DoctorController;
use App\Http\Controllers\Api\V1\DocumentController;
use App\Http\Controllers\Api\V1\NoteController;
use App\Http\Controllers\Api\V1\PatientController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\SymptomController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\WeekDayController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('create-otp', [UserController::class, 'CreateOtp']);
Route::post('validate-otp', [UserController::class, 'ValidateOtp']);
Route::post('patients', [PatientController::class, 'createPatient']);
Route::post('is-patient-exist', [PatientController::class, 'isPatientExist']);

// email verification
Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::post('set-password', [UserController::class, 'SetPassword']);


Route::post('email/reset-password', [EmailVerificationController::class, 'emailCheck']);
Route::get(',http://localhost:4200/reset-password/', function () {
})->name('reset-password')->middleware('signed');;

Route::post('email/confirm-password-change', [EmailVerificationController::class, 'changePassword']);

// protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Patients
    Route::get('patients', [PatientController::class, 'getPatients'])->middleware('permission:select_patients');

    Route::get('patients/{id}', [PatientController::class, 'getPatient'])->middleware('permission:select_patients');
    Route::get('clinic-patients/{id}', [PatientController::class, 'GetPatientsByClinic'])->middleware('permission:select_patients');


    // Files
    Route::post("upload", [DocumentController::class, 'upload'])->middleware('permission:upload_patient_documents');
    Route::get('documents/{id}', [DocumentController::class, 'getDocuments'])->middleware('permission:download_patient_documents');

    // Symptoms
    Route::get('symptoms/{id}', [SymptomController::class, 'getSymptoms']);

    // Notes
    Route::get('notes/{id}', [NoteController::class, 'getNotes']);
    Route::post('add-note', [NoteController::class, 'addNote']);

    // Appointments
    Route::get('appointments', [AppointmentController::class, 'appointments']);
    Route::get('cancel-appointment/{id}', [AppointmentController::class, 'cancelAppointment']);
    Route::post('appointments/info', [AppointmentController::class, 'appointmentByDateAndServiceType']);

    // Clinics
    Route::get('clinics', [ClinicController::class, 'clinics']);
    Route::get('clinics/clinic/{id}/working-slots/', [ClinicController::class, 'workingSlotsByClinicId']);
    Route::get('clinic-doctor/{id}', [ClinicController::class, 'getDoctor']);

    // Departments
    Route::get('departments', [DepartmentController::class, 'departments']);

    // services
    Route::get('services', [ServiceController::class, 'services']);

    // working slots
//    Route::get('working-slots/service/{id}', [WorkingSlotController::class, 'slotsPerServiceId'])->middleware('permission:select_working_slots');

    // doctor
    Route::get('doctors/doctor/{id}/working-slots', [DoctorController::class, 'getWorkingSlotsByDrId']);
    Route::get('doctors/{id}/patients', [DoctorController::class, 'getPatients']);

    // days
    Route::get('days', [WeekDayController::class, 'getAll']);
});

