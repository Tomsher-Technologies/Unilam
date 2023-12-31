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

    <link rel="stylesheet" href="../../public/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="../../public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../../public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php
    if (isset($post['userTypeID'])) {
        echo $this->include('partials/menudoubleback');
    } else {
        echo $this->include('partials/menu');
    }
    ?>
    <?= $this->include('partials/topbardoubleback') ?>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18"><?= $title ? lang($title . '') : '' ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="../admin/users">User</a></li>
                                    <?php if (isset($li_2)) :  ?>
                                        <li class="breadcrumb-item active"><?= $li_2 ?></li>
                                    <?php endif ?>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['userID']) ? base_url("admin/edit-user/{$post['userID']}") : base_url('admin/create-user'); ?>" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name </label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?= isset($post['name']) ? $post['name'] : ''; ?>" required>
                                            <?php
                                            if (isset($validation) && isset($validation['name'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['name']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password </label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name='password' value="<?= isset($post['password']) ? $post['password'] : ''; ?>" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                                                <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                            <?php if (isset($validation) && isset($validation['password'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['password']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">User Type </label>
                                            <select class="form-select" name="userTypeID" aria-label="Default select example">
                                                <option selected>Select user type</option>
                                                <?php foreach ($userTypes as $userType_row) : ?>
                                                    <option value="<?= $userType_row['userTypeID']; ?>" <?= ($userType_row['userTypeID'] == $userType_row['userTypeID']) ? 'selected' : ''; ?>>
                                                        <?= $userType_row['userType']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (isset($validation) && isset($validation['userTypeID'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['userTypeID']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email </label>
                                            <input type="text" type="email" name="email" class="form-control" id="email" placeholder="Enter user email" value="<?= isset($post['email']) ? $post['email'] : ''; ?>" required>
                                            <?php if (isset($validation) && isset($validation['email'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['email']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone </label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <button class="btn btn-light ms-0" type="button" id="password-addon">+971</button>
                                                <input type="number" class="form-control" name='phone' value="<?= isset($post['phone']) ? $post['phone'] : ''; ?>" placeholder="Enter phone" aria-label="phone" aria-describedby="phone-addon" required>
                                            </div>
                                            <?php if (isset($validation) && isset($validation['phone'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['phone']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </form>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    <?= $this->include('partials/footer') ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<script>
    jQuery(document).ready(function() {
        $("#addEditUserTypeModal").click(function() {
            alert("This is an alert message!");
        });
    });
    // $(document).ready(function() {
    //     $("#addEditUserTypeModal").click(function() {
    //         alert("This is an alert message!");
    //     });
    // });
</script>

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

<!--  -->

<script src="../../public/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="../../public/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../public/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="../../public/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="../../public/assets/js/app.js"></script>
<!--  -->
</body>

</html>