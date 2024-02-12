<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Service;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $services = Service::all();
        $all_videos = Video::all();
        return view('user.index', compact('departments', 'services', 'all_videos'));
    }

    public function department(Department $department)
    {
        $categories = $department->categories;
        $services = [];
        foreach ($categories as $category){
            $services[] = $category->services;
        }
        $services = collect($services)->flatten();
        return view('user.department', compact('department', 'services'));
    }

    public function category(Category $category)
    {
        return view('user.category', compact('category'));
    }

    public function service(Service $service)
    {
        $categories = Category::all();
        return view('user.service', compact('service', 'categories'));
    }

    public function video(Video $video)
    {
        $category = $video->service->category;
        return view('user.video', compact('video', 'category'));
    }
}
