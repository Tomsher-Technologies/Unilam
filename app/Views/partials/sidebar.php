<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                    <a href="<?= base_url('admin/dashboard') ?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?= lang('Files.Dashboard') ?></span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span data-key="t-maps">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('admin/products') ?>" data-key="t-g-maps">Products</a></li>
                        <li><a href="<?= base_url('admin/product-types') ?>" data-key="t-v-maps">Product Types</a></li>
                        <li><a href="<?= base_url('admin/product-materials') ?>" data-key="t-v-maps">Product Material</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-maps">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('admin/users') ?>" data-key="t-g-maps">Users</a></li>
                        <li><a href="<?= base_url('admin/user-types') ?>" data-key="t-v-maps">User Types</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-dashboard">Works</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('admin/works-lists') ?>" data-key="t-g-maps">Works</a></li>
                        <li><a href="<?= base_url('admin/work-categories') ?>" data-key="t-v-maps">Work Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-dashboard">Services</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('admin/service-lists') ?>"> <span data-key="t-dashboard">Services</span></a></li>
                        <li><a href="<?= base_url('admin/service-feature-lists') ?>"> <span data-key="t-dashboard">Service Features</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('admin/abouts') ?>">
                        <i data-feather="info"></i>
                        <span data-key="t-dashboard">About Us</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/contacts') ?>">
                        <i data-feather="phone"></i>
                        <span data-key="t-dashboard">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/banners-lists') ?>">
                        <i data-feather="image"></i>
                        <span data-key="t-dashboard">Banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/features-lists') ?>">
                        <i data-feather="cpu"></i>
                        <span data-key="t-dashboard">Features</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-multi-level"><?= lang('Files.Multi_Level') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1-1"><?= lang('Files.Level_1_1') ?></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2"><?= lang('Files.Level_1_2') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1"><?= lang('Files.Level_2_1') ?></a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-2"><?= lang('Files.Level_2_2') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->