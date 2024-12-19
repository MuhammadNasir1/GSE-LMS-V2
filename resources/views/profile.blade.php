@extends('layouts.layout')

@section('title')
    Profile
@endsection

@section('content')
    <div class="md:mx-4 my-10">

        <div class="container md:mx-auto mx-3 ">
            <div class=" rounded-md">
                <div class=" my-4 pt-4 pb-8 rounded-md">
                    <div class="flex lg:flex-row flex-col gap-4">
                        <div class="lg:w-[40%] w-full">
                            <div class="bg-white   w-full py-6 lg:px-6 px-3">
                                <div class="flex flex-col items-center">
                                    <img class="h-36 w-36 rounded-full object-cover "
                                        src="{{ asset('images/man-victor.png') }}" alt="user">
                                    <h3 class="font-semibold">{{ $user->name }}</h3>
                                </div>
                                <div class="mt-4">
                                    <div class="mb-4">
                                        <div class="flex gap-3 items-center">
                                            <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                                            </svg>
                                            <p class="text-gray-500 text-sm">{{ $user->phone }}</p>
                                        </div>
                                        <div class="flex gap-3 items-center mt-2">
                                            <svg class="w-4 h-4 text-primary" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                            </svg>
                                            <p class="text-gray-500 text-sm"> <a href="mailto:">{{ $user->email }}</a></p>
                                        </div>
                                    </div>
                                    <div class="mb-1 text-sm font-medium text-green-700">Completed</div>
                                    <div class="w-full bg-gray-200 rounded-md dark:bg-gray-700">
                                        <div class="bg-green-700 text-sm font-medium text-blue-100 text-center p-2 leading-none rounded-md"
                                            style="width: {{ $progress_data['completionPercentage'] }}%">
                                            {{ $progress_data['completionPercentage'] }}%</div>
                                    </div>


                                    <div class="mb-1 text-sm font-medium text-red-700 mt-2">Pending</div>
                                    <div class="w-full bg-gray-200 rounded-md ">
                                        <div class="bg-red-700 text-xs font-medium text-blue-100 text-center p-2 leading-none rounded-md"
                                            style="width: {{ abs($progress_data['completionPercentage'] - 100) }}%">
                                            {{ abs($progress_data['completionPercentage'] - 100) }}%</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-white rounded-md p-6">
                            <div class="grid xl:grid-cols-2 lg:grid-cols-1 md:grid-cols-2   gap-4">
                                <div
                                    class="flex border border-purple-800  gap-4 justify-between items-center py-6  rounded-xl px-4 w-full">
                                    <div>
                                        <h3 class="font-bold text-3xl text-black">{{ $progress_data['totalSubmissions'] }}
                                        </h3>
                                        <p class="text-gray-800 text-md">Submission</p>
                                    </div>
                                    <div
                                        class="h-16 w-16 flex-shrink-0 bg-purple-800 rounded-full flex items-center justify-center">
                                        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="#ffffff"
                                                d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                                        </svg>
                                    </div>
                                </div>
                                    {{-- <div
                                        class="flex border border-yellow-400  gap-4 justify-between items-center py-6 rounded-xl px-4 w-full">
                                        <div>
                                            <h3 class="font-bold text-3xl text-black">{{ $progress_data['completionPercentage'] }}
                                            </h3>
                                            <p class="text-yell text-lg">pending Units</p>
                                        </div>
                                        <div
                                            class="h-16 w-16 flex-shrink-0 bg-[#fbbc1d] rounded-full flex justify-center items-center">
                                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="#ffffff"
                                                    d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
                                            </svg>
                                        </div>
                                    </div> --}}
                                <div
                                    class="flex border border-green-900  gap-4 justify-between items-center py-6 rounded-xl px-4 w-full">

                                    <div>
                                        <h3 class="font-bold text-3xl text-black">{{ $progress_data['assessments'] }}</h3>
                                        <p class="text-gray-800 text-lg"> Assessment </p>
                                    </div>
                                    <div
                                        class="h-16 w-16 flex-shrink-0 bg-green-800 rounded-full flex justify-center  items-center">
                                        <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="#ffffff"
                                                d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                                        </svg>
                                    </div>
                                </div>

                                <div
                                    class="flex border border-red-600  gap-4 justify-between items-center py-6 rounded-xl px-4 w-full">

                                    <div>
                                        <h3 class="font-bold text-3xl text-black">{{ $progress_data['feedbacks'] }}</h3>
                                        <p class="text-gray-800 text-lg">Feedback</p>
                                    </div>
                                    <div
                                        class="h-16 w-16 flex-shrink-0 bg-red-900 rounded-full flex justify-center items-center">
                                        <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="#ffffff"
                                                d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM112 192l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-160 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                        </svg>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="grid grid-cols-2 px-4">
                    <div
                        class="flex border border-primary  gap-4 justify-between items-center py-6  rounded-xl px-4 w-full">
                        <div>
                            <h3 class="font-bold text-2xl text-black">00</h3>
                            <p class="text-gray-800 text-md">Submission</p>
                        </div>
                        <div
                            class="h-16 w-16 flex-shrink-0 bg-[#fe8949] rounded-full flex items-center justify-center">
                            <svg class="w108 10-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
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
                            class="h-16 w-16 flex-shrink-0 bg-[#fe8949] rounded-full flex items-center justify-center">
                            <svg class="w108 10-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="#ffffff"
                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                            </svg>
                        </div>
                    </div>
                </div>
                 --}}

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
                                    <tr
                                        class="{{ $assignment->checked_status == 1 ? 'bg-green-100' : 'bg-white' }} border-b ">
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
