</div>
    <?php $this->load->view('lang_view'); ?>
    <script src="<?= base_url();?>html/dist/jquery/jquery-3.2.1.min.js" ></script>
    <script src="<?= base_url();?>html/dist/jquery/jquery-ui-1.12.1.min.js" ></script>
    <script src="<?= base_url();?>html/dist/bootstrap/js/popper.min.js" ></script>
    <script src="<?= base_url();?>html/dist/bootstrap/js/bootstrap.min.js" ></script>
    <script src="<?= base_url();?>html/dist/datetimepicker-master/js/jquery.datetimepicker.full.min.js" ></script>
    <script src="<?= base_url();?>html/dist/bootstrap-daterangepicker/js/moment.js" ></script>
    <script src="<?= base_url();?>html/dist/bootstrap-daterangepicker/js/daterangepicker.js" ></script>
    <script src="<?= base_url();?>html/dist/sweetalert2/sweetalert2.js" ></script>
    <script src="<?= base_url();?>html/dist/jquery-validator/jquery.form-validator.min.js" ></script>
    <script src="<?= base_url();?>html/dist/full-calendar/fullcalendar.min.js" ></script>
    <script src="<?= base_url();?>html/dist/full-calendar/en-us.js" ></script>
    <script src="<?= base_url();?>html/dist/full-calendar/vi.js" ></script>
    <script src="<?= base_url();?>html/dist/trumbowyg/trumbowyg.min.js" ></script>
    <script src="<?= base_url();?>html/dist/bootstrap-treeview/js/bootstrap-treeview.js"></script>
    <script src="<?= base_url();?>html/dist/knockoutjs/knockout-3.4.2.js" ></script>
    <script src="<?= base_url();?>html/dist/highcharts/js/highcharts.js" ></script>
    <script src="<?= base_url();?>html/dist/highcharts/js/data.js" ></script>
    <script src="<?= base_url();?>html/dist/highcharts/js/drilldown.js" ></script>
    <script src="<?= base_url();?>html/dist/md5/md5.js"></script>
    <script src="<?= base_url();?>html/js/events.js" ></script>
    <script src="<?= base_url();?>html/js/default.js" ></script>
    <script src="<?= base_url();?>html/js/plugin.js" ></script>
    <script src="<?= base_url();?>html/js/script.js" ></script>
    <script src="<?= base_url();?>html/js/modules.pagination.js" ></script>
    <script src="<?= base_url();?>html/js/modules.tree.js" ></script>
    <script src="<?= base_url();?>html/js/modules.menu.js" ></script>
    
    <script>
      treePlugin.bigTreeData =  <?php echo json_encode($bigTree)?>;
      treePlugin.currentFH200 = +<?php echo json_encode($currentFH200)?>;
    </script>

    <?php
    if(isset($script)){
        foreach ($script as $value) {
            echo '<script src="'.base_url().'html/js/'.$value.'.js"></script>';
        }
    }
    ?>
    </body>
</html>
