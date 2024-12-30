@extends('layouts.app')

@section('navbar_home')
    @if (Route::has('login'))
        @auth
            <div class="flex flex-col space-y-2 items-center">
                <a href="{{ url('/home') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                    </svg>
                    <span class="text-center">Home</span>
                </a>

                <a href="{{ url('/news') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Z" />
                    </svg>
                    <span class="text-center">News</span>
                </a>
            </div>
        @else
            <div class="flex flex-col space-y-2 items-center">
                <a href="{{ url('/home') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                    </svg>
                    <span class="text-center">Home</span>
                </a>

                <a href="{{ url('/news') }}"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Z" />
                    </svg>
                    <span class="text-center">News</span>
                </a>

                <a href="https://drive.google.com/file/d/1n896xn_1m42nfTfjU8fp-35WcQV5EOeq/view?usp=sharing"
                    class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-center">Download App</span>
                </a>
            </div>
        @endauth
    @endif
@endsection

@section('content')
    <div class="hero bg-cover bg-center flex items-center justify-center text-white my-2 min-h-screen">
        <div class="text px-4 sm:px-6 lg:px-8">
            <h4 class="text-2xl sm:text-3xl font-semibold mb-2">Powerful, Fun and</h4>
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">Lets to <br> <span class="text-blue-500">Drive</span></h1>
            <p class="text-base sm:text-lg mb-6">Experience Excellence on Every Mile</p>
            <a href="{{ url('/home') }}"
                class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full transition duration-300">Home</a>
        </div>
    </div>

    <div class="container mx-auto my-8 px-4 sm:px-6 lg:px-8">
        <div class="text-center my-5">
            <h1
                class="my-9 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                Welcome to <a href="https://barocars.up.railway.app/"
                    class="text-blue-500 hover:underline hover:bg-gray-300 md:hover:bg-transparent md:hover:text-blue-700">BaroCars
                    Web</a> <span>&#127881;</span>
            </h1>
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img id="logo-img" class="h-auto max-w-full md:max-w-xl" src="{{ asset('admin_assets/img/removebg.png') }}"
                    alt="BaroCars Logo">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="text-center text-sm sm:text-base dark:text-white">We've seamlessly integrated Firebase into
                        our platform,
                        enabling powerful features like <span class="text-red-400">Realtime Database</span>, <span
                            class="text-red-400">Authentication</span>, <span class="text-red-400">Email
                            Verification</span>, and an <span class="text-red-400">Admin Panel</span>. With Firebase,
                        we ensure real-time data updates, secure user authentication, and efficient administration.
                        Lets go Explore!</p>
                    <p class="text-sm sm:text-base lg:text-lg my-2 dark:text-white">Laravel
                        v{{ Illuminate\Foundation\Application::VERSION }} (PHP
                        v{{ PHP_VERSION }})</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let heroBg = document.querySelector('.hero');
        let bgLightUrl = "{{ asset('admin_assets/img/bg-light.jpg') }}";
        let bgUrl = "{{ asset('admin_assets/img/bg.jpg') }}";

        setInterval(() => {
            heroBg.style.backgroundImage = "url('" + bgLightUrl + "')";

            setTimeout(() => {
                heroBg.style.backgroundImage = "url('" + bgUrl + "')";
            }, 1000);
        }, 2200);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            width: 100%;
            min-height: 100vh;
            background-position: center;
            background-size: cover;
            display: flex;
        }

        .hero .text {
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .hero .text h4 {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            color: #fff;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .hero .text h1 {
            color: #fff;
            font-size: clamp(2rem, 6vw, 4rem);
            text-transform: uppercase;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero .text h1 span {
            color: #dd0707;
            font-size: clamp(2.5rem, 7vw, 5rem);
            font-weight: bold;
        }

        .hero .text p {
            color: #fff;
            margin-bottom: 30px;
            font-size: clamp(1rem, 3vw, 1.25rem);
        }

        .hero .text .btn {
            display: inline-block;
            padding: 10px 30px;
            background-color: #dd0707;
            text-transform: uppercase;
            color: #fff;
            font-weight: bold;
            border-radius: 30px;
            border: 2px solid #dd0707;
            transition: 0.3s;
            font-size: clamp(0.875rem, 2vw, 1rem);
        }

        .hero .text .btn:hover {
            background-color: transparent;
        }

        @media (max-width: 768px) {
            .hero .text {
                padding: 0 20px;
            }
        }
    </style>
@endsection
