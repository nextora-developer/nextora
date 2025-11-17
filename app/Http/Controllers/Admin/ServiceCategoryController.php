<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /** LIST **/
    public function index(Request $request)
    {
        $query = ServiceCategory::query();

        // search
        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('category_name', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%');
            });
        }

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

        $categories = $query->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();


        return view('admin.service_categories.index', compact('categories', 'status', 'search'));
    }

    /** CREATE FORM **/
    public function create()
    {
        return view('admin.service_categories.create');
    }

    /** STORE **/
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug',
            'short_description' => 'nullable|string',
            'is_active' => 'required|in:0,1',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['category_name']);
        }

        ServiceCategory::create($data);

        return redirect()
            ->route('admin.service_categories.index')
            ->with('success', 'Category created successfully.');
    }

    /** EDIT FORM **/
    public function edit(ServiceCategory $service_category)
    {
        $category = $service_category;

        return view('admin.service_categories.edit', compact('category'));
    }

    /** UPDATE **/
    public function update(Request $request, ServiceCategory $service_category)
    {
        $category = $service_category;

        $data = $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug,' . $category->id,
            'short_description' => 'nullable|string',
            'is_active' => 'required|in:0,1',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['category_name']);
        }

        $category->update($data);

        return redirect()
            ->route('admin.service_categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /** DELETE **/
    public function destroy(ServiceCategory $service_category)
    {
        $service_category->delete();

        return redirect()
            ->route('admin.service_categories.index')
            ->with('success', 'Category deleted.');
    }
}
