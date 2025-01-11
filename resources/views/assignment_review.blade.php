@extends('layouts.layout')

@section('title')
    Assignments
@endsection

@section('content')
    <div class="md:mx-4  mt-20">

        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                    <h3 class="text-[20px] text-black hidden sm:block">Assignment List</h3>

                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 gradient-bg text-white">
                            <tr>
                                <th>STN</th>
                                <th>Candidate</th>
                                <th>course</th>
                                <th>Unit</th>
                                <th>File</th>
                                <th>status</th>
                                <th>Uploaded</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assignment->user_name }}</td>
                                    <td>{{ $assignment->course_name }}</td>
                                    <td>{{ $assignment->assignment_name }}</td>
                                    <td><a href="{{ $assignment->file }}" target="_blank" class="text-blue-600">open
                                            File</a></td>
                                    <td>
                                        {!! $assignment->status == 2
                                            ? '<span class="bg-purple-100 text-purple-800r text-xs font-medium me-2 px-2.5 py-0.5 rounded">Pending</span>'
                                            : ($assignment->status == 1
                                                ? '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Approved</span>'
                                                : '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Rejected</span>') !!}
                                    </td>

                                    <td>{{ $assignment->time_ago }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                            <button data-modal-target="check-Modal" data-modal-toggle="check-Modal"
                                                addedUserId={{ $assignment->user_id }}
                                                assignmentId="{{ $assignment->assignment_id }}"
                                                class="checkBtn bg-green-600 font-semibold text-white px-4 rounded-md py-2"
                                                updId="">
                                                Check
                                            </button>
                                            <a href="../profile?u={{ base64_encode($assignment->user_id) }}">
                                                <button
                                                    class=" bg-purple-600 font-semibold text-white px-4 rounded-md py-2">
                                                    Profile
                                                </button>
                                            </a>
                                        </div>

                                    </td>
                                    </r>
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div id="check-Modal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow- x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-2xl max-h-full ">
            <form id="postDataForm" method="post" url="../reviewAssignment" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="userId" name="user_id">
                <input type="hidden" id="assignmentId" name="assignment_id">
                <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                    <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 gradient-bg">
                        <h3 class="text-xl font-semibold text-white ">
                            Review Assignment
                        </h3>
                        <button type="button"
                            class="modalCloseBtn absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                            data-modal-hide="check-Modal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <div class="mx-6 my-4">
                        <div class="w-full col-span-2">
                            <label class="text-[14px] font-normal" for="status">Change Status</label>
                            <select name="status" id="status">
                                <option disabled selected>Select Status</option>
                                <option value="1">Approved</option>
                                <option value="3">Rejected</option>

                            </select>
                        </div>
                        <div class="mt-5">
                            <label class="text-[14px] font-normal" for="user_email"></label>
                            <textarea name="note" id="note"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[100px] text-[14px]"
                                placeholder="Enter Review Note"></textarea>
                        </div>
                    </div>





                    <div class="flex justify-end ">
                        <button
                            class="gradient-bg text-white py-2 px-6 w-full mb-6  rounded-[4px]  mx-6 uaddBtn  font-semibold "
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
                                Review
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
        $(document).ready(function() {
            $('.checkBtn').click(function() {
                $('#check-Modal').removeClass('hidden').addClass('flex');
                $('#userId').val($(this).attr('addedUserId'));
                $('#assignmentId').val($(this).attr('assignmentId'));
            });
        });

        function updateDatafun() {}
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            console.log(response);

            if (response.success) {
                $('.modalCloseBtn').click();
            } else {}
        });
    </script>
@endsection
