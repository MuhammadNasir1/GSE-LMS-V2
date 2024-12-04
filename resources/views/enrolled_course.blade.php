<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Course') - GSE</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
    <nav id="Navbar">
        <div class="flex  justify-between items-center gap-5 gradient-bg py-4 px-5 fixed top-0 w-full z-40">

            <h2 class="text-white font-bold text-2xl">Welcome To GSE LMS </h2>
            <a href="../"> <img class=" h-[40px]" src="{{ asset('assets/name-logo.svg') }}" alt="GSE"></a>

        </div>
    </nav>
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
                                            @if ($assignment->optional == 1)
                                                <input id="green-checkbox-{{ $assignment->refrence_no }}"
                                                    type="checkbox" value="{{ $assignment->refrence_no }}"
                                                    class="w-5 h-5 checkBoxes text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                            @endif
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


                    <div class="flex justify-end mx-4 mt-4">
                        <button class=" py-2 min-w-[130px] gradient-bg font-semibold text-white rounded-lg"
                            id="submitBtn" {{ $assignment->optional == 1 ? 'disabled' : '' }}>
                            <div id="spinner" class="hidden">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 mx-auto text-center text-gray-200 animate-spin fill-primary"
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

                                {{ $assignment->optional == 1 ? 'Select Units' : 'Enroll Now!' }}
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="fixed flex justify-center items-center  w-full bottom-0 py-2 bg-white ">
        <p class="text-sm text-black text-center">Powered by <a href="https://globalconsulting-int.com/"
                target="_blank" class="text-primary font-semibold">Global Consulting pvt. Ltd.</a> & Developed by <a
                class="text-blue-500" href="">Velodity Solutions</a>.
        </p>
    </div>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".checkBoxes").on("change", function() {
                const checkedBoxes = $(".checkBoxes:checked").length;
                if (checkedBoxes == 2) {
                    $('#submitBtn').attr('disabled', false);
                    $('#text').text('Enroll Now!');
                } else {
                    $('#submitBtn').attr('disabled', true);
                    $('#text').text('Select Units');

                }
                if (checkedBoxes > 2) {
                    Swal.fire({
                        position: "center",
                        icon: "warning",
                        title: "Warning",
                        text: "You can only select up to 2 options.",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $(this).prop("checked", false);
                }
                const refNo = $(this).val(); // Reference number of the assignment

                if ($(this).is(":checked")) {
                    // Add a dynamic row
                    $("#dynamicInputs").append(`
                <div id="input${refNo}" class="mb-2">
                    <input 
                        type="hidden" 
                        name="reference_no[]" 
                        class="border rounded px-3 py-2 w-full" 
                        value="${refNo}" 
                        readonly>
                </div>
            `);
                } else {
                    const escapedRefNo = $.escapeSelector(`input${refNo}`);
                    $(`#${escapedRefNo}`).remove();
                }
            });

            $("#unitForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "./enrollCandidate",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#submitBtn').attr('disabled', true);
                    },
                    success: function(response) {
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Enrolled Successfully",
                            text: "Enrollment Successful! Now you can login and use GSE LMS.",
                            showConfirmButton: false,
                            timer: 5000,
                        }).then(function() {

                            window.location.href = "../login";
                        });


                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Error",
                            text: response.message(),
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#submitBtn').attr('disabled', false);
                    }
                });
            });


        });
    </script>

    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
    </script>



</body>

</html>
