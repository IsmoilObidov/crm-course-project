<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
