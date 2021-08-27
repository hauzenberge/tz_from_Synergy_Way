<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Country;
use App\Roles;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        return view('user.profile',[
            'user' => $user,
            'country' => Country::find($user->country_id),
            'countries' => Country::where('id', '!=', $user->country_id)->get(),
            'user_role' => Roles::find($user->roles_id),
            'roles' => Roles::where('id', '!=', $user->roles_id)->get(),
        ]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->country_id = $request->input('country_id');
        $user->roles_id = $request->input('role_id');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = $request->input('password');
        }
        $user->save();

        return redirect('/user/profile/'.$id);
    }
    public function add()
    {
        return view('user.add',[
            'roles' => Roles::all(),
            'countries' => Country::all(),
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->country_id = $request->input('country_id');
        $user->roles_id = $request->input('role_id');
        $user->email = $request->input('email');
        if ($request->input('password') != null) {
            $user->password = $request->input('password');
        }
        $user->save();

        return redirect('/home');
    }
}
