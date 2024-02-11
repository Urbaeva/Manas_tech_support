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
        return view('user.index', compact('departments', 'services'));
    }

    public function department(Department $department)
    {
        return view('user.department', compact('department'));
    }

    public function category(Category $category)
    {
        return view('user.category', compact('category'));
    }

    public function service(Service $service)
    {
        return view('user.service', compact('service'));
    }

    public function getVideo(Video $video)
    {
        $video_path = public_path('storage/'.$video->video);
        if (file_exists($video_path)) {
            return response()->file($video_path, [
                'Content-Type' => 'video/mp4'
            ]);
        } else {
            return response()->json(['error' => 'Video not found'], 404);
        }
    }
}
