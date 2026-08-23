<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateTeacherProfileRequest;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class teacherProfileController extends Controller
{
    public function index()
    {
        $teacher_id = Auth::guard('teach')->id();
        $subjects = subject::all();
        $teacher_data = teacher::with('subject')->find($teacher_id);

        return view('dashboard.pages.profile details.teachers.teacherProfile', compact(['teacher_data', 'subjects']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit()
    {
        $teacher_id = Auth::guard('teach')->id();
        $teacher_data = teacher::find($teacher_id);
        return view('dashboard.pages.profile details.teachers.updateTeacherProfile', compact('teacher_data'));
    }

    public function update(updateTeacherProfileRequest $request)
    {
        $teacher_id = Auth::guard('teach')->id();

        teacher::where('id', $teacher_id)->update($request->only([
            'name', 'email', 'phone', 'age', 'gender', 'city', 'bio',
        ]));

        return to_route('teacherProfile.index')->with('success', 'Your Profile Has Been Updated Successfully');
    }

    public function destroy(string $id)
    {
        //
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:png,jpg,jpeg,webp,svg',
        ]);

        $teacher_id = Auth::guard('teach')->id();
        $teacher = teacher::find($teacher_id);
        $profile_img = $teacher->img;

        if ($request->hasFile('img')) {
            // امسح الصورة القديمة لو موجودة فعلاً
            if ($profile_img && Storage::disk('public')->exists('images/teachers/' . $profile_img)) {
                Storage::disk('public')->delete('images/teachers/' . $profile_img);
            }

            $image = $request->file('img');
            $profile_img = uniqid() . '.' . $image->extension();
            $image->storeAs('images/teachers', $profile_img, 'public');
        }

        teacher::where('id', $teacher_id)->update([
            'img' => $profile_img,
        ]);

        return to_route('teacherProfile.index')->with('success', 'Your Profile Image Has Been Updated Successfully');
    }

    public function updateCoverImage(Request $request)
    {
        $request->validate([
            'cover_img' => 'required|image|mimes:png,jpg,jpeg,webp,svg',
        ]);

        $teacher_id = Auth::guard('teach')->id();
        $teacher = teacher::find($teacher_id);
        $cover_img = $teacher->cover_img;

        if ($request->hasFile('cover_img')) {
            // امسح الصورة القديمة لو موجودة فعلاً
            if ($cover_img && Storage::disk('public')->exists('images/teachers/' . $cover_img)) {
                Storage::disk('public')->delete('images/teachers/' . $cover_img);
            }

            $image = $request->file('cover_img');
            $cover_img = uniqid() . '.' . $image->extension();
            $image->storeAs('images/teachers', $cover_img, 'public');
        }

        teacher::where('id', $teacher_id)->update([
            'cover_img' => $cover_img,
        ]);

        return to_route('teacherProfile.index')->with('success', 'Your Cover Image Has Been Updated Successfully');
    }
}
