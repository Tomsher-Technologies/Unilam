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
    if (isset($post['bannerID'])) {
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
                                    <li class="breadcrumb-item"><a href="../banners-lists">Banners</a></li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['bannerID']) ? base_url("admin/edit-banner/{$post['bannerID']}") : base_url('admin/create-banner'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Banner Heading </label>
                                            <input type="text" name="bannerHeading" class="form-control" id="bannerHeading" placeholder="Enter banner heading" value="<?= isset($post['bannerHeading']) ? $post['bannerHeading'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['bannerHeading'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['bannerHeading']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Banner Title </label>
                                            <input type="text" name="bannerTitle" class="form-control" id="bannerTitle" placeholder="Enter product type name" value="<?= isset($post['bannerTitle']) ? $post['bannerTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['bannerTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['bannerTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Banner URL </label>
                                            <input type="text" name="bannerUrl" class="form-control" id="bannerUrl" placeholder="Enter banner url" value="<?= isset($post['bannerUrl']) ? $post['bannerUrl'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['bannerUrl'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['bannerUrl']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Banner Description</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="ckeditor-classic"></div>
                                                <input type="hidden" value="<?= isset($post['bannerDescription']) ? $post['bannerDescription'] : '' ?>" id="bannerDescription" name="bannerDescription">
                                                <?php if (isset($validation) && isset($validation['bannerDescription'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['bannerDescription']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Contact Banner File</h4>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($post) && isset($post['bannerFileUrl'])) : ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="<?= base_url() . '/' .  $post['bannerFileUrl'] ?>" data-holder-rendered="true">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-auto">
                                                    <input type="file" name="bannerFile" class=" form-control" id="bannerFile" onchange="previewImage(event)">
                                                    <input type="hidden" value="<?= isset($post['bannerFileUrl']) ? $post['bannerFileUrl'] : '' ?>" name="bannerFileUrl" class=" form-control">
                                                </div>
                                                <?php if (isset($validation) && isset($validation['bannerFile'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['bannerFile']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
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


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<script src="../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<script src="../../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = '<?= $post['bannerDescription'] ?? ''; ?>';
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("bannerDescription", editorContent);
                    $('#bannerDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });


    function previewImage(event) {
        const bannerPreview = document.getElementById('bannerPreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            bannerPreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };
</script>
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