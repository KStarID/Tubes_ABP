@extends('layouts.app')

@section('navbar_home')
    @guest
        <li class="nav-item">
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar"
                href="{{ url('/home') }}">Home</a>
        </li>

        <li class="nav-item">
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar"
                href="{{ url('/news') }}">News</a>
        </li>
    @else
        <li class="nav-item">
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar"
                href="{{ url('/home') }}">Home</a>
        </li>

        <li class="nav-item">
            <a class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-dar"
                href="{{ url('/news') }}">News</a>
        </li>
    @endguest
@endsection

<style>
    .card-2 {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-2:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }
</style>

@section('content')
    <div class="container mx-auto px-4 my-10">
        <h1 class="mb-10 text-2xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            Search Results for <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                "{{ $query }}"
                @if ($filter)
                    and "{{ $filter }}"
                @endif
            </span>
        </h1>

        <div class="mb-4 grid gap-5 sm:grid-cols-2 md:mb-8 lg:grid-cols-2 xl:grid-cols-3">
            @forelse($pagedPaginator->items() as $key => $item)
                <div
                    class="card-2 bg-white shadow-lg rounded-lg overflow-hidden dark:text-white dark:bg-gray-900 dark:border-gray-500">
                    <figure>
                        <img src="{{ $item['image'] }}" alt="car!" class="object-cover w-full h-56">
                    </figure>
                    <div class="p-5">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ ucwords($item['merk']) }} {{ $item['model'] }}
                            ({{ $item['tahun_pembuatan'] }})
                            @if ($item['kondisi'] == 'Baru')
                                <span
                                    class="bg-red-200 text-red-800 text-xl mx-auto font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">NEW</span>
                            @else
                                <span
                                    class="bg-indigo-200 text-indigo-800 text-xl mx-auto font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">USED</span>
                            @endif
                        </h2>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price : Rp. {{ $item['harga'] }}</p>
                        <div class="mt-5 flex items-center justify-end gap-4">
                            <a href="{{ url('/home/product_details/' . $key) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                More Details
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center">No Record Found</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="flex justify-center items-center -space-x-px h-10 text-base">

                {{-- Previous Page Link --}}
                <li>
                    <a href="{{ $pagedPaginator->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>

                {{-- Pagination Elements --}}
                @foreach ($pagedPaginator->getUrlRange(1, $pagedPaginator->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $pagedPaginator->currentPage() ? 'z-10' : '' }}">
                        <a href="{{ $url }}"
                            class="{{ $page == $pagedPaginator->currentPage() ? 'flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>' : 'flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                            {{ $page }}
                        </a>
                    </li>
                @endforeach

                {{-- Next Page Link --}}
                <li>
                    <a href="{{ $pagedPaginator->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
@endsection
