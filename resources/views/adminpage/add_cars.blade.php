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

            <a href="{{ url('/home/cars') }}"
                class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M19 8h-1.81a5.008 5.008 0 0 0-9.38 0H6a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h13a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3Zm-7-3a3 3 0 0 1 2.816 2H9.184A3 3 0 0 1 12 5Zm-9 6a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Z" />
                </svg>
                <span class="text-center">Cars List</span>
            </a>
        @endguest
    </div>
@endsection

<style>
    .page-layout {
        grid-template-rows: auto 1fr;
        min-height: 13vh;
    }
</style>

@section('content')
    <div class="container mx-auto page-layout">
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
                    Add New Car
                    <a href="{{ route('cars') }}"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                        Back
                    </a>
                </h4>
            </div>

            <!-- New Car Form -->
            {!! Form::open([
                'method' => 'POST',
                'action' => 'App\Http\Controllers\Firebase\CarsController@store',
                'id' => 'carForm',
            ]) !!}

            {!! Form::hidden('email_penjual', auth()->user()->email) !!}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Merk</label>
                        {!! Form::text('merk', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => 'Toyota',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Model</label>
                        {!! Form::text('model', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => 'Avanza',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Tahun Pembuatan</label>
                        {!! Form::number('tahun_pembuatan', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => '2020',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Kondisi</label>
                        {!! Form::select('kondisi', ['Baru' => 'Baru', 'Bekas' => 'Bekas'], null, [
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'required' => 'required',
                            'placeholder' => 'Baru/Bekas',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Bahan Bakar</label>
                        {!! Form::select(
                            'bahan_bakar',
                            [
                                'Bensin (Gasoline)' => 'Bensin (Gasoline)',
                                'Solar (Diesel)' => 'Solar (Diesel)',
                                'Gas alam (CNG)' => 'Gas alam (CNG)',
                                'Listrik (Electricity)' => 'Listrik (Electricity)',
                            ],
                            null,
                            [
                                'class' =>
                                    'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                                'required' => 'required',
                                'placeholder' => 'Bensin/Solar/CNG/Listrik',
                            ],
                        ) !!}
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Transmisi</label>
                        {!! Form::select('transmisi', ['Matic' => 'Matic', 'Manual' => 'Manual'], null, [
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'required' => 'required',
                            'placeholder' => 'Manual/Matic',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Warna</label>
                        {!! Form::text('warna', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => 'Merah',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Harga</label>
                        {!! Form::text('harga', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => '50.000.000',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        {!! Form::text('deskripsi', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => 'km 10.000, pajak hidup, service rutin',
                        ]) !!}
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-gray-900 dark:text-white">Kontak Penjual (WA)</label>
                        {!! Form::text('kontak_penjual', null, [
                            'required' => 'required',
                            'class' =>
                                'bg-gray-50 border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
                            'placeholder' => '08xxxxxxx',
                        ]) !!}
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                {!! Form::submit('Add Cars', [
                    'class' =>
                        'text-white cursor-pointer bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2',
                    'onclick' => 'return confirmSubmission()',
                ]) !!}
            </div>

            <div class="mt-4 text-center">
                <button type="reset"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Reset</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
