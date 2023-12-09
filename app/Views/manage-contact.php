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
        if (isset($post['contactID'])) {
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
                                        <li class="breadcrumb-item"><a href="<?= isset($post['contactID']) ? '../contacts' : '../admin/contacts'; ?>">Abouts</a></li>
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
                                <form class="needs-validation p-5 custom-form mt-4 pt-2" method="POST" action="<?= isset($post['contactID']) ? base_url("admin/edit-contact/{$post['contactID']}") : base_url('admin/create-contact'); ?>" enctype="multipart/form-data">
                                    <div class="row">
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
                                                    <h4 class="card-title">Contact Banner Image</h4>
                                                </div>
                                                <div class="card-body">
                                                    <?php if (isset($post) && isset($post['bannerImageUrl'])) : ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <img class="rounded me-2" id="bannerPreview" alt="200x200" width="200" src="<?= base_url($post['bannerImageUrl']) ?>" data-holder-rendered="true">
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
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Contact Title</label>
                                            <input type="text" name="contactTitle" class="form-control" id="contactTitle" placeholder="Enter contact title" value="<?= isset($post['contactTitle']) ? $post['contactTitle'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['contactTitle'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['contactTitle']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Contact Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div id="ckeditor-classic"></div>
                                                    <input type="hidden" value="<?= isset($post['contactDescription']) ? $post['contactDescription'] : '' ?>" id="contactDescription" name="contactDescription">
                                                    <?php if (isset($validation) && isset($validation['contactDescription'])) : ?>
                                                        <small class="text-danger">
                                                            <?= esc($validation['contactDescription']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->

                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?= isset($post['address']) ? $post['address'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['address'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['address']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Phone</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <button class="btn btn-light ms-0" type="button">+971</button>
                                                <input type="number" class="form-control" name='phone' value="<?= isset($post['phone']) ? $post['phone'] : ''; ?>" placeholder="Enter phone" aria-label="phone" aria-describedby="phone-addon" required>
                                            </div>
                                            <?php if (isset($validation) && isset($validation['phone'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['phone']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Zipcode</label>
                                            <input type="number" name="zipcode" class="form-control" id="zipcode" placeholder="Enter zipcode" value="<?= isset($post['zipcode']) ? $post['zipcode'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['zipcode'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['zipcode']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter world wide office" value="<?= isset($post['email']) ? $post['email'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['email'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['email']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <!-- 1 -->

                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="<?= isset($post['address']) ? $post['address'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['address'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['address']) ?>
                                                </small>
                                            <?php endif; ?>
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
                                            <label class="form-label">Instagram Link</label>
                                            <input type="text" name="instagramLink" class="form-control" id="instagramLink" placeholder="Enter instagram link" value="<?= isset($post['instagramLink']) ? $post['instagramLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['instagramLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['instagramLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">YouTube Link</label>
                                            <input type="text" name="youTubeLink" class="form-control" id="youTubeLink" placeholder="Enter youTube link" value="<?= isset($post['youTubeLink']) ? $post['youTubeLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['youTubeLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['youTubeLink']) ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label class="form-label">WhatsApp Link</label>
                                            <input type="text" name="whatsAppLink" class="form-control" id="whatsAppLink" placeholder="Enter whatsApp link" value="<?= isset($post['whatsAppLink']) ? $post['whatsAppLink'] : ''; ?>">
                                            <?php if (isset($validation) && isset($validation['whatsAppLink'])) : ?>
                                                <small class="text-danger">
                                                    <?= esc($validation['whatsAppLink']) ?>
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
        <?= $this->include('partials/footer') ?>
    </div>
</body>
</div>

<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#ckeditor-classic')).then(function(editor) {
                editor.ui.view.editable.element.style.height = '200px';

                var postDescription = $("#contactDescription").val();
                if (postDescription) {
                    editor.setData(postDescription);
                }

                editor.model.document.on('change:data', () => {
                    var editorContent = editor.getData();
                    console.log("contactDescription", editorContent);
                    $('#contactDescription').val(editorContent);
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
</script>


<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>

<script src="<?= base_url('public/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') ?>"></script>
<script src="<?= base_url('public/assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/pages/form-advanced.init.js') ?>"></script>

</html>