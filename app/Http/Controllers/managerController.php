<?php

namespace App\Http\Controllers;

use App\Http\Requests\managerRequestAdd;
use App\Http\Requests\managerRequestEdit;
use App\Models\manager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class managerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = manager::all();
        return view('dashboard.pages.managers.view' , compact('managers') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.managers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(managerRequestAdd $request)
    {

      $tmp = $_FILES['img']['tmp_name'];
        $img_name = $_FILES['img']['name'];
        $extension = $request->img->extension();
        $img_name = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/managers/$img_name"));

         manager::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => $request->password ,
            'age' => $request->age ,
            'gender' => $request->gender ,
            'city' => $request->city ,
            'img' => $img_name ,
        ]);


        return to_route('manager.index')->with('success' , $request->name . " Has Been Added Successfully"  );

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
        $manager = manager::findorfail($id);
        return view('dashboard.pages.managers.edit' , compact('manager') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(managerRequestEdit $request, string $id)
    {
        $manager = manager::findorfail($id);
        $manager_img = $manager['img'];
        if($request->hasFile('img')){
            //delete old image
            unlink(storage_path("app/public/images/managers/$manager_img"));

            //store new image
        $tmp = $_FILES['img']['tmp_name'];
        $manager_img = $_FILES['img']['name'];
        $extension = $request->img->extension();
        $manager_img = uniqid(). "." . $extension ;
        move_uploaded_file($tmp , storage_path("app/public/images/managers/$manager_img"));
        }
         manager::where('id' , $id)->update([
            'name' => $request->name ,
            'email' => $request->email ,
            'age' => $request->age ,
            'gender' => $request->gender ,
            'city' => $request->city ,
            'img' => $manager_img ,
        ]);

        return to_route('manager.index')->with('success' , $request->name . " Has Been Updated Successfully " );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $manager_name = manager::where('id' , $id)->value('name');
         manager::where('id' , $id)->delete();
         return to_route('manager.index')->with('success' , $manager_name . " Has Been Deleted Successfully " );
    }
}
