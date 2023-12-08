all

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
                        <div class="card p-3">
                            <form class="repeater needs-validation  custom-form mt-4 pt-2" method="POST" action="<?= isset($post['productID']) ? base_url("admin/manage-product-types/{$post['productID']}") : 'sss'; ?>" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label class="form-label">Product Title </label>
                                    <input type="text" disabled class="form-control" placeholder="Enter product title" value="<?= isset($post['productTitle']) ? $post['productTitle'] : ''; ?>" required>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Product Types</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" name="productID" value="<?= isset($post['productID']) ? $post['productID'] : ''; ?>" hidden name="text-input" />
                                                <?php foreach (explode(',', $post['productTypeIDs']) as $productTypeID) : ?>
                                                    <?php foreach ($productTypes as $productType_row) : ?>
                                                        <?php if ($productType_row['productTypeID'] == $productTypeID) : ?>
                                                            <div data-repeater-list="outer-list">

                                                                <div data-repeater-item>

                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <h4 class="card-title"> <?= $productType_row['typeTitle']; ?></h4>
                                                                            <input type="text" name="productTypeID[]    " value="<?= $productType_row['productTypeID']; ?>" hidden name="text-input" />
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <a data-repeater-delete type="button">Delete</a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="inner-repeater">
                                                                        <div data-repeater-list="inner-list">
                                                                            <div data-repeater-item style="background: #f1f1f1">
                                                                                <div class="mb-3 p-3">
                                                                                    <label class="form-label">Sub Type Title </label>
                                                                                    <input type="text" name="subTypeTitle[]" class="form-control" id="subTypeTitle" placeholder="Enter sub type title" value="<?= isset($post['subTypeTitle']) ? $post['subTypeTitle'] : ''; ?>" required>
                                                                                </div>
                                                                                <div class="deep-inner-repeater">
                                                                                    <div data-repeater-list="deep-inner-list">
                                                                                        <div data-repeater-item style="background: #f9f9f9">
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <div class="card">
                                                                                                        <div class="card-header">
                                                                                                            <h4 class="card-title">Sub Type Image</h4>
                                                                                                        </div>
                                                                                                        <div class="card-body">
                                                                                                            <?php if (isset($post) && isset($post['subTypeImageUrl'])) : ?>
                                                                                                                <div class="row mb-3">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <img class="rounded me-2" alt="200x200" width="200" src="<?= base_url() . '/' . $post['subTypeImageUrl'] ?>" data-holder-rendered="true">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            <?php endif; ?>

                                                                                                            <div class="col-auto">
                                                                                                                <input type="file" name="subTypeImage[]" class=" form-control" id="subTypeImage" accept="image/*">
                                                                                                                <input type="hidden" value="<?= isset($post['subTypeImageUrl']) ? $post['subTypeImageUrl'] : '' ?>" name="subTypeImageUrl" class=" form-control">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div> <!-- end col -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered" id="dynamic_field">
                                                                            <?php foreach (explode(',', $post['productTypeIDs']) as $productTypeID) : ?>
                                                                                <?php foreach ($productTypes as $productType_row) : ?>
                                                                                    <?php if ($productType_row['productTypeID'] == $productTypeID) : ?>
                                                                                        <tr data-productTypeID="<?= $productType_row['productTypeID']; ?>">
                                                                                            <td class="dynamic-inputs">
                                                                                                <div class="row">
                                                                                                    <h6 class="col-md-12 mb-2"><?= $productType_row['typeTitle']; ?></h6>
                                                                                                    <div class="col-md-6">
                                                                                                        <input class="mb-2" type="text" name="addmore[][name]" placeholder="Enter your Name" class="form-control name_list" required="">
                                                                                                    </div>
                                                                                                    <input type="hidden" name="addmore[][productTypeID]" value="<?= $productType_row['productTypeID']; ?>">
                                                                                                    <div class="col-md-6">
                                                                                                        <input class="mb-2" type="file" name="addmore[][subTypeImage]" class=" form-control" id="subTypeImage" accept="image/*">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>

                                                                                            <td><button type="button" name="add" class="btn btn-success add_more">Add More</button></td>
                                                                                        </tr>
                                                                                    <?php
                                                                                        break;
                                                                                    endif;
                                                                                    ?>
                                                                                <?php endforeach; ?>
                                                                            <?php endforeach; ?>
                                                                        </table>
                                                                        <!-- <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="mb-3" data-repeater-create type="button" value="Add Repeater" />
                                                        <?php
                                                            break;
                                                        endif;
                                                        ?>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Status</label>
                                    <select disabled class="form-select" name="status" aria-label="Default select example">
                                        <option value="1" <?= (!isset($post['status']) || $post['status'] == '1') ? 'selected' : '' ?>>Enabled</option>
                                        <option value="2" <?= (isset($post['status']) && $post['status'] == '2') ? 'selected' : '' ?>>Disabled</option>
                                    </select>
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
        var repeater = $('.repeater').repeater({
            repeaters: [{
                selector: '.inner-repeater',
                isFirstItemUndeletable: true,
                repeaters: [{
                    selector: '.deep-inner-repeater',
                    isFirstItemUndeletable: true
                }]
            }]
        });

        $(document).on('click', '[data-repeater-create]', function() {
            var parent = $(this).closest('[data-repeater-item]');
            var innerRepeaters = parent.find('.inner-repeater');
            var deepInnerRepeaterTemplate = parent.find('.deep-inner-repeater').eq(0).clone();


            if (innerRepeaters.length < 2) {
                var deepInnerRepeater = deepInnerRepeaterTemplate.clone();
                parent.find('.inner-repeater').append(deepInnerRepeater);
                deepInnerRepeater.find('.deep-inner-list').empty();


                if (innerRepeaters.length === 2) {
                    parent.find('[data-repeater-delete]').removeAttr('disabled');
                }
            }
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
</script>


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