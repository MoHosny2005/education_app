<?php

namespace App\Http\Controllers;

use App\Http\Requests\managerAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerAuthController extends Controller
{

    public function show_form(){
        return view('dashboard.pages.auth.login');
    }

    public function login_check(managerAuthRequest $request){
       if(Auth::guard('manage')->attempt($request->only(['email', 'password']))){
            return to_route('manager.index');
       }elseif(Auth::guard('teach')->attempt($request->only(['email', 'password']))){
            return to_route('teacher.dash');

       }else{
            return to_route('auth_manager_form')->with('ms' , 'Email Or Password Is Not Valid');
       }
    }

    public function logout(){


        Auth::guard('manage')->logout();
        Auth::guard('teach')->logout();

        return to_route('auth_manager_form');
    }



}
