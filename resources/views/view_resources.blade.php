@extends('layouts.layout')

@section('title', 'resources')

@section('content')
    <div class="lg:mx-4  mt-12">
        <div>
            <h1 class=" font-semibold   text-2xl ">Course Resources</h1>
        </div>

        <div class="shadow-dark mt-3  rounded-xl py-8 px-6  bg-white ">

            <div>
                @foreach ($resources as $data)
                    <div id="accordion-{{ $loop->iteration }}" data-accordion="collapse"
                        data-active-classes="bg-primary rounded-lg dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-gray-500 dark:text-gray-400">

                        <!-- Accordion Header -->
                        <h2 id="accordion-heading--{{ $loop->iteration }}" class="bg-primary rounded-lg mt-4">
                            <button type="button"
                                class="flex items-center justify-between w-full py-3 px-4 font-medium text-white gap-3"
                                data-accordion-target="#accordion-body--{{ $loop->iteration }}" aria-expanded="true"
                                aria-controls="accordion-body--{{ $loop->iteration }}">
                                <span>{{ $data->course->name }}</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>

                        <!-- Accordion Body -->
                        <div id="accordion-body--{{ $loop->iteration }}" class="hidden bg-[#339b9668] rounded-b-lg p-2"
                            aria-labelledby="accordion-heading--{{ $loop->iteration }}">
                            <div class="py-5 px-2">
                                {{-- <p class="mb-2 text-black font-semibold">{{ $data->resource_name }}</p> --}}

                                <!-- PDF Card -->
                                <a href="{{ asset($data->resource_file) }}" download="{{ $data->resource_file }}"
                                    class="mt-2 block bg-white shadow-lg rounded-lg p-4">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-customOrange mr-3" xmlns="userhttp://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" />
                                        </svg>
                                        <div class="text-xl text-primary font-semibold">
                                            {{ $data->resource_name }}
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-400  mt-2">{{ $data->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection
