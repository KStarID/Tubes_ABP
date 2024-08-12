@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
        </li>

        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
            <a class="nav-link text-dark" href="{{ url('/home/news') }}">News</a>
        </li>
    @endguest
@endsection

<!-- zoom  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var image = document.getElementById('uploadedImage');
        var cardBody = image.closest('.card-body');

        image.addEventListener('mousemove', function(e) {
            var rect = cardBody.getBoundingClientRect();
            var scale = 1.5; // Adjust the zoom level as needed
            var offsetX = (e.clientX - rect.left) / rect.width;
            var offsetY = (e.clientY - rect.top) / rect.height;

            image.style.transformOrigin = (offsetX * 100) + '% ' + (offsetY * 100) + '%';
            image.style.transform = 'scale(' + scale + ')';
        });

        image.addEventListener('mouseleave', function() {
            image.style.transformOrigin = 'center';
            image.style.transform = 'scale(1)';
        });
    });
</script>


@section('content')
    <div class="my-5">
        @if (session('status'))
            <div id="alert-border-4"
                class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-4" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>

    <div class="container mx-auto p-6">
        <div class="flex justify-center mb-4 ">
            <div class="w-full lg:w-2/3">
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    <div class="card-body p-4">
                        <img id="uploadedImage" src="{{ $car['image'] }}" alt="Uploaded Image"
                            class="w-full h-auto rounded transition-transform duration-300 ease-in-out">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <div class="bg-white shadow-md rounded-lg dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    <div class="bg-gray-100 rounded-lg p-4 dark:text-white dark:bg-gray-700 dark:border-gray-500">
                        <div class="text-center">
                            <h4 class="text-xl font-bold">Car Details</h4>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p><strong>Merk:</strong><br>{{ ucwords($car['merk']) }}</p>
                                <p><strong>Model:</strong><br>{{ $car['model'] }}</p>
                                <p><strong>Tahun Pembuatan:</strong><br>{{ $car['tahun_pembuatan'] }}</p>
                                <p><strong>Kondisi:</strong><br>{{ $car['kondisi'] }}</p>
                                <p><strong>Bahan Bakar:</strong><br>{{ $car['bahan_bakar'] }}</p>
                            </div>
                            <div>
                                <p><strong>Transmisi:</strong><br>{{ $car['transmisi'] }}</p>
                                <p><strong>Warna:</strong><br>{{ $car['warna'] }}</p>
                                <p><strong>Harga:</strong><br>Rp. {{ $car['harga'] }}</p>
                                <p><strong>Deskripsi:</strong><br>{{ $car['deskripsi'] }}</p>
                                <p><strong>Kontak Penjual:</strong><br>{{ $car['kontak_penjual'] }}</p>
                                @if (isset($car['upload_timestamp']))
                                    <p><strong>Waktu
                                            Unggah:</strong><br>{{ date('d-m-Y', strtotime($car['upload_timestamp'])) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gray-100 p-4 text-right dark:text-white rounded-lg dark:bg-gray-700 dark:border-gray-500">
                        <a href="{{ route('home') }}"
                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 my-2">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
