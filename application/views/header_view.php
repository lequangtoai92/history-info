<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= isset($title) ? $title : 'Facilio'; ?></title>
      <link rel="icon" href="<?= base_url(); ?>html/images/icon.png" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/fonts/OpenSans/stylesheet.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/fonts/facilio-icon/stylesheet.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/fonts/font-awesome/css/font-awesome.min.css" />
      
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/datetimepicker-master/css/jquery.datetimepicker.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/bootstrap-daterangepicker/css/daterangepicker.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/bootstrap-treeview/css/bootstrap-treeview.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/jquery-validator/jquery-form-validator.css"  />
      
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/full-calendar/fullcalendar.min.css"  />
      <link rel="stylesheet" href="<?= base_url(); ?>html/dist/trumbowyg/trumbowyg.min.css"  />
      
      <link rel="stylesheet" href="<?= base_url(); ?>html/css/man-ultil.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/css/facilio.css" />
      <link rel="stylesheet" href="<?= base_url(); ?>html/css/style.css" />
      <?php
      if (isset($stylesheet))
        echo '<link rel="stylesheet" href="' . base_url() . 'html/css/' . $stylesheet . '.css" />'
        ?>

  </head>
  <body>
    <div class="faci-loading">
      <img src="<?= base_url(); ?>html/images/faci-loading-mini.gif">
    </div>
    <?= $this->load->view('main_menu'); ?>
    <!-- Popup search -->
    <div id="searchModal" class="search-modal">
      <div class="search-content">
        <div class="row-item-1">
          <span class="btn-close faci-close" id="btn_close"></span>
          <span class="title-input">Từ khóa</span>
          <input class="qb-input"/>
          <button class="qb-button">TÌM</button>
        </div>
      </div>
    </div>
    <!-- End popup search -->
    <div id="facilio_wrapper" class="content-body <?php echo $wrapperClass ?>">

