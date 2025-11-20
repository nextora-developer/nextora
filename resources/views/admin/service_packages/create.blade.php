@extends('layouts.admin')

@section('title', 'Add Package')
@section('page_title', 'Add Package')

@section('content')
    <div class="mx-auto bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-3xl">
        <div class="mb-4">
            <p class="text-xs text-slate-500">
                Service: <span class="font-semibold text-slate-800">{{ $service->title }}</span>
            </p>
        </div>

        <form action="{{ route('admin.services.packages.store', $service) }}" method="POST" class="space-y-5">
            @csrf

            {{-- Package Name --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Package Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Display Label --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Display Label (optional)</label>
                <input type="text" name="display_label" value="{{ old('display_label') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                <p class="text-[11px] text-slate-400 mt-1">
                    Example: "Starter (Up to 50 txns/month)"
                </p>
                @error('display_label')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price From --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Price From (RM)</label>
                <input type="number" step="0.01" min="0" name="price_from" value="{{ old('price_from') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                @error('price_from')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description / Features --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Description / Features</label>
                <textarea name="description" rows="4"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Highlight Tag --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Highlight Tag (optional)</label>
                <input type="text" name="highlight_tag" value="{{ old('highlight_tag') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                <p class="text-[11px] text-slate-400 mt-1">
                    Example: "Most Popular", "Best Value"
                </p>
                @error('highlight_tag')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status + Sort Order --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Status --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Status</label>
                    <select name="status"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sort Order --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" min="0" value="{{ old('sort_order', 0) }}"
                        class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                    <p class="text-[11px] text-slate-400 mt-1">
                        Lower number appears first.
                    </p>
                    @error('sort_order')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-3 pt-3">
                <button
                    class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                    Save Package
                </button>

                <a href="{{ route('admin.services.edit', $service) }}" class="text-sm text-slate-500 hover:text-slate-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
