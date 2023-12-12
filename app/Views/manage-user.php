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
                                        <li class="breadcrumb-item"><a href="../admin/users">User</a></li>
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
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['canonicalName']) ? base_url("admin/edit-user/{$post['canonicalName']}") : base_url('admin/create-user'); ?>" novalidate>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name </label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?= isset($post['name']) ? $post['name'] : ''; ?>" required>
                                                <?php
                                                if (isset($validation) && isset($validation['name'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['name']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password </label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name='password' value="<?= isset($post['password']) ? $post['password'] : ''; ?>" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" required>
                                                    <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                <?php if (isset($validation) && isset($validation['password'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['password']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (isset($userTypes) && !empty($userTypes)) : ?>
                                                <div class="mb-3">
                                                    <label class="form-label">User Type </label>

                                                    <select class="form-select" name="userTypeID" aria-label="Default select example">
                                                        <option selected>Select user type</option>
                                                        <?php foreach ($userTypes as $userType_row) : ?>
                                                            <option value="<?= $userType_row['userTypeID']; ?>" <?= ($userType_row['userTypeID'] == $userType_row['userTypeID']) ? 'selected' : ''; ?>>
                                                                <?= $userType_row['userType']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?php if (isset($validation) && isset($validation['userTypeID'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['userTypeID']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email </label>
                                                <input type="text" type="email" name="email" class="form-control" id="email" placeholder="Enter user email" value="<?= isset($post['email']) ? $post['email'] : ''; ?>" required>
                                                <?php if (isset($validation) && isset($validation['email'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['email']) ?>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone </label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <button class="btn btn-light ms-0" type="button" id="password-addon">+971</button>
                                                    <input type="number" class="form-control" name='phone' value="<?= isset($post['phone']) ? $post['phone'] : ''; ?>" placeholder="Enter phone" aria-label="phone" aria-describedby="phone-addon" required>
                                                </div>
                                                <?php if (isset($validation) && isset($validation['phone'])) : ?>
                                                    <small class="text-danger">
                                                        <?= esc($validation['phone']) ?>
                                                    </small>
                                                <?php endif; ?>
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
    </div>
</body>

<script>
    jQuery(document).ready(function() {
        $("#addEditUserTypeModal").click(function() {
            alert("This is an alert message!");
        });
    });
</script>

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<script src="<?= base_url('public/assets/js/app.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>

</html>