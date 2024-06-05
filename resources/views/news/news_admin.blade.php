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
    <style>
        /* Your styles here */
        body {
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow-y: scroll;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        .list-group-item.active {
            background-color: rgba(232, 236, 238, 255) !important;
            color: black;
        }
    </style>
    <div class="container">

        @if (Session::has('message'))
            <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif

        @if (Session::has('edit'))
            <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-success') }} alert-dismissible fade show">
                {{ Session::get('edit') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif

        @if (Session::has('photo'))
            <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-warning') }} alert-dismissible fade show">
                {{ Session::get('photo') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif

        @if (Session::has('delete'))
            <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-error') }} alert-dismissible fade show">
                {{ Session::get('delete') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </p>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-3 col-sm-12 p-3">
                <div class="list-group d-flex flex-row">
                    <a href="/home/admin" class="list-group-item list-group-item-action mb-3 border"
                        id="dashboardLink">Dashboard</a>
                    <a href="{{ route('cars') }}" class="list-group-item list-group-item-action mb-3 border"
                        id="CarsLink">Cars</a>
                    <a href="{{ route('news_admin') }}" class="list-group-item list-group-item-action mb-3 border active"
                        id="CarsLink">News</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="card-header mb-6">
                <h4 class="text-lg font-semibold">Your News Added
                    <a href="{{ route('add_news') }}" class="btn btn-sm btn-primary float-end">Add News</a>
                </h4>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="row mt-4">
            @forelse($reference as $key => $item)
                @if ($item['author'] == $author)
                    <div class="col-md-4 mb-4">
                        <div class="card-2 bg-white shadow-lg rounded-lg overflow-hidden">
                            <figure>
                                <img src="{{ $item['image'] }}" alt="car!" class="object-cover w-full h-56">
                            </figure>
                            <div class="card-body">
                                <h2 class="text-xl font-semibold">{{ ucwords($item['judul']) }}
                                </h2>
                                <span class="badge badge-pill badge-danger">
                                    <p>{{ date('d-m-Y', strtotime($item['tanggal'])) }} </p>
                                </span>
                                <div class="flex justify-end mt-1">
                                    <a href="{{ url('/home/news_details/' . $key) }}" class="btn btn-danger">Read Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-md-12">
                    <p class="text-center">No Record Found</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
