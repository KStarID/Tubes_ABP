@extends('layouts.app')

@section('navbar_home')
    @if (Route::has('login'))
        @auth
            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ url('/home') }}">Home</a>
            </li>

            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ url('/news') }}">News</a>
            </li>
        @else
            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ url('/home') }}">Home</a>
            </li>

            <li>
                <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                    href="{{ url('/news') }}">News</a>
            </li>
        @endauth
    @else
    @endif
@endsection

@section('content')
    <div class="hero bg-cover bg-center flex items-center justify-center text-white my-2">
        <div class="text">
            <h4 class="text-3xl font-semibold mb-2">Powerful, Fun and</h4>
            <h1 class="text-5xl font-bold mb-4">Lets to <br> <span class="text-blue-500">Drive</span></h1>
            <p class="text-lg mb-6">Experience Excellence on Every Mile</p>
            <a href="{{ url('/home') }}" class="btn bg-blue-500 hover:bg-blue-600 text-white">Home</a>
        </div>
    </div>

    <div class="container mx-auto my-8">
        <div class="container text-center my-5">
            <h1
                class="my-9 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Welcome to <a href="https://barocars.up.railway.app/"
                    class="text-blue-500 hover:underline hover:bg-gray-300 md:hover:bg-transparent md:hover:text-blue-700 ">BaroCars
                    Web</a> <span>&#127881;</span> </h1>
            <div
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                <img id="logo-img" class="h-auto max-w-xl " src="{{ asset('admin_assets/img/removebg.png') }}">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="text-center dark:text-white">We've seamlessly integrated Firebase into our platform,
                        enabling powerful features like <span class="text-red-400">Realtime Database</span>, <span
                            class="text-red-400">Authentication</span>, <span class="text-red-400">Email
                            Verification</span>, and an <span class="text-red-400">Admin Panel</span>. With Firebase,
                        we ensure real-time data updates, secure user authentication, and efficient administration.
                        Lets go Explore!</p>
                    <p class="text-lg my-2 dark:text-white">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP
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
        /* font */
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
            height: 100vh;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero .text {
            width: 90%;
            margin: auto;
        }

        .hero .text h4 {
            font-size: 40px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .hero .text h1 {
            color: #fff;
            font-size: 65px;
            text-transform: uppercase;
            line-height: 1;
            margin-bottom: 30px;
        }

        .hero .text h1 span {
            color: #dd0707;
            font-size: 80px;
            font-weight: bold;
        }

        .hero .text p {
            color: #fff;
            margin-bottom: 30px;
        }

        .hero .text .btn {
            padding: 10px 30px;
            background-color: #dd0707;
            text-transform: uppercase;
            color: #fff;
            font-weight: bold;
            border-radius: 30px;
            border: 2px solid #dd0707;
            transition: 0.3s;
        }

        .hero .text .btn:hover {
            background-color: transparent;
        }
    </style>
@endsection
