@extends('layouts.layout')

@section('title')
    User-Profile
@endsection

@section('content')
    <div class="md:mx-4 mt-12">
        <div class="mt-3  rounded-xl pt-8  bg-white p-10">
            {{-- <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white p-10"> --}}
            <div class="grid xl:grid-cols-3 grid-cols-1 gap-5">
                <div class=" rounded-lg min-h-[400px] xl:col-span-1 px-5 shadow-dark py-5">
                    <div class="xl:mx-0 mx-auto">
                        <div
                            class="h-[150px]  mx-auto rounded-full w-[150px] flex justify-center border border-primary items-center">
                            {{-- <img src="{{ asset('images/icons/user.svg') }}" class="h-[50%] w-[50%]  rounded-full"
                                alt=""> --}}
                            <img src="{{ isset($userDetails->user_image) ? asset($userDetails->user_image) : asset('images/icons/user.svg') }}"
                                class="{{ isset($userDetails->user_image) ? 'h-[100%] w-[100%]' : 'h-[50%] w-[50%]' }}  rounded-full"
                                alt="user">
                        </div>
                        <h2 class="text-center text-2xl font-bold mt-4">{{ $userDetails->name }}</h2>
                        <p class="text-center">{{ $userDetails->role }}</p>
                    </div>

                    <div class="mt-5">
                        <div><i class="fa-solid fa-phone text-primary"></i> <span
                                class="ms-1">{{ $userDetails->phone }}</span>
                        </div>
                        <div class="mt-2"><i class="fa-regular fa-envelope text-primary "></i>
                            <span class="ms-1">{{ $userDetails->email }}</span>
                        </div>
                        @php
                            $pedingAssignmets = $course->total_assignments - $assessments;
                            $percentage_pending = ($pedingAssignmets / $course->total_assignments) * 100;
                        @endphp
                        <div class="mt-5">
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-primary dark:text-white">Pending</span>
                                <span
                                    class="text-sm font-medium text-primary dark:text-white">{{ $percentage_pending }}%</span>
                            </div>
                            <div class="w-full bg-gray rounded-full h-3 dark:bg-gray-700">
                                <div class="bg-primary h-3 rounded-full" style="width: {{ $percentage_pending }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" min-h-[400px]  col-span-2">
                    <div class="flex flex-col w-full">
                        <div class=" bg-gray w-full rounded-lg shadow-md">
                            <div class="py-5 bg-primary text-white rounded-t-lg px-5 text-xl">Progress</div>
                            <div class="flex items-center">
                                <div class=" w-full py-8 px-6">
                                    <div class="flex justify-between  mb-2">
                                        @php
                                            $percentage_completion = ($assessments / $course->total_assignments) * 100;
                                        @endphp
                                        <span
                                            class="text-base font-medium text-primary dark:text-white">{{ $course->name }}</span>
                                        <span
                                            class="text-sm font-medium text-primary dark:text-white">{{ $percentage_completion }}%</span>
                                    </div>
                                    <div class="w-full bg-white rounded-full h-3 dark:bg-gray-700">
                                        <div class="bg-primary h-3 rounded-full"
                                            style="width: {{ $percentage_completion }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-10">

                            <div class="card-1 ">
                                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                                    <div class="flex gap-1 justify-between items-center">
                                        <div>
                                            <p class="text-sm text-[#808191]">Feedbacks</p>
                                            <h2 class="text-2xl font-semibold mt-1">{{ $feedbacks }}</h2>
                                        </div>
                                        <div
                                            class=" h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                            <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512">
                                                <path fill="#ffffff"
                                                    d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c0 0 0 0 0 0l.3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-1 ">
                                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                                    <div class="flex gap-1 justify-between items-center">
                                        <div>
                                            <p class="text-sm text-[#808191]">Assessments</p>
                                            <h2 class="text-2xl font-semibold mt-1">{{ $assessments }}</h2>
                                        </div>
                                        <div
                                            class=" h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                            <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-1 ">
                                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                                    <div class="flex gap-1 justify-between items-center">
                                        <div>
                                            <p class="text-sm text-[#808191]">Subimssions</p>
                                            <h2 class="text-2xl font-semibold mt-1">{{ $totalAssignments }}</h2>
                                        </div>
                                        <div
                                            class="h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                            <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div>
                                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                                    <div class="flex gap-1 justify-between items-center">
                                        <div>
                                            <p class="text-sm text-[#808191]">Total Assignments</p>
                                            <h2 class="text-2xl font-semibold mt-1">{{ $course->total_assignments }}
                                            </h2>
                                        </div>
                                        <div
                                            class="h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                            <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                                    <div class="flex gap-1 justify-between items-center">
                                        <div>
                                            <p class="text-sm text-[#808191]">Pending Assignments</p>
                                            <h2 class="text-2xl font-semibold mt-1">
                                                {{ $course->total_assignments - $assessments }}
                                            </h2>
                                        </div>
                                        <div
                                            class="h-[70px] w-[70px] rounded-full bg-primary flex justify-center items-center">
                                            <img class="h-[50px] w-[50px]" width="60px" height="60px"
                                                src="{{ asset('images/icons/total_orders.svg') }}" alt="Orders">
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="flex justify-end mt-5">
                <div class="w-full">
                    <div class=" shadow-med p-3 rounded-xl">
                        <h2 class="text-xl  font-semibold ml-6">Submissions</h2>
                        <div id="barChart" class="mt-4" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.onload = function() {
            CanvasJS.addColorSet("colors",
                [

                    "#417dfc",
                    "#339B96",
                    "#13242C",

                ]);


            var chart2 = new CanvasJS.Chart("barChart", {
                colorSet: "colors",
                animationEnabled: true,
                theme: "light1",
                axisY: {
                    gridColor: "#00000016",
                    suffix: "-"

                },

                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#\"\"",
                    dataPoints: [{
                            label: "Jan",

                            y: 78
                        },
                        {
                            label: "Feb",
                            y: 55
                        },
                        {
                            label: "Mar",
                            y: 80
                        },
                        {
                            label: "Apr",
                            y: 60
                        },


                    ]
                }]
            });

            chart2.render();

        }
    </script>
@endsection
