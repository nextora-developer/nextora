@extends('layouts.admin')

@section('title', 'Manage Services')
@section('page_title', 'Services')

@section('content')
    @if (session('ok'))
        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-2 text-sm text-emerald-800">
            {{ session('ok') }}
        </div>
    @endif

    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-sm font-semibold text-slate-900">Service List</h2>
        <a href="{{ route('admin.services.create') }}"
            class="inline-flex items-center rounded-lg bg-gold px-3 py-2 text-xs font-semibold text-white hover:bg-gold-dark">
            + Add New Service
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-xs text-slate-500 uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Short Description</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($services as $service)
                    <tr>
                        <td class="px-4 py-3 align-top">
                            <div class="font-medium text-slate-900">{{ $service->title }}</div>
                            <div class="text-[11px] text-slate-400">
                                Created {{ $service->created_at->format('Y-m-d') }}
                            </div>
                        </td>
                        <td class="px-4 py-3 align-top text-slate-600">
                            {{ $service->short_description }}
                        </td>
                        <td class="px-4 py-3 align-top">
                            @if ($service->is_active)
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
                        <td colspan="4" class="px-4 py-6 text-center text-sm text-slate-500">
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
