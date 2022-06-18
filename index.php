
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidenav -->
    <?php require_once('pages/layouts/sidenav.php'); ?>
    <!--End Sidenav -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="AlertCreateDatabase">

            </div>
            <div class="">
                <button id="CreateDatabase" type="button" class="btn btn-outline-default">Create Database</button>
                <button type="button" class="btn btn-outline-primary">Primary</button>
                <button type="button" class="btn btn-outline-secondary">Secondary</button>
                <button type="button" class="btn btn-outline-info">Info</button>
                <button type="button" class="btn btn-outline-success">Success</button>
                <button type="button" class="btn btn-outline-danger">Danger</button>
                <button type="button" class="btn btn-outline-warning">Warning</button>
            </div>
        </div>
    </main>

    <!--   Core JS Files   -->
    <script type="text/javascript" src="assets/js/core/jquery-3.6.0.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>

    <script type="text/javascript">

    $('#CreateDatabase').click(function() {
        $.ajax({
            url: "config/CreateDatabase.php",

            success: function(Status) {
              if (Status == 1){
                $('.AlertCreateDatabase').html(
                  '<div class="alert alert-warning  alert-dismissible fade show" role="alert">' +
                  '<span class="alert-icon"><i class="ni ni-like-2"></i></span><span class="alert-text">'+
                  '<strong>Exist! </strong> There is already a database.</span>'+
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">'+
                  '<span aria-hidden="true">&times;</span></button></div>');
              }
              if (Status == 2){
                $('.AlertCreateDatabase').html(
                  '<div class="alert alert-success  alert-dismissible fade show" role="alert">' +
                  '<span class="alert-icon"><i class="ni ni-like-2"></i></span><span class="alert-text">'+
                  '<strong>Success! </strong> Database created successfully.</span>'+
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">'+
                  '<span aria-hidden="true">&times;</span></button></div>');
              }
              if (Status == 3){
                $('.AlertCreateDatabase').html(
                  '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                  '<span class="alert-icon"><i class="ni ni-like-2"></i></span><span class="alert-text">'+
                  '<strong>Error! </strong> Connection failed.</span>'+
                  '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">'+
                  '<span aria-hidden="true">&times;</span></button></div>');
              }
            },
        })
    });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
    <script type="text/javascript" src="ajax/Employee.js"></script>

</body>

</html>