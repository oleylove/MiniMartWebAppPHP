<?php 
$employeeActive = ' active';
$pageName = 'Emoloyee';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon.png">
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <title>
        Soft UI Dashboard
    </title>

    <!-- CSS Files -->
    <?php 
        require_once('../layouts/header-css.php');
        require_once('../layouts/datatable-css.php'); 
    ?>
        
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidenav -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
      <?php require_once('../layouts/sidenav.php'); ?>
    </aside>
    <!-- End Sidenav -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <?php require_once('../layouts/navbar.php'); ?>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class=" card-header pb-0">
                            <h6>Emoloyees</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="ShowDataEmployees" class="table table-hover table align-items-center mb-0 table-overflow table-layout-auto">
                                <!-- <colgroup>
                                    <col width="80%">
                                    <col width="33%">
                                    <col width="33%">
                                    <col width="33%">
                                    <col width="33%">
                                </colgroup> -->
                                <thead>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Author
                                        </th>
                                        <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                            Function
                                        </th>
                                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                            Employed
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </thead>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer pt-3  ">
                <?php require_once('../layouts/footer.php'); ?>
            </footer>
            <!-- End Footer -->

        </div>
    </main>

     <!-- Fixed Plugin -->
     <div class="fixed-plugin">
      <?php require_once('../layouts/fixed-plugin.php'); ?>
    </div>
    <!-- End Fixed Plugin -->

    <!--   Core JS Files   -->
    <?php 
        require_once('../layouts/main-js.php');
        require_once('../layouts/datatable-js.php');
    ?>
    
    <!-- JS Files DataTables Ajax -->
    <script src="../ajax/Employee.js"></script>

</body>

</html>