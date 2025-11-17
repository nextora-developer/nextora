@extends('layouts.admin')

@section('title', 'Add Service Category')
@section('page_title', 'Add Service Category')

@section('content')
    <div class="mx-auto bg-white rounded-2xl border border-slate-200 px-6 py-6 max-w-3xl">
        <form action="{{ route('admin.service_categories.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Category Name --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Category Name</label>
                <input type="text" name="category_name" value="{{ old('category_name') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                @error('category_name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Slug (optional; auto from name) --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Slug (optional)</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                <p class="text-[11px] text-slate-400 mt-1">
                    Leave empty to auto-generate from Category Name.
                </p>
                @error('slug')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Short Description --}}
            <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Short Description</label>
                <textarea name="short_description" rows="3"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">{{ old('short_description') }}</textarea>
                @error('short_description')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sort Order --}}
            {{-- <div>
                <label class="block text-xs font-semibold text-slate-600 mb-1">Sort Order</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', 0) }}"
                    class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-gold focus:ring-gold">
                <p class="text-[11px] text-slate-400 mt-1">
                    Smaller number will show higher in the list.
                </p>
                @error('sort_order')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- Status --}}
            <div>
                <span class="block text-xs font-semibold text-slate-600 mb-1">Status</span>
                <div class="flex items-center gap-4">
                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="is_active" value="1"
                            class="border-slate-300 text-gold focus:ring-gold"
                            {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                        Active
                    </label>
                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="radio" name="is_active" value="0"
                            class="border-slate-300 text-gold focus:ring-gold"
                            {{ old('is_active') === '0' ? 'checked' : '' }}>
                        Inactive
                    </label>
                </div>
                @error('is_active')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-3 pt-3">
                <button
                    class="inline-flex items-center rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                    Save Category
                </button>

                <a href="{{ route('admin.service_categories.index') }}"
                    class="text-sm text-slate-500 hover:text-slate-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nameInput = document.querySelector('input[name="category_name"]');
        const slugInput = document.querySelector('input[name="slug"]');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', () => {
                if (slugInput.value.trim() !== '') return; // don't overwrite if user typed

                let slug = nameInput.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .trim()
                    .replace(/\s+/g, '-');

                slugInput.value = slug;
            });
        }
    });
</script>
@endpush

