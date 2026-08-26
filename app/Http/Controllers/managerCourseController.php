<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

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
        //
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
