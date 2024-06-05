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
            <a class="nav-link text-dark" href="{{ url('/home') }}">News</a>
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
                    <h4 class="text-lg font-semibold">Add New News
                        <a href="{{ route('news') }}" class="btn btn-sm btn-outline-danger float-end">Back</a>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <!-- New Car Form -->
                {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\Firebase\NewsController@store']) !!}

                <!-- Field untuk Email Penjual -->
                {!! Form::hidden('author', auth()->user()->email) !!}

                <div class="row">
                    <div class="form-group mb-3">
                        <label class="form-label flex items-center gap-2">
                            Judul:
                            {!! Form::text('judul', null, [
                                'required' => 'required',
                                'class' => 'form-control',
                                'placeholder' => 'Cars Event',
                            ]) !!}
                        </label>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label flex items-center gap-2">
                            Content:
                            {!! Form::textarea('isi', null, [
                                'required' => 'required',
                                'class' => 'form-control',
                                'placeholder' => 'Text Event',
                                'rows' => 5,
                            ]) !!}
                        </label>
                    </div>

                    <div class="form-group text-center">
                        {!! Form::submit('Add News', [
                            'class' => 'btn btn-outline-info btn-wide',
                            'onclick' => 'return confirmSubmission()',
                        ]) !!}
                    </div>

                    <div class="form-group text-center">
                        <button type="reset" class="btn btn-sm btn-outline-danger ">Reset</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <script>
                    // Menghapus placeholder saat input field diisi
                    document.querySelectorAll('.form-control').forEach(input => {
                        input.addEventListener('input', () => {
                            input.removeAttribute('placeholder');
                        });
                    });
                </script>
            </div>
        </div>
    @endsection
