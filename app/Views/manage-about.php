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
    if (isset($post['aboutID'])) {
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
                                    <li class="breadcrumb-item"><a href="<?= isset($post['aboutID']) ? '../abouts' : '../admin/abouts'; ?>">Abouts</a></li>
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
                            <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['aboutID']) ? base_url("admin/edit-about/{$post['aboutID']}") : base_url('admin/create-about'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <?php if ((isset($post)) && ($post['aboutType'] != 'dashboardprojectside')) : ?>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Banner Title</label>
                                            <input type="text" name="bannerTitle" class="form-control" id="bannerTitle" placeholder="Enter banner title" value="<?= isset($post['bannerTitle']) ? $post['bannerTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['bannerTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['bannerTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"> <?= isset($post) && $post['aboutType'] == 'dashboardchoose' ? 'Background Image' : 'About Banner Image' ?></h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['bannerImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="<?= base_url() . '/' .  $post['bannerImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="bannerImage" class=" form-control" id="bannerImage" onchange="previewImage(event)">
                                                        <input type="hidden" value="<?= isset($post['bannerImageUrl']) ? $post['bannerImageUrl'] : '' ?>" name="bannerImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['bannerImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['bannerImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">About Author Name</label>
                                        <input type="text" name="aboutAuthorName" class="form-control" id="aboutAuthorName" placeholder="Enter author name" value="<?= isset($post['aboutAuthorName']) ? $post['aboutAuthorName'] : ''; ?>">
                                        <?php if (isset($validation) && isset($validation['aboutAuthorName'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['aboutAuthorName']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">About Title</label>
                                        <input type="text" name="aboutTitle" class="form-control" id="aboutTitle" placeholder="Enter about title" value="<?= isset($post['aboutTitle']) ? $post['aboutTitle'] : ''; ?>">
                                        <?php if (isset($validation) && isset($validation['aboutTitle'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['aboutTitle']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">About Description</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="ckeditor-classic"></div>
                                                <input type="hidden" value="<?= isset($post['aboutDescription']) ? $post['aboutDescription'] : '' ?>" id="aboutDescription" name="aboutDescription">
                                                <?php if (isset($validation) && isset($validation['aboutDescription'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['aboutDescription']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ((isset($post)) && ($post['aboutType'] == 'aboutpage') || ($post['aboutType'] == 'aboutdashboard')) : ?>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">About Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['aboutImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="aboutImagePreview" alt="200x200" width="200" src="<?= base_url() . '/' .  $post['aboutImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="aboutImage" class=" form-control" id="aboutImage" onchange="previewImage2(event)">
                                                        <input type="hidden" value="<?= isset($post['aboutImageUrl']) ? $post['aboutImageUrl'] : '' ?>" name="aboutImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['aboutImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['aboutImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!--  -->
                                    <?php if ((isset($post)) && ($post['aboutType'] == 'aboutpage')) : ?>
                                        <div class="mb-3 col-md-12 ">
                                            <label class="form-label">About Title 2</label>
                                            <input type="text" name="aboutTitle2" class="form-control" id="aboutTitle2" placeholder="Enter about title 2" value="<?= isset($post['aboutTitle2']) ? $post['aboutTitle2'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['aboutTitle2'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['aboutTitle2']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">About Description 2 </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic-description2"></div>
                                                    <input type="hidden" value="<?= isset($post['aboutDescription2']) ? $post['aboutDescription2'] : '' ?>" id="aboutDescription2" name="aboutDescription2">
                                                    <?php if (isset($validation) && isset($validation['aboutDescription2'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['aboutDescription2']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ((isset($post)) && ($post['aboutType'] == 'aboutpage')) : ?>
                                        <?php if ((isset($post)) && ($post['aboutType'] == 'aboutpage')) : ?>
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">About Image 2</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php if (isset($post) && isset($post['aboutImageUrl2'])) : ?>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <img class="rounded me-2" id="aboutImagePreview2" alt="200x200" width="200" src="<?= base_url() . '/' . $post['aboutImageUrl2'] ?>" data-holder-rendered="true">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-auto">
                                                            <input type="file" name="aboutImage2" class=" form-control" id="aboutImage2" onchange="previewImage3(event)">
                                                            <input type="hidden" value="<?= isset($post['aboutImageUrl2']) ? $post['aboutImageUrl2'] : '' ?>" name="aboutImageUrl2" class=" form-control">
                                                        </div>
                                                        <?php if (isset($validation) && isset($validation['aboutImage2'])) : ?>
                                                            <small class="text-danger">
                                                                <?= esc($validation['aboutImage2']) ?>
                                                            </small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Current Clients</label>
                                            <input type="number" name="currentClients" class="form-control" id="currentClients" placeholder="Enter current clients" value="<?= isset($post['currentClients']) ? $post['currentClients'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['currentClients'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['currentClients']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Years Of Experience</label>
                                            <input type="number" name="yearsOfExperience" class="form-control" id="yearsOfExperience" placeholder="Enter years of experience" value="<?= isset($post['yearsOfExperience']) ? $post['yearsOfExperience'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['yearsOfExperience'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['yearsOfExperience']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Award Winning</label>
                                            <input type="number" name="awardWinning" class="form-control" id="awardWinning" placeholder="Enter award winning" value="<?= isset($post['awardWinning']) ? $post['awardWinning'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['awardWinning'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['awardWinning']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">World Wide Office</label>
                                            <input type="number" name="officeWorldWide" class="form-control" id="officeWorldWide" placeholder="Enter world wide office" value="<?= isset($post['officeWorldWide']) ? $post['officeWorldWide'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['officeWorldWide'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['officeWorldWide']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
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
<!-- end main content-->

</div>

<script src="../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<script src="../../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<!-- END layout-wrapper -->
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
                var postDescription = "<?= isset($post['aboutDescription']) ? $post['aboutDescription'] : '' ?>";
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("aboutDescription", editorContent);
                    $('#aboutDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script>
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic-description2')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
                var postDescription = "<?= isset($post['aboutDescription2']) ? $post['aboutDescription2'] : '' ?>";
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("aboutDescription2", editorContent);
                    $('#aboutDescription2').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
</script>

<script>
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

    function previewImage2(event) {
        const aboutImagePreview = document.getElementById('aboutImagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            aboutImagePreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    function previewImage3(event) {
        const aboutImagePreview2 = document.getElementById('aboutImagePreview2');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            aboutImagePreview2.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };
</script>


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>


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