@extends('layouts.layout')

@section('title')
Assignment
@endsection

@section('content')
<div class="md:mx-4 mt-12">

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                <h3 class="text-[20px] text-black hidden sm:block">Assignment List</h3>
                {{-- @if (session('user_det')['role'] == 'student') --}}
                <div>

                    <button data-modal-target="addAssignmentmodal" data-modal-toggle="addAssignmentmodal"
                        class="bg-primary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        Add Assignment</button>
                </div>
                {{-- @endif --}}
            </div>
            <div class="overflow-x-auto">
                <table id="datatable">
                    <thead class="py-1 bg-primary text-white">
                        <tr>
                            <th class="whitespace-nowrap">STN</th>
                            <th class="whitespace-nowrap">Name</th>
                            <th class="whitespace-nowrap">File</th>
                            <th class="whitespace-nowrap">Status</th>
                            <th class="whitespace-nowrap">Description</th>
                            <th class="flex  justify-center">@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigments as $assigment)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assigment->name }}</td>
                            <td><a href="{{ $assigment->file }}" target="_blank"
                                    class="text-blue-500 underline ">Open File</a></td>
                            <td><button
                                    class="px-3 py-1 {{ $assigment->status == 'pending' ? 'bg-red-500' : 'bg-green-500' }}  rounded-lg text-white font-bold">{{ $assigment->status }}</button>
                            </td>
                            <td class="max-w-56">{{ $assigment->description }}</td>
                            <td>
                                <div class="flex gap-4 justify-center">
                                    @if (session('user_det')['role'] == 'admin')
                                    @if ($assigment->status == 'pending')
                                    <div class="flex justify-center"
                                        data-modal-target="checkAssignmentmodal"
                                        data-modal-toggle="checkAssignmentmodal">
                                        <button assignmentId="{{ $assigment->id }}"
                                            class="bg-blue-900 text-white font-bold  py-3 px-4 rounded-lg reviewBtn ">Review
                                            Assignment</button>
                                    </div>
                                    @endif
                                    @endif

                                    @if ($assigment->status == 'pending')
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
                                                d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                fill="#233A85" />
                                        </svg>

                                    </button>
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

{{-- ============ Check   Assignment modal  =========== --}}
<div id="checkAssignmentmodal" data-modal-backdrop="static"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-2xl max-h-full ">
        <form id="CheckassignmentForm" method="post" enctype="multipart/form-data" url="">
            @csrf
            <input type="hidden" id="assignmentId" name="assignment_id">
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        Review Assignment
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="checkAssignmentmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class=" mx-6 my-6 flex gap-4">
                    <h2 class="text-sm">Are you agree with this submission?</h2>
                    <div class="flex items-center">
                        <input id="yes" type="radio" value="approve" name="status"
                            class="w-5 h-5 text-green-700 bg-gray-100 border-gray-300 focus:ring-green-700"> <label
                            for="yes" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">yes</label>
                    </div>
                    <div class="flex items-center">
                        <input id="no" type="radio" value="rejected" name="status"
                            class="w-5 h-5 text-red-600
                             bg-gray-100 border-gray-300 focus:ring-red-600">
                        <label for="no"
                            class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">No</label>
                    </div>
                </div>
                <div class="grid  md:grid-cols-1 gap-6 mx-6 my-6">

                    <div>
                        <label class="text-[14px] font-normal" for="note">Assignment Note</label>
                        <textarea name="note" id="note" required
                            class="w-full min-h-20 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            placeholder="Resource Note Here"></textarea>
                    </div>


                </div>



                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="AaddBtn">
                        <div class=" text-center hidden" id="Aspinner">
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
                        <div id="Atext">
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



{{-- ============ add  Assignment modal  =========== --}}
<div id="addAssignmentmodal" data-modal-backdrop="static"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-6xl max-h-full ">

        <form id="assignmentData" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        Add Assignment
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addAssignmentmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mx-6 my-6">
                    <div>
                        <label class="text-[14px] font-normal" for="name">Assignment Name</label>
                        <input type="text" required
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="name" id="name" placeholder="Resource Name Here"
                            value="{{ $user->email ?? '' }}">
                    </div>
                    <div>
                        <label class="text-[14px] font-normal" for="file">Assignment File</label>
                        <input type="file" required
                            class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="file" id="file" value="{{ $user->name ?? '' }}"
                            accept=".pdf , .DOCX , .DOC">
                    </div>

                </div>
                <div class="grid  md:grid-cols-1 gap-6 mx-6 my-6">

                    <div>
                        <label class="text-[14px] font-normal" for="description">Assignment Description</label>
                        <textarea name="description" id="description"
                            class="w-full min-h-20 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            placeholder="Resource Description Here"></textarea>
                    </div>


                </div>



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
@endsection
@section('js')
@if (isset($user))
<script>
    $(document).ready(function() {
        $('#addAssignmentmodal').removeClass("hidden");

    });
</script>
@endif
<script>
    $(document).ready(function() {
        $("#assignmentData").submit(function(event) {
            var url = "../addAssignment";
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
                    window.location.href = '../assignment';


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


        $('.reviewBtn').click(function() {
            var id = $(this).attr('assignmentId');
            url = '../assignmentReview/' + id;
            $('#CheckassignmentForm').attr('url', url);
            $('#assignmentId').val(id)

        });

        $("#CheckassignmentForm").submit(function(event) {
            event.preventDefault();
            var url = $("#CheckassignmentForm").attr('url');
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#Aspinner').removeClass('hidden');
                    $('#Atext').addClass('hidden');
                    $('#AaddBtn').attr('disabled', true);
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '../assignment';


                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );

                    $('#Atext').removeClass('hidden');
                    $('#Aspinner').addClass('hidden');
                    $('#AaddBtn').attr('disabled', false);
                }
            });
        });

    });
</script>
@endsection