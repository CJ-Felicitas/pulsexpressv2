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

    <style>
        .upload {
            &__box {
                padding: 40px;
            }

            &__inputfile {
                width: .1px;
                height: .1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            &__btn {
                display: inline-block;
                font-weight: 600;
                color: #fff;
                text-align: center;
                min-width: 116px;
                padding: 5px;
                transition: all .3s ease;
                cursor: pointer;
                border: 2px solid;
                background-color: #4045ba;
                border-color: #4045ba;
                border-radius: 10px;
                line-height: 26px;
                font-size: 14px;

                &:hover {
                    background-color: unset;
                    color: #4045ba;
                    transition: all .3s ease;
                }

                &-box {
                    margin-bottom: 10px;
                }
            }

            &__img {
                &-wrap {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0 -10px;
                }

                &-box {
                    width: 200px;
                    padding: 0 10px;
                    margin-bottom: 12px;
                }

                &-close {
                    width: 24px;
                    height: 24px;
                    border-radius: 50%;
                    background-color: rgba(0, 0, 0, 0.5);
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    text-align: center;
                    line-height: 24px;
                    z-index: 1;
                    cursor: pointer;

                    &:after {
                        content: '\2716';
                        font-size: 14px;
                        color: white;
                    }
                }
            }
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

                <div class="sidebar-brand-text mx-3">CLIENT</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-2">
            <!-- Heading -->
            <div class="sidebar-heading">
                Overview
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/client/dashboard">
                    <i class="fas fa-fw fa-file-import"></i>
                    <span>Submit Report</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/client/history">
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
                <a class="nav-link" href="/client/accountsettings">
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
                        <button type="button" data-target="#logoutModal" data-toggle="modal"
                            class="btn btn-danger">Logout</button>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h4 class="text-center">Upload Report</h4>
                            <hr>
                            @if (session('report_success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Report has been submitted
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if (session('report_error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Submission of report is not allowed for today.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="/client/submitreport" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="provinceSelect">Province</label>
                                        <select required name="province_id" class="form-control" id="provinceSelect">
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
                                        <select required name="municipality_id" class="form-control"
                                            id="municipalitySelect">
                                            <option value="" disabled selected>Select Municipality</option>
                                            <!-- Default option for municipality -->
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-4">
                                        <label for="">Number of Females</label>
                                        <input required name="female_count" type="text" class="form-control"
                                            placeholder="Female Count" oninput="updateTotalCount()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Number of Males</label>
                                        <input required name="male_count" type="text" class="form-control"
                                            placeholder="Male Count" oninput="updateTotalCount()">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Total Physical Count</label>
                                        <input type="hidden" name="total_count" id="totalPhysicalCounthidden">
                                        <input type="text" disabled value="" class="form-control"
                                            id="totalPhysicalCount">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="">Physical Target</label>
                                        @php
                                            $data = session('data')->first();

                                        @endphp
                                        <input type="text" class="form-control" disabled
                                            value="{{ $data->physical_target }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Budget Target</label>
                                        <input type="text" class="form-control" disabled
                                            value="{{ $data->budget_target }}">
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-md-6">
                                        <label for="">Total Budget Utilized</label>
                                        <input required name="budget_utilized" type="text" class="form-control"
                                            placeholder="Total Budget">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Quarter</label>
                                        <input disabled type="text" class="form-control"
                                            value="{{ $data->quarter_id }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Year</label>
                                        <input name="year" disabled type="text" class="form-control"
                                            value="2024">
                                    </div>
                                </div>

                                {{-- image attach --}}
                                <div class="row my-3">
                                    <div class="col-md-12">
                                        <div class="upload__box mx-auto">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Upload images</p>
                                                    <input type="file" multiple="" name="upload_inputfile[]"
                                                        data-max_length="20" class="upload__inputfile">
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap"></div>
                                        </div>
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
            document.getElementById('totalPhysicalCounthidden').value = totalPhysicalCount;
        }
    </script>


    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
</body>

</html>
