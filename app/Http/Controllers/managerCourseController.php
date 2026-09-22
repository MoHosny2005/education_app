<?php

namespace App\Http\Controllers;

use App\Events\changeCourseStatus;
use App\Models\course;
use App\Models\teacher;
use App\Models\update_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class managerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = course::all();
        return view('dashboard.pages.courses.managerCourses.view' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $updated_courses = update_course::all();
       return view('dashboard.pages.courses.managerCourses.viewUpdatedCourses' , compact('updated_courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = course::with(['subject' , 'teacher' , 'requirment'])->find($id);
        $final_price = $course->price - ($course->price * $course->discount / 100);
        return view('dashboard.pages.courses.managerCourses.courseDetails' , compact(['course' , 'final_price']));
    }

    public function show_updated(string $id){
        $updated_course = update_course::with('requirment' , 'course')->find($id);


        // changes conditions
        $isTitleChanged = $updated_course->course->title  !== $updated_course->title ;
        $isRequirmentChanged = $updated_course->course->requirment_id !== $updated_course->requirment_id ;
        $isDescriptionChanged = $updated_course->course->description !== $updated_course->description ;
        $isShortDescriptionChanged = $updated_course->course->short_description !== $updated_course->short_description ;
        $isPriceChanged = $updated_course->course->price !== $updated_course->price ;
        $isDiscountChanged = $updated_course->course->discount !== $updated_course->discount ;
        $isImageChanged = $updated_course->course->image !== $updated_course->image;

        return view('dashboard.pages.courses.managerCourses.updatedCoursesDetails' , compact([
            'updated_course' ,
            'isTitleChanged' ,
            'isRequirmentChanged' ,
            'isDescriptionChanged' ,
            'isShortDescriptionChanged' ,
            'isPriceChanged' ,
            'isDiscountChanged' ,
            'isImageChanged' ,
        ]));


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

    public function changeStatus(string $id , string $status){
        course::where('id' , $id)->update(['status' => $status]);
        $course = course::find($id);
        $teacher = teacher::find($course->teacher_id);
       Event(new changeCourseStatus($course , $status , $teacher));
        return to_route('manager_courses.index')->with('success' , 'Course Is ' . $status . ' Now' );
    }
}
