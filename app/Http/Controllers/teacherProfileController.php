<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateTeacherProfileRequest;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teacherProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $teacher_id = Auth::guard('teach')->user()->id ;
        $subjects = subject::all();
        $teacher_data = teacher::with('subject')->find($teacher_id);
       return view('dashboard.pages.profile details.teachers.teacherProfile' , compact(['teacher_data' , 'subjects']));

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher_data = teacher::find($id);
        return view('dashboard.pages.profile details.teachers.updateTeacherProfile' , compact('teacher_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateTeacherProfileRequest $request, string $id)
    {
        teacher::where('id' , $id)->update($request->except("_token" , '_method'));
        return to_route('teacherProfile.index')->with('success' , 'Your Profile Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     /**
     * update teacher profile image
     */
    public function updateProfileImage(Request $request , string $id)
    {
        $request->validate([
            'img'=>'image|mimes:png,jpg,jpeg,webp,svg',
        ]);

        $teacher = teacher::find($id);
        $profile_img = $teacher['img'];

          if($request->hasFile('img')){
             //delete old image
            unlink(storage_path("app/public/images/teachers/$profile_img"));

            //store new image
        $tmp = $_FILES['img']['tmp_name'];
        $profile_img = $_FILES['img']['name'];
        $extension = $request->img->extension();
        $profile_img = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/teachers/$profile_img"));
          }

          //update Querey
          teacher::where('id' , $id)->update([
            'img' => $profile_img ,
          ]);

          return to_route('teacherProfile.index')->with('success' , 'Your Profile Image Has Been Updated Successfully');

    }

    /**
     * update teacher cover image
     */
    public function updateCoverImage(Request $request , string $id)
    {
         $request->validate([
            'cover_img'=>'image|mimes:png,jpg,jpeg,webp,svg',
        ]);

        $teacher = teacher::find($id);
        $cover_img = $teacher['cover_img'];

          if($request->hasFile('cover_img') ){
            if($cover_img != null){
             //delete old image
            unlink(storage_path("app/public/images/teachers/$cover_img"));
            }

            //store new image
        $tmp = $_FILES['cover_img']['tmp_name'];
        $cover_img = $_FILES['cover_img']['name'];
        $extension = $request->cover_img->extension();
        $cover_img = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/teachers/$cover_img"));
          }

          //update Querey
          teacher::where('id' , $id)->update([
            'cover_img' => $cover_img ,
          ]);

        return to_route('teacherProfile.index')->with('success' , 'Your Cover Image Has Been Updated Successfully');

    }
}
