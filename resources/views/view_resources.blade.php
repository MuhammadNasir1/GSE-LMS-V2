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
                <form class="max-w-md mx-auto">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search"
                            class="block min-w-[300px] px-4 py-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary "
                            placeholder="Search Mockups, Logos..." required />

                    </div>
                </form>
            </div>
        </div>

        <div class="">
            <div class="grid  xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-2 gap-5  mt-7">
                @for ($i = 1; $i <= 20; $i++)
                    <div class="h-[220px]  bg-white border border-gray-400  rounded-lg p-3 shadow-lg">
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
    <div class="mt-2 flex justify-center">
        <div class="flex">
            <!-- Previous Button -->
            <a href="#"
                class="flex items-center justify-center px-3 py-2 text-white  me-3 text-md font-medium text-gray-500 gradient-bg rounded-lg ">
                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Previous
            </a>
            <a href="#"
                class="flex items-center justify-center px-3 py-2 text-white  me-3 text-md font-medium text-gray-500 gradient-bg rounded-lg ">
                Next
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
@endsection
