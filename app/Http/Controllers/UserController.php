<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function getUser()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $request->password = bcrypt($request->password);
        User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $request->password = bcrypt($request->password);
            $user->password = $request->password;
        }
        $user->save();
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
    }
}
