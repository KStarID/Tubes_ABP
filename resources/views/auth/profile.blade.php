@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li>
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li>
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li>
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                href="{{ url('/home') }}">Home</a>
        </li>

        <li>
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                href="{{ url('/news') }}">News</a>
        </li>
    @endguest
@endsection

@section('content')

    <div class="container mx-auto p-4">

        @if (Session::has('message'))
            <div id="alert-border-1"
                class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ Session::get('message') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-1" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ $error }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endforeach
        @endif

        @if (Session::has('error'))
            <div id="alert-border-2"
                class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ Session::get('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h4 class="text-xl font-semibold">Profile Information</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Update your account's profile information and email address.<br><br>
                    When you change your email, you need to verify your email else the account will be blocked.
                </p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6">
                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'action' => ['App\Http\Controllers\Auth\ProfileController@update', $user->uid],
                    ]) !!}
                    {!! Form::open() !!}

                    <div class="space-y-4">
                        <div>
                            {!! Form::label('displayName', 'Name', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                            {!! Form::text('displayName', null, [
                                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>

                        <div>
                            {!! Form::label('email', 'Email', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                            {!! Form::email('email', null, [
                                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        {!! Form::submit('Save', [
                            'class' => 'cursor-pointer hover:bg-indigo-500 bg-indigo-600 text-white px-4 py-2 rounded-md',
                        ]) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 mt-6"></div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div>
                <h4 class="text-xl font-semibold">Update Password</h4>
                <p class="text-sm text-gray-500 mt-2">Ensure your account is using a long, random password to stay secure.
                </p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="space-y-4">
                        <div>
                            {!! Form::label('new_password', 'New Password', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                            {!! Form::password('new_password', [
                                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>

                        <div>
                            {!! Form::label('new_confirm_password', 'Confirm Password', [
                                'class' => 'block text-sm font-medium text-gray-700',
                            ]) !!}
                            {!! Form::password('new_confirm_password', [
                                'class' => 'mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        {!! Form::submit('Save', [
                            'class' => 'cursor-pointer hover:bg-indigo-500 bg-indigo-600 text-white px-4 py-2 rounded-md',
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 mt-6"></div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div>
                <h4 class="text-xl font-semibold">Delete Account</h4>
                <p class="text-sm text-gray-500 mt-2">Permanently delete your account.</p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6">
                    <p class="text-sm text-gray-500">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before
                        deleting your account, please download any data or information that you wish to retain.
                    </p>

                    {!! Form::open([
                        'method' => 'DELETE',
                        'action' => ['App\Http\Controllers\Auth\ProfileController@destroy', $user->uid],
                    ]) !!}

                    <div class="flex justify-start mt-6">
                        {!! Form::submit('Delete Account', [
                            'class' => 'cursor-pointer hover:bg-red-500 bg-red-600 text-white px-4 py-2 rounded-md',
                        ]) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
