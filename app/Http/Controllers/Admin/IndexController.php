<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $data  = [];
        $data['total_views'] = Video::sum('views');
        $data['total_users'] = User::count();
        $data['total_videos'] = Video::count();
        $top_watched_videos = Video::orderByDesc('views')->take(5)->get();
        return view('admin.index', compact('data', 'top_watched_videos'));
    }

    public function statistic()
    {
        $videos = Video::orderBy('views', 'desc')->get();
        return view('admin.statistic.index', ['videos' => $videos]);
    }

    public function showVideo(Video $video)
    {
        return view('admin.service.video', compact('video'));
    }

    public function getVideoStatistics(Request $request)
    {
        $video = $request->validate([
            'video_id' => 'required',
        ]);

        $video = $video['video_id'];

        $viewsByMonth = DB::table('videos')
            ->leftJoin('video_views', function ($join) {
                $join->on('videos.id', '=', 'video_views.video_id')
                    ->where('video_views.created_at', '>=', now()->subMonths(6));
            })
            ->select(
                DB::raw('MONTH(video_views.created_at) as month'),
                DB::raw('COUNT(video_views.id) as views_count')
            )
            ->groupBy('month')
            ->where('videos.id', '=', $video)
            ->get();
        $months = [];
        $viewsCounts = [];

        for ($i = 1; $i <= 6; $i++) {
            $month = Carbon::now()->subMonths(6)->addMonths($i)->format('m');
            $months[] = $month;

            $viewsCount = $viewsByMonth->firstWhere('month', $month);
            $viewsCounts[] = $viewsCount ? $viewsCount->views_count : 0;
        }
        return response()->json(["data" => [
            'months' => $months,
            'viewsCounts' => $viewsCounts,
        ]]);
    }
}
