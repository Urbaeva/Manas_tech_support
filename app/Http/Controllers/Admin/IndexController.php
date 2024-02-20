<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function statistic()
    {
        $videos = Video::orderBy('views', 'desc')->get();
        return view('admin.statistic.index', ['videos' => $videos]);
    }

    public function getVideoStatistics(Video $video)
    {
        $video = Video::findOrFail($video->id);

        $data = [
            'views' => $video->views,
            // Add more statistics fields as needed
        ];

        return response()->json($data);
    }
}
