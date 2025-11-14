@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard')

@section('content')
    {{-- Top metrics row --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-5">
            <div class="mt-3 text-[11px] font-semibold tracking-[0.16em] text-slate-500 uppercase">
                Total Users
            </div>
            <div class="mt-3 text-3xl font-semibold text-slate-900">
                128
            </div>
            <div class="mt-1 mb-3 text-xs text-emerald-600">
                +8 this week
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-5">
            <div class="mt-3 text-[11px] font-semibold tracking-[0.16em] text-slate-500 uppercase">
                Active Services
            </div>
            <div class="mt-3 text-3xl font-semibold text-slate-900">
                23
            </div>
            <div class="mt-1 mb-3 text-xs text-slate-500">
                Configured on site
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 px-6 py-5">
            <div class="mt-3 text-[11px] font-semibold tracking-[0.16em] text-slate-500 uppercase">
                Open Careers
            </div>
            <div class="mt-3 text-3xl font-semibold text-slate-900">
                5
            </div>
            <div class="mt-1 mb-3 text-xs text-slate-500">
                Published positions
            </div>
        </div>
    </div>

    {{-- Gold "New messages" bar --}}
    <div class="mb-6">
        <div class="bg-gold text-white rounded-2xl px-6 py-4 inline-flex flex-col w-full md:w-[420px]">
            <div class="text-[11px] tracking-[0.16em] uppercase font-semibold">
                New Messages
            </div>
            <div class="mt-2 flex items-baseline gap-3">
                <div class="text-3xl font-semibold">12</div>
                <div class="text-xs opacity-90">From contact form</div>
            </div>
        </div>
    </div>

    {{-- Two main cards: left & right --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- LEFT CARD - Recent contact messages --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 flex items-center justify-between border-b border-slate-100">
                <div>
                    <div class="text-sm font-semibold text-slate-900">
                        Recent Contact Messages
                    </div>
                </div>
                <button class="text-xs text-gold hover:text-gold-dark">
                    View all
                </button>
            </div>

            <div class="divide-y divide-slate-100 text-sm">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="font-semibold text-slate-900">Alex Tan</div>
                        <div class="text-xs text-slate-500">Website redesign</div>
                    </div>
                    <div class="text-xs text-slate-400">
                        2 hours ago
                    </div>
                </div>

                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="font-semibold text-slate-900">Rachel Lee</div>
                        <div class="text-xs text-slate-500">Corporate package enquiry</div>
                    </div>
                    <div class="text-xs text-slate-400">
                        Yesterday
                    </div>
                </div>

                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="font-semibold text-slate-900">Jason Lim</div>
                        <div class="text-xs text-slate-500">Support request</div>
                    </div>
                    <div class="text-xs text-slate-400">
                        2 days ago
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT CARD - Quick actions --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100">
                <div class="text-sm font-semibold text-slate-900">
                    Quick Actions
                </div>
            </div>

            {{-- Big gold button --}}
            <button
                class="w-full text-left px-6 py-4 bg-gold text-white text-sm font-medium flex items-center justify-between hover:bg-gold-dark">
                <span>+ Add New Service</span>
            </button>

            <div class="divide-y divide-slate-100 text-sm">
                <button class="w-full text-left px-6 py-4 flex items-center justify-between hover:bg-slate-50">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-slate-100 text-[13px]">
                            📄
                        </span>
                        <div>
                            <div class="font-medium text-slate-900 text-[13px]">
                                Post New Career
                            </div>
                        </div>
                    </div>
                </button>

                <button class="w-full text-left px-6 py-4 flex items-center justify-between hover:bg-slate-50">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-slate-100 text-[13px]">
                            👤
                        </span>
                        <div>
                            <div class="font-medium text-slate-900 text-[13px]">
                                Manage Users
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
@endsection
