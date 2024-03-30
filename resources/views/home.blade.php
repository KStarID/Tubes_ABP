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
        @if ($user->customClaims['admin'])
            <li class="nav-item">
                <a class="nav-link text-dark" href="/home/admin">{{ __('Seller') }}</a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link text-dark" href="/home/profile">{{ __('Profile') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('logout') }}"
                onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        @if ($user->customClaims['admin'] == false)
            <li class="nav-item">
                <a class="nav-link text-dark" href="/home/iamadmin">Become Seller</a>
            </li>
        @endif
    @endguest
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-warning mb-2">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="text-lg font-semibold" style="margin-left: 2rem; margin-right: 2rem;">Cars List
                        <p class="float-end">Hello, {{ $user->displayName }}</p>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Cards Section -->
    <div class="row mt-4">
        @forelse($reference as $key => $item)
            <div class="col-md-4 mb-4">
                <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                    <figure>
                        <img src="{{ $item['image'] }}" alt="car!" class="object-cover w-full h-56">
                    </figure>
                    <div class="card-body">
                        <h2 class="text-xl font-semibold">{{ $item['merk'] }} {{ $item['model'] }}
                            ({{ $item['tahun_pembuatan'] }})
                        </h2>
                        <p class="text-sm text-gray-600">Condition : {{ $item['kondisi'] }}</p>
                        <p class="text-sm text-gray-600">Price : {{ $item['harga'] }}</p>
                        <div class="flex justify-end mt-2">
                            <a href="{{ url('/home/product_details/' . $key) }}" class="btn btn-success">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <p class="text-center">No Record Found</p>
            </div>
        @endforelse

    </div>
@endsection
