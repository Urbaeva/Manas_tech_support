<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Department;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.category.create', compact( 'departments'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $departments = Department::all();
        return view('admin.category.edit', compact('category', 'departments'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.index');
    }


    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
