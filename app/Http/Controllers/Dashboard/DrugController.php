<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Drug::paginate(10);
        return view('dashboard.drugs.browse', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|unique:drugs,name",

        ]);

        Drug::create($data);
/*        session()->flash("success", trans("Success"));*/
        return redirect()->back()->withSuccess('Success message');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $drug = Drug::findOrFail($id);
        return view('dashboard.drugs.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $data = $request->validate([
            "name" => "required|unique:drugs,name",

        ]);

        Drug::findOrFail($id)->update($data);
/*        session()->flash("success", trans("Success"));*/
        return to_route('dashboard.drug.index')->withSuccess('Success message');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Drug::findOrFail($id)->delete();
        return redirect()->back()->withWarning('Deleted');
    }
}
