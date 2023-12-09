<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="<?= base_url('public/assets/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?= base_url('public/assets/css/preloader.min.css') ?>" type="text/css" />

    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('public/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('public/assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->

<body>
    <div id="layout-wrapper">
        <?php
        if (isset($post['materialID'])) {
            echo $this->include('partials/menudoubleback');
        } else {
            echo $this->include('partials/menu');
        }
        ?>
        <?= $this->include('partials/topbardoubleback') ?>

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
                                        <li class="breadcrumb-item"><a href="<?= isset($post['materialID']) ? "../product-materials" : "../admin/product-materials"; ?>">Product Materials</a></li>
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
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['materialID']) ? base_url("admin/edit-product-material/{$post['materialID']}") : base_url('admin/create-product-material'); ?>" novalidate>
                                    <div class="mb-3">
                                        <label class="form-label">Product Material Name</label>
                                        <input type="text" name="materialName" class="form-control" id="materialName" placeholder="Enter product material name" value="<?= isset($post['materialName']) ? $post['materialName'] : ''; ?>" required>
                                        <?php if (isset($validation) && isset($validation['materialName'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['materialName']) ?>
                                            </small>
                                        <?php endif; ?>
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
    </div>
</body>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>

</html>