<?php

namespace App\Http\Controllers;

use App\Events\changeCourseStatus;
use App\Events\updateCourseApproval;
use App\Models\course;
use App\Models\teacher;
use App\Models\update_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

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

    // update original course dats

public function updateOriginalCourse(string $id , string $action){

    $updated_course = update_course::with('requirment' , 'course')->find($id);

    $originalCourse_id = $updated_course->course_id;

    // if accepted

    if($action === 'accept'){

        //image

        if($updated_course->image !== $updated_course->course->image){

            if($updated_course->course->image && Storage::disk('public')->exists('images/courses/' . $updated_course->course->image)){

                Storage::disk('public')->delete('images/courses/' . $updated_course->course->image);

            }

            if(Storage::disk('public')->exists('images/updated_courses/' . $updated_course->image)){

                Storage::disk('public')->move('images/updated_courses/' . $updated_course->image , 'images/courses/' . $updated_course->image);

            }

        }

        //update original course data

        course::where('id' , $originalCourse_id )->update([

            'title'=> $updated_course->title ,

            'requirment_id' => $updated_course->requirment_id ,

            'description' => $updated_course->description ,

            'short_description' => $updated_course->short_description ,

            'price' => $updated_course->price ,

            'discount' =>$updated_course->discount ,

            'image'=>$updated_course->image ,

        ]);

    }

   
    $teacher = teacher::find($updated_course->course->teacher_id);

    Event(new updateCourseApproval($updated_course, $teacher , $action));

    //delete data

    if($updated_course->image && Storage::disk('public')->exists('images/updated_courses/' . $updated_course->image)){

        Storage::disk('public')->delete('images/updated_courses/' . $updated_course->image);

    }

    update_course::where('id' , $id)->delete();

    return to_route('manager_courses.create')->with('success' , 'Course Data Was Saved');

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
