    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    
    <!-- JS Files DataTables Bootstrap 5 -->
    <script type="text/javascript" src="../assets/js/core/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.bootstrap5.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="../assets/datatable/js/responsive.bootstrap5.js"></script>

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

