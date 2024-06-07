


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- DataTables -->
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">

<!-- jQuery -->
<script src="<?=base_url()?>asset/admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>asset/admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Atur Produk Fitur </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Form Container Indicator -->
    <form method="post" action="#">
      <div class="container-fluid container_indicator">
        <!-- Row Indicator tabel -->
        <div class="row row_indicator_table">

          <div class="col-12 col_btn">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_tambah">
              <i class="fas fa-plus"></i>
              Tambah Data Baru
            </button>
          </div>

          <style type="text/css">
          .data_info{
            background: black;
            padding: 10px;
            text-align: center;
            color: #fff;
          }
          .title_info{
            font-weight: bolder;
          }
        </style>

        <div class="col-sm-6 col_info_produk">
          <p class="title_info"> Id Produk : </p>
          <p class="data_info"> <?= $row_produk['id_produk'] ?> </p>
        </div>
        <div class="col-sm-6 col_info_produk">
          <p class="title_info"> Nama Produk : </p>
          <p class="data_info"> <?= $row_produk['nama_produk'] ?> </p>
        </div>

      </div>
      <!-- End Of Row Indicator tabel -->
    </div>
  </form>
  <!-- End Of Form Container Indicator -->



  <!-- Container Table -->
  <div class="container-fluid">
    <!-- Row Table -->
    <div class="row row_table">
      <div class="col-12">
        <!-- Card Tabel -->
        <div class="card card_table">
          <!-- /.card-header -->
          <div class="card-body">


            <table class="table" border="1">


              <tr>
                <th> Id Produk Fitur </th>
                <th> Nama Produk ( RL ) </th>
                <th> User Admin </th>
                <th> Nama Produk Fitur </th>
                <th> Waktu </th>
                <th> Status </th>
                <th> Action </th>
              </tr>

              <!-- Loop Data -->
              <?php foreach ($data_produkFitur as $key => $row_produkFitur): ?>
                <tr>
                  <td> <?= $row_produkFitur['id_produkFitur']  ?> </td>
                  <td> <?= $row_produkFitur['nama_produk']  ?> </td>
                  <td> <?= $row_produkFitur['user_admin']  ?> </td>
                  <td> <?= $row_produkFitur['nama_produkFitur']  ?> </td>
                  <td> <?= $row_produkFitur['waktu']  ?> </td>
                  <td class="kolom_status <?= $row_produkFitur['status'] ?>">
                    <button class="btn btn-default">
                      <?= $row_produkFitur['status'] ?> 
                    </button> 
                  </td>
                  <td>
                    <input type="checkbox" name="data_check[]">
                  </td>
                </tr>
              <?php endforeach ?>


              <!-- End Of Loop Data -->

            </table>

            <!-- Pagination -->

            <div class="pagination_section" style="margin-top: 20px;">
              <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>

            </div>

            <!-- End Of Pagination -->

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row End Of Row Table -->
  </div>
  <!-- /.container-fluid End Of Container Table -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->






<!-- Modal Tambah -->
<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

        <style type=""></style>

        <form action="<?=base_url()?>Admin_produk_fitur/tambah?id_produk=<?= $row_produk['id_produk'] ?>" method="post">

          <div class="form-group">
            <label for="nama_produkFitur"> Produk Fitur : </label>
            <input type="text" name="nama_produkFitur" id="nama_produkFitur" class="form-control" required>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success form-control"> Tambah <i class="fas fa-plus"></i> </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>








































