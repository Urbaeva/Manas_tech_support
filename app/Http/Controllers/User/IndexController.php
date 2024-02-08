<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $categories = Category::all();
        return view('user.index', compact('departments', 'categories'));
    }

    public function department(Department $department)
    {
        $categories = $department->categories();
        return view('user.department', compact('department'));
    }

    public function category(Category $category)
    {
        //return view('user.')
    }
}
