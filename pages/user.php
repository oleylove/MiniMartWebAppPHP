<?php 
$userActive = ' active';
$pageName = 'Users';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require_once('layouts/head.php'); ?>
<!-- End Head -->

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidenav -->
    <?php require_once('layouts/sidenav.php'); ?>
    <!--End Sidenav -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar Main -->
        <?php require_once('layouts/navbar-main.php'); ?>
        <!-- End Navbar Main -->

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class=" card-header pb-0">
                            <h6>Users</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="ShowDataUsers" class="table align-items-center mb-0 table-overflow">
                                    <thead>
                                        <tr>
                                            <th class="text-left text-uppercase text-dark text-xxs font-weight-bolder">Author</th>
                                            <th
                                                class="text-left text-uppercase text-dark text-xxs font-weight-bolder ps-2">
                                                Phone Number</th>
                                            <th
                                                class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-dark text-xxs font-weight-bolder">
                                                Action</th>
                                        </tr>
                                    </thead>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php require_once('layouts/footer.php'); ?>
            <!-- End Footer -->

        </div>
    </main>

    <!-- fixed-plugin -->
    <?php require_once('layouts/fixed-plugin.php'); ?>
    <!-- End Fixed-plugin -->


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
    <script async defer src="../assets/js/plugins/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>

    <!-- JS Files DataTables Bootstrap 5 -->
    <script type="text/javascript" src="../assets/js/core/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/responsive.bootstrap5.js"></script>
    <!-- JS Files DataTables Ajax -->
    <script src="../ajax/AjaxUser.js"></script>

</body>

</html>