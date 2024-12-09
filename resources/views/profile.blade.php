@extends('layouts.layout')

@section('title')
    Assignments
@endsection

@section('content')
    <div class="md:mx-4  mt-20">

        <div class="container mx-auto my-24">
            <div class="bg-gray-200 p-6 rounded-md">
                <div class="flex md:flex-row flex-col gap-8 bg-white px-4 py-6 rounded-md">
                    <div class="w-full">
                        <h2 class="font-semibold text-xl">{{ $course->name }}</h1>
                            <p class="text-sm mt-2">{{ $course->description }}</p>
                    </div>
                    <div class="flex justify-center items-center gap-2 ">
                        <img class="h-24 w-24" src="{{ asset('images/man-victor.png') }}" alt="Assessor">
                        <div class="xl:mr-10 mr-4">
                            <h2 class="text-xl leading-none font-semibold">{{ $course->assessor }}</h2>
                            <p class="text-sm ">Assessor</p>
                        </div>
                    </div>
                </div>
    
    
                <div class="bg-white my-4 pt-4 pb-8 rounded-md">
                    <div>
                        <ul class="list-disc list-inside space-y-2 mx-4  mb-4  ">
                            <li class= " text-lg">Total Unit: <span
                                    class="font-bold">{{ $course->course_assignments }}</span></li>
                            <li class= " text-lg">Optional Unit: <span
                                    class="font-bold">{{ $course->optional_assignments }}</span>
                                @if ($course->with_optional == 1)
                                    <span class="text-sm font-semibold">(Select {{ $course->option_selected }} Unit From
                                        table your total unit is 6)</span>
                                @endif
                            </li>
                            {{-- <li class="text-primary font-semibold text-lg">Mandatory Unit: 5</li>
                            <li class="text-primary font-semibold text-lg">Optional Unit: 5</li> --}}
                        </ul>
                    </div>
                    <h2 class="font-semibold text-xl  mx-2 ">Course Content</h2>
    
                    <form id="unitForm" url="enrollCandidate" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ request()->get('c') }}">
                        <input type="hidden" name="user_id" value="{{ request()->get('i') }}">
                        <div id="dynamicInputs"></div>
                        <div class="relative overflow-x-auto mt-2">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase gradient-bg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Unit name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Reference No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            credit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            optional
                                        </th>
    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($course->assignments as $assignment)
                                        <tr class="bg-white border-b ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                              
                                                {{ $assignment->title }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $assignment->refrence_no }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $assignment->credits }}
                                            </td>
                                            <td class="px-6">
                                                <span>
                                                    @if ($assignment->optional == 0)
                                                        <input type="hidden" name="reference_no[]"
                                                            value="{{ $assignment->refrence_no }}">
                                                        <input type="hidden"name="assignment_id[]"
                                                            value="{{ $assignment->id }}">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 384 512">
                                                            <path fill="#087a06"
                                                                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                        </svg>
                                                    @else
                                                        <svg class="h-5 w-5"
                                                            xmlns="http://www.w3.org/2000/svg"viewBox="0 0 448 512">
                                                            <path fill="red"
                                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                        </svg>
                                                    @endif
                                                </span>
                                            </td>
    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    
    
                        
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection

