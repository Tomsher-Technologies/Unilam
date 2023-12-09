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

<body>
    <?= $this->include('partials/body') ?>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php
        if (isset($post['workID'])) {
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
                                        <li class="breadcrumb-item"><a href="<?= isset($post['workID']) ? '../works-lists' : '../admin/works-lists'; ?>">Works</a></li>
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
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['workID']) ? base_url("admin/edit-work/{$post['workID']}") : base_url('admin/create-work'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Work Title</label>
                                            <input type="text" name="workTitle" class="form-control" id="workTitle" placeholder="Enter work title" value="<?= isset($post['workTitle']) ? $post['workTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['workTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['workTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Project Title</label>
                                            <input type="text" name="projectTitle" class="form-control" id="projectTitle" placeholder="Enter project title" value="<?= isset($post['projectTitle']) ? $post['projectTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['projectTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['projectTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Work Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['workImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="workImagePreview" alt="200x200" width="200" src="<?= base_url() . '/' .  $post['workImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="workImage" class=" form-control" id="workImage" onchange="previewIworkImage(event)">
                                                        <input type="hidden" value="<?= isset($post['workImageUrl']) ? $post['workImageUrl'] : '' ?>" name="workImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['workImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['workImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Project Location</label>
                                            <input type="text" name="projectLocation" class="form-control" id="projectLocation" placeholder="Enter location" value="<?= isset($post['projectLocation']) ? $post['projectLocation'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['projectLocation'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['projectLocation']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Project Type</label>
                                            <input type="text" name="projectType" class="form-control" id="projectType" placeholder="Enter work type" value="<?= isset($post['projectType']) ? $post['projectType'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['projectType'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['projectType']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Services</label>
                                            <input type="text" name="services" class="form-control" id="services" placeholder="Enter services" value="<?= isset($post['services']) ? $post['services'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['services'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['services']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Strategy</label>
                                            <input type="text" name="strategy" class="form-control" id="strategy" placeholder="Enter strategy" value="<?= isset($post['strategy']) ? $post['strategy'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['strategy'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['strategy']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Projec Date</label>
                                            <input type="date" name="projectDate" class="form-control" id="projectDate" placeholder="Enter projectDate" value="<?= isset($post['projectDate']) ? $post['projectDate'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['projectDate'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['projectDate']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Work Banner Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['workBnnerImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="<?= base_url() . '/' .  $post['workBnnerImageUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="workBnnerImage" class=" form-control" id="workBnnerImage" onchange="previewImage(event)">
                                                        <input type="hidden" value="<?= isset($post['workBnnerImageUrl']) ? $post['workBnnerImageUrl'] : '' ?>" name="workBnnerImageUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['workBnnerImage'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['workBnnerImage']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Gallary Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($gallaryImages) && isset($gallaryImages)) : ?>
                                                        <div class="row mb-3">
                                                            <!-- uplbase_url() .'/'. oads/workBnnerImage/__1701681524_ada7d3925c23188c3da5.jpg -->
                                                            <?php foreach ($gallaryImages as $gallaryImage_row) : ?>
                                                                <div class="col-md-3 mb-2">
                                                                    <img class="rounded mr-2" alt="200x200" width="200" src="<?= base_url() . '/' .  $gallaryImage_row->gallaryImageUrl ?>" data-holder-rendered="true">
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div>
                                                        <div class="col-auto">
                                                            <input type="file" class="form-control" name="galleryImages[]" id="galleryImages" multiple>
                                                            <ul id="selectedFiles"></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Work Descrption </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic"></div>
                                                    <input type="hidden" value="<?= isset($post['workDescription']) ? $post['workDescription'] : '' ?>" id="workDescription" name="workDescription">
                                                    <?php if (isset($validation) && isset($validation['workDescription'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['workDescription']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Work Long Descrption </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic-long"></div>
                                                    <input type="hidden" value="<?= isset($post['workLongDescription']) ? $post['workLongDescription'] : '' ?>" id="workLongDescription" name="workLongDescription">
                                                    <?php if (isset($validation) && isset($validation['workLongDescription'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['workLongDescription']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Twitter Link</label>
                                            <input type="text" name="twitterLink" class="form-control" id="twitterLink" placeholder="Enter twitter link" value="<?= isset($post['twitterLink']) ? $post['twitterLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['twitterLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['twitterLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">FaceBook Link</label>
                                            <input type="text" name="faceBookLink" class="form-control" id="faceBookLink" placeholder="Enter faceBook link" value="<?= isset($post['faceBookLink']) ? $post['faceBookLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['faceBookLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['faceBookLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">LinkedIn Link</label>
                                            <input type="text" name="linkedInLink" class="form-control" id="linkedInLink" placeholder="Enter twitter link" value="<?= isset($post['linkedInLink']) ? $post['linkedInLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['linkedInLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['linkedInLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Pinterest Link</label>
                                            <input type="text" name="pinterestLink" class="form-control" id="pinterestLink" placeholder="Enter pinterest link" value="<?= isset($post['pinterestLink']) ? $post['pinterestLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['pinterestLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['pinterestLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Show Order</label>
                                            <input type="number" name="showOrder" class="form-control" id="showOrder" placeholder="Enter twitter link" value="<?= isset($post['showOrder']) ? $post['showOrder'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['showOrder'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['showOrder']) ?>
                                                </small>
                                            <?php endif; ?>
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
</body>

<!-- END layout-wrapper -->
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#workDescription").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("workDescription", editorContent);
                    $('#workDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic-long')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#workLongDescription").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("workLongDescription", editorContent);
                    $('#workLongDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    function previewIworkImage(event) {
        const workImagePreview = document.getElementById('workImagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            workImagePreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

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
    }
</script>


<script>
    $(document).ready(function() {


        $('#galleryImages').on('change', function(e) {
            var files = e.target.files;
            let selectedImages = [];
            $('#selectedFiles').empty();

            for (var i = 0; i < files.length; i++) {
                selectedImages.push(files[i]);
                var li = '<li>' + files[i].name + '</li>';
                $('#selectedFiles').append(li);
            }
        });
    });
</script>

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>


</html>