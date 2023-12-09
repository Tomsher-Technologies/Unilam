<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/preloader.min.css') ?>" type="text/css" />
    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

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

<body>
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18"><?= $title ? $title : '' ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <a href="create-service-feature"> <button type="button" class="btn btn-secondary waves-effect waves-light">Create</button></a>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <?php if (isset($_SESSION['successMessage']) && !empty($_SESSION['successMessage'])) : ?>
                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                        <i class="mdi mdi-check-all label-icon"></i><strong>Success</strong> - <?= $_SESSION['successMessage']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) : ?>
                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Error</strong> - <?= $_SESSION['errorMessage']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="card-header">
                                    <h4 class="card-title">Product type lists</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Feature Title</th>
                                                    <th>Created On</th>
                                                    <th>Tools</th>
                                                </tr>
                                            </thead>
                                            <?php if (isset($featureDetails) && !empty($featureDetails)) : ?>
                                                <tbody>
                                                    <?php $rowNumber = 1; ?>
                                                    <?php foreach ($featureDetails as $featureDetails_row) { ?>
                                                        <tr>
                                                            <th scope="row"><?= $rowNumber++; ?></th>
                                                            <td> <?= $featureDetails_row['featureTitle']; ?></td>
                                                            <td>
                                                                <?= DateTime::createFromFormat('Y-m-d H:i:s', $featureDetails_row['createdOn'])->format('Y-m-d'); ?>
                                                            </td>
                                                            <td>
                                                                <div class="tools">
                                                                    <a href="edit-service-feature/<?= $featureDetails_row['featureID']; ?>">
                                                                        <i class="mdi mdi-pencil"></i>
                                                                    </a>
                                                                    <a class="deleteButton" href="delete-service-feature/<?= $featureDetails_row['featureID']; ?>">
                                                                        <i class="mdi mdi-trash-can"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            <?php endif; ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                    </div>


                </div>
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
</body>

<script>
    $(document).ready(function() {
        $(".deleteButton").on("click", function(event) {
            event.preventDefault();
            var deleteURL = $(this).attr("href");
            if (confirm("Are you sure you want to delete this user type?")) {
                window.location.href = deleteURL;
                console.log("User clicked OK");
            } else {
                console.log("User clicked Cancel");
            }
        });
    });
</script>

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>

</html>