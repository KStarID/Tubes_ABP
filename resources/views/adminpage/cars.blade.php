@extends('layouts.apps')

@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li>
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark"
                href="{{ url('/home') }}">Home</a>
        </li>

        <li>
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark"
                href="{{ url('/news') }}">News</a>
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
                    <h4 class="mb-4 text-xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-5  xl">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Your
                            Cars List</span>
                    </h4>
                </div>
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="{{ route('add_cars') }}">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Cars
                        </button>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center text-gray-600 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Image</th>
                            <th scope="col" class="px-4 py-3">Merk</th>
                            <th scope="col" class="px-4 py-3">Model</th>
                            <th scope="col" class="px-4 py-3">Tahun Pembuatan</th>
                            <th scope="col" class="px-4 py-3">Kondisi</th>
                            <th scope="col" class="px-4 py-3">Bahan Bakar</th>
                            <th scope="col" class="px-4 py-3">Transmisi</th>
                            <th scope="col" class="px-4 py-3">Warna</th>
                            <th scope="col" class="px-4 py-3">Harga</th>
                            <th scope="col" class="px-4 py-3">Deskripsi</th>
                            <th scope="col" class="px-4 py-3">Kontak Penjual</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($reference)
                            @forelse($reference as $key => $item)
                                @if ($item['email_penjual'] == $email_penjual)
                                    <tr class="border-b dark:border-gray-700">
                                        <td scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{ url('/home/upload_image/' . $key) }}">
                                                <img class="w-14 h-10 overflow-hidden rounded" src="{{ $item['image'] }}"
                                                    alt="Bordered avatar">
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">{{ $item['merk'] }}</td>
                                        <td class="px-4 py-3">{{ $item['model'] }}</td>
                                        <td class="px-4 py-3">{{ $item['tahun_pembuatan'] }}</td>
                                        <td class="px-4 py-3">{{ $item['kondisi'] }}</td>
                                        <td class="px-4 py-3">{{ $item['bahan_bakar'] }}</td>
                                        <td class="px-4 py-3">{{ $item['transmisi'] }}</td>
                                        <td class="px-4 py-3">{{ $item['warna'] }}</td>
                                        <td class="px-4 py-3">{{ $item['harga'] }}</td>
                                        <td class="px-4 py-3">{{ $item['deskripsi'] }}</td>
                                        <td class="px-4 py-3">{{ $item['kontak_penjual'] }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end">
                                            <button id="apple-imac-27-dropdown-button"
                                                data-dropdown-toggle="{{ $key }}"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div id="{{ $key }}"
                                                class="hidden z-10 text-left w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="apple-imac-27-dropdown-button">
                                                    <li>
                                                        <a href="{{ url('/home/cars/edit_cars/' . $key) }}"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/home/upload_image/' . $key) }}"
                                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                                            Image</a>
                                                    </li>
                                                </ul>
                                                <div class="py-1">
                                                    <a href="#"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center py-4">No
                                        Record
                                        Found</td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan="13" class="text-center py-4">No
                                    Record
                                    Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
