<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationRequest;
use App\Models\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Designation";
        return view('adminpanel.designation.designation')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Designation";
        return view('adminpanel.designation.add_designation')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationRequest $request)
    {
        $userId = Auth::id();
        $insertData = $request->all();
//        $insertData['created_by'] = $userId;
        ////--This Method would need mass assignment--////
        Designation::create($insertData);
        return redirect('designation')->with('success', 'Designation Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        $title = "Edit Designation";
        $data['designation'] = $designation;
        return view('adminpanel.designation.edit_designation', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $userId = Auth::id();
        $designation = Designation::findOrFail($id);
        $updateData = $request->all();
        $updateData['updated_by'] = $userId;
        $designation->update($updateData);
        return redirect('designation')->with('success', 'Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation,$id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect('designation')->with('success','Designation Successfully deleted');
    }
}
