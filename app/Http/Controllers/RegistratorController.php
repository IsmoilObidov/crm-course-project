<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistratorController extends Controller
{
    function index()
    {
        return view("registrator.dashboard");
    }

    function view_teachers()
    {
        $teachers = User::where('course_id', Auth::user()->course_id)->where('role_id', 4)->get();
        $subjects = Subject::all();
        return view('registrator.teachers', ['teachers' => $teachers, 'subjects' => $subjects]);
    }


    function edit_staff($id)
    {
        $staff = User::where('id', $id)->first();
        $subjects = Subject::all();
        return view('registrator.edit_teachers', ['staff' => $staff, 'subjects' => $subjects]);
    }


    function edit_save_create($id, Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($req->file('photo')) {
            $req->file('photo')->store('public/staff');
            $path = 'storage/staff/' . $req->file('photo')->hashName();
            User::find($id)->update([
                'photo' => $path,
            ]);
        }


        User::find($id)->update([
            'role_id' => (int) $req->role,
            'subject_id' => $req->subject,
            'name' => $validate['name'],
            'email' => $validate['email'],
        ]);

        if ($req->password != '') {
            User::find($id)->update([
                'password' => Hash::make($req->password)
            ]);
        }

        return back()->with('success', 'Данные изменены');
    }
}
