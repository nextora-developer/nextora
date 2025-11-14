@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')
    <div class="bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-3xl">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-5">
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
                <label class="block text-xs font-semibold text-slate-600 mb-1">Description</label>
                <textarea name="description" rows="5"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="flex items-center gap-2">
                <input id="is_active" type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                    class="rounded border-slate-300 text-gold focus:ring-gold">
                <label for="is_active" class="text-sm text-slate-700">Active</label>
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
