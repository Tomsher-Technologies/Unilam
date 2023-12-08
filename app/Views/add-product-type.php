<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                                    <li class="breadcrumb-item"><a href="<?= isset($post['productID']) ? "../products" : "../admin/products"; ?>">Product Type Details</a></li>
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
                            <!-- <form class="repeater needs-validation  custom-form mt-4 pt-2" method="POST" action="<?= isset($post['productID']) ? base_url("admin/manage-product-types/{$post['productID']}") : 'sss'; ?>" enctype="multipart/form-data"> -->

                            <div class="mb-3">
                                <label class="form-label">Product Title </label>
                                <input type="text" disabled class="form-control" placeholder="Enter product title" value="<?= isset($post['productTitle']) ? $post['productTitle'] : ''; ?>" required>

                            </div>
                            <form class="custom-form mt-4 pt-2" method="post" enctype="multipart/form-data" action="<?= isset($post['productID']) ? base_url("admin/manage-product-types/{$post['productID']}") : 'sss'; ?>">
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
                                                                                            <img class="rounded me-2" alt="200x200" width="200" src="<?= base_url() .'/'. $productTypesDetail_row->typeDetailImageUrl ?>" data-holder-rendered="true">
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endif; ?>

                                                                                <div class="col-auto">
                                                                                    <input type="file" name="typeDetailImage[]" class=" form-control" id="typeDetailImage" accept="image/*">
                                                                                    <input type="hidden" name="typeDetailImageUrl[]" value="<?= (isset($productTypesDetail_row->typeDetailID) && !empty($productTypesDetail_row->typeDetailID)) ? $productTypesDetail_row->typeDetailImageUrl : $productType_row['typeDetailImageUrl']; ?>"  class=" form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                                            <input type="hidden"name="typeDetailImageUrl[]" value="<?= isset($post['typeDetailImageUrl']) ? $post['typeDetailImageUrl'] : '' ?>" class=" form-control">
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

            // Clone the last inputField div and append it to the parent
            var clonedInput = parent.find('.inputField').first().clone();
            parent.append(clonedInput);
        });

        // Delete input field
        $(document).on('click', '.deleteInput', function() {
            $(this).parent('.inputField').remove();
        });
    });
</script>
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
<!-- <script>
    $('.repeater').repeater({
        initEmpty: true,
        show: function(e) {
            $(this).slideDown();
            var repeaterItems = $("div[data-repeater-item]");
            var repeatCount = repeaterItems.length;
            var cnt = parseInt(repeatCount) - 1;

            $('[name="additional[' + cnt + '][content]"]').attr("id", "addDesc_" + count);


            tinymce.init({
                selector: "#addDesc_" + count
            });
            count = parseInt(count) + 1;
        },
        hide: function(deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        },
        isFirstItemUndeletable: false
    })
</script> -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script> -->
<!-- <script>
    $(document).ready(function() {
        var $repeater = $('.repeater').repeater({
            repeaters: [{
                selector: '.inner-repeater',
                repeaters: [{
                    selector: '.deep-inner-repeater'
                }]
            }]
        });

        $(document).on('click', '.add-inner-repeater', function() {
            var $item = $(this).closest('[data-repeater-item]');
            var $list = $item.find('[data-repeater-list="inner-list"]');
            var $newItem = $list.find('[data-repeater-item]').first().clone(true);

            // Clear input values in the cloned item
            $newItem.find('input[type="text"]').val('');

            // Increment a counter for each input field to create unique names
            var counter = $list.find('[data-repeater-item]').length;
            $newItem.find('input[type="text"]').each(function(index) {
                var currentName = $(this).attr('name');
                $(this).attr('name', currentName.replace(/\[\d+\]/, '[' + counter + ']'));
            });

            $list.append($newItem);
        });

        $(document).on('input', '.typeDetailTitle', function() {
            var $parentItem = $(this).closest('[data-repeater-item]');
            var titleValue = $(this).val();
            $parentItem.find('.typeDetailTitleHidden').val(titleValue);
        });
        // $(document).on('click', '.add-inner-repeater', function() {
        //     var $item = $(this).closest('[data-repeater-item]');
        //     var $list = $item.find('[data-repeater-list="inner-list"]');

        //     var $newItem = $list.find('[data-repeater-item]').first().clone(true, true);

        //     $newItem.find('input[type="text"]').val(''); // Clear input fields

        //     $list.append($newItem);
        // });

        // $(document).on('click', '[data-repeater-create-inner]', function() {
        //     var innerRepeater = $(this).closest('[data-repeater-item]').find('[data-repeater-list="inner-list"]');
        //     var newInnerRepeaterRow = innerRepeater.find('[data-repeater-item]').first().clone();
        //     innerRepeater.append(newInnerRepeaterRow);
        // });

        $(document).on('click', '[data-repeater-delete]', function() {
            $(this).closest('[data-repeater-item]').remove();
        });

        // repeater.setList([{
        //         'text-input': 'Clothing',
        //         'inner-list': [{
        //                 'inner-text-input': 'Shirts',
        //                 'deep-inner-list': [{
        //                         'inner-text-input': 'Red Shirts'
        //                     },
        //                     {
        //                         'inner-text-input': 'Green Shirts'
        //                     }
        //                 ]
        //             },
        //             {
        //                 'inner-text-input': 'Trousers',
        //                 'deep-inner-list': [{
        //                         'inner-text-input': 'Long Trousers'
        //                     },
        //                     {
        //                         'inner-text-input': 'Short Trousers'
        //                     }
        //                 ]
        //             }
        //         ]
        //     },
        //     {
        //         'text-input': 'Accessories',
        //         'inner-list': [{
        //             'inner-text-input': 'Hats',
        //             'deep-inner-list': [{
        //                     'inner-text-input': 'Cowboy Hats'
        //                 },
        //                 {
        //                     'inner-text-input': 'Animal Fur Hats'
        //                 }
        //             ]
        //         }]
        //     },
        // ]);

    });
</script> -->


<script src="../public/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="../../public/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="../public/assets/js/pages/form-advanced.init.js"></script>
<script src="../../public/assets/js/pages/form-advanced.init.js"></script>
<script src="../../public/assets/js/pages/jquery.repeater.min.js"></script>
<script src="../public/assets/js/pages/jquery.repeater.min.js"></script>
<!--  -->
</body>

</html>