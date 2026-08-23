<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacherRequestAdd;
use App\Http\Requests\teacherRequestEdit;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class teacherController extends Controller
{
    public function index()
    {
        $count = teacher::count();
        $teachers = teacher::with('subject')->get();
        $subjects = subject::all();
        return view('dashboard.pages.teachers.view', compact(['teachers', 'subjects', 'count']));
    }

    public function create()
    {
        $subjects = subject::all();
        return view('dashboard.pages.teachers.add', compact('subjects'));
    }

    public function store(teacherRequestAdd $request)
    {
        $img_name = null;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $img_name = uniqid() . '.' . $image->extension();
            $image->storeAs('images/teachers', $img_name, 'public');
        }

        teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'subject_id' => $request->subject_id,
            'bio' => $request->bio,
            'img' => $img_name,
            'cover_img' => null,
        ]);

        return to_route('teacher.index')->with('success', " MR $request->name Has Been Added Successfully");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $subjects = subject::all();
        $teacher = teacher::findOrFail($id);
        return view('dashboard.pages.teachers.edit', compact(['subjects', 'teacher']));
    }

    public function update(teacherRequestEdit $request, string $id)
    {
        $teacher = teacher::findOrFail($id);
        $img_name = $teacher->img; // الافتراضي: تفضل زي ما هي لو مفيش صورة جديدة

        if ($request->hasFile('img')) {
            // امسح الصورة القديمة لو موجودة فعلاً
            if ($teacher->img && Storage::disk('public')->exists('images/teachers/' . $teacher->img)) {
                Storage::disk('public')->delete('images/teachers/' . $teacher->img);
            }

            // خزّن الصورة الجديدة
            $image = $request->file('img');
            $img_name = uniqid() . '.' . $image->extension();
            $image->storeAs('images/teachers', $img_name, 'public');
        }

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'subject_id' => $request->subject_id,
            'bio' => $request->bio,
            'img' => $img_name,
        ]);

        return to_route('teacher.index')->with('success', ' MR ' . $request->name . ' Has Been Updated Successfully');
    }

    public function destroy(string $id)
    {
        $teacher = teacher::findOrFail($id);

        // امسح الصورة المرتبطة بيه لو موجودة فعلاً
        if ($teacher->img && Storage::disk('public')->exists('images/teachers/' . $teacher->img)) {
            Storage::disk('public')->delete('images/teachers/' . $teacher->img);
        }

        $teacher_name = $teacher->name;
        $teacher->delete();

        return to_route('teacher.index')->with('success', 'MR' . $teacher_name . ' Has Been Deleted Succesfully');
    }

    public function sort(string $key)
    {
        $count = teacher::count();

        if ($key == 'name') {
            $teachers = teacher::with('subject')->orderBy('name')->get();
        } elseif ($key == 'subject') {
            $teachers = teacher::with('subject')->orderBy('subject_id')->get();
        } else {
            return to_route('teacher.index');
        }

        return view('dashboard.pages.teachers.view', compact(['teachers', 'count']));
    }
}
