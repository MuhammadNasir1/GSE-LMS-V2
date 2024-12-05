@extends('layouts.layout')

@section('title')
    Units
@endsection

@section('content')
    <div class="mx-10 my-16">
        <div class="flex justify-between gap-5">
            <div class="flex gap-4 items-center">
                {{-- <div class="w-[200px] pt-3">
                    <select name="course" id="course" class="rounded-[5px] w-[100px] bg-gray border-0 ps-8 focus:border-0">
                        <option value="Bacholer"> Bacholer</option>
                        <option value="Masters">Masters</option>
                    </select>
                </div> --}}
                <form class="max-w-md mx-auto">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search"
                            class="block min-w-[300px] px-4 py-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary focus:border-primary "
                            placeholder="Search Mockups, Logos..." required />

                    </div>
                </form>
            </div>
            <div class="flex justify-end w-full">

                <button data-modal-target="unitModal" data-modal-toggle="unitModal"
                    class="gradient-bg cursor-pointer text-white h-12 px-5 py-3 rounded-[6px]  shadow-sm font-semibold ">+
                    Add Unit Assignment</button>
            </div>
            <div>

            </div>
        </div>

        <div class="">
            <div class="grid  xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-2 gap-5  mt-7">
                @foreach ($assignments as $assignment)
                    <div class="h-[220px] w-full  bg-white border border-gray-400  rounded-lg p-3 shadow-l relative">
                        <a target="_blank" href="{{$assignment->file}}">
                            <div class="flex justify-center">
                                <img width="120" src="{{ asset('images/icons/pdf-upload-3389.svg') }}" alt="">
                            </div>
                            <div class="mt-2">
                                <h1 class="text-lg font-semibold text-[#545353] text-center text-[16px]">
                                    {{ $assignment->reference_no }}</h1>
                                <p class="text-[#545353c0] text-sm"> (Optional) UNIT 8 Review health and ....</p>
                            </div>
                        </a>
                        {{-- <div class="absolute w-full h-full rounded-lg bg-black opacity-20 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex justify-center items-center">
                            <h2 class=" font-bold ">Pending</h2>
                        </div> --}}
                    </div>
            </div>
        </div>
    </div>
    <div class="mt-2 flex justify-center hidden">
        <div class="flex">
            <!-- Previous Button -->
            <a href="#"
                class="flex items-center justify-center px-3 py-2 text-white  me-3 text-md font-medium text-gray-500 gradient-bg rounded-lg ">
                <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                Previous
            </a>
            <a href="#"
                class="flex items-center justify-center px-3 py-2 text-white  me-3 text-md font-medium text-gray-500 gradient-bg rounded-lg ">
                Next
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>


    {{-- ============ add  Assignment modal  =========== --}}
    <div id="unitModal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">

        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full   max-w-4xl max-h-full ">

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
        $("#FormData").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            // Send the AJAX request
            $.ajax({
                type: "POST",
                url: "/addAssignment",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#btnSpinner').removeClass('hidden');
                    $('#btnText').addClass('hidden');
                    $('#submitBtn').attr('disabled', true);
                },
                success: function(response) {

                    $('#btnText').removeClass('hidden');
                    $('#spinner').addClass('hidden');
                    window.location.href = "../assignment"


                },
                error: function(jqXHR) {

                    let response = JSON.parse(jqXHR.responseText);

                    Swal.fire({
                        position: "center",
                        icon: "warning",
                        title: "Error",
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $('#btnText').removeClass('hidden');
                    $('#btnSpinner').addClass('hidden');
                    $('#submitBtn').attr('disabled', false);
                }
            });
        });
    </script>
@endsection
