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
<div id="layout-wrapper">
    <?php
    if (isset($post['contentID'])) {
        echo  $this->include('partials/menudoubleback');
    } else {
        echo     $this->include('partials/menu');
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
                                    <li class="breadcrumb-item"><a href="<?= isset($post['contentID']) ? '../contents-lists' : '../admin/contents-lists'; ?>">Contents</a></li>
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
                        <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['contentID']) ? base_url("admin/edit-contents/{$post['contentID']}") : base_url('admin/create-contents'); ?>" enctype="multipart/form-data">
                            <div class="card">
                                <div class="row p-3">
                                    <input type="hidden" name="contentType" class="form-control" id="contentType" placeholder="Enter content sub title" value="<?= isset($post['contentType']) ? $post['contentType'] : ''; ?>">
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Type</label>
                                        <input type="text" disabled name="contentType" class="form-control" id="contentType" value="<?= isset($post['contentType']) ? $post['contentType'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title 1</label>
                                        <input type="text" name="contentTitle1" class="form-control" id="contentTitle1" placeholder="Enter content title" value="<?= isset($post['contentTitle1']) ? $post['contentTitle1'] : ''; ?>">
                                        <?php if (isset($validation) && isset($validation['contentTitle1'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contentTitle1']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Sub Title 1</label>
                                        <input type="text" name="contentSubTitle1" class="form-control" id="contentSubTitle1" placeholder="Enter content sub title" value="<?= isset($post['contentSubTitle1']) ? $post['contentSubTitle1'] : ''; ?>">
                                        <?php if (isset($validation) && isset($validation['contentSubTitle1'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contentSubTitle1']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title Mode 1</label>
                                        <input type="text" name="contentTitleMode1" class="form-control" id="contentTitleMode1" placeholder="Enter content mode" value="<?= isset($post['contentTitleMode1']) ? $post['contentTitleMode1'] : ''; ?>">
                                        <?php if (isset($validation) && isset($validation['contentTitleMode1'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contentTitleMode1']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title 2</label>
                                        <input type="text" name="contentTitle2" class="form-control" id="contentTitle2" placeholder="Enter content title" value="<?= isset($post['contentTitle2']) ? $post['contentTitle2'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Sub Title 2</label>
                                        <input type="text" name="contentSubTitle2" class="form-control" id="contentSubTitle2" placeholder="Enter content sub title" value="<?= isset($post['contentSubTitle2']) ? $post['contentSubTitle2'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title Mode 2</label>
                                        <input type="text" name="contentTitleMode2" class="form-control" id="contentTitleMode2" placeholder="Enter content mode" value="<?= isset($post['contentTitleMode2']) ? $post['contentTitleMode2'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title 3</label>
                                        <input type="text" name="contentTitle3" class="form-control" id="contentTitle3" placeholder="Enter content title" value="<?= isset($post['contentTitle3']) ? $post['contentTitle3'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Sub Title 3</label>
                                        <input type="text" name="contentSubTitle3" class="form-control" id="contentSubTitle3" placeholder="Enter content sub title" value="<?= isset($post['contentSubTitle3']) ? $post['contentSubTitle3'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title Mode 3</label>
                                        <input type="text" name="contentTitleMode3" class="form-control" id="contentTitleMode3" placeholder="Enter content mode" value="<?= isset($post['contentTitleMode3']) ? $post['contentTitleMode3'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title 4</label>
                                        <input type="text" name="contentTitle4" class="form-control" id="contentTitle4" placeholder="Enter content title" value="<?= isset($post['contentTitle4']) ? $post['contentTitle4'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content SubT itle 4</label>
                                        <input type="text" name="contentSubTitle4" class="form-control" id="contentSubTitle4" placeholder="Enter content sub title" value="<?= isset($post['contentSubTitle4']) ? $post['contentSubTitle4'] : ''; ?>">
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label class="form-label">Content Title Mode 4</label>
                                        <input type="text" name="contentTitleMode4" class="form-control" id="contentTitleMode4" placeholder="Enter content mode" value="<?= isset($post['contentTitleMode4']) ? $post['contentTitleMode4'] : ''; ?>">
                                    </div>
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


</div>


<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';
                var postDescription = $("#aboutDescription").val();
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
                var postDescription = $("#aboutDescription2").val();
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

<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>
</body>

</html>