@extends('layouts.layout')

@section('title')
    Resources
@endsection

@section('content')
    <div class="p-10">
        <div class="flex justify-between gap-5">
            <div class="w-[200px] pt-3">
                @if (session('user_det')['role'] !== 'canditate')
                    <select name="course" id="course" class="rounded-[5px] w-[100px] bg-gray border-0 ps-8 focus:border-0">
                        <option value="Bacholer"> Bacholer</option>
                        <option value="Masters">Masters</option>
                    </select>
                @endif
            </div>
            <div>
                <form action="#" method="get" class="pt-3 relative">
                    <input placeholder="Search Here..." type="text" name="search" id="search"
                        class="rounded-full w-full  border-1 border-primary ps-8 focus:border-primary">
                    <svg class="w-7 h-7 text-[#545353] dark:text-white ps-2  absolute top-5 pb-0.5 float-end"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </form>
            </div>
        </div>

        <div class="">
            <div class="grid  xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-2 gap-5  mt-7">
                @for ($i = 1; $i <= 20; $i++)
                    <div class="h-[220px]  bg-white border border-primary rounded-lg p-3">
                        <a href="#">
                            <div class="flex justify-center">
                                <img width="120" src="{{ asset('images/icons/pdf-upload-3389.svg') }}" alt="">
                            </div>
                            <div class="mt-2">
                                <h1 class="text-lg font-semibold text-[#545353] text-center text-[16px]">LFFICT/23/029/V1.0
                                </h1>
                                <p class="text-[#545353c0] text-sm"> (Optional) UNIT 8 Review health and ....</p>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="flex justify-center">
        <ul class="flex items-center -space-x-px h-10 text-base">
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
                <a href="#" aria-current="page"
                    class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
@endsection
