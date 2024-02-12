<?php

namespace App\Services;

use App\Models\File;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActionService
{
    public function getVideo(Video $video)
    {
        $video_path = public_path('storage/'.$video->video);
        if (file_exists($video_path)) {
            // Return the video file as a response
            return response()->file($video_path, [
                'Content-Type' => 'video/mp4',
            ]);
        } else {
            // Handle the case where the video file doesn't exist
            return response()->json(['error' => 'Video not found'], 404);
        }
    }

    public function addVideo(array $data, $serviceId)
    {
        try {
            DB::beginTransaction();
            $data['service_id'] = $serviceId;
            $data['video'] = Storage::disk('public')->put('/videos', $data['video']);
            if (isset($data['video_tr'])) {
                $data['video_tr'] = Storage::disk('public')->put('/videos', $data['video_tr']);
            }
            Video::create($data);
            DB::commit();
            return ['notification' => 'Video successfully added!'];
        } catch (\Exception $exception) {
            DB::rollBack();
            return ['notification' => $exception->getMessage()];
        }
    }


    public function addImage($data, $serviceId)
    {
        $data['service_id'] = $serviceId;
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Image::create($data);
        return ['notification' => 'Image successfully added!'];
    }

    public function addFile($data, $serviceId)
    {
        $data['service_id'] = $serviceId;
        $data['file'] = Storage::disk('public')->put('/files', $data['file']);
        if (isset($data['file_tr'])) {
            $data['file_tr'] = Storage::disk('public')->put('/files', $data['file_tr']);
        }
        File::create($data);
        return ['notification' => 'File successfully added!'];
    }
}
