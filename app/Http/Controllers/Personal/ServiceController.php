<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

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
        try {
            $data = $request->validated();
            if (isset($data['logo'])) {
                $data['logo'] = Storage::disk('public')->put('/logos', $data['logo']);
            }
            $service->update($data);
            return redirect()->route('personal.service.index')->with(['notification' => 'Service updated!']);
        } catch (Exception $exception){
            return redirect()->back()->with(['notification' => $exception->getMessage()]);
        }

    }


    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('personal.service.index');
    }

}
