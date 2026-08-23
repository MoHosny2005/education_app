<?php

namespace App\Http\Controllers;

use App\Http\Requests\subjectRequest;
use App\Models\subject;
use App\Models\year;
use Illuminate\Http\Request;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = year::all();
       $subjects = subject::with('year')->get();
       $count = subject::count();

        return view('dashboard.pages.subjects.view' , compact(['subjects' , 'years' , 'count' ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = year::all();
        $subjects = subject::all();
        return view('dashboard.pages.subjects.add' , compact(['years' ,'subjects']) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(subjectRequest $request)
    {
        subject::create($request->toArray());
        return to_route('subject.index')->with('success' , $request->name . " Has Been Added Successfully");
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
        $years = year::all();
        $subjects = subject::all();
        $subject = subject::findorfail($id);
        return view('dashboard.pages.subjects.edit' , compact(['subject' , 'years' , 'subjects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(subjectRequest $request, string $id)
    {
        subject::where('id' , $id)->update($request->except("_token" , '_method'));
        return to_route('subject.index')->with('success' , $request->name . " Has Been Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject_name = subject::where('id' , $id)->value('name');
        subject::where('id' , $id)->delete();
        return to_route('subject.index')->with('success' , $subject_name . " Has Been Deleted Successfully");
    }

    /**
     * sort subject
     *
     */
    public function sort(string $key){
        $years = year::all();
        $count = subject::count();
        if($key == 'year'){
             $subjects =  subject::with('year')->orderBy('year_id')->get();
              return view('dashboard.pages.subjects.view' , compact(['subjects' , 'years' , 'count']));
        }elseif($key == 'name'){
            $subjects =  subject::with('year')->orderBy('name')->get();
            return view('dashboard.pages.subjects.view' , compact(['subjects' , 'years' , 'count' ]));
        }elseif($key == 'recent'){
            return to_route('subject.index');
        }
    }
}
