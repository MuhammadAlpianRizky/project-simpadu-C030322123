<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('subjects')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->select('id','title','lecturer_id', DB::raw('DATE_FORMAT(created_at, "%d %M %Y")
             as created_at',))
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('pages.subject.index', compact('users'));
    }

    public function create()
    {
        return view('pages.subject.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles'],
            'handphone' => $request['handphone'],
            'address' => $request['address'],
        ]);

        return redirect(route('subject.index'))->with('success', 'data berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('pages.subject.edit')->with('user', $user);
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
    public function update(UpdateSubjectRequest $request, Subject $user)
    {
        $validate = $request->validated();
        $user->update($validate);
        return redirect()->route('subject.index')->with('success', 'Edit User Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Subject.index')->with('success', 'Delete User Successfully');
    }
}


