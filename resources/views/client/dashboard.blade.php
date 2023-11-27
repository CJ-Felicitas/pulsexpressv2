<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
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
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-file-import"></i>
                    <span>Submit Report</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>History</span></a>
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
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Account Settings</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    @php
                                        $user_data = session('user_data');
                                    @endphp
                                    @if ($user_data)
                                        {{ $user_data->username }}
                                    @endif
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h4 class="text-center">Upload Report</h4>
                            <hr>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="provinceSelect">Province</label>
                                        <select name="province_id" class="form-control" id="provinceSelect">
                                            <option value="" disabled selected>Select Province</option>
                                            <option value="2">Davao De Oro</option>
                                            <option value="3">Davao Occidental</option>
                                            <option value="1">Davao Oriental</option>
                                            <option value="4">Davao Del Norte</option>
                                            <option value="5">Davao Del Sur</option>
                                            <option value="6">Davao City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="municipalitySelect">Municipality</label>
                                        <select name="municipality_id" class="form-control" id="municipalitySelect">
                                            <option value="" disabled selected>Select Municipality</option>
                                            <!-- Default option for municipality -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-4">
                                        <label for="">Number of Females</label>
                                        <input name="female_count" type="text" class="form-control" placeholder="Female Count" oninput="updateTotalCount()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Number of Males</label>
                                        <input name="male_count" type="text" class="form-control" placeholder="Male Count" oninput="updateTotalCount()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Total Physical Count</label>
                                        <input name="total_count" type="text" disabled value="" class="form-control" id="totalPhysicalCount">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="">Physical Target</label>
                                        <input type="text" class="form-control" disabled value="10000000">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Budget Target</label>
                                        <input type="text" class="form-control" disabled value="10000000000">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="">Total Budget Utilized</label>
                                        <input name="budget_utilized" type="text" class="form-control"
                                            placeholder="Total Budget">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Quarter</label>
                                        <input disabled type="text" class="form-control" value="1st Quarter">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Year</label>
                                        <input disabled type="text" class="form-control" value="2024">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Event listener for province selection
            $('#provinceSelect').on('change', function() {
                var provinceId = $(this).val();

                // AJAX request to fetch municipalities based on the selected province
                $.ajax({
                    url: '/client/api/municipalities/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        // Clear existing options
                        $('#municipalitySelect').empty();

                        // Add default option
                        $('#municipalitySelect').append(
                            '<option value="" disabled selected>Select Municipality</option>'
                            );

                        // Add fetched municipalities
                        $.each(data, function(key, value) {
                            $('#municipalitySelect').append('<option value="' + value
                                .id + '">' + value.municipality + '</option>');
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching municipalities: ', error);
                    }
                });
            });
        });
    </script>
    <script>
        function updateTotalCount() {
            var femaleCount = parseInt(document.getElementsByName('female_count')[0].value) || 0;
            var maleCount = parseInt(document.getElementsByName('male_count')[0].value) || 0;
            var totalPhysicalCount = femaleCount + maleCount;

            document.getElementById('totalPhysicalCount').value = totalPhysicalCount;
        }
    </script>

</body>

</html>
