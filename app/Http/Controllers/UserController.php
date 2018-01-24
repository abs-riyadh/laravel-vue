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
    public function create()
    {
        //
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

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($request->has('password')) {
            $request->password = bcrypt($request->password);
        }
        User::update($request->all());
        //
    }
    public function destroy($id)
    {
        User::where('id',$id)->delete();
    }
}
