<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\FileRequest;
use App\Http\Requests\Admin\Service\ImageRequest;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Http\Requests\Admin\Service\VideoRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Image;
use App\Models\Service;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.service.create', compact('categories'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = Storage::disk('public')->put('/logos', $data['logo']);
        Service::create($data);
        return redirect()->route('admin.service.index')->with(['notification' => 'Service created successfully!']);
    }

    public function show(Service $service)
    {
        $categories = Category::all();
        return view('admin.service.show', compact('service', 'categories'));
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.service.edit', compact('service', 'categories'));
    }

    public function update(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);
        return redirect()->route('admin.service.index')->with(['notification' => $data['title'].' updated successfully!']);
    }


    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with(['notification' => $service['title'].'deleted!']);
    }


    public function addVideo(VideoRequest $request, Service $service)
    {
        $data = $request->validated();
        try {
            $data['service_id'] = $service->id;
            $data['video'] = Storage::disk('public')->put('/videos', $data['video']);
            if (isset($data['video_tr'])) {
                $data['video_tr'] = Storage::disk('public')->put('/videos', $data['video_tr']);
            }
            Video::create($data);
            return redirect()->route('admin.service.show', $service->id)->with(['notification' => 'Video successfully added!']);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => 'Failed to add video. Please try again.']);
        }
    }

    public function addImage(ImageRequest $request, Service $service)
    {
        $data = $request->validated();
        $data['service_id'] = $service->id;
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Image::create($data);
        return redirect()->route('admin.service.show', $service->id)->with(['notification' => 'Image successfully added!']);
    }

    public function addFile(FileRequest $request, Service $service)
    {
        $data = $request->validated();
        $data['service_id'] = $service->id;
        $data['file'] = Storage::disk('public')->put('/files', $data['file']);
        if (isset($data['file_tr'])) {
            $data['file_tr'] = Storage::disk('public')->put('/files', $data['file_tr']);
        }
        File::create($data);
        return redirect()->route('admin.service.show', $service->id)->with(['notification' => 'File successfully added!']);
    }

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

    public function deleteVideo(Video $video)
    {
        $video->delete();
        return redirect()->route('admin.service.show', $video->service->id)->with(['notification' => 'Video deleted successfully!']);
    }

    public function deleteImage(Image $image)
    {
        $image->delete();
        return redirect()->route('admin.service.show', $image->service->id)->with(['notification' => 'Image deleted successfully!']);
    }

    public function deleteFile(File $file)
    {
        try {
            $serviceId = $file->service->id;
            $file->delete();
            return redirect()->route('admin.service.show', $serviceId)->with(['notification' => 'File deleted successfully!']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete file. Please try again.']);
        }
    }
}
