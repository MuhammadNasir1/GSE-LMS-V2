@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('content')
    <div class="md:mx-4  mt-12">

        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                    <h3 class="text-[20px] text-black hidden sm:block">{{ ucfirst($_GET['type']) }} List</h3>
                    <div>

                        <button data-modal-target="userModal" data-modal-toggle="userModal" id="addDataBtn"
                            class="bg-customOrange cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            Add {{ ucfirst($_GET['type']) }}</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">@lang('lang.STN')</th>
                                <th class="whitespace-nowrap">@lang('lang.Image')</th>
                                <th class="whitespace-nowrap">@lang('lang.Name')</th>
                                <th class="whitespace-nowrap">@lang('lang.Email')</th>
                                <th class="whitespace-nowrap">@lang('lang.Phone_No')</th>
                                <th class="whitespace-nowrap">invitation</th>
                                {{-- <th class="whitespace-nowrap">@lang('lang.Role')</th> --}}
                                {{-- <th class="whitespace-nowrap">Login Status</th> --}}
                                <th class="flex  justify-center">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="rounded-full flex justify-content-center ">
                                            <img src="{{ asset($data->user_image ?? 'assets/logo/logo-bg-white.png') }}"
                                                class="object-contain rounded-full h-[80px] min-w-[80px] max-w-[80] bg-slate-400"
                                                width="80">
                                        </div>

                                        {{-- <img src="{{ $data->user_image }}" alt=""> --}}
                                        {{-- {{ asset($data->user_image) }} --}}
                                    </td>

                                    <td>{{ $data->name }}</td>
                                    <td><a href="mailto:{{ $data->email }}" class="text-blue-700">{{ $data->email }}</a>
                                    </td>
                                    <td>{{ $data->phone_no }}</td>
                                    {{-- <td><span
                                            class="{{ $data->role == 'assessor' ? 'text-green-800' : 'text-purple-700' }}">{{ $data->role }}</span>
                                    </td> --}}
                                    <td>
                                        <span
                                            class= "{{ $data->enrolled == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-600' }}  text-sm font-medium me-2 px-2.5 py-0.5 rounded-full ">{{ $data->enrolled == 0 ? 'Pending' : 'Accepted' }}</span>
                                    </td>
                                    <td>
                                        <div class="flex gap-5 items-center justify-end">
                                            <span disabled="{{ $data->enrolled == 1 ? 'true' : 'false' }}" type="button"
                                                uId="{{ $data->id }}"
                                                class=" {{ $data->enrolled !== 1 ? 'mailBtn cursor-pointer' : 'opacity-50 cursor-not-allowed' }} text-center bg-customOrange min-w-[130px] font-semibold text-white px-4 rounded-md py-2">
                                                <div class="text-center hidden spinner" id="spinner-{{ $data->id }}">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                                        viewBox="0 0 100 101" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                            fill="currentFill" />
                                                    </svg>
                                                </div>
                                                <div id="text-{{ $data->id }}">
                                                    Resend Mail
                                                </div>
                                            </span>

                                            <button data-modal-target="userModal" data-modal-toggle="userModal"
                                                class=" updateBtn cursor-pointer  w-[42px]" updateId="{{ $data->id }}"
                                                userName="{{ $data->name }}" userEmail="{{ $data->email }}"
                                                course="{{ $data->course }}"><svg width="36" height="36"
                                                    viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.1" cx="18" cy="18" r="18"
                                                        fill="#233A85" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                        fill="#233A85" />
                                                </svg>
                                            </button>
                                            {{-- <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                                class="delButton" delId="{{ $data->id }}">
                                                <img width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                                    alt="delete" class="cursor-pointer">
                                            </button> --}}
                                            @if ($data->role == 'candidate')
                                                <a href="../profile?u={{ base64_encode($data->id) }}">
                                                    <button
                                                        class=" bg-secondary font-semibold text-white px-4 rounded-md py-2">
                                                        Profile
                                                    </button>
                                                </a>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>




    {{-- ============ add  customer modal  =========== --}}
    <div id="userModal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-2xl max-h-full ">
            <form id="postDataForm" method="post" url="../addUser" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $_GET['type'] }}" name="role">
                <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                    <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-secondary">
                        <h3 class="text-xl font-semibold text-white ">
                            Add {{ ucfirst($_GET['type']) }}
                        </h3>
                        <button type="button"
                            class="modalCloseBtn absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                            data-modal-hide="userModal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid xl:grid-cols-2 gap-y-2 gap-x-4 mx-6 mt-6">
                        <div>
                            <label class="text-[14px] font-normal" for="userName">@lang('lang.User_Name')</label>
                            <input type="text" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="name" id="userName" value="{{ $user->name ?? '' }}"
                                placeholder=" @lang('lang.User_Name_Here')">
                        </div>
                        <div>
                            <label class="text-[14px] font-normal" for="userEmail">@lang('lang.Email_Address')</label>
                            <input type="email" required
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="userEmail" placeholder=" @lang('lang.Email_Address_Here')"
                                value="{{ $user->email ?? '' }}">
                        </div>
                        <div class="w-full col-span-2">
                            <label class="text-[14px] font-normal" for="course">Course</label>
                            <select name="course" id="course">
                                <option disabled selected>Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>




                    <div class="flex justify-end ">
                        <button
                            class="bg-customOrange text-white py-2 px-6 w-full my-6 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                            id="submitBtn">
                            <div class=" text-center hidden" id="btnSpinner">
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
                            <div id="btnText">
                                Add {{ ucfirst($_GET['type']) }}
                            </div>

                        </button>
                    </div>
                </div>
            </form>
            <div>

            </div>

        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#addDataBtn').click(function() {

            $('#userModal #modalTitle').text("Addd Data");
            $('#userModal #btnText').text("Add");
            $('#postDataForm').attr("url", '../addUser');
            $('#userName').val('');
            $('#userEmail').val('');
            $('#course').val('').trigger("change");
        })

        function resendMail() {


            $('.mailBtn').click(function() {
                // Get user ID for the mail action
                var userId = $(this).attr('uId');
                let url = "../resendMail/" + userId;
                Swal.fire({
                    title: "Resend Email",
                    text: "Do you want to resend mail to this user!",
                    showCancelButton: true,
                    confirmButtonColor: "green",
                    cancelButtonColor: "gray",
                    confirmButtonText: "Yes, resend it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show spinner
                        $('#spinner-' + userId).removeClass('hidden');
                        $('#text-' + userId).addClass('hidden');
                        // Disable the button to prevent multiple clicks
                        $(this).prop('disabled', true);

                        // Prepare data for the AJAX request
                        var delData = {
                            id: userId, // Send the user ID for the request
                        };
                        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

                        // Send AJAX request to resend mail
                        $.ajax({
                            type: "POST",
                            url: url, // Adjust the URL to your mail sending route
                            data: delData,
                            headers: {
                                "X-CSRF-TOKEN": csrfToken,
                            },
                            beforeSend: function() {
                                // Optionally you can show a loader here
                            },
                            success: function(response) {

                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: "Success",
                                    text: "Email Send!",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                // Hide spinner and re-enable the button
                                $('#spinner-' + userId).addClass('hidden');
                                $('.mailBtn').prop('disabled', false);
                                $('#text-' + userId).removeClass('hidden');
                            },
                            error: function(xhr) {

                                Swal.fire({
                                    position: "center",
                                    icon: "warning",
                                    title: "Error",
                                    text: "There was an error resending the mail.",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                // Hide spinner and re-enable the button
                                $('#spinner-' + userId).addClass('hidden');
                                $('#text-' + userId).removeClass('hidden');

                                $('.mailBtn').prop('disabled', false);
                            }
                        });
                    }
                });
            });


        }

        resendMail()

        function updateDatafun() {

            $('.updateBtn').click(function() {
                $('#userModal').removeClass("hidden");
                $('#userModal').addClass('flex');

                $('#userName').val($(this).attr('userName'));
                $('#userEmail').val($(this).attr('userEmail'));
                $('#course').val($(this).attr('course')).trigger("change");

                let userId = $(this).attr('updateId');

                $('#userModal #modalTitle').text("Update Data");
                $('#userModal #btnText').text("Update");
                $('#postDataForm').attr("url", '../updateUserDetails/' + userId);

            });
            resendMail()


        }

        updateDatafun();
        // Listen for the custom form submission response event
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            console.log(response);

            if (response.success) {
                $('.modalCloseBtn').click();
            } else {}
        });
    </script>
@endsection
