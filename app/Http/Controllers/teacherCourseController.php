<?php

namespace App\Http\Controllers;

use App\Http\Requests\courseAddRequest;
use App\Models\course;
use App\Models\subject;
use App\Models\teacher;
use App\Policies\coursePolicy ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class teacherCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $teacher_id = Auth::guard('teach')->user()->id ;
         $course = course::where('teacher_id' ,  $teacher_id )->get();
        return view('dashboard.pages.courses.teacherCourses.view' , compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = subject::all();
        return view('dashboard.pages.courses.teacherCourses.add' , compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(courseAddRequest $request)
    {
        //teacher subject selection
        $teacher_id = Auth::guard('teach')->user()->id ;
        $subject_id = Auth::guard('teach')->user()->subject_id ;

        if($request->hasFile('image')){
        $image = $request->file('image');
        $image_name = uniqid() . '.' . $image->extension();
        $image->storeAs('images/courses' ,$image_name  , 'public') ;
        }

        course::create([
          'title' => $request->title ,
          'subject_id' => $subject_id ,
          'teacher_id' =>  $teacher_id  ,
          'requirment_id' => $request->requirment_id ,
          'description' => $request->description ,
          'short_description' => $request->short_description ,
          'price' => $request->price ,
          'discount' => $request->discount ,
          'image' =>  $image_name ,
        ]);

        return to_route('teacher_courses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = course::with(['subject' , 'teacher' , 'requirment'])->find($id);
        $teacher = Auth::guard('teach')->user();
        if($teacher->cannot('view' , $course)){
            return to_route('teacher_courses.index');
        }
        $final_price = $course->price - ($course->price * $course->discount / 100);
       return view('dashboard.pages.courses.teacherCourses.courseDetails' , compact(['course' ,  'final_price']) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
