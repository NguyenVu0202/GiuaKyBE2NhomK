<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CrudUserController extends Controller
{
    public function indexCreate()
    {
        return view('crud_user.create');
    }

    public function createUser(Request $request)
    {                                   

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone_image' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('phone_image'))
        {
            $file = $request->file('phone_image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/userimage/',$filename);
            $data['phone_image'] = $filename;

        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
            'phone_image' => $data['phone_image'],      
        ]);

        return redirect()->route('user.createUserIndex');
    }

    public function indexLogin()
    {
        return view('crud_user.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function indexList()
    {
        return view('crud_user.list');
    }
}
