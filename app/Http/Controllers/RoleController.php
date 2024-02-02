<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public $url;

    public function redirectToUserLevel()
    {

        if (Auth::user()->role->name == 'SYSTEM') {
            $this->url = 'system/';
        } else if (Auth::user()->role->name == 'admin') {
            $this->url = 'admin/';
        } else if (Auth::user()->role->name == 'registrator') {
            $this->url = 'registrator/';
        } else if (Auth::user()->role->name == 'teacher') {
            $this->url = 'teacher/';
        } else if (Auth::user()->role->name == 'pupil') {
            $this->url = 'pupil/';
        } 

        return $this->url;
    }

    public function isSYSTEM()
    {
        if (Auth::user()->role->name == 'SYSTEM') {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin()
    {
        if (Auth::user()->role->name == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function isRegistrator()
    {
        if (Auth::user()->role->name == 'registrator') {
            return true;
        } else {
            return false;
        }
    }

    public function isTeacher()
    {
        if (Auth::user()->role->name == 'teacher') {
            return true;
        } else {
            return false;
        }
    }

    public function isPupil()
    {
        if (Auth::user()->role->name == 'pupil') {
            return true;
        } else {
            return false;
        }
    }
}
