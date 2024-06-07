

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
          <h1> Atur Kategori </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Form Container Indicator -->
    <form action="#" method="post">
      <div class="container-fluid container_indicator">
        <!-- Row Indicator tabel -->
        <div class="row row_indicator_table">

          <div class="col-12 col_btn">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_tambah">
              <i class="fas fa-plus"></i>
              Tambah Data Baru
            </button>
          </div>

          <!-- Col Search -->
          <div class="col-sm">
            <div class="form-group">

              <label for="search_input">
                Cari Level :
              </label>
              <label class="label_icon" for="search_input">
                <i class="fas fa-search" ></i>
              </label>
              <input type="text" name="search_input" id="search_input" class="form-control" placeholder="Cari Disini">
            </div>
          </div>
          <!-- End Of Col Search -->

          <!-- Col select -->
          <div class="col-sm">
            <div class="form-group">
              <label>Minimal</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
          </div>
          <!-- End Of Col select -->

          <div class="col-12 text-right">
            <button class="btn btn-default btn_submit_indicator">
              Terapkan
            </button>
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
                    <th>Id Kategori</th>
                    <th> User Admin </th>
                    <th> Nama Kategori </th>
                    <th> Deskripsi Kategori </th>
                    <th> Status </th>
                    <th> Waktu </th>
                    <th> Action </th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_kategori as $key => $row_kategori ) { ?>
                    <tr>
                      <td>  <?= $row_kategori['id_kategori']?> </td>
                      <td>  <?= $row_kategori['user_admin']?> </td>
                      <td>  <?= $row_kategori['nama_kategori']?> </td>
                      <td>  <?= $row_kategori['deskripsi_kategori']?> </td>
                      <td class="kolom_status <?= $row_kategori['status'] ?>">
                        <button class="btn btn-default">
                          <?= $row_kategori['status'] ?> 
                        </button> 
                      </td>
                      <td>  <?= $row_kategori['waktu']?> </td>
                      <td>

                        <!-- Kolom Opt -->
                        <div class="kolom_opt">
                          <button class="btn btn-default btn_opt">
                            <i class="fas fa-cog"></i>
                          </button>
                          <!-- Menu opt -->
                          <div class="menu_opt">

                            <a href="<?= base_url() ?>Admin_kategori/update/<?= $row_kategori['id_kategori']  ?>">
                              <div class="menu_colom">
                                <div class="col_icon">
                                  <i class="fas fa-pen"></i>
                                </div>
                                <p> 
                                  Ubah Data
                                </p>
                              </div>
                            </a>

                            <!-- Hapus atau restore data -->
                            <?php if ( $row_kategori['status'] == "ACTIVE" ){ ?>
                              <!-- Jika datanya belum dihapus, maka hapus datanya -->
                              <!-- Menghapus Data -->

                              <a href="<?= base_url() ?>Admin_kategori/delete_data/<?= $row_kategori['id_kategori']  ?>">
                                <div class="menu_colom">
                                  <div class="col_icon">
                                    <i class="fas fa-trash"></i>
                                  </div>
                                  <p> 
                                    Hapus Data
                                  </p>
                                </div>
                              </a>
                            <?php }else{ ?>
                              <!-- Jika datanya sudah dihapus, maka kembalikan datanya -->
                              <!-- Merestore Data -->

                              <a href="<?= base_url() ?>Admin_kategori/restore_data/<?= $row_kategori['id_kategori']  ?>">
                                <div class="menu_colom">
                                  <div class="col_icon">
                                    <i class="fas fa-trash-restore"></i>
                                  </div>
                                  <p> 
                                    Restore Data
                                  </p>
                                </div>
                              </a>
                            <?php } ?>
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

        <form action="<?=base_url() ?>Admin_kategori/tambah" method="post">
          <div class="form-group">
            <label> Nama Kategori : </label>
            <input required type="text" class="form-control" name="nama_kategori">
            <p class="input_rules"> Nama kategori tidak boleh sama dengan yang sudah dibuat </p>
          </div>
          <div class="form-group">
            <label> Deskripsi Kategori : </label>
            <textarea  name="deskripsi_kategori" class="form-control">

            </textarea>
          </div>

          <div class="form-group">
            <button name="submit" value="submit" class="btn btn-success form-control">
              Submit
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

