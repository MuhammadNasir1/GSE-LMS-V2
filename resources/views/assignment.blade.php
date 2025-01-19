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
                    <div>

                        <button data-modal-target="unitModal" data-modal-toggle="unitModal"
                            class="bg-customOrange cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            Add Assignment</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 gradient-bg text-white">
                            <tr>
                                <th>STN</th>
                                <th>Unit Name</th>
                                <th>Reference No</th>
                                <th>File</th>
                                <th>Check status</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assignment->unit->title }}</td>
                                    <td>{{ $assignment->unit->refrence_no }}</td>
                                    <td><a href="{{ $assignment->file }}" target="_blank" class="text-blue-600">open
                                            File</a></td>
                                    <td>
                                        {!! $assignment->status == 2
                                            ? '<span class="bg-purple-100 text-purple-800r text-xs font-medium me-2 px-2.5 py-0.5 rounded">Pending</span>'
                                            : ($assignment->status == 1
                                                ? '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Approved</span>'
                                                : '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">Rejected</span>') !!}
                                    </td>
                                    <td>{{ $assignment->note}}</td>

                                    <td>
                                        @if($assignment->status == 2)
                                        <button class="updateDataBtn" assignmentId="{{ $assignment->id }}"
                                            unit="{{ $assignment->assignment_id }}"
                                            description="{{ $assignment->description }}">
                                            <svg width="36" height="36"
                                            viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.1" cx="18" cy="18" r="18"
                                                fill="#233A85" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                fill="#233A85" />
                                        </svg>
                                        </button>
                                        @endif

                                    </td>
                                    </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>




    <div id="unitModal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-2xl max-h-full ">
            <form id="postDataForm" method="post" url="../addAssignment" enctype="multipart/form-data">
                <input type="hidden" name="assessor_id" id="assessorId">
                @csrf
                <input type="hidden" name="reference_no" value="5374564">
                <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                    <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-secondary">
                        <h3 class="text-xl font-semibold text-white " id="modalTitle">
                            Add Assignment
                        </h3>
                        <button type="button"
                            class="modalCloseBtn absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                            data-modal-hide="unitModal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mx-6 mt-4">
                        <div>
                            <label class="text-[14px] font-normal" for="assignmentSelect">Unit</label>
                            <select name="assignment_id" id="assignmentSelect">
                                <option disabled selected>Select Course Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->assignment_id }}" data-assessor-id="{{ $unit->assessor_id }}">
                                        {{ $unit->course->title }}
                                        ({{ $unit->reference_no }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-[14px] font-normal" for="file">Unit File</label>
                            <input type="file" required
                                class="w-full border-[#DEE2E6] border rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="file" id="
                                accept=".pdf , .DOCX , .DOC">
                        </div>
                        <div class="col-span-2">
                            <label class="text-[14px] font-normal" for="description">Unit Description</label>
                            <textarea name="description" id="description"
                                class="w-full min-h-20 border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                placeholder="Resource Description Here"></textarea>
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
                                Add
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
            $('#assignmentSelect').change(function() {
                let assessorId = $(this).find(':selected').data('assessor-id');

                $('#assessorId').val(assessorId || '');
            });
        });

        function updateDatafun() {
            $('.updateDataBtn').click(function() {
                $('#unitModal').removeClass("hidden");
                $('#unitModal').addClass('flex');
                $('#assignmentSelect').trigger('change');
                $('#description').val($(this).attr('description'));

                $('#updateId').val($(this).attr('assignmentId'));

                $('#unitModal #modalTitle').text("Update Assignment");
                $('#unitModal #btnText').text("Update");

            });
        }
        updateDatafun()
        // Listen for the custom form submission response event
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            console.log(response);

            if (response.success) {
                $('.modalCloseBtn').click();
            } else {}
        });
    </script>
@endsection
