@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('content')
    <div class="md:mx-4 mt-12">

        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                    <h3 class="text-[20px] text-black hidden sm:block">@lang('lang.Users_List')</h3>
                    <div>

                        <button data-modal-target="addcustomermodal" data-modal-toggle="addcustomermodal"
                            class="gradient-bg cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Add_User')</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 gradient-bg text-white">
                            <tr>
                                <th class="whitespace-nowrap">@lang('lang.STN')</th>
                                <th class="whitespace-nowrap">@lang('lang.Image')</th>
                                <th class="whitespace-nowrap">@lang('lang.Name')</th>
                                <th class="whitespace-nowrap">@lang('lang.Email')</th>
                                <th class="whitespace-nowrap">@lang('lang.Phone_No')</th>
                                <th class="whitespace-nowrap">@lang('lang.Role')</th>
                                <th class="whitespace-nowrap">Login Status</th>
                                <th class="flex  justify-center">@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="rounded-full flex justify-content-center ">
                                            <img src="{{ isset($data->user_image) ? asset($data->user_image) : asset('assets/circle-logo.png') }}"
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
                                    <td><span
                                            class="{{ $data->role == 'assessor' ? 'text-green-800' : 'text-purple-700' }}">{{ $data->role }}</span>
                                    </td>
                                    <td>
                                        {{-- <button
                                            class="px-2 py-1  text-green-600 font-semibold  rounded-lg">{{ $data->verification }}</button> --}}
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full ">{{ $data->verification }}</span>

                                    </td>
                                    <td>
                                        <div class="flex gap-5 items-center justify-center">

                                            <a href="{{ route('updateUser', $data->id) }}">
                                                <button data-modal-target="Updateproductmodal"
                                                    data-modal-toggle="Updateproductmodal"
                                                    class=" updateBtn cursor-pointer  w-[42px]"
                                                    updateId="{{ $data->id }}"><svg width="36" height="36"
                                                        viewBox="0 0 36 36" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.1" cx="18" cy="18" r="18"
                                                            fill="#233A85" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                            fill="#233A85" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="{{ route('deleteUser', $data->id) }}">
                                                <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                                    class="delButton" delId="{{ $data->id }}">
                                                    <img width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                                        alt="delete" class="cursor-pointer">
                                                </button>
                                            </a>
                                            @if ($data->role == 'canditate')
                                                {{-- <a href="../user-profile/{{ $data->id }}">
                                                    <button
                                                        class="gradient-bg text-white font-bold px-4 py-2 rounded-lg text-nowrap">
                                                        Check Profile
                                                    </button>
                                                </a> --}}
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
    <div id="addcustomermodal" data-modal-backdrop="static"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-2xl max-h-full ">
                    <form id="userForm" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="canditate" name="role">
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 gradient-bg">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_User')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcustomermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="grid xl:grid-cols-2 gap-y-2 gap-x-4 mx-6 mt-6">
                    <div>
                        <label class="text-[14px] font-normal" for="user_name">@lang('lang.User_Name')</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="user_name" value="{{ $user->name ?? '' }}"
                            placeholder=" @lang('lang.User_Name_Here')">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="user_email">@lang('lang.Email_Address')</label>
                        <input type="email" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="email" id="user_email" placeholder=" @lang('lang.Email_Address_Here')"
                            value="{{ $user->email ?? '' }}">
                    </div>
                    <div class="w-full">
                        <label class="text-[14px] font-normal" for="Role">Role</label>
                        <select name="role" id="Role">
                            <option disabled selected>Select Role</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>

                        </select>
                    </div>
                    <div class="w-full">
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
                    <button class="gradient-bg text-white py-2 px-6 w-full my-6 rounded-[4px]  mx-6 uaddBtn  font-semibold "
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
                        Add User
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
    @if (isset($user))
        <script>
            $(document).ready(function() {
                $('#addcustomermodal').removeClass("hidden");

            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('.delButton').click(function() {
                var id = $(this).attr('delId');
                $('#delLink').attr('href', '../delCustomer/' + id);
            });
            // insert data
            $("#userForm").submit(function(event) {
                var url = "../addUser";
                event.preventDefault();
                var formData = new FormData(this);
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
                        window.location.href = '../users';


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

        });
    </script>
@endsection
