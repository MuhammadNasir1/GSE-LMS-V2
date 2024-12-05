@extends('layouts.layout')

@section('title')
    Assignments
@endsection

@section('content')
    <div class="md:mx-4  mt-12">

        <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
            <div>
                <div class="flex justify-end sm:justify-between  items-center px-[20px] mb-3">
                    <h3 class="text-[20px] text-black hidden sm:block">Assignment List</h3>
                    <div>

                        <button data-modal-target="userModal" data-modal-toggle="userModal"
                            class="gradient-bg cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            Add Assignment</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="datatable">
                        <thead class="py-1 gradient-bg text-white">
                            <tr>
                                <th>STN</th>
                                <th>Course</th>
                                <th>Reference No</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                      

                                        {{-- <img src="{{ $data->user_image }}" alt=""> --}}
                                        {{-- {{ asset($data->user_image) }} --}}
                                    </td>

                                    <td>{{ $assignment->name }}</td>
                                    <td><a href="mailto:{{ $assignment->email }}" class="text-blue-700">{{ $assignment->email }}</a>
                                    </td>
                                    <td>{{ $assignment->reference_no }}</td>
                                    {{-- <td><span
                                            class="{{ $data->role == 'assessor' ? 'text-green-800' : 'text-purple-700' }}">{{ $data->role }}</span>
                                    </td> --}}
                                    {{-- <td>
                                        <span
                                            class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full ">{{ $data->verification }}</span>

                                    </td> --}}
                                    <td>
                                  
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
            <form id="FormData" method="post" url="../addAssignment" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="reference_no" value="5374564">
                <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                    <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                        <h3 class="text-xl font-semibold text-white ">
                            Add Unit
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

                    <div class="grid md:grid-cols-2 gap-4 mx-6 my-4">
                        <div>
                            <label class="text-[14px] font-normal" for="name">Unit</label>
                            <select name="unit_id" id="unit">
                                <option disabled selected>Select Course Unit</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->title }} ({{ $unit->refrence_no }})
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
                            class="gradient-bg text-white py-2 px-6 w-full my-6 rounded-[4px]  mx-6 uaddBtn  font-semibold "
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
        function updateDatafun() {}
        // Listen for the custom form submission response event
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            console.log(response);

            if (response.success) {
                $('.modalCloseBtn').click();
            } else {}
        });
    </script>
@endsection
