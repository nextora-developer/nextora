<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function index()
    // {
    //     $services = Service::orderByDesc('created_at')->paginate(10);

    //     return view('admin.services.index', compact('services'));
    // }

    public function index(Request $request)
    {
        $query = Service::query();

        // search
        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%');
            });
        }

        // category filter
        // if ($request->filled('category')) {
        //     $query->where('category_id', $request->input('category'));
        // }

        // status filter
        $status = $request->input('status');

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
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

        $services = $query->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        // $categories = Category::orderBy('name')->get();


        return view('admin.services.index', compact('services', 'status', 'search'));
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
