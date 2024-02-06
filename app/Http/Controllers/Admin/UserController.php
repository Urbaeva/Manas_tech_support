<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Department;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        $roles = User::getRoles();
        return view('admin.user.create', compact( 'roles', 'departments'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', compact('user'));
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
