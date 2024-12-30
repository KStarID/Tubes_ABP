@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
        </li>

        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dark">
            <a class="nav-link text-dark" href="{{ url('/home/news') }}">News</a>
        </li>
    @endguest
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
            // Menggunakan fungsi bawaan JavaScript confirm untuk menampilkan pesan konfirmasi
            var confirmation = confirm("Apakah data yang Anda masukkan sudah benar?");

            // Jika pengguna mengklik "Iya sudah"
            if (confirmation) {
                // Lakukan submit form
                document.getElementById("carForm").submit();
            } else {
                // Jika pengguna mengklik "Masih belum", batalkan submit form
                return false;
            }
        }
    </script>

    <div class="container">
        <div class="card rounded" id="dummyCarsContent">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-lg font-semibold">Edit News
                        <a href="{{ route('news_admin') }}" class="btn btn-sm btn-error float-end">Back</a>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <!-- Edit Car Form -->
                <form method="POST" action="{{ url('/home/update_news/' . $key) }}">
                    @csrf
                    @method('PUT')

                    <!-- Hidden field for seller's email -->
                    <input type="hidden" name="author" value="{{ auth()->user()->email }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul :</label>
                                <input type="text" name="judul" value="{{ $editdata['judul'] }}" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Content :</label>
                                <input type="text" name="isi" value="{{ $editdata['isi'] }}" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-accent btn-wide" onclick="return confirmSubmission()">Update
                            News</button>
                    </div>
                    <div class="form-group text-center">
                        <button type="reset" class="btn btn-sm btn-outline btn-error ">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
