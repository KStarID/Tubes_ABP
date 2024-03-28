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



@section('content')
    @if (session('status'))
        <h4 class="alert alert-warning mb-2"> {{ session('status') }} </h4>
    @endif

    <div class="card rounded" id="dummyCarsContent">
        <h5 class="card-header">Add New Cars</h5>
        <div class="card-body">
            <!-- New User Form -->
            {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\Firebase\CarsController@store']) !!}

            <div class="form-group">
                {!! Form::label('Merk', 'Merk:') !!}
                {!! Form::text('merk', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Nama', 'Nama:') !!}
                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Harga', 'Harga:') !!}
                {!! Form::text('harga', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Cars', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
