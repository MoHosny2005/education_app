<?php

namespace App\Http\Controllers;

use App\Http\Requests\managerRequestAdd;
use App\Http\Requests\managerRequestEdit;
use App\Models\manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class managerController extends Controller
{
    public function index()
    {
        $managers = manager::all();
        return view('dashboard.pages.managers.view', compact('managers'));
    }

    public function create()
    {
        return view('dashboard.pages.managers.add');
    }

    public function store(managerRequestAdd $request)
    {
        $imgName = null;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgName = uniqid() . '.' . $image->extension();
            $image->storeAs('images/managers', $imgName, 'public');
        }

        manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // الـ hash هيتعمل تلقائي من الـ cast لو مطبقها زي الـ teacher
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'img' => $imgName,
        ]);

        return to_route('manager.index')->with('success', $request->name . ' Has Been Added Successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $manager = manager::findOrFail($id);
        return view('dashboard.pages.managers.edit', compact('manager'));
    }

    public function update(managerRequestEdit $request, string $id)
    {
        $manager = manager::findOrFail($id);
        $imgName = $manager->img; // الافتراضي: يفضل زي ما هو لو مفيش صورة جديدة

        if ($request->hasFile('img')) {
            // امسح الصورة القديمة لو موجودة فعلاً بس
            if ($manager->img && Storage::disk('public')->exists('images/managers/' . $manager->img)) {
                Storage::disk('public')->delete('images/managers/' . $manager->img);
            }

            // خزّن الصورة الجديدة
            $image = $request->file('img');
            $imgName = uniqid() . '.' . $image->extension();
            $image->storeAs('images/managers', $imgName, 'public');
        }

        $manager->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'img' => $imgName,
        ]);

        return to_route('manager.index')->with('success', $request->name . ' Has Been Updated Successfully');
    }

    public function destroy(string $id)
    {
        $manager = manager::findOrFail($id);

        // امسح الصورة المرتبطة بيه لو موجودة فعلاً
        if ($manager->img && Storage::disk('public')->exists('images/managers/' . $manager->img)) {
            Storage::disk('public')->delete('images/managers/' . $manager->img);
        }

        $manager_name = $manager->name;
        $manager->delete();

        return to_route('manager.index')->with('success', $manager_name . ' Has Been Deleted Successfully');
    }
}
