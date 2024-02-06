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
            'finish_billing' => 'required'

        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public/admin');
            $path = 'storage/admin/' . $req->file('photo')->hashName();
        }

        $user = User::create([
            'role_id' => 2,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'photo' => $path,
            'password' => Hash::make($validate['password'])
        ]);

        AdminData::create([
            'user_id' => $user->id,
            'adress' => $validate['adress'],
            'number' => $validate['number'],
            'instagram' => $req->instagram,
            'telegram' => $req->telegram,
            'bill' => $validate['bill'],
            'finish_billing' => $validate['finish_billing']
        ]);

        $fileContent = "Login: {$validate['name']}\nPass: {$validate['password']}";

        $filename = 'admin_credentials_' . time() . '.txt';

        Storage::put($filename, $fileContent);

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
            'email' => 'required'
        ]);

        $user = User::find($id);

        if ($req->file('photo')) {
            $req->file('photo')->store('public/admin');
            $path = 'storage/admin/' . $req->file('photo')->hashName();
            $user->update([
                'photo' => $path,
            ]);
        }

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email']
        ]);

        if ($req->password != '') {
            $user->update([
                'password' => Hash::make($req->password)
            ]);
        }


        $user->get_admin->update([
            'adress' => $req->address,
            'number' => $req->number,
            'instagram' => $req->instagram,
            'telegram' => $req->telegram,
            'bill' => $req->bill,
            'finish_billing' => $req->finish_billing,
        ]);


        return redirect()->route('admins');
    }
}
