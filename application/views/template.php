<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.0
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>POST ARTICLE</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url(); ?>assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url(); ?>assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url(); ?>assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url(); ?>assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url(); ?>assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url(); ?>assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url(); ?>assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url(); ?>assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url(); ?>assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="<?= base_url(); ?>assets/css/examples.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
    <link href="<?= base_url(); ?>assets/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url(); ?>assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="<?= base_url(); ?>assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-title"> Dashboard</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="<?= base_url(); ?>assets/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
          </svg> Posts</a>
          <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('all_posts')?>"> All Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('add_new')?>"> Add New</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('preview')?>"> Preview</a></li>
          </ul>
        </li>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <use xlink:href="<?= base_url(); ?>assets/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
          </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use xlink:href="<?= base_url(); ?>assets/brand/coreui.svg#full"></use>
            </svg></a>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <?php $this->load->view($page_content); ?>
        </div>
      </div>
      <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2022 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url(); ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url(); ?>assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?= base_url(); ?>assets/js/colors.js"></script>
    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- Serverside Datatables -->
    <script>
      $(document).ready(function () {
        // Script Datatable
        var dt_publish;
        var dt_draft;
        var dt_thrash;

        dt_publish = $('#dt_publish').DataTable( {
          "targets": 'no-sort',
          "bSort": false,
          "processing": true,
          "serverSide": true,
          "order": [],
          "columnDefs": [
              {
                  "targets": [0,1,3],
                  "className": "text-center"
              }
          ],

          "ajax": 
              {
                  "url": "<?php echo site_url('all_posts/serverSidePublish')?>",
                  "type": "POST"
              },
          "language": 
              {                
                  "infoFiltered": ""
              }
        });

        dt_draft = $('#dt_draft').DataTable( {
          "targets": 'no-sort',
          "bSort": false,
          "processing": true,
          "serverSide": true,
          "order": [],
          "columnDefs": [
              {
                  "targets": [0,1,3],
                  "className": "text-center"
              }
          ],

          "ajax": 
              {
                  "url": "<?php echo site_url('all_posts/serverSideDraft')?>",
                  "type": "POST"
              },
          "language": 
              {                
                  "infoFiltered": ""
              }
        });

        dt_thrash = $('#dt_thrash').DataTable( {
          "targets": 'no-sort',
          "bSort": false,
          "processing": true,
          "serverSide": true,
          "order": [],
          "columnDefs": [
              {
                  "targets": [0,1,3],
                  "className": "text-center"
              }
          ],

          "ajax": 
              {
                  "url": "<?php echo site_url('all_posts/serverSideThrash')?>",
                  "type": "POST"
              },
          "language": 
              {                
                  "infoFiltered": ""
              }
        });
      });

      // Modal Publish
      function modEdPub(x){
        document.getElementById("idEditModal").value = x;
        var val1 = x;

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('all_posts/viewModal/publish')?>',
            data: { idEditModal: val1 },
            success: function(response) {
                $("#dataEditPublish").html(response);
                $("#idModalEditPublish").modal("show");
            }
        });
      }

      function modDelPub(x){
        document.getElementById("valDelPublish").value = x;
        $("#idModalDeletePublish").modal("show");
      }

      // Modal Draft
      function modEdDra(x){
        document.getElementById("idEditModal").value = x;
        var val1 = x;

        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('all_posts/viewModal/Draft')?>',
          data: { idEditModal: val1 },
          success: function(response) {
            $("#dataEditDraft").html(response);
            $("#idModalEditDraft").modal("show");
          }
        });
      }

      function modDelDra(x){
        document.getElementById("valDelDraft").value = x;
        $("#idModalDeleteDraft").modal("show");
      }

      // Modal Thrash
      function modEdThr(x){
        document.getElementById("idEditModal").value = x;
        var val1 = x;

        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('all_posts/viewModal/Thrash')?>',
          data: { idEditModal: val1 },
          success: function(response) {
            $("#dataEditThrash").html(response);
            $("#idModalEditThrash").modal("show");
          }
        });
      }

      function modDelThr(x){
        document.getElementById("valDelThrash").value = x;
        $("#idModalDeleteThrash").modal("show");
      }
    </script>
  </body>
</html>