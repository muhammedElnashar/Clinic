<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prescriptions=Prescription::paginate(10);
        $patients=Patient::all();
        $drugs=Drug::all();
        return view('dashboard.prescription.browse',compact("prescriptions","drugs","patients"));
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
            "patient_id" => "required",
            "drug_id" => "required",


        ]);
        foreach ($request->drug_id as $k => $id) {
            unset($data['drug_id']);
            $data = $data +["drug_id" => $id];
            Prescription::create($data);
        }
            session()->flash("success", trans("Success"));
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id);
        $patients=Patient::all();
        $drugs=Drug::all();

        return view('dashboard.prescription.edit', compact('prescription',"patients",'drugs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "patient_id" => "required",
            "drug_id" => "required",
        ]);
        $data =$request->all();
            Prescription::findOrFail($id)->update($data);
        return to_route('dashboard.prescription.index')->withSuccess('Success message');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Prescription::findOrFail($id)->delete();
        return redirect()->back();
    }
}
