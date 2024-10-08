@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mx-4 mt-12">
        <div>
            <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
        </div>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6  mt-4">
            <div class="card-1 ">
                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                    <a href="../assignment">
                        <div class="flex gap-1 justify-between items-center">
                            <div>
                                <p class="text-sm text-[#808191]">Subimssions</p>
                                <h2 class="text-2xl font-semibold mt-1">{{ $total_submission }}</h2>
                            </div>
                            <div class="h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-1 ">
                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                    <a href="#">
                        <div class="flex gap-1 justify-between items-center">
                            <div>
                                <p class="text-sm text-[#808191]">Today's Submission </p>
                                <h2 class="text-2xl font-semibold mt-1">{{ $total_submission }}</h2>
                            </div>
                            <div class="h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                                <img class="h-[50px] w-[50px]" width="60px" height="60px"
                                    src="{{ asset('images/icons/total_orders.svg') }}" alt="Orders">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card-1 ">
                <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                    <div class="flex gap-1 justify-between items-center">
                        <div>
                            <p class="text-sm text-[#808191]">Feedbacks</p>
                            <h2 class="text-2xl font-semibold mt-1">{{ $feedbacks }}</h2>
                        </div>
                        <div class=" h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                            <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
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
                        <div class=" h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
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
                            <p class="text-sm text-[#808191]">Candidates Enrolled</p>
                            <h2 class="text-2xl font-semibold mt-1">{{ $today_user }}</h2>
                        </div>
                        <div class=" h-[80px] w-[80px] rounded-full bg-primary flex justify-center items-center">
                            <svg fill="white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="50"
                                height="50" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    {{-- <div class="lg:flex gap-14 mt-16 px-3 ">
        <div class="lg:w-[60%] w-full">
            <div class=" shadow-med p-3 py-5   rounded-xl min-h-[448px]">
                <div class="flex justify-between px-6">
                    <h2 class="text-xl  font-semibold ">Recent Assignments</h2>

                </div>
                <div>
                    <div class="pt-3  mt-2 border-t  border-gray-200">

                        <div class="relative overflow-auto h-[300px] ">
                            <table class="w-full text-sm text-center ">
                                <thead class="text-sm text-gray-900  text-dblue ">
                                    <tr>
                                        <th class="px-6 py-3">
                                            STN
                                        </th>
                                        <th class="px-6 py-3">
                                            Candidates Name
                                        </th>
                                        <th class="px-6 py-3">
                                            Assignment File
                                        </th>
                                        <th class="px-6 py-3">
                                            Date/Time
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b  border-b-slate-300">
                                        <td class="pb-3 pt-3 ">1</td>
                                        <td class="pb-3 pt-3 ">Peter Jones</td>
                                        <td class="pb-3 pt-3 "><a href="#" class="text-blue-500">Opeen FIle</a></td>
                                        <td class="pb-3 pt-3 ">01-08-2024/13:14</td>
                                    </tr>
                                    <tr class="border-b  border-b-slate-300">
                                        <td class="pb-3 pt-3 ">1</td>
                                        <td class="pb-3 pt-3 ">Peter Jones</td>
                                        <td class="pb-3 pt-3 "><a href="#" class="text-blue-500">Opeen FIle</a></td>
                                        <td class="pb-3 pt-3 ">01-08-2024/13:14</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="lg:w-[40%] w-full">
            <div class=" shadow-med p-3 rounded-xl">
                <h2 class="text-xl  font-semibold ml-6">Submissions</h2>
                <div id="barChart" class="mt-4" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div> --}}

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
