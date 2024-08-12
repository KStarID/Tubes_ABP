@extends('layouts.app')
@section('navbar_home')
    @guest
        @if (Route::has('login'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
                <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
            <a class="nav-link text-dark" href="{{ url('/home') }}">Home</a>
        </li>

        <li
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar">
            <a class="nav-link text-dark" href="{{ url('/news') }}">News</a>
        </li>
    @endguest
@endsection

<!-- zoom  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const image = document.getElementById('uploadedImage');
        const cardBody = image.closest('.card-body');

        image.addEventListener('mousemove', function(e) {
            const rect = cardBody.getBoundingClientRect();
            const scale = 1.5; // Adjust the zoom level as needed
            const offsetX = (e.clientX - rect.left) / rect.width;
            const offsetY = (e.clientY - rect.top) / rect.height;

            image.style.transformOrigin = `${offsetX * 100}% ${offsetY * 100}%`;
            image.style.transform = `scale(${scale})`;
        });

        image.addEventListener('mouseleave', function() {
            image.style.transformOrigin = 'center';
            image.style.transform = 'scale(1)';
        });
    });
</script>

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

    <div class="container mx-auto px-4 py-6">
        <!-- Image Card -->
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow mb-6 overflow-hidden">
            <div class="card-body p-4 overflow-hidden">
                <img id="uploadedImage" src="{{ $news['image'] }}" alt="Uploaded Image"
                    class="w-full rounded h-auto transition-transform duration-300 ease-in-out">
            </div>
        </div>

        <!-- News Details Card -->
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow mb-6">
            <!-- Header dengan Border dan Spasi -->
            <div class="border-b mx-3 border-gray-200 dark:border-gray-700 p-4">
                <div class="flex justify-between items-center">
                    <!-- Judul Berita -->
                    <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">News Details</h4>
                    @if ($news['author'] == $author)
                        <!-- Tombol Edit dan Delete -->
                        <div class="flex space-x-2">
                            <form action="{{ route('delete_news', ['id' => $key]) }}" method="post"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('delete')
                                <a href="{{ url('/home/edit_news/' . $key) }}"
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2 mx-2">
                                    Edit
                                </a>

                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2 mx-2 ">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Isi Berita -->
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">{{ ucwords($news['judul']) }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Published on
                    {{ date('F j, Y', strtotime($news['tanggal'])) }} by {{ $news['author'] }}</p>
                <hr class="my-4 border-gray-300 dark:border-gray-600">
                <div class="text-gray-800 dark:text-gray-200 leading-relaxed">{{ $news['isi'] }}</div>
            </div>
        </div>


        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-4">
            <a href="{{ route('news') }}"
                class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-gray-800">
                Back to News
            </a>
            <a href="#comments"
                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-blue-800">
                View Comments
            </a>
        </div>

        <!-- Comments Section -->
        <div id="comments" class="mt-10">
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow mb-6">
                <div class="p-4 text-center">
                    <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-100"><strong>Comments</strong></h4>
                </div>
            </div>
            <!-- Example comment 1 -->
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow mb-4">
                <div class="p-4">
                    <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">John Doe</h5>
                    <p class="text-gray-700 dark:text-gray-300">This is a great article! Thanks for sharing.</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Posted on
                        {{ date('F j, Y', strtotime('2024-06-01')) }}</p>
                </div>
            </div>
            <!-- Example comment 2 -->
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow mb-4">
                <div class="p-4">
                    <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">Jane Smith</h5>
                    <p class="text-gray-700 dark:text-gray-300">Very informative and well-written.</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Posted on
                        {{ date('F j, Y', strtotime('2024-06-02')) }}</p>
                </div>
            </div>

            <!-- Comment Form -->
            <div class="bg-white dark:bg-gray-900 rounded-lg shadow mt-6">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Leave a Comment</h4>
                    <form>
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="mb-4">
                            <label for="comment"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment</label>
                            <textarea id="comment" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
