<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AddUserController extends Controller
{
    public function index(){

    }
    public function create(){
        return view('admin.add-user');
    }

    public function store(Request $request){

        $user = new User;

        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        if($user->save())
            $message="Insert thanh cong";
        else
            $message="Insert that bai";


        return view('admin.add-user', ['message' => $message]);
        
    }
}
