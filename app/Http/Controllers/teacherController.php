<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacherRequestAdd;
use App\Http\Requests\teacherRequestEdit;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = teacher::count();
        $teachers = teacher::with('subject')->get();
        $subjects = subject::all();
        return view('dashboard.pages.teachers.view' , compact(['teachers' , 'subjects' , 'count']) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = subject::all();
        return view('dashboard.pages.teachers.add' , compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(teacherRequestAdd $request)
    {

        $tmp = $_FILES['img']['tmp_name'];
        $img_name = $_FILES['img']['name'];
        $extension = $request->img->extension();
        $img_name = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/teachers/$img_name"));

        teacher::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => $request->password ,
            'phone' => $request->phone ,
            'age' => $request->age ,
            'gender' => $request->gender ,
            'city' => $request->city ,
            'subject_id' => $request->subject_id ,
            'bio' => $request->bio ,
            'img' => $img_name ,
            'cover_img' => null ,
        ]);

        return to_route('teacher.index')->with('success' ,  " MR $request->name Has Been Added Successfully");
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
        $subjects = subject::all();
        $teacher = teacher::findorfail($id);
        return view('dashboard.pages.teachers.edit', compact(['subjects' , 'teacher']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(teacherRequestEdit $request, string $id)
    {
        if($request->hasFile('img')   ){

             $tmp = $_FILES['img']['tmp_name'];
        $img_name = $_FILES['img']['name'];
        $extension = $request->img->extension();
        $img_name = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/teachers/$img_name"));

        teacher::where('id' , $id)->update([
            'name' => $request->name ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'age' => $request->age ,
            'gender' => $request->gender ,
            'city' => $request->city ,
            'subject_id' => $request->subject_id ,
            'bio' => $request->bio ,
            'img' => $img_name ,
        ]);

        }else{

             teacher::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'subject_id' => $request->subject_id,
            'bio' => $request->bio,
        ]);

        }

        return to_route('teacher.index')->with('success' , ' MR ' . $request->name . ' Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher_name = teacher::where('id' , $id)->value('name');
        teacher::where('id' , $id)->delete();
        return to_route('teacher.index')->with('success' , 'MR' . $teacher_name . ' Has Been Deleted Succesfully'  );
    }

    /**
     * Sort teachers
     */
    public function sort(string $key){

        $count = teacher::count();

        if($key == 'name'){
            $teachers = teacher::with('subject')->orderBy('name')->get();

        }elseif($key == 'subject'){
            $teachers = teacher::with('subject')->orderBy('subject_id')->get();
        }else{
            return to_route('teacher.index');
        }

        return view('dashboard.pages.teachers.view' , compact(['teachers' , 'count']));

    }
}
