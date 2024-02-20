<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function showVideo(Video $video)
    {

    }
    public function getVideoStatistics(Video $video)
    {
        $sixMonthsAgo = now()->subMonths(6);

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
            ->where('videos.id', '=', $video->id)
            ->get();
        $months = [];
        $viewsCounts = [];

        for ($i = 1; $i <= 6; $i++) {
            $month = Carbon::now()->subMonths(6)->addMonths($i)->format('m');
            $months[] = $month;

            $viewsCount = $viewsByMonth->firstWhere('month', $month);
            $viewsCounts[] = $viewsCount ? $viewsCount->views_count : 0;
        }
        return response()->json([
            'months' => $months,
            'viewsCounts' => $viewsCounts,
        ]);
    }
}
