@extends('layouts.apps')

@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ url('/news') }}">News</a>
        </li>
    @endguest
@endsection

@section('content')
    <div class="my-5">
        @if (Session::has('message'))
            <div class="pb-3 alert {{ Session::get('alert-class', 'bg-blue-100 text-blue-700 border border-blue-400') }} rounded-lg flex justify-between items-center"
                role="alert">
                {{ Session::get('message') }}
                <button type="button" class="text-blue-500 hover:text-blue-800" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
            </div>
        @endif

        @if (Session::has('edit'))
            <div class="pb-3 alert {{ Session::get('alert-class', 'bg-green-100 text-green-700 border border-green-400') }} rounded-lg flex justify-between items-center"
                role="alert">
                {{ Session::get('edit') }}
                <button type="button" class="text-green-500 hover:text-green-800" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
            </div>
        @endif

        @if (Session::has('photo'))
            <div class="pb-3 alert {{ Session::get('alert-class', 'bg-yellow-100 text-yellow-700 border border-yellow-400') }} rounded-lg flex justify-between items-center"
                role="alert">
                {{ Session::get('photo') }}
                <button type="button" class="text-yellow-500 hover:text-yellow-800" data-dismiss="alert"
                    aria-label="Close">
                    &times;
                </button>
            </div>
        @endif

        @if (Session::has('delete'))
            <div class="pb-3 alert {{ Session::get('alert-class', 'bg-red-100 text-red-700 border border-red-400') }} rounded-lg flex justify-between items-center"
                role="alert">
                {{ Session::get('delete') }}
                <button type="button" class="text-red-500 hover:text-red-800" data-dismiss="alert" aria-label="Close">
                    &times;
                </button>
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert bg-red-100 text-red-700 border border-red-400 rounded-lg flex justify-between items-center"
                    role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="text-red-500 hover:text-red-800" data-dismiss="alert" aria-label="Close">
                        &times;
                    </button>
                </div>
            @endforeach
        @endif
    </div>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h4 class="mb-4 text-xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-5xl">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                            Your News List
                        </span>
                    </h4>
                </div>
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="{{ route('add_news') }}">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add News
                        </button>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 p-4">
                @forelse($reference as $key => $item)
                    @if ($item['author'] == $author)
                        <div
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="h-auto max-w-full md:max-w-xs object-cover rounded-t-lg md:rounded-none md:rounded-l-lg"
                                src="{{ $item['image'] }}" alt="Car Image">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ ucwords($item['judul']) }}
                                    <span
                                        class="bg-red-200 text-red-800 justify-end text-xl font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        {{ date('d-m-Y', strtotime($item['tanggal'])) }}
                                    </span>
                                </h5>

                                <div class="mt-5 flex items-center justify-start gap-4">
                                    <a href="{{ url('/home/news_details/' . $key) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read Now
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-span-1">
                        <p class="text-center text-gray-500 dark:text-gray-400">No Record Found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
