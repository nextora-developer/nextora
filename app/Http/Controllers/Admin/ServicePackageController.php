<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ServicePackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Service $service)
    {
        return view('admin.service_packages.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Store new package
    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'display_label' => 'nullable|string|max:255',
            'price_from'    => 'nullable|numeric|min:0',
            'description'   => 'nullable|string',
            'highlight_tag' => 'nullable|string|max:50',
            'status'        => 'required|in:active,inactive',
            'sort_order'    => 'nullable|integer|min:0',
        ]);

        $data['service_id'] = $service->id;
        if (! isset($data['sort_order'])) {
            $data['sort_order'] = 0;
        }

        ServicePackage::create($data);

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('ok', 'Package added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show edit form
    public function edit(Service $service, ServicePackage $package)
    {
        return view('admin.service_packages.edit', compact('service', 'package'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Update package
    public function update(Request $request, Service $service, ServicePackage $package)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'display_label' => 'nullable|string|max:255',
            'price_from'    => 'nullable|numeric|min:0',
            'description'   => 'nullable|string',
            'highlight_tag' => 'nullable|string|max:50',
            'status'        => 'required|in:active,inactive',
            'sort_order'    => 'nullable|integer|min:0',
        ]);

        if (! isset($data['sort_order'])) {
            $data['sort_order'] = $package->sort_order ?? 0;
        }

        $package->update($data);

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('ok', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Delete package
    public function destroy(Service $service, ServicePackage $package)
    {
        $package->delete();

        return redirect()
            ->route('admin.services.edit', $service)
            ->with('ok', 'Package deleted.');
    }
}
