<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function view_subjects()
    {
        return view('admin.subjects', ['subjects' => Subject::all()]);
    }
}
