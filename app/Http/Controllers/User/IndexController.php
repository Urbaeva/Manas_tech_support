<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->validate(['search' => 'nullable']);

        $departments = Department::all();
        $services = Service::all();

        if(isset($search['search']))
        {
            $search = $search['search'];
            $popular_videos = Video::where(function ($queryBuilder) use ($search) {
                $queryBuilder->where('title', 'like', '%' . $search . '%')
                    ->orWhere('title_tr', 'like', '%' . $search . '%');
            })
                ->orWhereHas('service', function ($departmentQuery) use ($search) {
                    $departmentQuery->where('title', 'like', '%' . $search . '%')
                        ->orWhere('title_tr', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('description_tr', 'like', '%' . $search . '%');
                })
            ->paginate(8);
        }
        else{
            $popular_videos = Video::orderBy('views', 'desc')->paginate(8);
            $search = '';
        }

        return view('user.index', compact('departments', 'services', 'popular_videos', 'search'));
    }

    public function department(Department $department)
    {
        $categories = $department->categories;
        $services = [];
        foreach ($categories as $category) {
            $services[] = $category->services;
        }
        $services = collect($services)->flatten();
        return view('user.department', compact('department', 'services'));
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

    public function services()
    {
        $services = Service::all();
        return view('user.services', compact('services'));
    }

    public function contact()
    {
        return view('user.contact');
    }
}
