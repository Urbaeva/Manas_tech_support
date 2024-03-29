<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Service\FileRequest;
use App\Http\Requests\Admin\Service\ImageRequest;
use App\Http\Requests\Admin\Service\VideoRequest;
use App\Models\File;
use App\Models\Image;
use App\Models\Service;
use App\Models\Video;
use App\Models\VideoView;
use App\Services\ActionService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function getQrCode()
    {
        $targetUrl = 'http://127.0.0.1:8000/user/departments/service/video/12';
        $qrcode = QrCode::format('png')->size(200)->generate($targetUrl);
        $qr_name = Hash::make(Carbon::now().strval(rand(100,999)));
        $qr_name = str_replace('/', '', $qr_name);
        Storage::disk('public')->put('qrcodes/'.$qr_name.'.png', $qrcode);
        return view('home')->with('qrcode', $qrcode);
    }

    public function viewVideo(Video $video)
    {
        try {
            DB::beginTransaction();
            $video->update(['views' => $video->views + 1]);
            VideoView::create(['video_id' => $video->id]);
            DB::commit();
            return response(['result' => 'success']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response(['result' => $e->getMessage()])->setStatusCode($e->getCode());
        }
    }
}
