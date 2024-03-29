<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department\StoreRequest;
use App\Http\Requests\Admin\Department\UpdateRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Department::create($data);
        return redirect()->route('admin.department.index');
    }

    public function show(Department $department)
    {
        return view('admin.department.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    public function update(UpdateRequest $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);
        return redirect()->route('admin.department.index');
    }


    public function delete(Department $department)
    {
        if (count($department->categories) > 0) {
            return redirect()->back()->with(['notification' => 'You cannot delete the department, because you have categories related to this department']);
        }
        $department->delete();
        return redirect()->route('admin.department.index')->with(['notification' => 'Department deleted!']);
    }
}
