<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('schedules')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->select('id', 'student_id', 'subject_id', 'schedule_type','hari','jam_mulai','jam_selesai','ruangan','kode_absensi','tahun_akademik','semester','created_by','update_by','delete_by', DB::raw('DATE_FORMAT(created_at, "%d %M %Y")
             as created_at',))
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('pages.Schedule.index', compact('users'));
    }

    public function create()
    {
        return view('pages.Schedule.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'handphone' => $request['handphone'],
            'address' => $request['address'],
        ]);

        return redirect(route('Schedule.index'))->with('success', 'data berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('pages.Schedule.edit')->with('user', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $user)
    {
        $validate = $request->validated();
        $user->update($validate);
        return redirect()->route('Schedule.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Schedule.index')->with('success', 'Delete User Successfully');
    }
}


