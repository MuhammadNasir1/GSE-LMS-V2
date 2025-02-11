<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup-Account - GSE</title>
    <link rel="shortcut icon" href="{{ asset('assets/fav-icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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


    <div class="relative w-full h-full">
        <div>
            <div>
                <div class="absolute z-10 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div style="box-shadow: 0px 0px 179px 300px #4883c33e;"></div>
                </div>
            </div>
            <div id="mainContent"
                class="flex flex-col-reverse  items-center justify-center h-[100vh] mx-[10px]  xl:mx-auto z-40 relative ">
                <form id="postDataForm" method="POST" url="../setPassword">
                    @csrf
                    <input type="hidden" name="user_id" id=""
                        value="{{ isset($_GET['key']) ? $_GET['key'] : null }}">
                    <div id="loginDiv"
                        class="w-[480px] relative my-2 p-12  px-8 flex flex-col justify-center pt-10 items-center h-auto  rounded-2xl "
                        style="box-shadow: 0px 0px 8px 0px #00000026; background:rgba(255, 255, 255, 0.389)">
                        <div class="w-full" id="passwordFields">
                            <div class="flex justify-center">
                                <img src="{{ asset('images/logo-full.svg') }}" class="w-[250px]" alt="Company logo">
                            </div>
                            <div>
                                <h1 class="text-customBlackColor font-bold text-[44px] text-center">Set Password</h1>
                            </div>
                            <div class="mt-10">
                                <div class="relative mt-5">
                                    <label for="password" class="block text-sm">Enter Password</label>
                                    <div class="relative mt-1">
                                        <input type="password" id="password"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Here" name="password">
                                        <span
                                            class="absolute inset-y-0 flex items-center cursor-pointer right-4 togglePassword">
                                            <i class="fa-solid fa-eye-slash text-customGrayColorDark"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="relative mt-5">
                                    <label for="password_confirmation" class="block text-sm">Re-Enter Password</label>
                                    <div class="relative mt-1">
                                        <input type="password" id="password_confirmation"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Here" name="password_confirmation">
                                        <span
                                            class="absolute inset-y-0 flex items-center cursor-pointer right-4 togglePassword">
                                            <i class="fa-solid fa-eye-slash text-customGrayColorDark"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="mt-6">
                                    <button type="button"
                                        class="w-full px-3 py-3 font-semibold text-white rounded-3xl shadow-md bg-primary
                                        "
                                        id="userDetailsBtn">
                                        Set password
                                    </button>

                                </div>
                            </div>

                        </div>


                        {{-- === user Info ======= --}}
                        <div class="w-full" id="userInfo">
                            <div class="mt-4">

                                <div class="flex justify-center w-full">

                                    <div class="h-[200px] w-[200px] relative  rounded-[50%]">
                                        <img id="img_view" height="200px" width="200px"
                                            class="h-[200px] w-[200px]  border border-secondary  rounded-[50%] cursor-pointer object-contain "
                                            src=" {{ asset('assets/logo/logo-bg-white.png') }}" alt="user">
                                        <input
                                            class="absolute top-0 opacity-0     h-[200px] w-[200px] z-50 cursor-pointer "
                                            type="file" name="user_image" id="user_image">
                                        <div class="absolute bottom-[6px] right-5  z-10">
                                            <button type="button">
                                                <svg width="42" height="42" viewBox="0 0 36 36" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="18" cy="18" r="18" fill="#F3490F" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16.1627 23.6197L22.3132 15.666C22.6474 15.2371 22.7663 14.7412 22.6549 14.2363C22.5583 13.7773 22.276 13.3408 21.8526 13.0097L20.8201 12.1895C19.9213 11.4747 18.8071 11.5499 18.1683 12.3701L17.4775 13.2663C17.3883 13.3785 17.4106 13.544 17.522 13.6343C17.522 13.6343 19.2676 15.0339 19.3048 15.064C19.4236 15.1769 19.5128 15.3274 19.5351 15.508C19.5722 15.8616 19.3271 16.1927 18.9631 16.2379C18.7922 16.2605 18.6288 16.2078 18.51 16.11L16.6752 14.6502C16.5861 14.5832 16.4524 14.5975 16.3781 14.6878L12.0178 20.3314C11.7355 20.6851 11.639 21.1441 11.7355 21.588L12.2927 24.0035C12.3224 24.1314 12.4338 24.2217 12.5675 24.2217L15.0188 24.1916C15.4645 24.1841 15.8804 23.9809 16.1627 23.6197ZM19.5948 22.8676H23.5918C23.9818 22.8676 24.299 23.1889 24.299 23.5839C24.299 23.9797 23.9818 24.3003 23.5918 24.3003H19.5948C19.2048 24.3003 18.8876 23.9797 18.8876 23.5839C18.8876 23.1889 19.2048 22.8676 19.5948 22.8676Z"
                                                        fill="white" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="relative mt-5">
                                    <label for="password" class="block text-sm">Full Name</label>
                                    <div class="relative mt-1">
                                        <input type="text" id="name"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Full Name" name="name">

                                    </div>
                                </div>
                                <div class="relative mt-5">
                                    <label for="password_confirmation" class="block text-sm">Phone No</label>
                                    <div class="relative mt-1">
                                        <input type="number" id="Phone"
                                            class="w-full pr-12 bg-white border border-customGrayColorDark rounded-2xl placeholder:text-customGrayColorDark placeholder:text-sm focus:border-primary focus:outline-none"
                                            placeholder="Enter Phone No" name="phone">
                                    </div>
                                </div>


                                <div class="mt-6">
                                    <button
                                        class="w-full px-3 py-3 font-semibold text-white rounded-3xl shadow-md gradient-bg"
                                        id="submitBtn">
                                        <div id="btnSpinner" class="hidden">
                                            <svg aria-hidden="true"
                                                class="w-6 h-6 mx-auto text-center text-gray-200 animate-spin fill-primary"
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
                                        <div id="btnText">
                                            Save
                                        </div>
                                    </button>

                                </div>
                            </div>

                        </div>
                        {{-- ================= --}}
                        <h2 class="absolute bottom-1 left-1/2 -translate-x-1/2 text-sm text-customGrayColorDark">
                            Version
                            1.0.0</h2>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="absolute flex justify-center  w-full  bottom-1 z-50">
        <p class="text-sm text-black">Powered by <a href="https://globalconsulting-int.com/" target="_blank"
                class="text-primary font-semibold">Global Consulting pvt. Ltd.</a> & Developed by <a target="_blank"
                class="text-blue-500" href="">Velodity Solutions</a>.
        </p>
    </div>
    <script src="{{ asset('javascript/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('javascript/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#postDataForm').on('keypress', function(event) {
                if (event.which === 13) { // 13 is the Enter key
                    event.preventDefault(); // Prevent default form submission
                }
            });
            // Initially hide the userInfo div and passwordFields div
            $('#userInfo').hide();
            $('#passwordFields').show();

            // Check if password and password_confirmation match when user types
            $('#password, #password_confirmation').on('input', function() {
                var password = $('#password').val();
                var passwordConfirmation = $('#password_confirmation').val();

                if (password && password === passwordConfirmation) {
                    $('#userDetailsBtn').prop('disabled', false); // Enable the button if passwords match
                } else {
                    $('#userDetailsBtn').prop('disabled',
                        true); // Disable the button if passwords don't match
                }
            });

            // When the button is clicked, check if passwords match
            $('#userDetailsBtn').click(function() {
                var password = $('#password').val();
                var passwordConfirmation = $('#password_confirmation').val();

                if (password && password === passwordConfirmation) {
                    $('#passwordFields').hide();
                    $('#userInfo').show();
                } else {
                    // Show SweetAlert error if passwords don't match
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Mismatch',
                        text: 'The passwords you entered do not match. Please try again.',
                        showConfirmButton: false,
                        timer: 1000,
                    });
                }
            });
        });



        let fileInput = document.getElementById('user_image');
        let imageView = document.getElementById('img_view');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                imageView.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
        $(window).on('load', function() {
            $('#loading').hide();
        })

        $(document).ready(function() {
            $('.togglePassword').on('click', function() {
                // Find the associated input field (sibling input)
                const passwordField = $(this).siblings('input');
                const passwordFieldType = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', passwordFieldType);

                // Toggle the icon
                const icon = $(this).find('i');
                icon.toggleClass('fa-eye fa-eye-slash');
            });

            // Toggle password visibility

        });
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            // console.log(response);

            if (response.user.enrolled == 0) {

                window.location.href =
                    `../enrolledCourse?key={{ request()->get('key') }}&c=${response.user.course}&i=${response.user.id}`;
            } else {

                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Enrolled Successfully",
                    text: "Enrollment Successful! Now you can login and use GSE LMS.",
                    showConfirmButton: false,
                    timer: 3000,
                }).then(function() {
                    window.location.href = '../login';
                });
            }
        });
    </script>
</body>

</html>
