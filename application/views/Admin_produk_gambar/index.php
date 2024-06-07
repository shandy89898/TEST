


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
          <h1> Atur Gambar Produk </h1>
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

            <table id="example1" class="table">
              <thead>
                <tr>
                  <th> Id Produk Gambar </th>
                  <th> Id Produk </th>
                  <th> File Gambar </th>
                  <th> User Admin </th>
                  <th> Waktu </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data_produk_gambar as $row_produk_gambar ) {?>
                  <tr>
                    <td> <?= $row_produk_gambar['id_produk_gambar'] ?> </td>
                    <td> <?= $row_produk_gambar['id_produk'] ?> </td>
                    <td>
                      <img src="<?= $this->Base_model->get_imgProduk( $row_produk_gambar ) ?>" style="width: 70px;height: 70px">
                      <p> 
                        <span> Url File :</span>
                        <?= $row_produk_gambar['file_gambar'] ?> 
                      </p>
                    </td>
                    <td> <?= $row_produk_gambar['user_admin'] ?> </td>
                    <td> <?= $row_produk_gambar['waktu'] ?> </td>
                    <td>
                      <!-- Kolom Opt -->
                      <div class="kolom_opt">
                        <button class="btn btn-default btn_opt">
                          <i class="fas fa-cog"></i>
                        </button>
                        <!-- Menu opt -->
                        <div class="menu_opt">
                          <!-- Menghapus Data -->
                          <a href="<?= base_url() ?>Admin_produk/hapus_gambar/<?= $row_produk_gambar['id_produk_gambar'] ?>">
                            <div class="menu_colom">
                              <div class="col_icon">
                                <i class="fas fa-trash"></i>
                              </div>
                              <p> 
                                Hapus Data
                              </p>
                            </div>
                          </a>
                          <!--End Of Hapus atau restore data -->


                        </div>
                        <!-- End Of Menu opt -->
                      </div>
                      <!-- End Of Kolom Opt -->
                    </td>

                  </tr>
                <?php } ?>
              </tbody>
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

        <form action="<?= base_url() ?>Admin_produk_gambar/tambah?id_produk=<?= $row_produk['id_produk'] ?>" method="post" enctype="multipart/form-data">

          <div class="box_upload">
            <div class="before_upload">
              <h1> <i class="fas fa-upload"></i> </h1>
              <h1> Upload Gambar Disini </h1>
            </div>
            <div class="after_upload">

              <img src="<?= base_url() ?>asset/balans_asset/gam/logo.png" class="img_frame">
            </div>
            <!-- Another dimension -->
            <input type="file" name="upload_gambar_produk" class="upload_img">

          </div>

          <div class="form-group">
            <button class="btn btn-success form-control" name="submit" value="submit">
              <i class="fas fa-upload"></i>
              Upload Gambar
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
