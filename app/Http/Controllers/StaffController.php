<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Teacher;
use App\Models\Groups;
use App\Models\PupilData;
use App\Models\Subject;
use App\Models\TeacherHasPupil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{

    function index()
    {
        $staff = User::where('role_id', '!=', 5)->where('course_id', Auth::id())->get();
        return view('admin.staff', ['staff' => $staff, 'subjects' => Subject::all()]);
    }

    function store(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:50|unique:users',
            'email' => 'required',
            'password' => 'required'
        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public/staff');
            $path = 'storage/staff/' . $req->file('photo')->hashName();
        }

        $user = User::create([
            'course_id' => Auth::id(),
            'role_id' => (int) $req->role,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'photo' => $path,
            'password' => Hash::make($validate['password'])
        ]);
        if ($req->subject != 0) {
            $user->update([
                'subject_id' => $req->subject
            ]);
        }

        $fileContent = "Login: {$validate['name']}\nPass: {$validate['password']}";

        // Generate a unique filename
        $filename = 'staff_credentials_' . time() . '.txt';

        // Store the content in the storage
        Storage::put($filename, $fileContent);

        // Download the file
        return response()->download(storage_path("app/{$filename}"))->deleteFileAfterSend(true);
    }

    function pupil($id)
    {
        $pupil = User::select('users.*')
            ->leftJoin('pupil_data', 'users.id', 'pupil_data.user_id')
            ->where('pupil_data.group_id', $id)
            ->get();

        return view('teacher.pupil', ['pupil' => $pupil, 'group_id' => $id]);
    }
    function save_pupil(Request $req)
    {
        $courseId = auth()->user()->course_id;

        $validate = $req->validate([
            'name' => 'required|max:50|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public/pupil');
            $path = 'storage/pupil/' . $req->file('photo')->hashName();
        }

        $user = User::create([
            'course_id' => $courseId,
            'role_id' => 5,
            'name' => $validate['name'],
            'email' => $validate['email'],
            'photo' => $path,
            'password' => Hash::make($validate['password'])
        ]);

        PupilData::create([
            'user_id' => $user->id,
            'group_id' => $req->group_id,
            'last_name' => $req->last_name,
            'first_name' => $req->first_name,
            'birth_date' => $req->birth_date,
            'address' => $req->address,
            'phone' => $req->phone,
            'father_name' => $req->father_name,
            'father_phone' => $req->father_phone,
            'mother_name' => $req->mother_name,
            'mother_phone' => $req->mother_phone,
        ]);


        DB::table('teacher_has_pupil')->insert(array(
            'teacher_id' => Auth::id(),
            'pupil_id' => $user->id
        ));

        $fileContent = "Login: {$validate['name']}\nPass: {$validate['password']}";

        // Generate a unique filename
        $filename = 'pupil_credentials_' . time() . '.txt';

        // Store the content in the storage
        Storage::put($filename, $fileContent);

        // Download the file
        return response()->download(storage_path("app/{$filename}"))->deleteFileAfterSend(true);
    }





    function edit_staff($id)
    {
        $staff = User::where('id', $id)->first();
        return view('admin/edit_staff', ['staff' => $staff]);
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
            'name' => $validate['name'],
            'email' => $validate['email']
        ]);

        if ($req->password != '') {
            User::find($id)->update([
                'password' => Hash::make($req->password)
            ]);
        }

        if ($req->role) {
            User::find($id)->update([
                'role_id' => (int) $req->role,
            ]);
        }

        return back()->with('success', 'Данные изменены ');
    }


    function groups()
    {
        return view('teacher.groups', ['groups' => Groups::all()]);
    }




    // public function edit_staff(Request $request, $id) {
    //     // Find the staff member by ID
    //     $staff = User::find($id);

    //     // Check if the staff member exists
    //     if (!$staff) {
    //         // Handle the case where the staff member is not found, e.g., redirect or show an error
    //     }

    //     // Pass the staff member to the view
    //     return view('admin/edit_staff', compact('staff'));
    // }

    function system_admin_staff($id)
    {

        return view(
            'system.admin_staffs',
            [
                'staffs' => User::where('course_id', $id)->get(),
                'user' => User::find($id)
            ]
        );
    }


    function change_block_status(Request $req)
    {

        User::find($req->admin)->update([
            'is_blocked' => $req->type
        ]);


        return response()->json(['data' => User::where('role_id', 2)->with('role')->get()]);
    }

    function create_group(Request $req)
    {
        $days = [];
        if ($req->days) {
            foreach ($req->days as $key => $value) {
                $days[] = $value;
            }
        }


        Groups::create([
            'teacher_id' => Auth::id(),
            'name' => $req->name,
            'days' => $days ? json_encode($days, true) : null,
            'start_time' => $req->subject_start,
            'end_time' => $req->subject_end,
            'price' => $req->price,
            'start_group' => $req->group_start,
            'end_group' => $req->group_end
        ]);

        return back()->with('success', 'Group Created Successfully');
    }




    function delete_pupil($id)
    {
        User::where('id', '=', $id)->first()->delete();

        PupilData::where('user_id', '=', $id)->first()->delete();

        TeacherHasPupil::where('pupil_id', '=', $id)->first()->delete();

        return back();
    }



    function edit_pupil($id)
    {
        $pupil = User::find($id);
        return view('teacher.edit_pupil', ['pupil' => $pupil]);
    }



    function edit_save_pupil($id, Request $req)
    {
        $courseId = auth()->user()->course_id;

        $path = '';


        if ($req->file('photo')) {
            $req->file('photo')->store('public/teacher');
            $path = 'storage/teacher/' . $req->file('photo')->hashName();
            User::find($id)->update([
                'photo' => $path,
            ]);
        }


        User::find($id)->update([
            'course_id' => $courseId,
            'role_id' => 5,
            'name' => $req['name'],
            'email' => $req['email'],
        ]);

        if ($req->password != '') {
            User::find($id)->update([
                'password' => Hash::make($req->password)
            ]);
        }

        PupilData::where('user_id', $id)->update([
            'user_id' => $req->id,
            'last_name' => $req->last_name,
            'first_name' => $req->first_name,
            'birth_date' => $req->birth_date,
            'address' => $req->address,
            'phone' => $req->phone,
            'father_name' => $req->father_name,
            'father_phone' => $req->father_phone,
            'mother_name' => $req->mother_name,
            'mother_phone' => $req->mother_phone,
        ]);

        $fileContent = "Login: {$req->name}\nPass: {$req->password}";

        // Generate a unique filename
        $filename = 'pupil_credentials_' . time() . '.txt';

        // Store the content in the storage
        Storage::put($filename, $fileContent);

        // Download the file
        return response()->download(storage_path("app/{$filename}"))->deleteFileAfterSend(true);
    }

    function get_pupil($id)
    {
        $mas = [
            'user' => User::find($id),
            'pupil_data' => User::find($id)->get_pupil
        ];

        return response()->json(['data' => $mas]);
    }
}
