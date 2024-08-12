@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-blue-500 text-white text-center py-3 rounded-t-lg">
                    <h2 class="text-lg font-semibold">{{ __('Reset Password') }}</h2>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email"
                                class="block text-gray-700 font-medium mb-2">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-medium mb-2">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg @error('password') border-red-500 @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="text-red-500 text-sm mt-1">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password-confirm"
                                class="block text-gray-700 font-medium mb-2">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
