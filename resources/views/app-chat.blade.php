@extends('layouts.app')
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            @include('layouts.TopNav')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                @include('layouts.Sidebar')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-3 col-xl-2 border-end">
                                    <div class="card-body border-bottom">
                                        <form>
                                            <input class="form-control" type="text" placeholder="Search Contact">
                                        </form>
                                    </div>
                                    <div class="scrollable position-relative" style="height: calc(100vh - 111px);">
                                        <ul class="mailbox list-style-none">
                                            <li>
                                                <div class="message-center">
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/1.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status online float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Pavan kumar</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see
                                                                the my new
                                                                admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:30
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/2.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status busy float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Sonu Nigam</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">I've
                                                                sung a
                                                                song! See you at</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:10
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"> <img src="../assets/images/users/3.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status away float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Arijit Sinh</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">I
                                                                am a
                                                                singer!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:08
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/4.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status offline float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Nirav Joshi</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see the my admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:02
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/5.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status offline float-end"></span></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Sunil Joshi</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see the my admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:02
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/6.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status offline float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Akshay Kumar</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see the my admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:02
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/7.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status offline float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Pavan kumar</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see the my admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:02
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                    <a href="javascript:void(0)"
                                                        class="message-item d-flex align-items-center px-3 py-2">
                                                        <div class="user-img"><img src="../assets/images/users/8.jpg"
                                                                alt="user" class="img-fluid rounded-circle"
                                                                width="40px"> <span
                                                                class="profile-status offline float-end"></span>
                                                        </div>
                                                        <div class="w-75 d-inline-block v-middle ps-2">
                                                            <h6 class="message-title mb-0 mt-1">Varun Dhavan</h6>
                                                            <span
                                                                class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                                see the my admin!</span>
                                                            <span class="font-12 text-nowrap d-block text-muted">9:02
                                                                AM</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9  col-xl-10">
                                    <div class="chat-box scrollable position-relative"
                                        style="height: calc(100vh - 111px);">
                                        <!--chat Row -->
                                        <ul class="chat-list list-style-none px-3 pt-3">
                                            <!--chat Row -->
                                            <li class="chat-item list-style-none mt-3">
                                                <div class="chat-img d-inline-block"><img
                                                        src="../assets/images/users/1.jpg" alt="user"
                                                        class="rounded-circle" width="45">
                                                </div>
                                                <div class="chat-content d-inline-block ps-3">
                                                    <h6 class="font-weight-medium">James Anderson</h6>
                                                    <div class="msg p-2 d-inline-block mb-1">Lorem
                                                        Ipsum is simply
                                                        dummy text of the
                                                        printing &amp; type setting industry.</div>
                                                </div>
                                                <div class="chat-time d-block font-10 mt-1 mr-0 mb-3">10:56 am
                                                </div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item list-style-none mt-3">
                                                <div class="chat-img d-inline-block"><img
                                                        src="../assets/images/users/2.jpg" alt="user"
                                                        class="rounded-circle" width="45">
                                                </div>
                                                <div class="chat-content d-inline-block ps-3">
                                                    <h6 class="font-weight-medium">Bianca Doe</h6>
                                                    <div class="msg p-2 d-inline-block mb-1">It’s
                                                        Great opportunity to
                                                        work.</div>
                                                </div>
                                                <div class="chat-time d-block font-10 mt-1 mr-0 mb-3">10:57 am
                                                </div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item odd list-style-none mt-3">
                                                <div class="chat-content text-end d-inline-block ps-3">
                                                    <div class="box msg p-2 d-inline-block mb-1">I
                                                        would love to
                                                        join the team.</div>
                                                    <br>
                                                </div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item odd list-style-none mt-3">
                                                <div class="chat-content text-end d-inline-block ps-3">
                                                    <div class="box msg p-2 d-inline-block mb-1 box">
                                                        Whats budget
                                                        of the new project.</div>
                                                    <br>
                                                </div>
                                                <div class="chat-time text-end d-block font-10 mt-1 mr-0 mb-3">
                                                    10:59 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item list-style-none mt-3">
                                                <div class="chat-img d-inline-block"><img
                                                        src="../assets/images/users/3.jpg" alt="user"
                                                        class="rounded-circle" width="45">
                                                </div>
                                                <div class="chat-content d-inline-block ps-3">
                                                    <h6 class="font-weight-medium">Angelina Rhodes</h6>
                                                    <div class="msg p-2 d-inline-block mb-1">Well we
                                                        have good budget
                                                        for the project
                                                    </div>
                                                </div>
                                                <div class="chat-time d-block font-10 mt-1 mr-0 mb-3">11:00 am
                                                </div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item odd list-style-none mt-3">
                                                <div class="chat-content text-end d-inline-block ps-3">
                                                    <div class="box msg p-2 d-inline-block mb-1">I
                                                        would love to
                                                        join the team.</div>
                                                    <br>
                                                </div>
                                            </li>
                                            <!--chat Row -->
                                            <li class="chat-item odd list-style-none mt-3">
                                                <div class="chat-content text-end d-inline-block ps-3">
                                                    <div class="box msg p-2 d-inline-block mb-1 box">
                                                        Whats budget
                                                        of the new project.</div>
                                                    <br>
                                                </div>
                                                <div class="chat-time text-end d-block font-10 mt-1 mr-0 mb-3">
                                                    10:59 am</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="input-field mt-0 mb-0">
                                                    <input id="textarea1" placeholder="Type and enter"
                                                        class="form-control border-0" type="text">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a class="btn-circle bg-cyan float-end text-white d-flex align-items-center justify-content-center"
                                                    href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                @include('layouts.Footer')
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script>
        $(function () {
            $(document).on('keypress', "#textarea1", function (e) {
                if (e.keyCode == 13) {
                    var id = $(this).attr("data-user-id");
                    var msg = $(this).val();
                    msg = msg_sent(msg);
                    $("#someDiv").append(msg);
                    $(this).val("");
                    $(this).focus();
                }
            });
        });
    </script>
</body>

</html>