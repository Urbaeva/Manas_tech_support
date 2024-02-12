<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Service\FileRequest;
use App\Http\Requests\Admin\Service\ImageRequest;
use App\Http\Requests\Admin\Service\VideoRequest;
use App\Models\File;
use App\Models\Image;
use App\Models\Service;
use App\Models\Video;
use App\Services\ActionService;

class ActionController extends Controller
{
    private ActionService $actionService;

    public function __construct(ActionService $actionService)
    {
        $this->actionService = $actionService;
    }

    public function addVideo(VideoRequest $request, Service $service)
    {
        $data = $request->validated();
        $result = $this->actionService->addVideo($data, $service->id);
        return redirect()->back()->with(['notification' => $result['notification']]);

    }

    public function addImage(ImageRequest $request, Service $service)
    {
        $data = $request->validated();
        $result = $this->actionService->addImage($data, $service->id);
        return redirect()->back()->with(['notification' => $result['notification']]);
    }

    public function addFile(FileRequest $request, Service $service)
    {
        $data = $request->validated();
        $result = $this->actionService->addFile($data, $service->id);
        return redirect()->back()->with(['notification' => $result['notification']]);
    }

    public function getVideo(Video $video)
    {
        $result = $this->actionService->getVideo($video);
        return $result;
    }

    public function deleteVideo(Video $video)
    {
        $video->delete();
        return redirect()->back()->with(['notification' => 'Video deleted successfully!']);
    }

    public function deleteImage(Image $image)
    {
        $image->delete();
        return redirect()->back()->with(['notification' => 'Image deleted successfully!']);
    }

    public function deleteFile(File $file)
    {
        try {
            $file->delete();
            return redirect()->back()->with(['notification' => 'File deleted successfully!']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete file. Please try again.']);
        }
    }
}
