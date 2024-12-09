@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mx-6 mt-16">
        <h2 class="text-black text-2xl font-semibold">Dashboard </h2>
        <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4 w-full mt-4 ">
            <div class="flex border border-primary  gap-4 justify-between items-center h-[120px]  rounded-xl px-4 w-full">
                <div>
                    <h3 class="font-bold text-4xl text-black">00</h3>
                    <p class="text-gray-800 text-lg">Submission</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-[#fe8949] rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="#ffffff"
                            d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                    </svg>
                </div>
            </div>

            <div class="flex border border-primary  gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full">
                <div>
                    <h3 class="font-bold text-4xl text-black">01</h3>
                    <p class="text-gray-800 text-lg">pending Units</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-[#fbbc1d] rounded-full flex justify-center items-center">
                    <svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#ffffff"
                            d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
                    </svg>
                </div>
            </div>

            <div class="flex border border-primary  gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full">
                <div>
                    <h3 class="font-bold text-4xl text-black">10</h3>
                    <p class="text-gray-800 text-lg"> Approved</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-[#ffa7a7] rounded-full flex justify-center  items-center">
                    <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#ffffff"
                            d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                    </svg>
                </div>
            </div>

            <div class="flex border border-primary    gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full">
                <div>
                    <h3 class="font-bold text-4xl text-black">01</h3>
                    <p class="text-gray-800 text-lg">Rejection</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-white rounded-full flex justify-center items-center">
                    <svg class="h-15 w-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#0ebdf6"
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                </div>

            </div>

        </div>
    </div>
@if(session('user_det')['role'] == "admin")
    <div class="lg:flex gap-4 mt-6 mx-6 ">
        <div class="lg:w-[60%] w-full">
            <div class="min-h-[448px] border border-primary rounded-xl">
                    <h2 class="text-xl text-white gradient-bg    rounded-t-xl py-2 px-6  font-semibold ">Recent Units</h2>
                    <div class="pt-3  mt-2 border-t  border-gray-200">

                        <div class="relative overflow-auto h-[300px] ">
                            <table class="w-full text-sm text-center ">
                                <thead class="text-sm text-white ">
                                    <tr class="bg-gray-500">
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
        <div class="lg:w-[40%] w-full border border-gray-500 rounded-xl">
            <div class="  ">
                <h2 class="text-xl rounded-t-xl  font-semibold gradient-bg text-white px-6 py-2">Units Progress</h2>
                <div class="w-[300px] " id="progressChart"></div>
            </div>
        </div>
    </div>

    @endif
    <script>
        window.onload = function() {

            var chart3 = new CanvasJS.Chart("progressChart", {
                animationEnabled: true,
                backgroundColor: "transparent",
                data: [{
                    type: "doughnut",
                    startAngle: 60,

                    //innerRadius: 60,
                    indexLabelFontColor: "transparent",
                    indexLabelPlacement: "inside",
                    dataPoints: [{
                            y: 10,
                            color: "#fe8949",
                            label: "Pending"
                        },
                        {
                            y: 20,
                            color: "#417DFC",
                            label: "Processing"
                        },
                        {
                            y: 50,
                            color: "#fbbc1d",
                            label: "Approved"
                        },

                    ]
                }]
            });

            chart3.render();

        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
