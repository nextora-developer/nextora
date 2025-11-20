@extends('layouts.admin')

@section('title', 'Manage Services')
@section('page_title', 'Services')

@section('content')
    @if (session('ok'))
        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-800">
            {{ session('ok') }}
        </div>
    @endif

    <div class="mb-4 space-y-3">
        {{-- Top row: title + Add button --}}
        <div class="flex items-center justify-between gap-3">
            <h2 class="text-sm font-semibold text-slate-900">Service List</h2>

            <a href="{{ route('admin.services.create') }}"
                class="inline-flex items-center rounded-lg bg-gold px-3 py-2 text-sm font-semibold text-white hover:bg-gold-dark">
                Add New Service
            </a>
        </div>

        {{-- Search + Filters row --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 mb-6">
            <div class="text-sm font-semibold text-slate-800 mb-4">
                Filter & Search
            </div>

            <form method="GET" action="{{ route('admin.services.index') }}" class="space-y-4">

                {{-- =======================  ROW 1  ======================= --}}
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">

                    {{-- Search Input --}}
                    <div class="relative lg:col-span-3">
                        <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none"
                                stroke="currentColor" stroke-width="1.5">
                                <circle cx="11" cy="11" r="6"></circle>
                                <path d="M16 16l4 4" stroke-linecap="round"></path>
                            </svg>
                        </span>

                        <input type="text" name="q" value="{{ request('q') }}"
                            placeholder="Search services by name"
                            class="w-full rounded-xl border border-slate-200 bg-white px-9 py-2.5 text-sm
                           focus:border-gold focus:ring-gold">
                    </div>

                    {{-- Category Dropdown --}}
                    <div class="lg:col-span-1">
                        <select name="category" onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 focus:border-gold focus:ring-gold">
                            <option value="">All categories</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="lg:col-span-1">
                        <select name="status" onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-600
               hover:bg-slate-50 focus:border-gold focus:ring-gold">
                            <option value="">All status</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archived
                            </option>
                        </select>
                    </div>
                </div>

                {{-- =======================  ROW 2  ======================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">

                    {{-- Created Start --}}
                    <div>
                        <label class="text-[11px] text-slate-500 mb-1 block">Created (Start)</label>
                        <input type="datetime-local" name="start_created" value="{{ request('start_created') }}"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-medium
                           text-slate-600 hover:bg-slate-50 focus:border-gold focus:ring-gold">
                    </div>

                    {{-- Created End --}}
                    <div>
                        <label class="text-[11px] text-slate-500 mb-1 block">Created (End)</label>
                        <input type="datetime-local" name="end_created" value="{{ request('end_created') }}"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-medium
                           text-slate-600 hover:bg-slate-50 focus:border-gold focus:ring-gold">
                    </div>

                    {{-- Updated Start --}}
                    <div>
                        <label class="text-[11px] text-slate-500 mb-1 block">Updated (Start)</label>
                        <input type="datetime-local" name="start_updated" value="{{ request('start_updated') }}"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-medium
                           text-slate-600 hover:bg-slate-50 focus:border-gold focus:ring-gold">
                    </div>

                    {{-- Updated End --}}
                    <div>
                        <label class="text-[11px] text-slate-500 mb-1 block">Updated (End)</label>
                        <input type="datetime-local" name="end_updated" value="{{ request('end_updated') }}"
                            onchange="this.form.submit()"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs font-medium
                           text-slate-600 hover:bg-slate-50 focus:border-gold focus:ring-gold">
                    </div>

                    {{-- Reset --}}
                    <div class="flex items-end">
                        @if (request('q') ||
                                request('category') ||
                                request('status') ||
                                request('start_created') ||
                                request('end_created') ||
                                request('start_updated') ||
                                request('end_updated'))
                            <a href="{{ route('admin.services.index') }}"
                                class="w-full text-center rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-xs font-medium
                               text-slate-500 hover:bg-slate-50">
                                Reset
                            </a>
                        @endif
                    </div>

                </div>

            </form>
        </div>

    </div>


    {{-- TABLE --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-xs text-slate-500 uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Has Packages?</th>
                    <th class="px-4 py-3 text-left">Show on Website?</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Updated at</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($services as $service)
                    <tr>
                        {{-- Title --}}
                        <td class="px-4 py-3 align-top">
                            <div class="font-medium text-slate-900">{{ $service->title }}</div>
                            <div class="text-[11px] text-slate-400">
                                Created {{ $service->created_at->format('Y-m-d') }}
                            </div>
                        </td>

                        {{-- Category --}}
                        <td class="px-4 py-3 align-top text-slate-600">
                            {{ $service->category->name ?? '—' }}
                        </td>

                        {{-- Has Packages? --}}
                        <td class="px-4 py-3 align-top">
                            @if ($service->has_packages)
                                <span class="text-xs font-medium text-emerald-700">Yes</span>
                            @else
                                <span class="text-xs text-slate-500">No</span>
                            @endif
                        </td>

                        {{-- Show on Website? --}}
                        <td class="px-4 py-3 align-top">
                            @if ($service->show_on_website)
                                <span class="text-xs font-medium text-emerald-700">Yes</span>
                            @else
                                <span class="text-xs text-slate-500">No</span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td class="px-4 py-3 align-top">
                            @php
                                $status = $service->status;
                            @endphp

                            <span
                                class="inline-flex items-center rounded-full px-2 py-0.5 text-[11px] font-medium
                                @switch($status)
                                    @case('active')   bg-emerald-50 text-emerald-700 @break
                                    @case('draft')    bg-yellow-50 text-yellow-700 @break
                                    @case('archived') bg-slate-100 text-slate-500 text @break
                                    @default          bg-slate-100 text-slate-500
                                @endswitch">
                                ● {{ ucfirst($status) }}
                            </span>
                        </td>

                        {{-- Updated at --}}
                        <td class="px-4 py-3 align-top text-[11px] text-slate-500">
                            {{ $service->updated_at->format('Y-m-d H:i') }}
                        </td>

                        {{-- Actions --}}
                        <td class="px-4 py-3 align-top text-right">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="text-xs text-gold hover:text-gold-dark mr-3">
                                Edit
                            </a>

                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline"
                                onsubmit="return confirm('Delete this service?');">
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
                        <td colspan="7" class="px-4 py-6 text-center text-sm text-slate-500">
                            No services yet. Click “Add New Service” to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-4 py-3 border-t border-slate-100">
            {{ $services->links() }}
        </div>
    </div>
@endsection
