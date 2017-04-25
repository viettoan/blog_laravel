<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AddUserController extends Controller
{
    public function index()                                
    {
        $users=User::paginate(2);

        return view('admin.index', compact('users'));
      
    }

    public function create()
    {
        return view('admin.add-user');
    }

    public function store(Request $request)
    {

        $user = new User;
        $email=$user::where('email',$request->email)->first();

        if(empty($email->email)){
            $user->name = $request->name;
            $user->email= $request->email;
            $user->password = bcrypt($request->password);
            $user->level = $request->level;
            //upload file
            $file = $request->file('avatar');
            $filename = $file -> getClientOriginalName('avatar');
            $path = $file->move('images', $filename);
            $user -> avatar = $path;


            if($user->save())
                $message="Insert thanh cong";
            else
                $message="Insert that bai";
            return view('admin.add-user', ['message' =>$message, 'avatar' => $path]);
        }
        else{
            return view('admin.add-user',['email'=>'Email bi trung']);
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $user->password = $user->password;

        return view('admin.edit', compact('user') );
    }

    public function update($id, Request $request)
    {



        $user = new User;
        $email=$user::where('email',$request->email)->first();

        if(empty($email->email)) {
            //upload file
            if($request->hasFile('avatar')){
                $file = $request->file('avatar');
                $filename = $file -> getClientOriginalName('avatar');
                $path = $file->move('images', $filename);
            }

            $user = User::where('id', $id)
                        ->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => bcrypt($request->password),
                            'level' => $request->level,
                            'avatar' => $path,
                        ]);

            if($user)
                $message="Update thanh cong";
            else
                $message="Update that bai";
            return view('admin.add-user', ['message' =>$message, 'avatar' => $path]);
        }
        else{
            return view('admin.add-user',['email'=>'Email bi trung']);
        }
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            $output="";
            $keyword=$request->search;
            $users=User::where('name', 'like', "%$keyword%")->get();

            if($users){
                foreach ($users as $key => $user) {
                    $output.='<li>'.$user->name.'</li>';
                }
                return response($output);
            }
            
            
        }
    }

}
