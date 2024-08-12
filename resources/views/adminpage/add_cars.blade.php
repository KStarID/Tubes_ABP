@extends('layouts.app')
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
            <a class="nav-link text-dark" href="{{ url('/home/news') }}">News</a>
        </li>
    @endguest
@endsection

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
