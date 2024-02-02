<?php

namespace App\Http\Controllers;

use App\Models\AdminData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function create_admin(Request $req)
    {

        $validate = $req->validate([
            'name' => 'required|max:50|unique:users',
            'email' => 'required',
            'password' => 'required',
            'bill' => 'required',
            'adress' => 'required',
            'number' => 'required|max:50',
            'finish_billing' =>'required'

        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public/admin');
            $path = 'storage/admin/' . $req->file('photo')->hashName();
        }

      $user=User::create([
            'role_id' => 2,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'photo' => $path,
            'password' => Hash::make($validate['password'])
        ]);
        AdminData::create([
            'adress' => $validate['adress'],
            'number' => $validate['number'],
            'instagram' => $req->instagram,
            'telegram' => $req->telegram,
            'bill' => $validate['bill'],
            'finish_billing'=>$validate['finish_billing'],
            'user_id'=>$user->id
        ]);
        $fileContent = "Login: {$validate['name']}\nPass: {$validate['password']}";

        // Generate a unique filename
        $filename = 'admin_credentials_' . time() . '.txt';

        // Store the content in the storage
        Storage::put($filename, $fileContent);

        // Download the file
        return response()->download(storage_path("app/{$filename}"))->deleteFileAfterSend(true);
    }


    function edit_staff($id)
    {
        $staff = User::where('id', $id)->first();
        return view('system.edit_staff', ['staff' => $staff]);
    }



    function edit_save_create($id, Request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users'
        ]);
        if ($req->file('photo')) {
            $req->file('photo')->store('public/admin');
            $path = 'storage/admin/' . $req->file('photo')->hashName();
            User::find($id)->update([
                'photo' => $path,
            ]);
        }

        User::find($id)->update([
            'name' => $validate['name'],
            'email' => $validate['email']
        ]);

        if ($req->password != '') {
            User::find($id)->update([
                'password' => Hash::make($req->password)
            ]);
        }

        return redirect()->route('admins');
    }
}
