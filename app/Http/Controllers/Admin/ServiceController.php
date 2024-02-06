<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\FileRequest;
use App\Http\Requests\Service\ImageRequest;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Http\Requests\Service\VideoRequest;
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
        return redirect()->route('admin.service.index');
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
        return redirect()->route('admin.service.index');
    }


    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index');
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
}
