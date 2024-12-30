@extends('layouts.app')
@section('navbar_home')
    <div class="flex flex-col space-y-2 items-center">
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2C9.243 2 7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5zm6 10c.551 0 1 .449 1 1v8c0 .551-.449 1-1 1H6c-.551 0-1-.449-1-1v-8c0-.551.449-1 1-1h12zm-9-2V7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9z" />
                    </svg>
                    <span class="text-center">Login</span>
                </a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm1-13h-2v4H7v2h4v4h2v-4h4v-2h-4V7z" />
                    </svg>
                    <span class="text-center">Register</span>
                </a>
            @endif
        @else
            <a href="{{ url('/home') }}"
                class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                </svg>
                <span class="text-center">Home</span>
            </a>

            <a href="{{ url('/news') }}"
                class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Z" />
                </svg>
                <span class="text-center">News</span>
            </a>
        @endguest
    </div>
@endsection

<style>
    .page-layout {
        grid-template-rows: auto 1fr;
        min-height: 100vh;
        padding-top: 64px;
    }
</style>

@section('content')

    <div class="container mx-auto my-10 page-layout">

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
                <h4 class="text-xl font-semibold dark:text-white">Profile Information</h4>
                <p class="text-sm text-gray-500 mt-2 dark:text-white">
                    Update your account's profile information and email address.<br><br>
                    When you change your email, you need to verify your email else the account will be blocked.
                </p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6 dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'action' => ['App\Http\Controllers\Auth\ProfileController@update', $user->uid],
                    ]) !!}
                    {!! Form::open() !!}

                    <div class="space-y-4">
                        <div>
                            {!! Form::label('displayName', 'Name', ['class' => 'dark:text-white block text-sm font-medium text-gray-700']) !!}
                            {!! Form::text('displayName', null, [
                                'class' =>
                                    'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>

                        <div>
                            {!! Form::label('email', 'Email', ['class' => 'dark:text-white block text-sm font-medium text-gray-700']) !!}
                            {!! Form::email('email', null, [
                                'class' =>
                                    'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
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
                <h4 class="text-xl font-semibold dark:text-white">Update Password</h4>
                <p class="text-sm text-gray-500 mt-2 dark:text-white">Ensure your account is using a long, random password
                    to stay secure.
                </p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6 dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    <div class="space-y-4">
                        <div>
                            {!! Form::label('new_password', 'New Password', [
                                'class' => 'dark:text-white block text-sm font-medium text-gray-700',
                            ]) !!}
                            {!! Form::password('new_password', [
                                'class' =>
                                    'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                            ]) !!}
                        </div>

                        <div>
                            {!! Form::label('new_confirm_password', 'Confirm Password', [
                                'class' => 'dark:text-white block text-sm font-medium text-gray-700',
                            ]) !!}
                            {!! Form::password('new_confirm_password', [
                                'class' =>
                                    'dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
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
                <h4 class="text-xl font-semibold dark:text-white">Delete Account</h4>
                <p class="text-sm text-gray-500 mt-2 dark:text-white">Permanently delete your account.</p>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white shadow rounded-lg p-6 dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    <p class="text-sm text-gray-500 dark:text-white">
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
