<?php

namespace App\Http\Controllers;

use App\Http\Requests\yearRequest;
use App\Models\year;
use Illuminate\Http\Request;

class yearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = year::all();
        return view('dashboard.pages.years.view' , compact('years') );
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
    public function store(yearRequest $request)
    {
        year::create($request->toArray());
       return to_route('year.index')->with('Success', $request->year_name . ' has been added successfully');;


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $year = year::findorfail($id);
        return view("dashboard.pages.years.edit" , compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(yearRequest $request, string $id)
    {
        year::where('id' , $id)->update($request->except("_token" , '_method'));
        return to_route('year.index')->with('Success', $request->year_name . ' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $year_name = year::where('id' , $id)->value('year_name');
        year::where('id' , $id)->delete();
        return to_route("year.index")->with('Success', $year_name . ' has been deleted successfully');;
    }
}
