<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="../public/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <link href="../../public/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
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
    if (isset($post['productID'])) {
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
                                    <li class="breadcrumb-item"><a href="<?= isset($post['productID']) ? "../products" : "../admin/products"; ?>">Product Types</a></li>
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
                            <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['productID']) ? base_url("admin/edit-product/{$post['productID']}") : base_url('admin/create-product'); ?>" enctype="multipart/form-data" novalidate>
                                <div class="mb-3">
                                    <label class="form-label">Product Title </label>
                                    <input type="text" name="productTitle" class="form-control" id="productTitle" placeholder="Enter product title" value="<?= isset($post['productTitle']) ? $post['productTitle'] : ''; ?>" required>
                                    <?php if (isset($validation) && isset($validation['productTitle'])) : ?>
                                        <small class="text-danger">
                                            <?= esc($validation['productTitle']) ?>
                                        </small>
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Product Descrption </h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="ckeditor-classic"></div>
                                                <input type="hidden" value="<?= isset($post['productDescription']) ? $post['productDescription'] : '' ?>" id="productDescription" name="productDescription">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="productTypeSelected" class="form-label font-size-13 text-muted">Product Types</label>
                                            <select class="form-control" data-trigger name="productTypeSelected" id="productTypeSelected" placeholder="Select product type" multiple>
                                                <?php foreach ($productTypes as $productType_row) : ?>
                                                    <option value="<?= $productType_row['productTypeID']; ?>" <?= isset($post['productTypeIDs']) ? (in_array($productType_row['productTypeID'], explode(',', $post['productTypeIDs'])) ? 'selected' : '') : ''; ?>>
                                                        <?= $productType_row['typeTitle']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="productTypeIDs" name="productTypeIDs" value="<?= isset($post['productTypeIDs']) ? $post['productTypeIDs'] : '' ?>">
                                            <?php if (isset($validation) && isset($validation['productTypeIDs'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['productTypeIDs']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label font-size-13 text-muted">Product Types</label>
                                            <select class="form-control" name="materialID" placeholder="Select product material">
                                                <option selected>Select product material</option>
                                                <?php foreach ($productMaterials as $productMaterial_row) : ?>
                                                    <option value="<?= $productMaterial_row['materialID']; ?>" <?= (isset($post['materialID']) && ($productMaterial_row['materialID'] == $post['materialID'])) ? 'selected' : ''; ?>>
                                                        <?= $productMaterial_row['materialName']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (isset($validation) && isset($validation['materialID'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['materialID']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="1" <?= (!isset($post['status']) || $post['status'] == '1') ? 'selected' : '' ?>>Enabled</option>
                                        <option value="2" <?= (isset($post['status']) && $post['status'] == '2') ? 'selected' : '' ?>>Disabled</option>
                                    </select>
                                    <?php if (isset($validation) && isset($validation['status'])) : ?>
                                        <small class="text-danger">
                                            <?= esc($validation['status']) ?>
                                        </small>
                                    <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Product Image</h4>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($post) && isset($post['productImageUrl'])) : ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <img class="rounded me-2" id="previewProductImage" alt="200x200" width="200" src="http://localhost/unilam/<?= $post['productImageUrl'] ?>" data-holder-rendered="true">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-auto">
                                                    <input type="file" name="productImage" class=" form-control" id="productImageInput" onchange="previewProductImage(event)">
                                                    <input type="hidden" value="<?= isset($post['productImageUrl']) ? $post['productImageUrl'] : '' ?>" name="productImageUrl" class=" form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Product Menu Image</h4>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($post) && isset($post['menuProductImageUrl'])) : ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <img class="rounded me-2" id="previewmenuProductImage" alt="200x200" width="200" src="http://localhost/unilam/<?= $post['menuProductImageUrl'] ?>" data-holder-rendered="true">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-auto">
                                                    <input type="file" name="menuProductImage" class=" form-control" id="productImageInput" onchange="previewmenuProductImage(event)">
                                                    <input type="hidden" value="<?= isset($post['menuProductImageUrl']) ? $post['menuProductImageUrl'] : '' ?>" name="menuProductImageUrl" class=" form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Banner Image</h4>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($post) && isset($post['productBannerImageUrl'])) : ?>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="http://localhost/unilam/<?= $post['productBannerImageUrl'] ?>" data-holder-rendered="true">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-auto">
                                                    <input type="file" name="bannerImage" class=" form-control" id="bannerImageInput" onchange="previewImage(event)">
                                                    <input type="hidden" value="<?= isset($post['productBannerImageUrl']) ? $post['productBannerImageUrl'] : '' ?>" name="productBannerImageUrl" class=" form-control">
                                                </div>

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
                                                    <div class="row">
                                                        <?php foreach ($gallaryImages as $gallaryImage_row) : ?>
                                                            <div class="col-md-3  mb-3">
                                                                <img class="rounded me-2" alt="200x200" width="200" src="http://localhost/unilam/<?= $gallaryImage_row->gallaryImageUrl ?>" data-holder-rendered="true">
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
                                    </div><!-- end col -->
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


<!-- App js -->
<script src="../public/assets/js/app.js"></script>

<!--  -->

<!-- dashboard init -->
<script src="../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<script src="../../public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<!-- init js -->
<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = '<?= $post['productDescription'] ?? ''; ?>';
                console.log('postDescription', postDescription)
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("editorContent", editorContent);
                    $('#productDescription').val(editorContent);
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
    }

    function previewProductImage(event) {
        const previewProductImage = document.getElementById('previewProductImage');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            previewProductImage.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    
    function previewmenuProductImage(event) {
        const previewmenuProductImage = document.getElementById('previewmenuProductImage');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            previewmenuProductImage.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#productTypeSelected').on('change', function() {
            var selectedValues = $(this).val();
            console.log('Selected values:', selectedValues);

            $('#productTypeIDs').val(selectedValues);
        });

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


<script src="../public/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="../../public/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="../public/assets/js/pages/form-advanced.init.js"></script>
<script src="../../public/assets/js/pages/form-advanced.init.js"></script>
<!--  -->
</body>

</html>