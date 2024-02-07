<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Category\StoreRequest;
use App\Http\Requests\Personal\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = $user->department ? $user->department->categories : [];
        return view('personal.category.index', compact('categories'));
    }

    public function create()
    {
        return view('personal.category.create');
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['department_id'] = $user->department->id;
            Category::create($data);
            DB::commit();
            return redirect()->route('personal.category.index');
        } catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function show(Category $category)
    {
        return view('personal.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('personal.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('personal.category.index');
    }


    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('personal.category.index');
    }


    public function departments()
    {
        $departments = Department::all();
        return view('personal.department.index', compact('departments'));
    }
}
