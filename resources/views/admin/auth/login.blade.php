@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white dark:bg-gray-900 rounded-xl shadow p-8">
            <h1 class="text-2xl font-bold text-gold-dark mb-6 text-center">Admin Login</h1>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-gold focus:border-gold">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-gold focus:ring-gold">
                        <span>Remember me</span>
                    </label>
                </div>

                <button class="w-full bg-gold hover:bg-gold-dark text-white font-semibold py-3 rounded-md mt-2">
                    Log in as Admin
                </button>

                <p class="mt-4 text-center text-xs text-gray-500">
                    Not an admin? <a href="{{ route('admin.register') }}" class="text-gold hover:text-gold-dark">Admin Register</a>
                </p>
            </form>
        </div>
    </div>
@endsection
