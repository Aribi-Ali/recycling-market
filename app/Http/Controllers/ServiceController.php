<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // Display listing of services
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    // Show service creation form
    public function create()
    {
        return view('services.create');
    }

    // Store new service
    public function store(StoreServiceRequest $request) 
    {
        // dd ($request->all());
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/services');
            $data['image'] = Storage::url($path);
        }

        Service::create($data);

        return redirect()->route('services.index')
            ->with('success', __('messages.services.created'));
    }

    // Display single service
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    // Show service edit form
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Update service
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::delete(parse_url($service->image, PHP_URL_PATH));
            }

            $path = $request->file('image')->store('public/services');
            $data['image'] = Storage::url($path);
        }

        $service->update($data);

        return redirect()->route('services.index')
            ->with('success', __('messages.services.updated'));
    }

    // Delete service
    public function destroy(Service $service)
    {
        // Delete associated image
        if ($service->image) {
            Storage::delete(parse_url($service->image, PHP_URL_PATH));
        }

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', __('messages.services.deleted'));
    }
}