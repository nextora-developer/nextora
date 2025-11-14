<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderByDesc('created_at')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description'       => ['nullable', 'string'],
            'is_active'         => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('ok', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description'       => ['nullable', 'string'],
            'is_active'         => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('ok', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('ok', 'Service deleted.');
    }
}
