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

<style>
    .page-layout {
        grid-template-rows: auto 1fr;
        min-height: 13vh;
    }
</style>

@section('content')
    <div class="page-layout">
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
                                <p><strong>Merk : </strong><br>{{ ucwords($car['merk']) }}</p>
                                <p><strong>Model : </strong><br>{{ $car['model'] }}</p>
                                <p><strong>Tahun Pembuatan : </strong><br>{{ $car['tahun_pembuatan'] }}</p>
                                <p><strong>Kondisi : </strong><br>{{ $car['kondisi'] }}</p>
                                <p><strong>Bahan Bakar : </strong><br>{{ $car['bahan_bakar'] }}</p>
                            </div>
                            <div>
                                <p><strong>Transmisi : </strong><br> {{ $car['transmisi'] }}</p>
                                <p><strong>Warna : </strong><br> {{ $car['warna'] }}</p>
                                <p><strong>Harga : </strong><br> Rp. {{ $car['harga'] }}</p>
                                <p><strong>Deskripsi : </strong><br> {{ $car['deskripsi'] }}</p>
                                <p><strong>Kontak Penjual : </strong><br> {{ $car['kontak_penjual'] }}</p>
                                @if (isset($car['upload_timestamp']))
                                    <p><strong>Waktu
                                            Unggah: </strong><br> {{ date('d-m-Y', strtotime($car['upload_timestamp'])) }}
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
