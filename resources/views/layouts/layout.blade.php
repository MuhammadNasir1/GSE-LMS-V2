<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Velodity') - GSE</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/fav-icon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.13.8/css/jquery.dataTables.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
        }
    </style>
</head>

<body>
    <div id="loading">
        <div class=" text-center z-[9999] h-screen w-screen flex justify-center items-center  ">
            <svg aria-hidden="true" class="w-12 h-12 mx-auto text-center text-gray-200 animate-spin fill-primary"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
        </div>
    </div>



    <div id="sidebar">
        <div class="flex ">
            <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
                aria-controls="sidebar-multi-level-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>

        </div>
        <aside id="sidebar-multi-level-sidebar"
            class="fixed   bg-primary text-white top-[73px] left-0 z-40 w-60 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full  py-4 overflow-y-auto ">
                <ul class="space-y-2  px-4 font-medium">
                    <li
                        class="{{ request()->is('/') ? 'active bg-white text-black rounded-md group' : 'hover:bg-white hover:text-black rounded-md group' }}">
                        <a href="../" class="flex items-center p-2 rounded-lg">
                            <svg class="group-hover:text-black {{ request()->is('/') ? 'text-black' : 'text-white' }}"
                                width="20" height="15" viewBox="0 0 16 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.5 7.33333C0.5 7.88562 0.947715 8.33333 1.5 8.33333H6.16667C6.71895 8.33333 7.16667 7.88562 7.16667 7.33333V1C7.16667 0.447715 6.71895 0 6.16667 0H1.5C0.947714 0 0.5 0.447715 0.5 1V7.33333ZM0.5 14C0.5 14.5523 0.947715 15 1.5 15H6.16667C6.71895 15 7.16667 14.5523 7.16667 14V11C7.16667 10.4477 6.71895 10 6.16667 10H1.5C0.947714 10 0.5 10.4477 0.5 11V14ZM8.83333 14C8.83333 14.5523 9.28105 15 9.83333 15H14.5C15.0523 15 15.5 14.5523 15.5 14V7.66667C15.5 7.11438 15.0523 6.66667 14.5 6.66667H9.83333C9.28105 6.66667 8.83333 7.11438 8.83333 7.66667V14ZM9.83333 0C9.28105 0 8.83333 0.447715 8.83333 1V4C8.83333 4.55228 9.28105 5 9.83333 5H14.5C15.0523 5 15.5 4.55228 15.5 4V1C15.5 0.447715 15.0523 0 14.5 0H9.83333Z"
                                    fill="currentColor" />
                            </svg>
                            <span class="ms-3">@lang('lang.Dashboard')</span>
                        </a>
                    </li>

                    @if (session('user_det')['role'] == 'admin')
                        <li>

                            <button type="button"
                                class="flex items-center w-full p-2 text-base transition duration rounded-lg group hover:bg-gray-hover:text-primary:hover:bg-gray-700"
                                aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                                <svg class=" {{ request()->is('users') ? 'text-white' : 'text-white' }}" width="20"
                                    height="18" viewBox="0 0 20 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0002 7.98469C11.491 7.98469 12.6995 6.77614 12.6995 5.28531C12.6995 3.79449 11.491 2.58594 10.0002 2.58594C8.50933 2.58594 7.30078 3.79449 7.30078 5.28531C7.30078 6.77614 8.50933 7.98469 10.0002 7.98469Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14.2741 13.2241C14.2272 10.6453 12.3334 8.57031 10.0003 8.57031C7.66719 8.57031 5.77281 10.6459 5.72656 13.2241H14.2741Z"
                                        fill="currentColor" />
                                    <path
                                        d="M3.20977 4.16172C4.32987 4.16172 5.23789 3.2537 5.23789 2.13359C5.23789 1.01349 4.32987 0.105469 3.20977 0.105469C2.08966 0.105469 1.18164 1.01349 1.18164 2.13359C1.18164 3.2537 2.08966 4.16172 3.20977 4.16172Z"
                                        fill="currentColor" />
                                    <path
                                        d="M6.42188 8.09781C6.38687 6.16094 4.96438 4.60156 3.21063 4.60156C1.45688 4.60156 0.035 6.16094 0 8.09781H6.42188Z"
                                        fill="currentColor" />
                                    <path
                                        d="M16.7879 4.16172C17.908 4.16172 18.816 3.2537 18.816 2.13359C18.816 1.01349 17.908 0.105469 16.7879 0.105469C15.6678 0.105469 14.7598 1.01349 14.7598 2.13359C14.7598 3.2537 15.6678 4.16172 16.7879 4.16172Z"
                                        fill="currentColor" />
                                    <path
                                        d="M20.0006 8.09781C19.9656 6.16094 18.5431 4.60156 16.7894 4.60156C15.0356 4.60156 13.6137 6.16094 13.5781 8.09781H20.0006Z"
                                        fill="currentColor" />
                                </svg>

                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-user"
                                class="  {{ request()->is('users') ? '' : 'hidden' }} py-2 space-y-2 bg-white text-primary rounded-xl mx-2">
                                <li>
                                    <a href="../users?type=candidate"
                                        class=" flex items-center p-2 rounded-lg text-white  group ">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
                                        </svg>


                                        <span class="ms-3 text-primary">Candidate</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../users?type=assessor"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                        </svg>


                                        <span class="ms-3  text-primary">Assessor</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        {{-- <li class="{{ request()->is('users') ? 'active bg-white text-black rounded-md '  : 'hover:bg-white hover:text-black rounded-md group' }} ">
                            <a href="../users" class="mt-3 flex items-center p-2 rounded-lg   group">
                                <svg class="group-hover:text-black {{ request()->is('users') ? 'text-black' : 'text-white' }}" width="20"
                                    height="18" viewBox="0 0 20 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0002 7.98469C11.491 7.98469 12.6995 6.77614 12.6995 5.28531C12.6995 3.79449 11.491 2.58594 10.0002 2.58594C8.50933 2.58594 7.30078 3.79449 7.30078 5.28531C7.30078 6.77614 8.50933 7.98469 10.0002 7.98469Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14.2741 13.2241C14.2272 10.6453 12.3334 8.57031 10.0003 8.57031C7.66719 8.57031 5.77281 10.6459 5.72656 13.2241H14.2741Z"
                                        fill="currentColor" />
                                    <path
                                        d="M3.20977 4.16172C4.32987 4.16172 5.23789 3.2537 5.23789 2.13359C5.23789 1.01349 4.32987 0.105469 3.20977 0.105469C2.08966 0.105469 1.18164 1.01349 1.18164 2.13359C1.18164 3.2537 2.08966 4.16172 3.20977 4.16172Z"
                                        fill="currentColor" />
                                    <path
                                        d="M6.42188 8.09781C6.38687 6.16094 4.96438 4.60156 3.21063 4.60156C1.45688 4.60156 0.035 6.16094 0 8.09781H6.42188Z"
                                        fill="currentColor" />
                                    <path
                                        d="M16.7879 4.16172C17.908 4.16172 18.816 3.2537 18.816 2.13359C18.816 1.01349 17.908 0.105469 16.7879 0.105469C15.6678 0.105469 14.7598 1.01349 14.7598 2.13359C14.7598 3.2537 15.6678 4.16172 16.7879 4.16172Z"
                                        fill="currentColor" />
                                    <path
                                        d="M20.0006 8.09781C19.9656 6.16094 18.5431 4.60156 16.7894 4.60156C15.0356 4.60156 13.6137 6.16094 13.5781 8.09781H20.0006Z"
                                        fill="currentColor" />
                                </svg>


                                <span class="flex-1 ms-3 whitespace-nowrap"> @lang('lang.Users')</span>
                            </a>
                        </li> --}}
                    @endif
                    <li
                        class="{{ request()->is('course') ? 'active bg-white text-black rounded-md ' : 'hover:bg-white hover:text-black rounded-md group' }}">
                        <a href="../course" class=" flex items-center p-2 rounded-lg">
                            <svg class="group-hover:text-black {{ request()->is('course') ? 'text-black' : 'text-white' }} w-5 h-5"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ms-3">Courses</span>
                        </a>
                    </li>
                    @if (session('user_det')['role'] == 'admin')
                        <li>

                            <button type="button"
                                class="flex items-center w-full p-2 text-base transition durationrounded-lg group hover:bg-gray-hover:text-primary:hover:bg-gray-700"
                                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <svg class="w-5 h-5  text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Resources</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="dropdown-example"
                                class="hidden py-2 space-y-2 bg-white text-primary rounded-xl mx-2">
                                <li>
                                    <a href="../view/resources"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
                                        </svg>


                                        <span class="ms-3 text-primary">Add Resources</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../resources"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                        </svg>


                                        <span class="ms-3  text-primary">Resources Detail</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    @endif
                    {{-- assignments dropdown --}}
                    @if (session('user_det')['role'] !== 'admin')
                        <li>

                            <button type="button"
                                class="flex items-center w-full p-2 text-base transition duration rounded-lg group hover:bg-gray-hover:text-primary:hover:bg-gray-700"
                                aria-controls="assignment-dropdown" data-collapse-toggle="assignment-dropdown">
                                <svg class="w-5 h-5  text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Assignments</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <ul id="assignment-dropdown"
                                class="hidden py-2 space-y-2 bg-white text-primary rounded-xl mx-2">
                                <li>
                                    <a href="{{ session('user_det')['role'] == 'candidate' ? '../assignment' : '../assignmentReview' }}"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z" />
                                        </svg>


                                        <span class="ms-3 text-primary">All</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ session('user_det')['role'] == 'candidate' ? '../assignment?s=' . base64_encode(1) : '../assignmentReview?s=' . base64_encode(1) }}"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                        </svg>


                                        <span class="ms-3  text-primary">Approved</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ session('user_det')['role'] == 'candidate' ? '../assignment?s=' . base64_encode(2) : '../assignmentReview?s=' . base64_encode(2) }}"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary " xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <span class="ms-3  text-primary">Pending</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ session('user_det')['role'] == 'candidate' ? '../assignment?s=' . base64_encode(3) : '../assignmentReview?s=' . base64_encode(3) }}"
                                        class=" flex items-center p-2 rounded-lg text-white  group">
                                        <svg class="w-5 h-5 text-primary" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path fill="currentColor"
                                                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                        </svg>


                                        <span class="ms-3  text-primary">Rejections</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    @endif
                    {{-- assignments dropdown end --}}
                    @if (session('user_det')['role'] == 'candidate')
                        <li
                            class="{{ request()->is('profile') ? 'active bg-white text-black rounded-md ' : 'hover:bg-white hover:text-black rounded-md group' }}">
                            <a href="../profile?u={{ base64_encode(session('user_det')['user_id']) }}"
                                class=" flex items-center p-2 rounded-lg ">
                                <svg class="group-hover:text-black {{ request()->is('profile') ? 'text-black' : 'text-white' }} w-5 h-5"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="ms-3">Profile</span>
                            </a>
                        </li>
                    @endif
                    @if (session('user_det')['role'] !== 'admin')
                        <li
                            class="{{ request()->is('resources') ? 'active bg-white text-black rounded-md ' : 'hover:bg-white hover:text-black rounded-md group' }}">
                            <a href="../resources" class=" flex items-center p-2 rounded-lg ">
                                <svg class="group-hover:text-black {{ request()->is('resources') ? 'text-black' : 'text-white' }} w-5 h-5"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                </svg>


                                <span class="ms-3">Resources</span>
                            </a>
                        </li>
                    @endif

                    <li
                        class="{{ request()->is('help') ? 'active bg-white text-black rounded-md ' : 'hover:bg-white hover:text-black rounded-md group' }}">
                        <a href="../help" class="mt-3 flex items-center p-2 rounded-lg">
                            <svg class="group-hover:text-black {{ request()->is('help') ? 'text-black' : 'text-white' }}"
                                width="20" height="20" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20 10.2207C20 15.7435 15.5228 20.2207 10 20.2207C4.47715 20.2207 0 15.7435 0 10.2207C0 4.69786 4.47715 0.220703 10 0.220703C15.5228 0.220703 20 4.69786 20 10.2207ZM1.82439 10.2207C1.82439 14.736 5.48474 18.3963 10 18.3963C14.5153 18.3963 18.1756 14.736 18.1756 10.2207C18.1756 5.70544 14.5153 2.04509 10 2.04509C5.48474 2.04509 1.82439 5.70544 1.82439 10.2207Z"
                                    fill="white" />
                                <circle cx="10" cy="10.2207" r="9" fill="currentColor" />
                                <path
                                    d="M11.364 15.6752C11.364 16.4283 10.7534 17.0388 10.0004 17.0388C9.24726 17.0388 8.63672 16.4283 8.63672 15.6752C8.63672 14.9221 9.24726 14.3115 10.0004 14.3115C10.7534 14.3115 11.364 14.9221 11.364 15.6752Z"
                                    fill="{{ request()->is('help') ? 'white' : 'black ' }}" />
                                <path
                                    d="M9.09109 10.2206V12.0388C9.09109 12.0388 9.09109 12.9479 10.0002 12.9479C10.9093 12.9479 10.9093 12.0388 10.9093 12.0388V10.2206C10.9093 10.2206 11.3449 10.096 11.5119 10.0282C11.5119 10.0282 11.8155 9.9198 12.0281 9.75661C12.2407 9.59352 12.433 9.39971 12.6051 9.17543C12.7873 8.95107 12.929 8.69107 13.0302 8.39535C13.1314 8.09964 13.182 7.86043 13.182 7.49334C13.182 6.88153 13.0454 6.25402 12.7721 5.79516C12.5089 5.32611 12.1344 4.96412 11.6485 4.70921C11.1627 4.44409 10.5959 4.31152 9.94809 4.31152C9.54327 4.31152 9.18391 4.36251 8.87018 4.46448C8.55636 4.55625 8.27809 4.68371 8.03513 4.84686C7.80233 4.99981 7.60495 5.17316 7.44301 5.3669C7.29119 5.55044 7.16973 5.72889 7.07863 5.90223C6.98754 6.07558 6.92681 6.22852 6.89644 6.36109C6.83571 6.55482 6.81041 6.71288 6.82053 6.83524C6.84077 6.9576 6.9015 7.05957 7.00272 7.14114C7.10394 7.22271 7.26082 7.30939 7.47337 7.40116C7.69605 7.47254 7.86812 7.49803 7.98958 7.47764C8.12116 7.45724 8.22745 7.39606 8.30845 7.2941C8.30845 7.2941 8.74 6.68033 8.86145 6.55797C8.99309 6.42541 9.155 6.32345 9.34736 6.25207C9.53964 6.1705 9.75727 6.12971 10.0002 6.12971C10.5265 6.12971 10.9162 6.25717 11.1693 6.51209C11.4324 6.75681 11.5119 6.9627 11.5119 7.43175C11.5119 7.74785 11.4563 8.00278 11.3449 8.19651C11.2335 8.39025 11.0868 8.54834 10.9046 8.67071C10.9046 8.67071 10.6572 8.76525 10.4547 8.85698C10.2625 8.93852 9.90936 9.07343 9.72718 9.17543C9.55509 9.26716 9.45864 9.36362 9.34736 9.50643C9.236 9.64916 9.09109 9.97589 9.09109 10.2206Z"
                                    fill="{{ request()->is('help') ? 'white' : 'black' }}" />
                            </svg>


                            <span class="flex-1 ms-3 whitespace-nowrap">@lang('lang.Help')</span>
                        </a>
                    </li>

                    <li
                        class="{{ request()->is('setting') ? 'active bg-white text-black rounded-md ' : 'hover:bg-white hover:text-black rounded-md group' }}">
                        <a href="../setting" class="mt-3 flex items-center p-2 rounded-lg">
                            <svg class="group-hover:text-black {{ request()->is('setting') ? 'text-black' : 'text-white' }}"
                                width="20" height="20" viewBox="0 0 20 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.0038 7.78846C9.2982 7.78846 8.6374 8.06222 8.13708 8.56254C7.63912 9.06286 7.363 9.72366 7.363 10.4293C7.363 11.1349 7.63912 11.7957 8.13708 12.2961C8.6374 12.794 9.2982 13.0701 10.0038 13.0701C10.7095 13.0701 11.3703 12.794 11.8706 12.2961C12.3686 11.7957 12.6447 11.1349 12.6447 10.4293C12.6447 9.72366 12.3686 9.06286 11.8706 8.56254C11.6262 8.31629 11.3354 8.12105 11.0149 7.98816C10.6944 7.85528 10.3508 7.78739 10.0038 7.78846ZM19.7341 13.3463L18.1907 12.027C18.2638 11.5786 18.3016 11.1208 18.3016 10.6653C18.3016 10.2098 18.2638 9.74962 18.1907 9.30358L19.7341 7.98434C19.8507 7.88452 19.9342 7.75158 19.9734 7.60319C20.0126 7.4548 20.0057 7.29799 19.9536 7.15362L19.9324 7.09226C19.5076 5.90444 18.8711 4.80342 18.0538 3.84253L18.0113 3.79297C17.9121 3.67627 17.7798 3.59239 17.6319 3.55236C17.4841 3.51234 17.3275 3.51806 17.183 3.56877L15.2666 4.25081C14.5586 3.67025 13.7704 3.21241 12.9161 2.89381L12.5456 0.89017C12.5176 0.739229 12.4444 0.600367 12.3356 0.492032C12.2269 0.383697 12.0877 0.311017 11.9367 0.283649L11.873 0.271849C10.6458 0.0500087 9.35248 0.0500087 8.12528 0.271849L8.06156 0.283649C7.91051 0.311017 7.77136 0.383697 7.66261 0.492032C7.55385 0.600367 7.48063 0.739229 7.45268 0.89017L7.0798 2.90325C6.23357 3.22439 5.44525 3.68112 4.74575 4.25553L2.81527 3.56877C2.67076 3.51766 2.51411 3.51173 2.36615 3.55178C2.21819 3.59183 2.08592 3.67595 1.98691 3.79297L1.94443 3.84253C1.12856 4.80445 0.492255 5.90519 0.0658702 7.09226L0.0446302 7.15362C-0.0615699 7.44862 0.0257502 7.77902 0.26411 7.98434L1.82643 9.31774C1.75327 9.76142 1.71787 10.2145 1.71787 10.6629C1.71787 11.1161 1.75327 11.5692 1.82643 12.0081L0.26883 13.3415C0.152236 13.4414 0.0687882 13.5743 0.0295827 13.7227C-0.00962273 13.8711 -0.00272807 14.0279 0.0493501 14.1723L0.0705902 14.2336C0.497751 15.4207 1.12787 16.5181 1.94915 17.4833L1.99163 17.5329C2.09088 17.6496 2.22316 17.7335 2.37103 17.7735C2.5189 17.8135 2.67543 17.8078 2.81999 17.7571L4.75047 17.0703C5.45375 17.6485 6.23728 18.1064 7.08452 18.4226L7.4574 20.4357C7.48535 20.5866 7.55857 20.7255 7.66733 20.8338C7.77608 20.9422 7.91523 21.0149 8.06628 21.0422L8.13 21.054C9.36927 21.2771 10.6384 21.2771 11.8777 21.054L11.9414 21.0422C12.0924 21.0149 12.2316 20.9422 12.3404 20.8338C12.4491 20.7255 12.5223 20.5866 12.5503 20.4357L12.9208 18.4321C13.7751 18.1111 14.5634 17.6556 15.2714 17.0751L17.1877 17.7571C17.3322 17.8082 17.4888 17.8141 17.6368 17.7741C17.7848 17.7341 17.917 17.6499 18.016 17.5329L18.0585 17.4833C18.8798 16.5134 19.5099 15.4207 19.9371 14.2336L19.9583 14.1723C20.0598 13.8796 19.9725 13.5516 19.7341 13.3463ZM10.0038 14.5782C7.71228 14.5782 5.85496 12.7209 5.85496 10.4293C5.85496 8.13774 7.71228 6.28042 10.0038 6.28042C12.2954 6.28042 14.1527 8.13774 14.1527 10.4293C14.1527 12.7209 12.2954 14.5782 10.0038 14.5782Z"
                                    fill="currentColor" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">@lang('lang.Setting')</span>
                        </a>
                    </li>

                    <li>
                        <form action="../weblogout" method="post" class=" cursor-pointer" id="logoutform">
                            @csrf
                            <div onclick="logoutform.submit()"
                                class="mt-3 flex items-center p-2 rounded-lg text-white  group">
                                <svg width="20" height="20" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.54545 8.18182H11.8182V10H4.54545V12.7273L0 9.09091L4.54545 5.45455V8.18182ZM3.63636 14.5455H6.09818C7.1479 15.4712 8.44244 16.0744 9.82648 16.2827C11.2105 16.4909 12.6252 16.2954 13.9009 15.7195C15.1766 15.1437 16.259 14.212 17.0182 13.0362C17.7775 11.8604 18.1814 10.4905 18.1814 9.09091C18.1814 7.69129 17.7775 6.3214 17.0182 5.14563C16.259 3.96985 15.1766 3.03813 13.9009 2.46227C12.6252 1.88642 11.2105 1.69089 9.82648 1.89915C8.44244 2.10741 7.1479 2.71061 6.09818 3.63637H3.63636C4.48242 2.50653 5.5803 1.58956 6.84279 0.958313C8.10528 0.327069 9.49759 -0.00105786 10.9091 2.56208e-06C15.93 2.56208e-06 20 4.07 20 9.09091C20 14.1118 15.93 18.1818 10.9091 18.1818C9.49759 18.1829 8.10528 17.8548 6.84279 17.2235C5.5803 16.5923 4.48242 15.6753 3.63636 14.5455Z"
                                        fill="white" />
                                </svg>



                                <span class="flex-1 ms-3 whitespace-nowrap">@lang('lang.logout')</span>
                            </div>
                        </form>
                    </li>

                </ul>


            </div>

        </aside>
    </div>
    <nav id="Navbar">
        <div
            class="flex justify-between items-center gap-5 bg-primary py-3 md:px-5 pr-4 md:pr-0 fixed top-0 w-full z-40">
            <div class="flex gap-2 items-center">
                <button data-drawer-target="sidebar-multi-level-sidebar"
                    data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-white rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-white dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="../"> <img class=" h-[40px]" src="{{ asset('assets/name-logo.svg') }}"
                        alt="GSE"></a>
            </div>
            {{-- <a href="../"> <img class=" h-[40px]" src="{{ asset('assets/name-logo.svg') }}" alt="GSE"></a> --}}
            {{-- <h2 class="text-white font-bold text-2xl">Welcome back {{ session('user_det')['name'] }}!</h2> --}}
            <div class="flex items-center gap-2">
                <div class="leading-tight  text-end">
                    <h2 class="text-md text-white">{{ session('user_det')['name'] }}</h2>
                    <p class="text-xs  text-white font-semibold">{{ session('user_det')['role'] }}</p>
                </div>
                <div>
                    <img height="48px" width="48px"
                        class="rounded-full w-[48px] h-[48px] object-contain bg-black border-2 "
                        src="{{ session()->has('user_image') && session('user_image.user_image') !== null ? asset(session('user_image.user_image')) : asset('images/man-victor.png') }}"
                        alt="user">
                </div>
            </div>
        </div>
    </nav>
    <div id="content" class="sm:ml-[240px] my-[48px] min-h-full overflow-auto px-4 ">



        @yield('content')



    </div>
    <div class="fixed flex justify-center items-center  w-full bottom-0 py-2 bg-white ">
        <p class="text-sm text-black text-center">Powered by <a href="https://globalconsulting-int.com/"
                target="_blank" class="text-primary font-semibold">Global Consulting pvt. Ltd.</a> & Developed by <a
                class="text-blue-500" href="">Velodity Solutions</a>.
        </p>
    </div>
    <script src="https://kit.fontawesome.com/b6b9586b26.js" crossorigin="anonymous"></script>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="{{ asset('javascript/canvas.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
        $(document).ready(function() {
            $('select').select2({
                width: '100%'
            });
            $('#Items_dropdown').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>

    @yield('js')
</body>

</html>
