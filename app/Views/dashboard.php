<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="../public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<style>
    .tools {
        display: flex;
        gap: 10px;
    }

    .tools a i {
        font-size: 16px;
        cursor: pointer;
    }
</style>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
        
      
                


            </div>
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="../public/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="../public/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../public/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="../public/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="../public/assets/js/app.js"></script>
</body>

</html>