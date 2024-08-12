@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
        </li>

        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
            <a class="nav-link text-dark" href="{{ url('/news') }}">News</a>
        </li>
    @endguest
@endsection



@section('content')
    @if (session('status'))
        <div
            class="alert alert-warning mb-2 text-center text-yellow-600 bg-yellow-50 border border-yellow-300 rounded-lg p-4">
            {{ session('status') }}
        </div>
    @endif

    <script>
        function confirmSubmission() {
            var confirmation = confirm("Apakah data yang Anda masukkan sudah benar?");
            if (confirmation) {
                document.getElementById("carForm").submit();
            } else {
                return false;
            }
        }
    </script>

    <div class="container mx-auto px-4 py-6">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow p-6">
            <div class="border-b border-gray-200 pb-4 mb-4">
                <h4 class="text-2xl mx-3 font-semibold text-gray-800 dark:text-gray-100 flex justify-between items-center">
                    Edit Cars
                    <a href="{{ route('cars') }}"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                        Back
                    </a>
                </h4>
            </div>

            <!-- Edit Car Form -->
            <form method="POST" action="{{ url('/home/cars/update_cars/' . $key) }}" id="carForm">
                @csrf
                @method('PUT')

                <!-- Hidden field for seller's email -->
                <input type="hidden" name="email_penjual" value="{{ auth()->user()->email }}">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div>
                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Merk</label>
                            <input type="text" name="merk" value="{{ $editdata['merk'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Model</label>
                            <input type="text" name="model" value="{{ $editdata['model'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Tahun Pembuatan</label>
                            <input type="number" name="tahun_pembuatan" value="{{ $editdata['tahun_pembuatan'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Kondisi</label>
                            <select name="kondisi"
                                class="cursor-pointer bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                                <option value="Baru" {{ $editdata['kondisi'] === 'Baru' ? 'selected' : '' }}>Baru
                                </option>
                                <option value="Bekas" {{ $editdata['kondisi'] === 'Bekas' ? 'selected' : '' }}>Bekas
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Bahan Bakar</label>
                            <select name="bahan_bakar"
                                class="cursor-pointer bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                                <option value="Bensin (Gasoline)"
                                    {{ $editdata['bahan_bakar'] === 'Bensin (Gasoline)' ? 'selected' : '' }}>Bensin
                                    (Gasoline)
                                </option>
                                <option value="Solar (Diesel)"
                                    {{ $editdata['bahan_bakar'] === 'Solar (Diesel)' ? 'selected' : '' }}>Solar (Diesel)
                                </option>
                                <option value="Gas alam (CNG)"
                                    {{ $editdata['bahan_bakar'] === 'Gas alam (CNG)' ? 'selected' : '' }}>Gas alam (CNG)
                                </option>
                                <option value="Listrik (Electricity)"
                                    {{ $editdata['bahan_bakar'] === 'Listrik (Electricity)' ? 'selected' : '' }}>Listrik
                                    (Electricity)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Transmisi</label>
                            <select name="transmisi"
                                class="cursor-pointer bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                                <option value="Matic" {{ $editdata['transmisi'] === 'Matic' ? 'selected' : '' }}>Matic
                                </option>
                                <option value="Manual" {{ $editdata['transmisi'] === 'Manual' ? 'selected' : '' }}>Manual
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Warna</label>
                            <input type="text" name="warna" value="{{ $editdata['warna'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="text" name="harga" value="{{ $editdata['harga'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Deskripsi Tambahan</label>
                            <input type="text" name="deskripsi" value="{{ $editdata['deskripsi'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium text-gray-900 dark:text-white">Kontak Penjual (WA)</label>
                            <input type="text" name="kontak_penjual" value="{{ $editdata['kontak_penjual'] }}"
                                class="bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-6">
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                        onclick="return confirmSubmission()">
                        Update Cars
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="reset"
                        class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
