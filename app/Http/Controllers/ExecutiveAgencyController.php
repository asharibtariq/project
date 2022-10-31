<?php

namespace App\Http\Controllers;

use App\Models\ExecutiveAgency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExecutiveAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Executive Agency";
        return view('adminpanel.executiveagency.executiveagency')->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Executive Agency ";
        return view('adminpanel.executiveagency.add_executiveagency')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $insertData = $request->all();
//        $insertData['created_by'] = $userId;
        ////--This Method would need mass assignment--////
        ExecutiveAgency::create($insertData);
        return redirect('executiveagency')->with('success', 'Executive Agency Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExecutiveAgency  $executiveAgency
     * @return \Illuminate\Http\Response
     */
    public function show(ExecutiveAgency $executiveAgency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExecutiveAgency  $executiveAgency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $executive = ExecutiveAgency::findOrFail($id);
        $title = "Edit Executive Agency";
        $data['executiveagency'] = $executive;
        return view('adminpanel.executiveagency.executiveagency', $data)->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExecutiveAgency  $executiveAgency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $executive = ExecutiveAgency::findOrFail($id);
        $updateData = $request->all();
        $executive->update($updateData);
        return redirect('executiveagency')->with('success', 'Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExecutiveAgency  $executiveAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $execuive = ExecutiveAgency::findOrFail($id);
        $execuive->delete();
        return redirect('executiveagency')->with('success','Executive Agency Successfully deleted');
    }
}
