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
            <a class="nav-link text-dark" href="/home/profile">{{ __('Profile') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
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

@section('sidebar')
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

        @if (Session::has('delete'))
            <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissible fade show">
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
                <div class="list-group">
                    <a href="/home/admin" class="list-group-item list-group-item-action mb-3 border"
                        id="dashboardLink">Dashboard</a>
                    <a href="{{ route('cars') }}" class="list-group-item list-group-item-action mb-3 border active"
                        id="carsLink">Cars</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6">
            @if (session('status'))
                <h4 class="alert alert-warning mb-2"> {{ session('status') }} </h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Cars List

                    </h4>
                    <a href="{{ route('add_cars') }}">Add Cars</a>
                </div>
                <div class="card-body">
                </div>
            </div>


        </div>
    @endsection
