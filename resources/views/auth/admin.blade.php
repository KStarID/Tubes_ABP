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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "searching": false,
                "lengthChange": false,
                "pageLength": 10,
                "paging": false,
                "info": false,
            });

            showDashboard();

        });

        function showDashboard() {
            document.getElementById('dashboardContent').style.display = 'block';
            document.getElementById('CarsContent').style.display = 'none';

            document.getElementById('dashboardLink').classList.add('active');
            document.getElementById('CarsLink').classList.remove('active');
        }

        function showCars() {
            document.getElementById('dashboardContent').style.display = 'none';
            document.getElementById('CarsContent').style.display = 'block';

            document.getElementById('dashboardLink').classList.remove('active');
            document.getElementById('CarsLink').classList.add('active');
        };
    </script>

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
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action mb-3 border active"
                        id="dashboardLink">Dashboard</a>
                    <a href="{{ route('cars') }}" class="list-group-item list-group-item-action mb-3 border active"
                        id="CarsLink">Cars</a>
                </div>
            </div>

            <div class="col-md-9 col-sm-12 p-3">
                <!-- Dashboard Content -->
                <div class="card rounded content-section" id="dashboardContent">
                    <h5 class="card-header">Dashboard Content</h5>
                    <div class="card-body row">
                        <!-- Example: Total Users Count -->
                        <div class="col-3">
                            <div class="card rounded text-center h-100">
                                <div class="card-header bg-warning">Total Users</div>
                                <div class="card-body display-4">{{ count($users) }}</div>
                            </div>
                        </div>

                        <!-- Example: System Information -->
                        <div class="col-9">
                            <div class="card rounded h-100">
                                <div class="card-header bg-success text-center">System Information</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 text-left"><strong>Laravel Version</strong></div>
                                        <div class="col-8">: &ThinSpace; {{ Illuminate\Foundation\Application::VERSION }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-left"><strong>PHP Version</strong></div>
                                        <div class="col-8">: &ThinSpace; {{ PHP_VERSION }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 text-left"><strong>Database</strong></div>
                                        <div class="col-8">: &ThinSpace; Firebase</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Example: Recent Active Users Table -->
                        <div class="col-12 pt-3">
                            <div class="card rounded ">
                                <div class="card-header bg-info text-white">Recent Active Users</div>
                                <table id="usersTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Logged-In</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->displayName }}</td>
                                                <td>{{ Carbon\Carbon::parse($user->metadata->lastLoginAt)->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Content -->
                <div class="card rounded" id="CarsContent">
                    <h5 class="card-header">Cars Content</h5>
                    <!-- Example: Recent Active Users Table with Additional Information -->
                    <div class="col-12 pt-3">
                        <div class="card rounded ">
                            {{-- <div class="card-header bg-info text-white">User Information</div> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Last Signed In</th>
                                        <th scope="col">Email Verified</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->displayName }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ Carbon\Carbon::parse($user->metadata->lastLoginAt)->diffForHumans() }}
                                            </td>
                                            <td style="text-align: center;">{{ $user->emailVerified ? 'Yes' : 'No' }}</td>
                                            <td class="text-center">{{ $user->disabled ? 'Disabled' : 'Active' }}</td>
                                            <td>
                                                @if ($currentUser != $user->uid)
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#{{ $user->uid }}">
                                                        Edit
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="{{ $user->uid }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="{{ $user->uid }}"
                                                        aria-hidden="true">
                                                        <!-- Modal content here -->
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        User: {{ $user->displayName }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Example: Form fields for editing user details -->

                                                                    {!! Form::model($user, [
                                                                        'method' => 'PATCH',
                                                                        'action' => ['App\Http\Controllers\Auth\AdminController@update', $user->uid],
                                                                    ]) !!}

                                                                    <div class="form-group">
                                                                        {!! Form::label('displayName', 'First Name:') !!}
                                                                        {!! Form::text('displayName', null, ['class' => 'form-control']) !!}
                                                                    </div>

                                                                    <div class="form-group">
                                                                        {!! Form::label('email', 'Email:') !!}
                                                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                                    </div>

                                                                    <div class="modal-footer border-0">


                                                                        {{-- <button type="button" class="btn btn-success">Save changes</button> --}}
                                                                        {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}
                                                                        {!! Form::close() !!}

                                                                        @if ($user->disabled)
                                                                            {!! Form::open([
                                                                                'method' => 'DELETE',
                                                                                'action' => ['App\Http\Controllers\Auth\AdminController@destroy', $user->uid],
                                                                            ]) !!}
                                                                            {!! Form::submit('Enable Account', ['class' => 'btn btn-success']) !!}
                                                                            {!! Form::close() !!}
                                                                        @else
                                                                            {!! Form::open([
                                                                                'method' => 'DELETE',
                                                                                'action' => ['App\Http\Controllers\Auth\AdminController@destroy', $user->uid],
                                                                            ]) !!}
                                                                            {!! Form::submit('Disable Account', ['class' => 'btn btn-danger']) !!}
                                                                            {!! Form::close() !!}
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Dummy Content -->
                <div class="card rounded" id="dummyCarsContent">
                    <h5 class="card-header">Add New Cars</h5>
                    <div class="card-body">
                        <!-- New User Form -->
                        {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\Auth\AdminController@store']) !!}

                        <div class="form-group">
                            {!! Form::label('displayName', 'Display Name:') !!}
                            {!! Form::text('displayName', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>

                <!-- Cars Content -->
                <div class="card rounded" id="CarsContent">
                    <h5 class="card-header">Cars Content</h5>
                    <!-- Example: Recent Active Cars Table with Additional Information -->
                    <div class="col-12 pt-3">
                        <div class="card rounded ">
                            {{-- <div class="card-header bg-info text-white">User Information</div> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Author</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Dummy Content -->
                <div class="card rounded" id="dummyCarsContent">
                    <h5 class="card-header">Add New Cars</h5>
                    <div class="card-body">
                        <!-- New User Form -->
                        {{-- {!! Form::open({['method' => 'POST', 'action' => "url('/home/admin')"]}) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category', 'Category:') !!}
                            {!! Form::text('category', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::text('description', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('author', 'Author:') !!}
                            {!! Form::text('author', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create News', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!} --}}

                        <form action="{{ url('add-cars') }}" method="POST">
                            @csrf

                            <div class="form-group mb3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group mb3">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control">
                            </div>

                            <div class="form-group mb3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>

                            <div class="form-group mb3">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="form-group mb3">
                                <button type="submit" class="btn btn-primary">Create New Cars</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
