<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        // $query = Service::query();
        $query = Service::with('category'); // eager load category


        // search
        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Status filter
        if ($request->status === 'active') {
            $query->where('status', 'active');
        } elseif ($request->status === 'draft') {
            $query->where('status', 'draft');
        } elseif ($request->status === 'archived') {
            $query->where('status', 'archived');
        }

        // 🔥 Date range filter
        if ($request->filled('start_created')) {
            $query->where('created_at', '>=', $request->start_created);
        }
        if ($request->filled('end_created')) {
            $query->where('created_at', '<=', $request->end_created);
        }

        if ($request->filled('start_updated')) {
            $query->where('updated_at', '>=', $request->start_updated);
        }
        if ($request->filled('end_updated')) {
            $query->where('updated_at', '<=', $request->end_updated);
        }

        $services   = $query->latest()->paginate(10);
        $categories = ServiceCategory::orderBy('category_name')->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::where('is_active', 1)
            ->orderBy('category_name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'      => 'required|exists:service_categories,id',
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:services,slug',
            'short_summary'    => 'nullable|string',
            'long_description' => 'nullable|string',
            'starting_price'   => 'nullable|numeric|min:0',
            'show_on_website'  => 'nullable|boolean',
            'has_packages'     => 'nullable|boolean',
            'status'           => 'required|in:draft,active,archived',
            'sort_order'       => 'nullable|integer|min:0',
            'image'            => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        // Convert checkbox values
        $data['show_on_website'] = $request->boolean('show_on_website');
        $data['has_packages']    = $request->boolean('has_packages');

        // Auto-generate slug
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        //image path
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        // Default sort order
        if (! isset($data['sort_order'])) {
            $data['sort_order'] = 0;
        }

        $service = Service::create($data);

        if ($data['has_packages']) {
            return redirect()
                ->route('admin.services.edit', $service)
                ->with('ok', 'Service created. You can now add packages.');
        }
        return redirect()
            ->route('admin.services.index')
            ->with('ok', 'Service created successfully.');
    }


    public function edit(Service $service)
    {
        $categories = ServiceCategory::where('is_active', 1)
            ->orderBy('category_name')
            ->get();

        $packages = $service->packages()
            ->orderBy('sort_order')
            ->get();

        return view('admin.services.edit', compact('service', 'categories', 'packages'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'category_id'      => 'required|exists:service_categories,id',
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'short_summary'    => 'nullable|string',
            'long_description' => 'nullable|string',
            'starting_price'   => 'nullable|numeric|min:0',
            'show_on_website'  => 'nullable|boolean',
            'has_packages'     => 'nullable|boolean',
            'status'           => 'required|in:draft,active,archived',
            'sort_order'       => 'nullable|integer|min:0',
            'image'            => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data['show_on_website'] = $request->boolean('show_on_website');
        $data['has_packages']    = $request->boolean('has_packages');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if (! isset($data['sort_order'])) {
            $data['sort_order'] = $service->sort_order ?? 0;
        }

        // Image replace (optional)
        if ($request->hasFile('image')) {
            // Optionally delete old file:
            // if ($service->image) Storage::disk('public')->delete($service->image);

            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        // 🔥 Redirect logic after edit:
        if ($data['has_packages']) {
            // if has_packages = checked → stay on edit to manage packages
            return redirect()
                ->route('admin.services.edit', $service)
                ->with('ok', 'Service updated successfully. You can manage packages below.');
        }

        return redirect()
            ->route('admin.services.edit', $service)
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
