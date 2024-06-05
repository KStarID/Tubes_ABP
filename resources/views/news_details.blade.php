@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
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

<!-- zoom  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var image = document.getElementById('uploadedImage');
        var cardBody = image.closest('.card-body');

        image.addEventListener('mousemove', function(e) {
            var rect = cardBody.getBoundingClientRect();
            var scale = 1.5; // Adjust the zoom level as needed
            var offsetX = (e.clientX - rect.left) / rect.width;
            var offsetY = (e.clientY - rect.top) / rect.height;

            image.style.transformOrigin = (offsetX * 100) + '% ' + (offsetY * 100) + '%';
            image.style.transform = 'scale(' + scale + ')';
        });

        image.addEventListener('mouseleave', function() {
            image.style.transformOrigin = 'center';
            image.style.transform = 'scale(1)';
        });
    });
</script>




@section('content')
    @if (session('status'))
        <h4 class="alert alert-warning mb-2"> {{ session('status') }} </h4>
    @endif
    <div class="container">
        <div class="card shadow rounded mb-3">
            <div class="card-body overflow-hidden">
                <img id="uploadedImage" src="{{ $news['image'] }}" alt="Uploaded Image" class="img-fluid">
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header mb-2">
                <div class="d-flex justify-content-between text-center mb-3">
                    <h4 class="card-title text-lg font-semibold mb-0"><strong>News Details</strong></h4>
                    @if ($news['author'] == $author)
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ url('/home/edit_news/' . $key) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('delete_news', ['id' => $key]) }}" method="post"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger ml-2">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body mt-2">
                <h1 class="card-title">{{ ucwords($news['judul']) }}</h1>
                <p class="text-muted">Published on {{ date('F j, Y', strtotime($news['tanggal'])) }} by
                    {{ $news['author'] }}</p>
                <hr>
                <div class="card-text">
                    {{ $news['isi'] }}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('news') }}" class="btn btn-secondary">Back to News</a>
            <a href="#comments" class="btn btn-primary">View Comments</a>
        </div>
        <div id="comments" class="mt-5">
            <div class="card-header mb-3">
                <div class="text-center">
                    <h4><strong>Comments</strong></h4>
                </div>
            </div>
            <!-- Example comment section -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">This is a great article! Thanks for sharing.</p>
                    <p class="card-text"><small class="text-muted">Posted on
                            {{ date('F j, Y', strtotime('2024-06-01')) }}</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Very informative and well-written.</p>
                    <p class="card-text"><small class="text-muted">Posted on
                            {{ date('F j, Y', strtotime('2024-06-02')) }}</small></p>
                </div>
            </div>
            <!-- Comment form -->
            <div class="card mt-4">
                <div class="card-body">
                    <h4>Leave a Comment</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
