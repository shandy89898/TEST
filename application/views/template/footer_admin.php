<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="<?= base_url() ?>">Balans</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>asset/admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>asset/admin_asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>asset/admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>asset/admin_asset/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>asset/admin_asset/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>asset/admin_asset/dist/js/pages/dashboard.js"></script>

<script type="text/javascript" src="<?= base_url() ?>asset/main_asset/js/admin.js"></script>
<!-- <script type="text/javascript" src="<?= base_url() ?>asset/balans_asset/js/main.js"></script> -->


<script type="text/javascript">

  //Script ini berlaku ke semua controller fitur berkaitan dengan Admin
  $( function(e) {

    //Melakukan scripting dom agar jika misalnya user tidak mengisi textarea saat update, maka yang diambil adalah deksripsi lama
    var form_group = $('.deskripsi_lama').parents('.form-group');
    var deskripsi_lama = form_group.find('.deskripsi_lama p').text();
    form_group.find('textarea').val( deskripsi_lama ); //Agar summernote defaultnya jadi nilai deskripsi lama

  } );
</script>
</body>
</html>