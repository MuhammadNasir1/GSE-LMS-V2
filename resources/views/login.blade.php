<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Poultry Bazar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.13.8/css/jquery.dataTables.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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

    <div class="relative w-full h-full">
        <div>
            <div>
                <div class="absolute z-10 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div style="box-shadow: 0px 0px 179px 300px #4883c33e;"></div>
                </div>
            </div>
            <div id="mainContent"
                class="flex flex-col-reverse  items-center justify-center h-[100vh] mx-[10px]  xl:mx-auto z-40 relative ">
                <div id=""
                    class="w-[480px] relative my-2 p-12  px-8 flex flex-col justify-center pt-10 items-center h-auto  rounded-2xl "
                    style="box-shadow: 0px 0px 8px 0px #00000026; background:rgba(255, 255, 255, 0.389)">
                    <div class="w-full">
                        <div class="flex justify-center">
                            <img src="{{ asset('images/logo-full.svg') }}" class="w-[250px]" alt="Company logo">
                        </div>
                        <div>
                            <h1 class="text-customBlackColor font-bold text-[44px] text-center">Login E-Portal</h1>
                        </div>
                        <form id="login_data" method="post" class="flex flex-col gap-4 ">
                            @csrf
                            <div class="mt-2">
                                <div class="relative mt-5">
                                    <label for="Email" class="block text-sm">Email</label>
                                    <div class="relative mt-1">
                                        <input type="Email" id="Email"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Here" name="email">

                                    </div>
                                </div>
                                <div class="relative mt-5">
                                    <label for="Password" class="block text-sm">Password</label>
                                    <div class="relative mt-1">
                                        <input type="password" id="Password"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Here" name="password">
                                        <span
                                            class="absolute inset-y-0 flex items-center cursor-pointer right-4 togglePassword">
                                            <i class="fa-solid fa-eye-slash text-customGrayColorDark"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="mt-6">
                                    <button
                                        class="w-full px-3 py-3 font-semibold text-white rounded-3xl shadow-md gradient-bg"
                                        id="loginbutton">
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
                                            Login
                                        </div>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <h2 class="absolute bottom-1 left-1/2 -translate-x-1/2 text-sm text-customGrayColorDark">Version
                        1.0.0</h2>

                </div>

            </div>
        </div>
    </div>

    <div class="absolute flex justify-center  w-full  bottom-1 z-50">
        <p class="text-sm text-black">Powered by <a href="https://globalconsulting-int.com/" target="_blank"
                class="text-primary font-semibold">Global Consulting pvt. Ltd.</a> & Developed by <a
                class="text-blue-500" href="">Velodity Solutions</a>.
        </p>
    </div>



    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })
        $(document).ready(function() {
            $('select').select2({
                width: '100%'
            });
            $('#Items_dropdown').select2({
                minimumResultsForSearch: Infinity
            });
        });
        $(document).ready(function() {
            $("#login_data").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "/login",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#loginbutton').attr('disabled', true);
                    },
                    success: function(response) {

                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');

                        console.log(response);
                        if (response.user.role == "candidate") {
                            window.location.href =
                                `../enrolledCourse?key=?${response.key}&c=${response.user.course}`;
                        } else {
                            window.location.href = "../"

                        }


                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: "Error",
                            text: "Credentials Not Match",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#loginbutton').attr('disabled', false);
                    }
                });
            });
            // Toggle password visibility
            $('.togglePassword').on('click', function() {
                const input = $(this).siblings('input');
                const icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
</body>

</html>
