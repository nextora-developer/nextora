@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')
    <div class="mx-auto bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-4xl space-y-8">

        {{-- FLASH MESSAGE --}}
        @if (session('ok'))
            <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-800">
                {{ session('ok') }}
            </div>
        @endif

        {{-- MAIN EDIT FORM --}}
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            {{-- SECTION 1: BASIC INFO --}}
            <div>
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Basic Info</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Category --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Category</label>
                        <select name="category_id"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $service->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->category_name ?? $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title', $service->title) }}"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Slug --}}
                <div class="mt-4">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Slug (optional)</label>
                    <input type="text" name="slug" value="{{ old('slug', $service->slug) }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                    <p class="text-[11px] text-slate-400 mt-1">
                        Leave empty to auto-generate from title.
                    </p>
                    @error('slug')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Short Summary --}}
                <div class="mt-4">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Short Summary</label>
                    <textarea name="short_summary" rows="3"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('short_summary', $service->short_summary) }}</textarea>
                    @error('short_summary')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- SECTION 2: CONTENT --}}
            <div>
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Content</h3>

                {{-- Long Description --}}
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Long Description</label>
                    <textarea name="long_description" rows="5"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('long_description', $service->long_description) }}</textarea>
                    @error('long_description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- SECTION 3: IMAGE --}}
            <div>
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Service Image</h3>

                @if ($service->image)
                    <div class="mb-3">
                        <p class="text-[11px] text-slate-500 mb-1">Current Image:</p>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Service image"
                            class="h-24 rounded-lg border border-slate-200 object-cover">
                    </div>
                @endif

                <input type="file" name="image"
                    class="block w-full text-sm text-slate-700 file:mr-3 file:py-2 file:px-4
                              file:rounded-lg file:border-0 file:bg-gold file:text-white hover:file:bg-gold-dark">
                <p class="text-[11px] text-slate-400 mt-1">
                    Allowed: JPG, PNG, WEBP • Max 2MB. Leave empty to keep existing image.
                </p>
                @error('image')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- SECTION 4: DISPLAY & CONTROL --}}
            <div>
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Display & Control</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Starting Price --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Starting Price (RM)</label>
                        <input type="number" step="0.01" min="0" name="starting_price"
                            value="{{ old('starting_price', $service->starting_price) }}"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                        @error('starting_price')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Show on Website --}}
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="show_on_website" value="1"
                            {{ old('show_on_website', $service->show_on_website) ? 'checked' : '' }}
                            class="rounded border-slate-300 text-gold focus:ring-gold">
                        <label class="text-sm text-slate-700">Show on Website</label>
                    </div>

                    {{-- Has Packages --}}
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="has_packages" value="1"
                            {{ old('has_packages', $service->has_packages) ? 'checked' : '' }}
                            class="rounded border-slate-300 text-gold focus:ring-gold">
                        <label class="text-sm text-slate-700">Has Packages</label>
                    </div>
                </div>

                {{-- Status + Sort Order --}}
                <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">

                    {{-- Status --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Status</label>
                        <select name="status"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                            @foreach (['draft', 'active', 'archived'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status', $service->status) == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Sort Order --}}
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Sort Order</label>
                        <input type="number" min="0" name="sort_order"
                            value="{{ old('sort_order', $service->sort_order) }}"
                            class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                        <p class="text-[11px] text-slate-400 mt-1">
                            Lower number appears higher in the list.
                        </p>
                        @error('sort_order')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- BUTTONS --}}
            <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                <button
                    class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                    Save Changes
                </button>

                <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-500 hover:text-slate-700">Back to
                    List</a>
            </div>
        </form>

        {{-- SECTION 5: PACKAGES (ONLY IF HAS PACKAGES) --}}
        @if ($service->has_packages)
            <div class="pt-6 border-t border-slate-200">
                <div class="mb-3 flex items-center justify-between">
                    <h3 class="text-sm font-semibold text-slate-900">
                        Packages for: {{ $service->title }}
                    </h3>

                    <a href="{{ route('admin.services.packages.create', $service) }}"
                        class="inline-flex items-center rounded-lg bg-gold px-3 py-2 text-xs font-semibold text-white hover:bg-gold-dark">
                        + Add Package
                    </a>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-50 text-xs text-slate-500 uppercase">
                            <tr>
                                <th class="px-4 py-3 text-left">Package Name</th>
                                <th class="px-4 py-3 text-left">Display Label</th>
                                <th class="px-4 py-3 text-left">Price From (RM)</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Sort</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($packages as $package)
                                <tr>
                                    <td class="px-4 py-3 align-top font-medium text-slate-900">
                                        {{ $package->name }}
                                    </td>
                                    <td class="px-4 py-3 align-top text-slate-600">
                                        {{ $package->display_label ?? '—' }}
                                    </td>
                                    <td class="px-4 py-3 align-top text-slate-600">
                                        {{ $package->price_from ? number_format($package->price_from, 2) : '—' }}
                                    </td>
                                    <td class="px-4 py-3 align-top">
                                        @if ($package->status === 'active')
                                            <span
                                                class="inline-flex items-center rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                                                ● Active
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-500">
                                                ● Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 align-top text-slate-600">
                                        {{ $package->sort_order }}
                                    </td>
                                    <td class="px-4 py-3 align-top text-right">
                                        <a href="{{ route('admin.services.packages.edit', [$service, $package]) }}"
                                            class="text-xs text-gold hover:text-gold-dark mr-3">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.services.packages.destroy', [$service, $package]) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Delete this package?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs text-red-500 hover:text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-sm text-slate-500">
                                        No packages yet. Click “Add Package” to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-generate slug from title (only when slug empty)
        document.addEventListener('DOMContentLoaded', () => {
            const titleInput = document.querySelector('input[name="title"]');
            const slugInput = document.querySelector('input[name="slug"]');
            if (titleInput && slugInput) {
                titleInput.addEventListener('input', () => {
                    if (slugInput.value.trim() !== '') return;
                    slugInput.value = titleInput.value.toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .trim()
                        .replace(/\s+/g, '-');
                });
            }
        });
    </script>
@endpush
