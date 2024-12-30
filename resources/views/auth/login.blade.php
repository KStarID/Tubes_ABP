@extends('layouts.app')
@section('navbar_home')
    <div class="flex flex-col space-y-2 items-center">
        @guest
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
        @else
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

            <a href="{{ url('/profile') }}"
                class="flex items-center justify-center w-full text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg px-3 py-2">
                <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM12 6c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88C7.55 15.8 9.68 15 12 15s4.45.8 6.14 2.12C16.43 19.18 14.03 20 12 20z" />
                </svg>
                <span class="text-center">Profile</span>
            </a>
        @endguest
    </div>
@endsection

<style>
    .page-layout {
        grid-template-rows: auto 1fr;
        min-height: 100vh;
        padding-top: 64px;
    }
</style>

@section('content')
    <section class="my-10 page-layout bg-gray-50 dark:bg-gray-800">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="h-8 mr-2" src="{{ asset('admin_assets/img/removebg.png') }}" alt="logo">
                BaroCars
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-900 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                                placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="email"
                                autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        {{ old('remember') ? 'checked' : '' }}>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="/password/reset"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Login</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="{{ route('register') }}"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyAl4gTYNu0DbfR961joucQnGGmsO39SVss",
            authDomain: "testlaravel-8c5b7.firebaseapp.com",
            databaseURL: "https://testlaravel-8c5b7-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "testlaravel-8c5b7",
            storageBucket: "testlaravel-8c5b7.appspot.com",
            messagingSenderId: "286128112173",
            appId: "1:286128112173:web:ca77c3b1da2041db786ea4"
        };
        firebase.initializeApp(firebaseConfig);
        var facebookProvider = new firebase.auth.FacebookAuthProvider();
        var googleProvider = new firebase.auth.GoogleAuthProvider();
        var facebookCallbackLink = '/login/facebook/callback';
        var googleCallbackLink = '/login/google/callback';
        async function socialSignin(provider) {
            var socialProvider = null;
            if (provider == "facebook") {
                socialProvider = facebookProvider;
                document.getElementById('social-login-form').action = facebookCallbackLink;
            } else if (provider == "google") {
                socialProvider = googleProvider;
                document.getElementById('social-login-form').action = googleCallbackLink;
            } else {
                return;
            }
            firebase.auth().signInWithPopup(socialProvider).then(function(result) {
                result.user.getIdToken().then(function(result) {
                    document.getElementById('social-login-tokenId').value = result;
                    document.getElementById('social-login-form').submit();
                });
            }).catch(function(error) {
                // do error handling
                console.log(error);
            });
        }
    </script>
@endsection
