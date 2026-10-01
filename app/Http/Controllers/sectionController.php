<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class sectionController extends Controller
{
    public function index(string $id){
        $course = course::findOrFail($id);
        $sections = section::where('course_id' , $id)->get();
        return view('dashboard.pages.sections.view' , compact(['course' , 'sections']));
    }

    public function store(Request $request , string $id){
        $course_id = $id ;
        $request->validate([
            'title' => "required|unique:sections,title|min:4|max:30" ,
        ]);

        section::create([
            'course_id' => $course_id ,
            'title' => $request->title ,
        ]);

           return to_route('section.index' , $course_id)->with('Success', $request->title . ' Section has been added successfully');
    }

    public function edit(string $id){
        $section = section::findOrFail($id) ;

        return view('dashboard.pages.sections.edit' , compact('section'));
    }

    public function update(Request $request , string $id ){
        $section = section::find($id);
        $request->validate([
        'title' => [
            'required',
            'min:4',
            'max:30',
            Rule::unique('sections', 'title')->ignore($section->id),
        ],
    ]);

        section::where('id' , $id)->update([
            'title' => $request->title ,
        ]);

        return to_route('section.index' , $section->course->id)->with('Success', $request->title . ' Section has been Updated successfully');

    }

    public function delete(string $id){
        $section = section::find($id);
        $course_id = $section->course->id ;
        section::where('id' , $id)->delete();
        return to_route('section.index' , $course_id)->with('Success', $section->title . ' Section has been Deleted successfully');
    }
}
