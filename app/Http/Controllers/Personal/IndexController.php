<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Video;


class IndexController extends Controller
{
    public function index()
    {
        $data  = [];
        $departmentId = auth()->user()->department->id;
        $data['total_views'] = Video::whereHas('service.category.department', function ($query) use ($departmentId) {
            $query->where('id', $departmentId);
        })->sum('views');


        $data['total_videos'] = Video::whereHas('service.category.department', function ($query) use ($departmentId) {
            $query->where('id', $departmentId);
        })->count();

        $top_watched_videos = Video::whereHas('service.category.department', function ($query) use ($departmentId) {
            $query->where('id', $departmentId);
        })->orderByDesc('views')->take(5)->get();

        return view('personal.index', compact('data', 'top_watched_videos'));
    }
}
