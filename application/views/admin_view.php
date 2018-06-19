<?php $this->load->view('header_view'); ?>
<!-- Start Page Quan Tri He Thong -->
<div class="content-page-system-management">
    <div class="container-fluid">
        <div class="content admin-content">
            <?php $this->load->view('admin/admin_toolbar'); ?>
            <?php $this->load->view($page_view); ?>
        </div>
    </div>
</div>
<!-- End Page Quan Tri He Thong -->
<?php $this->load->view('footer_view'); ?>

