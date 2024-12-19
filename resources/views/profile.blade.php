@extends('layouts.layout')

@section('title')
    Assignments
@endsection

@section('content')
    <div class="md:mx-4 my-10">

        <div class="container mx-auto ">
            <div class=" rounded-md">
                <div class="bg-white my-4 pt-4 pb-8 rounded-md">


                    <div class="flex gap-4">
                        <div class="w-[70%]">
                            <div class="grid grid-cols-2 px-4">
                                <div
                                    class="flex border border-primary  gap-4 justify-between items-center py-6  rounded-xl px-4 w-full">
                                    <div>
                                        <h3 class="font-bold text-2xl text-black">00</h3>
                                        <p class="text-gray-800 text-md">Submission</p>
                                    </div>
                                    <div
                                        class="h-14 w-14 flex-shrink-0 bg-[#fe8949] rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="#ffffff"
                                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="flex border border-primary  gap-4 justify-between items-center py-6  rounded-xl px-4 w-full">
                                    <div>
                                        <h3 class="font-bold text-2xl text-black">00</h3>
                                        <p class="text-gray-800 text-md">Submission</p>
                                    </div>
                                    <div
                                        class="h-14 w-14 flex-shrink-0 bg-[#fe8949] rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="#ffffff"
                                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white my-4 pt-4 pb-8 rounded-md">
                    <div class="w-full  mx-4 my-4">
                        <h2 class="font-semibold text-xl">Course:-{{ $course->name }}</h1>
                    </div>
                    <h2 class="font-semibold text-xl  mx-2 ">Course Content</h2>


                    <div class="relative overflow-x-auto mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase gradient-bg">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Reference No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Unit name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        credit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Submission 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rejections 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Completed
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enroll_assignments as $assignment)
                                    <tr class="{{$assignment->checked_status == 1 ? 'bg-green-100' : "bg-white"}} border-b ">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $assignment->assignment_details->refrence_no }}
                                        </th>
                                        <td class="px-6 py-4">

                                            {{ $assignment->assignment_details->title }}
                                        </td>
                                        <td class="px-8 py-4">

                                            {{ $assignment->assignment_details->credits }}
                                        </td>
                                        <td class="px-8 py-4">
                                            {{ $assignment->submission_count }}
                                        </td>
                                        <td class="px-8 py-4">
                                            {{ $assignment->rejected_count }}
                                        </td>
                                        <td class="px-8">
                                            <span>
                                                @if ($assignment->checked_status == 1)
                                                    <svg class="h-5 w-5"
                                                        xmlns="http://www.w3.org/2000/svg"viewBox="0 0 448 512">
                                                        <path fill="#087a06"
                                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 384 512">
                                                        <path fill="red"
                                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                    </svg>
                                                @endif
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
