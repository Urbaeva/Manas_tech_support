<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function create(Department $department)
    {
        return view('admin.department.create', compact('department'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Department::create($request);
        return redirect()->route('admin.department.index');
    }

    public function show(Department $department)
    {
        return view('admin.department.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit');
    }

    public function update(UpdateRequest $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);
        return redirect()->route('admin.department.show');
    }


    public function delete(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.department.index');
    }
}
