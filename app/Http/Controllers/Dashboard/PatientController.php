<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Detection;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Prescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class
PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('dashboard.patient.browse', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "age" => "required",
            "address" => "nullable",
            "gander" => "required",
            "phone_number" => "nullable",
            "notes" => "nullable",



        ]);

        Patient::create($data);
        session()->flash("success", trans("Success"));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient=Patient::findOrFail($id);
        $drugs=Drug::all();
        return view("dashboard.patient.patient-profile",compact("patient",'drugs'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('dashboard.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => "required",
            "age" => "required",
            "address" => "nullable",
            "gander" => "required",
            "phone_number" => "nullable",
            "notes" => "nullable",

        ]);

        Patient::findOrFail($id)->update($data);
        session()->flash("success", trans("Success"));
        return to_route('dashboard.patient.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Patient::findOrFail($id)->delete();
        return redirect()->back();
    }



    public function report_page($id)
    {
        $patient=Patient::findOrFail($id) and with('detection_date')and with('prescriptions');
        $date=Carbon::today()->format('d-m-Y');
        return view("reports" , compact('patient','date'));

    }


}
