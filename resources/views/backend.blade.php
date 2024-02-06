<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('main/assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('main/assets/img/favicon.png') }}">
        <title>
            CourseCOP
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('main/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('main/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('main/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
        <!-- Nepcha Analytics (nepcha.com) -->
        <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
        <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .modal-content {
                background-color: #fefefe;
                margin: 3% 35%;
                padding: 20px;
                border: 1px solid #888;
                width: 50%;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .picker {
                z-index: 99999 !important;
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>

<body class="g-sidenav-show  bg-gray-200">
    @php

        use App\Http\Controllers\RoleController;

        $user_level = new RoleController();

    @endphp

    @if ($user_level->isSYSTEM())
        @include('sidebars.system')
    @endif

    @if ($user_level->isAdmin())
        @include('sidebars.admin')
    @endif

    @if ($user_level->isRegistrator())
        @include('sidebars.registrator')
    @endif

    @if ($user_level->isTeacher())
        @include('sidebars.teacher')
    @endif

    @if ($user_level->isPupil())
        @include('sidebars.pupil')
    @endif




    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-flex align-items-center">
                            <a href="#" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4">
            @yield('main')
        </div>
    </main>
    <script src="{{ asset('main/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/pickerjs@1.2.1/dist/picker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pickerjs@1.2.1/dist/picker.min.css" rel="stylesheet">
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('main/assets/js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <script>
        // Get the modal and close button
        function open_modal(id, button) {

            var modal = document.getElementById(id);
            var closeButton = document.getElementsByClassName("close")[0];

            modal.style.display = "block";

            var closeButton = document.getElementsByClassName("close")[0];
    
            closeButton.addEventListener("click", function() {
                modal.style.display = "none";
            });
            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        }

    </script>

</body>

</html>
