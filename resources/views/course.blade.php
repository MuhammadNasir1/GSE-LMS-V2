@extends('layouts.layout')

@section('title')
    Courses
@endsection

@section('content')
    <div class="md:mx-4 mt-1">

        <div class=" mt-3  rounded-xl py-8 px-[20px]  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-start  mb-3">
                    <form action="">

                        <form class="max-w-md mx-auto">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="search"
                                    class="block min-w-[300px] px-4 py-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary "
                                    placeholder="Search course, details..." required />

                            </div>
                        </form>

                    </form>
                    @if (session('user_det')['role'] == 'admin')
                        {{-- <div>

                            <button data-modal-target="addCourseModal" data-modal-toggle="addCourseModal"
                                class="bg-primary cursor-pointer text-white h-12 px-5 py-3 rounded-[6px]  shadow-sm font-semibold ">+
                                Add Course</button>
                        </div> --}}
                    @endif
                </div>
                <div class="grid grid-cols-3 gap-6 mt-4  xl:px-[80px] ">


                    {{-- @for ($i = 1; $i <= 4; $i++) --}}
                    @foreach ($courses as $data)
                        <div class="max-w-full bg-white shadow-lg rounded-lg  dark:bg-gray-800 dark:border-gray-700 cursor-pointer  relative   {!! session('user_det')['role'] == 'student' &&
                        isset($data->enrolled_course) &&
                        $data->enrolled_course->course == $data->id
                            ? 'courseCard'
                            : (session('user_det')['role'] != 'student'
                                ? 'courseCard'
                                : '') !!}""
                            {!! session('user_det')['role'] == 'student' &&
                            isset($data->enrolled_course) &&
                            $data->enrolled_course->course == $data->id
                                ? 'data-modal-target="CourseDetailsModal" data-modal-toggle="CourseDetailsModal" courseId="' . $data->id . '"'
                                : (session('user_det')['role'] != 'student'
                                    ? 'data-modal-target="CourseDetailsModal" data-modal-toggle="CourseDetailsModal" courseId="' . $data->id . '"'
                                    : '') !!}>
                            <a href="#">
                                <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg"
                                    alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $data->name }}</h5>
                                </a>
                                <p class="mb-1 font-normal font-sm text-gray-600 dark:text-gray-400">
                                    {{ strlen($data->description) > 60 ? substr($data->description, 0, 60) . '...' : $data->description }}
                                </p>
                                <a href="#" class="underline text-sm font-semibold text-primary  cursor-pointer ">
                                    More Details
                                </a>
                            </div>
                            @if (session('user_det')['role'] == 'student')
                                {{-- @if ($data->enrolled_course->course) --}}
                                <div
                                    class="bg-[#0000005d]  cursor-pointer  absolute h-full w-full flex  items-center top-0 rounded-lg z-40 flex-col {{ $data->enrolled_course->course == $data->id ? '' : 'hidden' }}">
                                    <div class="mt-20">
                                        <p class="text-white text-4xl font-semibold text-center ">Enrolled</p>
                                        <p class="text-white font-lg ">Click for course Details</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                    {{-- @endfor --}}

                </div>
                {{-- <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">STN</th>
                                <th class="whitespace-nowrap">Name</th>
                                <th class="whitespace-nowrap">Total Assignment </th>
                                <th class="whitespace-nowrap">Description</th>
                                <th class="flex  justify-center">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->total_assignments }}</td>
                                    <td>{{ $course->description }}</td>
                                    <td>
                                        <div class="flex gap-4">
                                            <a href="#">
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.1" cx="18" cy="18" r="18"
                                                        fill="#DF6F79" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M23.4905 13.7433C23.7356 13.7433 23.9396 13.9468 23.9396 14.2057V14.4451C23.9396 14.6977 23.7356 14.9075 23.4905 14.9075H13.0493C12.8036 14.9075 12.5996 14.6977 12.5996 14.4451V14.2057C12.5996 13.9468 12.8036 13.7433 13.0493 13.7433H14.8862C15.2594 13.7433 15.5841 13.478 15.6681 13.1038L15.7642 12.6742C15.9137 12.0889 16.4058 11.7002 16.9688 11.7002H19.5704C20.1273 11.7002 20.6249 12.0889 20.7688 12.6433L20.8718 13.1032C20.9551 13.478 21.2798 13.7433 21.6536 13.7433H23.4905ZM22.5573 22.4946C22.7491 20.7073 23.0849 16.4611 23.0849 16.4183C23.0971 16.2885 23.0548 16.1656 22.9709 16.0667C22.8808 15.9741 22.7669 15.9193 22.6412 15.9193H13.9028C13.7766 15.9193 13.6565 15.9741 13.5732 16.0667C13.4886 16.1656 13.447 16.2885 13.4531 16.4183C13.4542 16.4261 13.4663 16.5757 13.4864 16.8258C13.5759 17.9366 13.8251 21.0305 13.9861 22.4946C14.1001 23.5731 14.8078 24.251 15.8328 24.2756C16.6238 24.2938 17.4387 24.3001 18.272 24.3001C19.0569 24.3001 19.854 24.2938 20.6696 24.2756C21.7302 24.2573 22.4372 23.5914 22.5573 22.4946Z"
                                                        fill="#D11A2A" />
                                                </svg>

                                            </a>
                                            <button>
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.1" cx="18" cy="18" r="18"
                                                        fill="#233A85" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.1637 23.6197L22FV.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                        fill="#233A85" />
                                                </svg>

                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}

            </div>
        </div>
    </div>




    {{-- ============ add  course modal  =========== --}}
    <div id="addCourseModal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-7xl max-h-full ">
                    {{-- <form action="../addCourse" method="post" enctype="multipart/form-data"> --}}
                    <form id="courseData" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        Add Course
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addCourseModal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-3 gap-4  mx-6 my-6 relative">
                    <div>
                        <label class="text-[14px] font-normal" for="Course_name">Course Name</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="course_name" placeholder="Course Name Here" value="" required>
                    </div>
                    <div class="flex gap-4">
                        <div>
                            <label class="text-[14px] font-normal" for="assessor">Assessor</label>
                            <select name="assessor_id" id="assessor" required>
                                <option disabled selected>Select Assessor</option>
                                @foreach ($assessors as $assessor)
                                    <option value="{{ $assessor->id }}">{{ $assessor->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="qualification_number">Qualification Number</label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="qualification_number" id="qualification_num" placeholder="00/000/0" required>
                        </div>
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="course_assigment">Total Units</label>
                        <input type="number" required
                            class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="total_assignments" id="TotalAssigment" placeholder="0" required>
                    </div>
                    <div class="flex gap-4 col-span-3">
                        <div>
                            <label class="text-[14px] font-normal" for="CourseAssignments">Mandatory Units</label>
                            <input type="number" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="mandatory_assignments" id="mandatoryAssignments" placeholder="0" required value="0">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="CourseAssignments">Total Optional Units</label>
                            <input type="number" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="optional_assignments" id="optionalAssignment" placeholder="0" required>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="CourseAssignments">Optional To Be Selected</label>
                            <input type="number" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="option_selected" id="optionSelected" placeholder="0" required>
                        </div>
                    </div>


                    <div class="col-span-2 lg:col-span-3">
                        <label class="text-[14px] font-normal" for="description">Course Description</label>
                        <textarea name="description" id="description"
                            class="w-full min-h-20 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]" required
                            placeholder="Course Description Here"></textarea>
                    </div>
                    <div class="col-span-2 lg:col-span-3 grid grid-cols-3 gap-4" id="InputOutput">


                    </div>

                </div>
                {{-- <div>
                    <label class="text-[14px] invisible">+</label>
                    <button class="gradient-bg h-[40px] w-[40px] text-white font-bold rounded-[4px] "
                        id="addInputButton" type="button">+</button>
                </div> --}}



                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="addBtn">
                        <div class=" text-center hidden" id="spinner">
                            <svg aria-hidden="true"
                                class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                        <div id="text">
                            @lang('lang.Save')
                        </div>

                    </button>
                </div>
            </div>
            </form>
            <div>

            </div>

        </div>
    </div>

    {{-- ============   course Details modal  =========== --}}
    <div id="CourseDetailsModal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-7xl max-h-full ">
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        Course Details
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="CourseDetailsModal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div>
                    <div class=" text-center  min-h-[150px] flex justify-center items-center hidden" id="Coursespinner">
                        <svg aria-hidden="true"
                            class="w-12 h-12 mx-auto text-center text-gray-200 animate-spin fill-primary"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8 mb-4 mx-5 " id="courseInfoData">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8 mb-4 mx-5">
                            <table>
                                <thead>
                                    <tr class="border-b border-primary">
                                        <th class="gradient-bg text-white p-3 whitespace-nowrap border-b border-white ">
                                            Course Name</th>
                                        <td class="p-3 min-w-[280px]" id="courseName"></td>
                                        <th rowspan="2" class="gradient-bg  text-white p-3 border-b border-white">
                                            Descritpion</th>
                                        <td rowspan="2" class="border-b border-primary p-3" id="courseDescription">
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <th
                                            class="gradient-bg  text-white mt-2 p-3 whitespace-nowrap border-b border-white">
                                            Teacher Name</th>
                                        <td class="p-3 border-b border-primary" id="teacher">Jonse Mask</td>
                                    </tr>
                                    <tr class="">
                                        <th
                                            class="gradient-bg  text-white mt-2 p-3 whitespace-nowrap border-b border-white">
                                            Qualification Number</th>
                                        <td class="p-3" class="border-b border-primary" id="qualificationNumber">
                                            603/7356/5</td>
                                        <th
                                            class="gradient-bg  text-white mt-2 p-3 whitespace-nowrap border-b border-white">
                                            Total/Course Units</th>
                                        <td class="p-3" id="assigments">10/10</td>
                                        {{-- <th
                                            class="gradient-bg  text-white mt-2 p-3 whitespace-nowrap border-b border-white">
                                            Course Assignment</th>
                                        <td class="p-3">603/7356/5</td> --}}
                                    </tr>
                                </thead>
                            </table>
                        </div>


                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 mb-4 mx-5">
                            <h2 class="text-primary text-center my-2 font-semibold text-2xl">Units Details</h2>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase  gradient-bg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Refrence No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Credit
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Optional
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="corseAssigmentBody">




                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="flex justify-end ">
                        <button
                            class="bg-primary flex gap-2 text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn items-center  font-semibold ">Course
                            Resources <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg></button>
                    </div>
                </div>

            </div>
        </div>
    @endsection
    @section('js')
        @if (isset($user))
            <script>
                $(document).ready(function() {
                    $('#addCourseModal').removeClass("hidden");

                });
            </script>
        @endif
        <script>
            $(document).ready(function() {
                // insert data
                $("#courseData").submit(function(event) {
                    var url = "../addCourse";
                    event.preventDefault();
                    var formData = new FormData(this);
                    console.log(url);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#spinner').removeClass('hidden');
                            $('#text').addClass('hidden');
                            $('#addBtn').attr('disabled', true);
                        },
                        success: function(response) {
                            // console.log(response);
                            window.location.href = '../course';


                        },
                        error: function(jqXHR) {
                            let response = JSON.parse(jqXHR.responseText);
                            console.log("error");
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            );

                            $('#text').removeClass('hidden');
                            $('#spinner').addClass('hidden');
                            $('#addBtn').attr('disabled', false);
                        }
                    });
                });

                $('.courseCard').click(function() {
                    let url = "getSingleCourse/" + $(this).attr('courseId');

                    $.ajax({
                        type: "GET",
                        url: url,
                        beforeSend: function() {
                            $("#corseAssigmentBody").html('');
                            $('#courseInfoData').addClass('hidden');
                            $('#Coursespinner').removeClass('hidden');
                        },
                        success: function(response) {
                            $('#Coursespinner').addClass('hidden');
                            $('#courseInfoData').removeClass('hidden');
                            let data = response.courses;
                            $("#courseName").html(data.name);
                            $("#teacher").html(data.teacher);
                            $("#qualificationNumber").html(data.qualification_number);
                            $("#courseDescription").html(data.description);

                            $("#assigments").html(data.total_assignments + "/" + data
                                .course_assignments);

                            data.course_assignment.forEach(assignment => {

                                let row = ` <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${assignment.refrence_no}</th>
                                        <td class="px-6 py-4">${assignment.title}</td>
                                        <th class="px-6 py-4">${assignment.credits}</th>
                                        <td class="px-6 py-4">
                                           ${assignment.optional == 0 ? `
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="#087a06" d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                                            </svg>` : ` <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path fill='red'd="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                        </svg>`
            }
                                        </td>
                                    </tr>`
                                $("#corseAssigmentBody").append(row);
                            });
                        }

                    });
                })

                function addInputs() {
                    $('#TotalAssigment').on('input', function() {
                        let assignmentCount = $(this).val();
                        // change user cousre assignment
                        $('#CourseAssignments').val(assignmentCount);
                        console.log(assignmentCount);

                        let inputsHtml = ` <div>
                            <label class="text-[14px] font-normal" for="RefrenceNo">Refrence No </label>
                           <div class="w-full flex gap-2 items-center"> <input name="optional[]"  id="assignment_importance" type="checkbox" value="1" class="w-6 h-6 text-red-600 bg-green-500 border-primary  rounded-[4px] ">
                            <input type="text" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="refrence_no[]" id="RefrenceNo" placeholder="Enter Refrence No" required></div>
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="Title">Title </label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="title[]" id="Title" placeholder="Enter Title" required>
                        </div>
                        <div class="flex gap-4">
                            <div>
                                <label class="text-[14px] font-normal" for="Title">Credits </label>
                                <input type="text" required
                                    class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="credits[]" id="Credits" placeholder="Enter Credits" required>
                            </div>
                            <div>
                                <label class="text-[14px] font-normal" for="Progress">Progress(%)</label>
                                <input type="text" required
                                    class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="progress[]" id="Progress" placeholder="Enter Progress" required>
                            </div>
                        </div>`;
                        $('#InputOutput').html('');
                        for (let i = 0; i < assignmentCount; i++) {
                            $('#InputOutput').append(inputsHtml);
                        }
                    });

                }
                addInputs();

            });
        </script>
    @endsection
