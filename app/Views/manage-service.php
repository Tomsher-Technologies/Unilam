<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="<?= base_url('public/assets/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('public/assets/css/preloader.min.css') ?>" type="text/css" />
    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <?= $this->include('partials/body') ?>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php
        if (isset($post['canonicalName'])) {
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
                                        <li class="breadcrumb-item"><a href="<?= isset($post['canonicalName']) ? '../service-lists' : '../admin/service-lists'; ?>">Services</a></li>
                                        <?php if (isset($li_2)) :  ?>
                                            <li class="breadcrumb-item active"><?= $li_2 ?></li>
                                        <?php endif ?>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['canonicalName']) ? base_url("admin/edit-service/{$post['canonicalName']}") : base_url('admin/create-service'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Service Title</label>
                                            <input type="text" name="serviceTitle" class="form-control" id="serviceTitle" placeholder="Enter service image title" value="<?= isset($post['serviceTitle']) ? $post['serviceTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['serviceTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['serviceTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Banner Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['serviceBannerImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="<?= base_url() . '/' . $post['serviceBannerImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="serviceBannerImage" class=" form-control" id="serviceBannerImage" onchange="previewImage(event)">
                                                        <input type="hidden" value="<?= isset($post['serviceBannerImageUrl']) ? $post['serviceBannerImageUrl'] : '' ?>" name="serviceBannerImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['serviceBannerImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['serviceBannerImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-12 ">
                                            <label class="form-label">Service Banner Image Title</label>
                                            <input type="text" name="serviceBannerImageTitle" class="form-control" id="serviceBannerImageTitle" placeholder="Enter service image title" value="<?= isset($post['serviceBannerImageTitle']) ? $post['serviceBannerImageTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['serviceBannerImageTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['serviceBannerImageTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-12 ">
                                            <label class="form-label">Service Head Line</label>
                                            <input type="text" name="serviceHeadLine" class="form-control" id="serviceHeadLine" placeholder="Enter service head line" value="<?= isset($post['serviceHeadLine']) ? $post['serviceHeadLine'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['serviceHeadLine'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['serviceHeadLine']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Main Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic"></div>
                                                    <input type="hidden" value="<?= isset($post['serviceMainDescription']) ? $post['serviceMainDescription'] : '' ?>" id="serviceMainDescription" name="serviceMainDescription">
                                                    <?php if (isset($validation) && isset($validation['serviceMainDescription'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['serviceMainDescription']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="mb-3 col-md-12 ">
                                            <label class="form-label">Service Head Line 2</label>
                                            <input type="text" name="serviceHeadLine2" class="form-control" id="serviceHeadLine2" placeholder="Enter service head line 2" value="<?= isset($post['serviceHeadLine2']) ? $post['serviceHeadLine2'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['serviceHeadLine2'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['serviceHeadLine2']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Main Description 2 </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic-description2"></div>
                                                    <input type="hidden" value="<?= isset($post['serviceMainDescription2']) ? $post['serviceMainDescription2'] : '' ?>" id="serviceMainDescription2" name="serviceMainDescription2">
                                                    <?php if (isset($validation) && isset($validation['serviceMainDescription2'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['serviceMainDescription2']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Head Line Image 2</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['serviceHeadLineImageUrl2'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview2" alt="200x200" width="200" src="<?= base_url() . '/' . $post['serviceHeadLineImageUrl2'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="serviceHeadLineImage2" class=" form-control" id="serviceHeadLineImage2" onchange="previewImage2(event)">
                                                        <input type="hidden" value="<?= isset($post['serviceHeadLineImageUrl2']) ? $post['serviceHeadLineImageUrl2'] : '' ?>" name="serviceHeadLineImageUrl2" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['serviceHeadLineImage2'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['serviceHeadLineImage2']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="mb-3 col-md-12 ">
                                            <label class="form-label">Service Head Line 3</label>
                                            <input type="text" name="serviceHeadLine3" class="form-control" id="serviceHeadLine3" placeholder="Enter service head line 3" value="<?= isset($post['serviceHeadLine3']) ? $post['serviceHeadLine3'] : ''; ?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Main Description 3 </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic-description3"></div>
                                                    <input type="hidden" value="<?= isset($post['serviceMainDescription3']) ? $post['serviceMainDescription3'] : '' ?>" id="serviceMainDescription3" name="serviceMainDescription3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Service Head Line Image 3</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['serviceHeadLineImageUrl3'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview3" alt="200x200" width="200" src="<?= base_url() . '/' . $post['serviceHeadLineImageUrl3'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="serviceHeadLineImage3" class=" form-control" id="serviceHeadLineImage3" onchange="previewImage3(event)">
                                                        <input type="hidden" value="<?= isset($post['serviceHeadLineImageUrl3']) ? $post['serviceHeadLineImageUrl3'] : '' ?>" name="serviceHeadLineImageUrl3" class=" form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Feature Bannner Image URL</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['featureBannerImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="featureBannerImagePreview" alt="200x200" width="200" src="<?= base_url() . '/' . $post['featureBannerImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="featureBannerImage" class=" form-control" id="featureBannerImage" onchange="previewFeatureBannerImagePreview(event)">
                                                        <input type="hidden" value="<?= isset($post['featureBannerImageUrl']) ? $post['featureBannerImageUrl'] : '' ?>" name="featureBannerImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['featureBannerImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['featureBannerImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Show Order</label>
                                            <input type="number" name="showOrder" class="form-control" placeholder="Enter show order" value="<?= isset($post['showOrder']) ? $post['showOrder'] : ''; ?>">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>

</body>
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#serviceMainDescription").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("serviceMainDescription", editorContent);
                    $('#serviceMainDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic-description2')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#serviceMainDescription2").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("serviceMainDescription2", editorContent);
                    $('#serviceMainDescription2').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic-description3')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#serviceMainDescription3").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("serviceMainDescription3", editorContent);
                    $('#serviceMainDescription3').val(editorContent);
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

    function previewImage2(event) {
        const bannerPreview2 = document.getElementById('bannerPreview2');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            bannerPreview2.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    function previewImage3(event) {
        const bannerPreview3 = document.getElementById('bannerPreview3');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            bannerPreview3.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    function previewFeatureBannerImagePreview(event) {
        const featureBannerImagePreview = document.getElementById('featureBannerImagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            featureBannerImagePreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };
</script>


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>


</html>