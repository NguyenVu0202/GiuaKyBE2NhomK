<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'phone' => 'required|max:10',
            'image' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/userimage/',$filename);
            $data['image'] = $filename;

        }

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image' => $data['image'],      
        ]);

        return redirect()->route('user.createUserIndex');
    }

    public function listUser()
    {
            $users = User::all();
            return view('crud_user.list',['users' => $users]);
    }

    public function UpdateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update',['user' => $user]);
    }

    public function PostUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|max:10',
            'image' => 'required'
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->phone = $input['phone'];

        if($request->hasFile('image'))
        {
            //Xoa ảnh cũ
            $image_cu = 'uploads/userimage/' . $user->image;
            if(File::exists($image_cu))
            {
                File::delete($image_cu);
            }
            //xử lý ảnh mới
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/userimage/',$filename);
            $user['image'] = $filename;
        }
        
        $user->save();
        return redirect('list');

    }

    // Delete user by id
    public function deleteUser(Request $request)
    {
        $user_id =$request->get('id');
        $user = User::destroy($user_id);
        return redirect("list")->withSuccess('You have Signed-in');
    }
}
