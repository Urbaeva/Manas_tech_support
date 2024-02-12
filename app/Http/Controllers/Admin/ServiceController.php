<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreRequest;
use App\Http\Requests\Admin\Service\UpdateRequest;
use App\Models\Category;
use App\Models\Service;
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
        $data['logo'] = Storage::disk('public')->put('/logos', $data['logo']);
        $service->update($data);
        return redirect()->route('admin.service.index')->with(['notification' => $data['title'] . ' updated successfully!']);
    }

    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')->with(['notification' => $service['title'] . 'deleted!']);
    }

}
