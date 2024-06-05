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
            <a class="nav-link text-dark" href="{{ url('/news') }}">News</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="/home/profile">{{ __('Profile') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark active" href="{{ route('logout') }}"
                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
@endsection



@section('content')
    @if (session('status'))
        <h4 class="alert alert-warning mb-2"> {{ session('status') }} </h4>
    @endif

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
