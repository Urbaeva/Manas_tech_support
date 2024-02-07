<?php

namespace App\Http\Controllers\Personal;

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $services = collect();
        $categories = collect();

        if ($user->department) {
            $categories = $user->department->categories;

            foreach ($categories as $category) {
                $services = $services->merge($category->services);
            }
        }
        return view('personal.service.index', compact('services'));
    }

    public function create()
    {
        $user = auth()->user();
        $categories = $user->department ? $user->department->categories : [];
        return view('personal.service.create', compact('categories'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = Storage::disk('public')->put('/logos', $data['logo']);
        Service::create($data);
        return redirect()->route('personal.service.index');
    }

    public function show(Service $service)
    {
        $user = auth()->user();
        $categories = $user->department ? $user->department->categories : [];
        return view('personal.service.show', compact('service', 'categories'));
    }

    public function edit(Service $service)
    {
        $user = auth()->user();
        $categories = $user->department ? $user->department->categories : [];
        return view('personal.service.edit', compact('service', 'categories'));
    }

    public function update(UpdateRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);
        return redirect()->route('personal.service.index');
    }


    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('personal.service.index');
    }


    public function addVideo(VideoRequest $request, Service $service)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['service_id'] = $service->id;
            $data['video'] = Storage::disk('public')->put('/videos', $data['video']);
            if (isset($data['video_tr'])) {
                $data['video_tr'] = Storage::disk('public')->put('/videos', $data['video_tr']);
            }
            Video::create($data);
            DB::commit();
            return redirect()->route('personal.service.show', $service->id)->with(['notification' => 'Video successfully added!']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to add video. Please try again.']);
        }
    }

    public function addImage(ImageRequest $request, Service $service)
    {
        $data = $request->validated();
        $data['service_id'] = $service->id;
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Image::create($data);
        return redirect()->route('personal.service.show', $service->id)->with(['notification' => 'Image successfully added!']);
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
        return redirect()->route('personal.service.show', $service->id)->with(['notification' => 'File successfully added!']);
    }
}
