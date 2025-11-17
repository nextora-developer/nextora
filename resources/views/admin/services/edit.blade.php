@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')
    <div class="mx-auto bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-3xl">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                @error('title')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Short Description</label>
                <input type="text" name="short_description"
                    value="{{ old('short_description', $service->short_description) }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600">Description</label>
                <textarea name="description" rows="5"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Provider</label>
                    <input type="text" name="provider" value="{{ old('provider', $service->provider) }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                </div>

                {{-- Price --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Price (RM)</label>
                    <input type="number" step="0.01" min="0" name="price"
                        value="{{ old('price', $service->price) }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">

                </div>
            </div>

            {{-- Image Upload --}}
            <div class="mt-4">
                <label class="block text-xs font-semibold text-slate-600 mb-1">Service Image</label>

                {{-- Show existing image --}}
                @if ($service->image_path)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="Current image"
                            class="h-24 w-24 rounded-lg object-cover border border-slate-200">
                    </div>
                @endif

                {{-- File input --}}
                <input type="file" name="image"
                    class="block w-full text-sm text-slate-700
                  file:mr-3 file:py-2 file:px-4
                  file:rounded-lg file:border-0
                  file:bg-gold file:text-white
                  hover:file:bg-gold-dark">

                <p class="text-[11px] text-slate-400 mt-1">
                    Allowed: JPG, PNG, WEBP • Max 2MB
                </p>

                @error('image')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <span class="block text-xs font-semibold text-slate-600 mb-1">Status</span>
                <div class="flex items-center gap-4">

                    {{-- Active --}}
                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="is_active" value="1"
                            class="border-slate-300 text-gold focus:ring-gold"
                            {{ old('is_active', $service->is_active ?? 1) == 1 ? 'checked' : '' }}>
                        Active
                    </label>

                    {{-- Inactive --}}
                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="is_active" value="0"
                            class="border-slate-300 text-gold focus:ring-gold"
                            {{ old('is_active', $service->is_active ?? 1) == 0 ? 'checked' : '' }}>
                        Inactive
                    </label>

                </div>

                @error('is_active')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center gap-3 pt-3">
                <button
                    class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                    Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-500 hover:text-slate-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
