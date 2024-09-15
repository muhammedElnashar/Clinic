<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Detection;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DetectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detections = Detection::paginate(10);
        $patients = Patient::all();

        return view('dashboard.detection.browse', compact('detections', 'patients'));
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
            'patient_id' => 'required',
            'detection_date' => 'required',
            'detection_type' => 'required',
            "reports" => "nullable",
            'payment' => 'nullable'
        ]);
        Detection::create($data);
        return to_route("dashboard.detection.index")->withSuccess("Data Create Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Detection $detection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detection = Detection::findOrFail($id);
        $patients = Patient::all();

        return view('dashboard.detection.edit', compact('detection', "patients"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'patient_id' => 'required',
            'detection_date' => 'required',
            'detection_type' => 'required',
            "reports" => "nullable",
            'payment' => 'nullable'
        ]);
        Detection::findOrFail($id)->update($data);
        return to_route("dashboard.detection.index")->withSuccess("Data update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Detection::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function statement_today(Request $request)
    {
        $fromDate = $request->input('from_date') ?? Carbon::today();
        $toDate = $request->input('to_date') ?? Carbon::today()->addYears(100);
                Detection::all();
        $detections = Detection::whereBetween('detection_date', [$fromDate, $toDate])->get();

            return view("dashboard.detection.statements-today", compact('detections'));


    }

}
