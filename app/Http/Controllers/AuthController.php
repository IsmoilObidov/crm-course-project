<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $fl;

    public function __construct(RoleController $fl)
    {
        $this->fl = $fl;
    }


    function login(Request $req)
    {
        $data = $req->only('name', 'password');

        $user = User::where('name', $data['name'])->first();
        if ($user && $user->is_blocked == 1) {
            return redirect()->route('login')->with('error', 'Ваш аккаунт заблокирован. Пожалуйста, свяжитесь со службой поддержки.');
        }
        if (Auth::attempt($data)) {

            $req->session()->regenerate();

            return redirect($this->fl->redirectToUserLevel());
        }

        return redirect()->route('login');
    }


    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



    // function save_account()
    // {
    //     return view('/save_account', 'new_account');

    // }


}
