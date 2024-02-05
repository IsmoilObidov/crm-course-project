<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\TeacherHasPupil;

class AdminController extends Controller
{
    function view_subjects()
    {
        return view('admin.subjects', ['subjects' => Subject::all()]);
    }

    function view_pupils($id)
    {
        $pupils = TeacherHasPupil::where('teacher_id', $id)->get();
        return view('admin/pupil', ['pupils' => $pupils]);
    }
}
