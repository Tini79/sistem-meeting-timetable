<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();

        return view('/user.index', [
            'title' => 'Meeting Timetable | User',
            'users' => $user
        ]);
    }

    public function edit(User $datauser)
    {
        return view('user/edit', [
            'title' => 'Meeting Timetable | User',
            'user' => $datauser
        ]);
    }

    public function update(Request $req, User $datauser)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if ($req->username != $datauser->username)
            $req->validate(['username' => 'required']);

        $req->password = bcrypt($req->password);

        $datauser->update([
            'username' => $req->username,
            'password' => $req->password
        ]);

        return redirect('/tools/user/datauser');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/tools/user/datauser');
    }
}
