<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/preloader.min.css') ?>" type="text/css" />
    <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

</head>

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
                                    <li class="breadcrumb-item"><a href="<?= isset($post['canonicalName']) ? "../products" : "../admin/products"; ?>">Product Type Details</a></li>
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
                        <div class="card p-3">
                            <!-- <form class="repeater needs-validation  custom-form mt-4 pt-2" method="POST" action="<?= isset($post['canonicalName']) ? base_url("admin/manage-product-types/{$post['canonicalName']}") : 'sss'; ?>" enctype="multipart/form-data"> -->

                            <div class="mb-3">
                                <label class="form-label">Product Title </label>
                                <input type="text" disabled class="form-control" placeholder="Enter product title" value="<?= isset($post['productTitle']) ? $post['productTitle'] : ''; ?>" required>

                            </div>
                            <form class="custom-form mt-4 pt-2" method="post" enctype="multipart/form-data" action="<?= isset($post['canonicalName']) ? base_url("admin/manage-product-types/{$post['canonicalName']}") : 'sss'; ?>">
                                <?php foreach (explode(',', $post['productTypeIDs']) as $productTypeID) : ?>
                                    <?php foreach ($productTypes as $productType_row) : ?>
                                        <?php if ($productType_row['productTypeID'] == $productTypeID) :
                                            $included = false; ?>
                                            <div class="inputFields">
                                                <h4 class="card-title mb-1 mt-4"> <?= $productType_row['typeTitle']; ?></h4>
                                                <div class="inputField">
                                                    <?php if (isset($productTypesDetails) && !empty($productTypesDetails)) : ?>
                                                        <?php foreach ($productTypesDetails as $productTypesDetail_row) : ?>
                                                            <?php if ($productTypesDetail_row->productTypeID == $productTypeID) :
                                                                $included = true; ?>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card p-3">
                                                                            <label class="form-label" for="productTypeID[]">Product Type:</label>
                                                                            <input type="hidden" name="typeDetailID[]" value="<?= $productTypesDetail_row->typeDetailID; ?>" required readonly>
                                                                            <input type="hidden" name="productTypeID[]" value="<?= (isset($productTypesDetail_row->typeDetailID) && !empty($productTypesDetail_row->typeDetailID)) ? $productTypesDetail_row->productTypeID : $productType_row['productTypeID']; ?>" required readonly>
                                                                            <input type="text" name="typeDetailTitle[]" class="form-control" placeholder="Enter sub type title" value="<?= (isset($productTypesDetail_row->typeDetailID) && !empty($productTypesDetail_row->typeDetailID)) ? $productTypesDetail_row->typeDetailTitle : $productType_row['typeDetailTitle']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h4 class="card-title">Product Type Detail Image</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <?php if (isset($productTypesDetail_row->typeDetailID) && isset($productTypesDetail_row->typeDetailImageUrl) && !empty($productTypesDetail_row->typeDetailImageUrl)) : ?>
                                                                                    <div class="row mb-3">
                                                                                        <div class="col-md-6">
                                                                                            <img class="rounded me-2" alt="200x200" width="200" src="<?= base_url() . '/' . $productTypesDetail_row->typeDetailImageUrl ?>" data-holder-rendered="true">
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>

                                                                                <div class="col-auto">
                                                                                    <input type="file" name="typeDetailImage[]" class=" form-control" id="typeDetailImage" accept="image/*">
                                                                                    <input type="hidden" name="typeDetailImageUrl[]" value="<?= (isset($productTypesDetail_row->typeDetailID) && !empty($productTypesDetail_row->typeDetailID)) ? $productTypesDetail_row->typeDetailImageUrl : $productType_row['typeDetailImageUrl']; ?>" class=" form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php else :

                                                            ?>
                                                                <div class=""></div>
                                                            <?php
                                                                break;
                                                            endif ?>
                                                        <?php endforeach; ?>
                                                    <?php endif ?>

                                                    <?php if (!$included) : ?>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card p-3">
                                                                    <label class="form-label" for="productTypeID[]">Product Type:</label>
                                                                    <input type="hidden" name="typeDetailID[]" value="" required readonly>
                                                                    <input type="hidden" name="productTypeID[]" value="<?= $productType_row['productTypeID']; ?>" required readonly>
                                                                    <input type="text" name="typeDetailTitle[]" class="form-control" placeholder="Enter sub type title" value="<?= isset($post['subTypeTitle']) ? $post['subTypeTitle'] : ''; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Product Type Detail Image</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="col-auto">
                                                                            <input type="file" name="typeDetailImage[]" class=" form-control" id="typeDetailImage" accept="image/*" required>
                                                                            <input type="hidden" name="typeDetailImageUrl[]" value="<?= isset($post['typeDetailImageUrl']) ? $post['typeDetailImageUrl'] : '' ?>" class=" form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="d-flex justify-content-end"> <button type="button" class="deleteInput btn btn-danger">Delete</button></div>

                                                </div>
                                            </div>
                                            <button type="button" class="addInput btn btn-success mt-2">Add More</button>
                                        <?php
                                            break;
                                        endif;
                                        ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
<script>
    $(document).ready(function() {
        $(document).on('click', '.addInput', function() {
            // Get the parent element of the current add button
            var parent = $(this).prev('.inputFields');

            // Clone the last inputField div
            var clonedInput = parent.find('.inputField').first().clone();

            // Clear the values in the cloned inputs
            clonedInput.find('input[type="text"]').val('');
            clonedInput.find('input[type="file"]').val('');
            clonedInput.find('img').attr('src', '');

            // Set default value of '0' to the cloned typeDetailID input
            clonedInput.find('input[name="typeDetailID[]"]').val('0');

            // Change the name attribute of cloned inputs to avoid conflicts
            clonedInput.find('input[name="typeDetailID[]"]').attr('name', 'typeDetailID[]');
            clonedInput.find('input[name="productTypeID[]"]').attr('name', 'productTypeID[]');
            clonedInput.find('input[name="typeDetailTitle[]"]').attr('name', 'typeDetailTitle[]');
            clonedInput.find('input[name="typeDetailImage[]"]').attr('name', 'typeDetailImage[]');
            clonedInput.find('input[name="typeDetailImageUrl[]"]').attr('name', 'typeDetailImageUrl[]');

            // Append the cloned input to the parent
            parent.append(clonedInput);
        });

        // Delete input field
        $(document).on('click', '.deleteInput', function() {
            $(this).closest('.inputField').remove();
        });
    });
</script>
</div>


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- init js -->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.add_more', function() {
            var productTypeID = $(this).closest('tr').find('input[name="addmore[][productTypeID]"]').val();
            console.log(productTypeID);
            var html = '<div class="row"><div class="col-md-6"><input class="mb-2" type="text" name="addmore[][typeDetailTitle]" placeholder="Enter your Name" class="form-control name_list"></div> ';
            html += '<input type="hidden" name="addmore[][productTypeID]" value="' + productTypeID + '">';
            html += '<div class="col-md-6"><input class="mb-2" type="file" name="addmore[][typeDetailImage]" class=" form-control" id="typeDetailImage" accept="image/*"></div> </div> ';
            $(this).closest('tr').find('.dynamic-inputs').append(html);
        });
    });
</script>

<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>
</body>

</html>