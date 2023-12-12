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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18"><?= $title ? lang($title . '') : '' ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="../features-lists">features</a></li>
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
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['canonicalName']) ? base_url("admin/edit-feature/{$post['canonicalName']}") : base_url('admin/create-feature'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Feature Title </label>
                                                <input type="text" name="featureTitle" class="form-control" id="featureTitle" placeholder="Enter feature heading" value="<?= isset($post['featureTitle']) ? $post['featureTitle'] : ''; ?>">
                                                <?php if (isset($validation) && isset($validation['featureTitle'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['featureTitle']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Feature Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic"></div>
                                                    <input type="hidden" value="<?= isset($post['featureDescription']) ? $post['featureDescription'] : '' ?>" id="featureDescription" name="featureDescription">
                                                    <?php if (isset($validation) && isset($validation['featureDescription'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['featureDescription']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Contact feature Icon</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['featureIconUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="featureIconPreview" alt="200x200" width="200" src="<?= base_url() . '/' . $post['featureIconUrl'] ?>" data-holder-rendered="true">
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-auto">
                                                        <input type="file" name="featureIcon" class=" form-control" id="featureIcon" onchange="previewImage(event)">
                                                        <input type="hidden" value="<?= isset($post['featureIconUrl']) ? $post['featureIconUrl'] : '' ?>" name="featureIconUrl" class=" form-control">
                                                    </div>
                                                    <?php if (isset($validation) && isset($validation['featureIcon'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['featureIcon']) ?>
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

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

    </div>
</body>



<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = '<?= $post['featureDescription'] ?? ''; ?>';
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("featureDescription", editorContent);
                    $('#featureDescription').val(editorContent);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });


    function previewImage(event) {
        const featureIconPreview = document.getElementById('featureIconPreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            featureIconPreview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    };
</script>

<?= $this->include('partials/right-sidebar') ?>
<?= $this->include('partials/vendor-scripts') ?>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>

</html>