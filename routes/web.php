<?php

use App\Http\Controllers\ProfileController;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Detection;
use App\Models\Prescription;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $patients = Patient::all();
    $detections = Detection::whereDate('detection_date', '=', now())->get();
    return view('dashboard', compact("patients", "detections"));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(["prefix" => "dashboard", 'as' => "dashboard.", 'middleware' => "auth"], function () {
    Route::resource('patient', \App\Http\Controllers\Dashboard\PatientController::class);
    Route::resource('drug', \App\Http\Controllers\Dashboard\DrugController::class);
    Route::resource('prescription', \App\Http\Controllers\Dashboard\PrescriptionController::class);
    Route::post('/profile-update-drug/{id}', function (Request $request) {
        $request->validate([
            "drug_id" => "required",
        ]);
        $data =$request->all();
        foreach ($request->drug_id as $k => $id) {
            unset($data['drug_id']);
            $data = $data + ["drug_id" => $id];

            Prescription::create($data);
        }
            session()->flash("success", trans("Success"));
            return redirect()->back();
           })->name('profile-update-drug');
    Route::resource('detection', \App\Http\Controllers\Dashboard\DetectionController::class);
    Route::get('statement-today', [\App\Http\Controllers\Dashboard\DetectionController::class, 'statement_today'])->name('statement-today');
    Route::any("report/{id}", [\App\Http\Controllers\Dashboard\PatientController::class, 'report_page'])->name("report-page");
    Route::post("profile-create-detection/{id}",function (Request $request){
           $request->validate([
                'detection_date'=>'required',
                'detection_type'=>'required',
            ]);
        $data=$request->all();
        Detection::create($data);
            return redirect()->back();
    })->name("profile-create-detection");
    Route::post("profile-update-detection/{id}",function (Request $request,$id){

        $data=$request->all();
        Detection::findOrFail($id)->update($data);
            return redirect()->back();
    })->name("profile-update-detection");
});

require __DIR__ . '/auth.php';
