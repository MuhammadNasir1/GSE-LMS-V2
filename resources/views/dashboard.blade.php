@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="md:mx-6 mx-2 md:mt-16 mt-4">

        <h2 class="text-black text-2xl font-semibold">Dashboard </h2>
        <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4 w-full mt-4 ">
            @if (session('user_det')['role'] == 'admin')
                <div
                    class="flex border border-primary    gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full bg-white">
                    <div>
                        <h3 class="font-bold text-4xl text-black">{{ $total_user }}</h3>
                        <p class="text-gray-800 text-lg">Users</p>
                    </div>
                    <div class="h-20 w-20 flex-shrink-0 bg-black rounded-full flex justify-center items-center">

                        <svg class="h-12 w-12"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path fill="#ffffff"
                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                        </svg>
                    </div>

                </div>
            @endif
            <div
                class="flex border border-purple-700  gap-4 justify-between items-center h-[120px]  rounded-xl px-4 w-full bg-white">
                <div>
                    <h3 class="font-bold text-4xl text-purple-700">{{ $submission }}</h3>
                    <p class="text-gray-800 text-lg">Submission</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-purple-700 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="white"
                            d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                    </svg>
                </div>
            </div>

            <div
                class="flex border border-yellow-300  gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full bg-white">
                <div>
                    <h3 class="font-bold text-4xl text-yellow-300">{{ $pending }}</h3>
                    <p class="text-gray-800 text-lg">pending Units</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-yellow-300 rounded-full flex justify-center items-center">
                    <svg class="h-12 w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#ffffff"
                            d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z" />
                    </svg>
                </div>
            </div>

            <div
                class="flex border border-secondary  gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full bg-white">
                <div>
                    <h3 class="font-bold text-4xl text-secondary">{{ $approved }}</h3>
                    <p class="text-gray-800 text-lg"> Approved</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-secondary rounded-full flex justify-center  items-center">
                    <svg class="w-10 h-10 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#ffffff"
                            d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z" />
                    </svg>
                </div>
            </div>

            <div
                class="flex border border-red-600    gap-4 justify-between items-center h-[120px] rounded-xl px-4 w-full bg-white">
                <div>
                    <h3 class="font-bold text-4xl text-red-600">{{ $rejection }}</h3>
                    <p class="text-gray-800 text-lg">Rejection</p>
                </div>
                <div class="h-20 w-20 flex-shrink-0 bg-white rounded-full flex justify-center items-center">
                    <svg class="h-15 w-15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#A91414FF"
                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                </div>

            </div>

        </div>

        <div class="flex lg:flex-row flex-col gap-4 mt-6">
            <div class="lg:w-[65%] w-full bg-white shadow-med   rounded-xl">
                @if (session('user_det')['role'] == 'admin')
                    <div class=" bg-customOrange  rounded-t-xl">
                        <h3 class="text-white p-3 font-semibold text-xl">Course Enrollments</h3>
                    </div>
                    <div id="coursesChart" class="w-full h-[350px] mt-4 px-2 "></div>
                @else
                    <div class=" bg-customOrange  rounded-t-xl">
                        <h3 class="text-white p-3 font-semibold text-xl">Last Assignments</h3>
                    </div>
                    <a href="{{ session('user_det')['role'] == 'assessor' ? '../assignmentReview' : '../assignment' }}">
                        <table class="min-w-full border border-gray-300  overflow-hidden bg-white">
                            <thead class="bg-primary text-white text-sm uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold border-b border-gray-400">STN</th>
                                    <th class="px-6 py-4 text-left font-semibold border-b border-gray-400">Candidates Name
                                    </th>
                                    <th class="px-6 py-4 text-left font-semibold border-b border-gray-400">Assignment Status
                                    </th>
                                    <th class="px-6 py-4 text-left font-semibold border-b border-gray-400">Date Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($recent_assignments as $assignment)
                                    <tr class="border-b border-gray-300 hover:bg-gray-100 transition duration-200">
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $assignment->user->name }}</td>
                                        <td>
                                            <div class="pl-4">
                                                {!! $assignment->status == 2
                                                    ? '<span class="bg-purple-100 text-purple-800r text-xs font-medium me-2 px-2.5 py-0.5 rounded">Pending</span>'
                                                    : ($assignment->status == 1
                                                        ? '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Approved</span>'
                                                        : '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Rejected</span>') !!}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($assignment->created_at)->format('M-d-Y') }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </a>
                @endif

            </div>
            <div class="lg:w-[35%] w-full bg-white shadow-med   rounded-xl">
                <div class=" bg-secondary  rounded-t-xl">
                    <h3 class="text-white p-3 font-semibold text-xl">
                        {{ session('user_det')['role'] == 'admin' ? 'Users' : 'Assignments' }}</h3>
                </div>
                <div id="userChart" class="w-full h-[350px] mt-4 px-2 "></div>
            </div>
        </div>
    </div>
   
    <script>
        window.onload = function() {

            var chart2 = new CanvasJS.Chart("userChart", {
                backgroundColor: "transparent",
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 240,
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#FFFFFF",
                    dataPoints: [
                        @if (session('user_det')['role'] == 'admin')

                            {
                                y: {{ $totalAssessors }},
                                label: "Assessors",
                                color: "#012169"
                            }, {
                                y: {{ $total_user }},
                                label: "Total User",
                                color: "#009A00"
                            }, {
                                y: {{ $totalCandidates }},
                                label: "Candidates",
                                color: "#F3490F"
                            }
                        @else
                            {
                                y: {{ $pending }},
                                label: "pending",
                                color: "#DCDC1CFF"
                            }, {
                                y: {{ $approved }},
                                label: "Approved",
                                color: "#009A00"
                            }, {
                                y: {{ $rejection }},
                                label: "Rejection",
                                color: "#F3490F"
                            }
                        @endif


                    ]
                }]
            });
            chart2.render();


            var colors = ["#012169", "#009A00", "#F3490F"];

            // Define the dataPoints array separately
            var dataPoints = [
                @foreach ($coursesChart as $data)
                    {
                        y: {{ $data->users_count }},
                        label: "{{ $data->name }}"
                    },
                @endforeach

            ];

            // Assign colors dynamically
            for (var i = 0; i < dataPoints.length; i++) {
                dataPoints[i].color = colors[i % colors.length]; // Cycle through colors array
            }

            var chart = new CanvasJS.Chart("coursesChart", {
                animationEnabled: true,
                backgroundColor: "transparent",
                data: [{
                    type: "column", // You can change this to other chart types if needed
                    dataPoints: dataPoints
                }]
            });

            chart.render();


            chart3.render();

        }
    </script>
@endsection
