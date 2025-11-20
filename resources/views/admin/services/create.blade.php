@extends('layouts.admin')

@section('title', 'Add Service')
@section('page_title', 'Add Service')

@section('content')
    <div class="mx-auto bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-4xl">

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- SECTION 1: BASIC INFO --}}
            <h3 class="text-sm font-semibold text-slate-900">Basic Info</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Category --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Category</label>
                    <select name="category_id"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->category_name }}
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
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Slug --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Slug (optional)</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                <p class="text-[11px] text-slate-400 mt-1">Leave empty to auto-generate from title.</p>
                @error('slug')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Short Summary --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Short Summary</label>
                <textarea name="short_summary" rows="3"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('summary') }}</textarea>
            </div>

            {{-- SECTION 2: CONTENT --}}
            <h3 class="text-sm font-semibold text-slate-900">Content</h3>
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Long Description</label>
                <textarea name="long_description" rows="5"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('long_description') }}</textarea>
            </div>

            {{-- SECTION 3: IMAGE --}}
            <h3 class="text-sm font-semibold text-slate-900">Service Image</h3>
            <div>
                <input type="file" name="image"
                    class="block w-full text-sm text-slate-700 file:mr-3 file:py-2 file:px-4
                              file:rounded-lg file:border-0 file:bg-gold file:text-white hover:file:bg-gold-dark">
                <p class="text-[11px] text-slate-400 mt-1">
                    Allowed: JPG, PNG, WEBP • Max 2MB
                </p>
                @error('image')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- SECTION 4: DISPLAY & CONTROL --}}
            <h3 class="text-sm font-semibold text-slate-900">Display & Control</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Starting Price --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Starting Price (RM)</label>
                    <input type="number" step="0.01" min="0" name="starting_price"
                        value="{{ old('starting_price') }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                </div>

                {{-- Show on Website --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="show_on_website" value="1"
                        {{ old('show_on_website', 1) ? 'checked' : '' }}
                        class="rounded border-slate-300 text-gold focus:ring-gold">
                    <label class="text-sm text-slate-700">Show on Website</label>
                </div>

                {{-- Has Packages --}}
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="has_packages" value="1" {{ old('has_packages', 0) ? 'checked' : '' }}
                        class="rounded border-slate-300 text-gold focus:ring-gold">
                    <label class="text-sm text-slate-700">Has Packages</label>
                </div>
            </div>

            {{-- STATUS --}}
            <div>
                <span class="block text-xs font-semibold text-slate-600 mb-1">Status</span>
                <div class="flex gap-4">
                    @foreach (['draft', 'active', 'archived'] as $status)
                        <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                            <input type="radio" name="status" value="{{ $status }}"
                                {{ old('status', 'draft') == $status ? 'checked' : '' }}
                                class="border-slate-300 text-gold focus:ring-gold">
                            {{ ucfirst($status) }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- BUTTONS --}}
            <div class="flex items-center gap-3 pt-3">
                <button
                    class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                    Save Service
                </button>

                <a href="{{ route('admin.services.index') }}"
                    class="text-sm text-slate-500 hover:text-slate-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Auto-generate slug from title
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
