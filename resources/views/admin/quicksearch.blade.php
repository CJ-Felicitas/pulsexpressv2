<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-2">

            <!-- Heading -->
            <div class="sidebar-heading">
                Overview
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard/firstquarter">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>General Overview</span></a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-map-pin"></i>
                    <span>Provinces</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/admin/provinces/davaodeoro/firstquarter">Davao De Oro</a>

                        <a class="collapse-item" href="/admin/provinces/davaooccidental/firstquarter">Davao
                            Occidental</a>

                        <a class="collapse-item" href="/admin/provinces/davaooriental/firstquarter">Davao Oriental</a>

                        <a class="collapse-item" href="/admin/provinces/davaodelsur/firstquarter">Davao Del Sur</a>

                        <a class="collapse-item" href="/admin/provinces/davaodelnorte/firstquarter">Davao Del Norte</a>

                        <a class="collapse-item" href="/admin/provinces/davaocity/firstquarter">Davao City</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/quicksearch">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Quick Search</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System Settings
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/accountsettings">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Account Settings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/target">
                    <i class="fas fa-fw fa-bullseye"></i>
                    <span>Set Target</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/history">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>History</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/variance">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Variance</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <span class="mr-2 d-none d-lg-inline text-gray-600">Department of Social Welfare and Development |
                        Harmonized Planning Monitoring and Evaluation (HPMES)</span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <button type="button" data-target="#logoutModal" data-toggle="modal"
                            class="btn btn-danger">Logout</button>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quick Search</h1>
                    </div>

                    {{-- search area --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Search</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <select class="form-control" id="selectprogram">
                                                    <option disabled selected>Select Program</option>
                                                    <option value="1">Pantawid Pamilyang Pilipino Program</option>
                                                    <option value="2">Sustainable Livelihood Program</option>
                                                    <option value="3">Centenarrian Program</option>
                                                    <option value="4">Kapit Bisig Laban sa Kahirapan</option>
                                                    <option value="5">Social Pension Program</option>
                                                    <option value="6">Supplementary Feeding Program</option>
                                                    <option value="7">Disaster Risk Reduction Management Program</option>
                                                    <option value="8">Assistance to Individual in Crisis Situation</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <select class="form-control" id="selectquarter">
                                                    <option disabled selected>Select Quarter</option>
                                                    <option value="1">1st Quarter</option>
                                                    <option value="2">2nd Quarter</option>
                                                    <option value="3">3rd Quarter</option>
                                                    <option value="4">4th Quarter</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">

                                                <select class="form-control" id="selectprovince">
                                                    <option disabled selected>Select Province</option>
                                                    <option value="1">Davao Oriental</option>
                                                    <option value="2">Davao De Oro</option>
                                                    <option value="3">Davao Occidental</option>
                                                    <option value="4">Davao Del Norte</option>
                                                    <option value="5">Davao Del Sur</option>
                                                    <option value="6">Davao City</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <select class="form-control" id="selectyear">
                                                    <option disabled selected>Select Year</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1 justify-content-end">
                                            <form>
                                                @csrf
                                                <button class="btn btn-primary">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- results --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Municipality</th>
                                                            <th>Male Count</th>
                                                            <th>Female Count</th>
                                                            <th>Total Physical Count</th>
                                                            <th>Total Fund Allocation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">Logout</button>
                            </form>
                            {{-- <a class="btn btn-primary" href="/logout">Logout</a> --}}
                        </div>
                    </div>
                </div>
            </div>


            <!-- Bootstrap core JavaScript -->
            <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript -->
            <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages -->
            <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
            <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


            <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

            <script>
                $(document).ready(function () {
                    // Handle form submission
                    $("button.btn-primary").click(function (e) {
                        e.preventDefault(); // Prevent the default form submission

                        // Get selected values
                        var program = $("#selectprogram").val();
                        var quarter = $("#selectquarter").val();
                        var province = $("#selectprovince").val();
                        var year = $("#selectyear").val();

                        // Get CSRF token value
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');

                        // Make AJAX request with CSRF token in headers
                        $.ajax({
                            url: '/admin/search', // Replace with your Laravel endpoint
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            data: {
                                program: program,
                                quarter: quarter,
                                province: province,
                                year: year
                            },
                            success: function (data) {
                                // Handle the response data and update your HTML

                                // Clear existing rows in the table body
                                $("tbody").empty();

                                // Iterate over each row in the response data
                                $.each(data, function (index, row) {
                                    // Append a new row to the table with data from the response
                                    $("tbody").append("<tr><td>" + row.municipality_name + "</td><td>" + row.total_male_count + "</td><td>" + row.total_female_count + "</td><td>" + row.total_physical_count + "</td><td>" + row.total_budget_utilized + "</td></tr>");
                                });
                            },
                            error: function (error) {
                                console.log('Error:', error);
                            }
                        });
                    });
                });
            </script>


</body>

</html>
