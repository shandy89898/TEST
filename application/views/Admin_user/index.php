

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- DataTables -->
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Atur User </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
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
                    <th>Id User</th>
                    <th> User </th>
                    <th> User Pembuat </th>
                    <th> Password </th>
                    <th> File Gambar </th>
                    <th> Nama </th>
                    <th> Alamat </th>
                    <th> Email </th>
                    <th> Level </th>
                    <th> Waktu </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_user as $row_user)  {?>
                    <tr>
                      <td> <?= $row_user['id_user']   ?> </td>
                      <td> <?= $row_user['user']   ?> </td>
                      <td> <?= $row_user['user_pembuat']   ?> </td>
                      <td> <?= $row_user['password']   ?> </td>
                      <td> <?= $row_user['file_gambar']   ?> </td>
                      <td> <?= $row_user['nama']   ?> </td>
                      <td> <?= $row_user['alamat']   ?> </td>
                      <td> <?= $row_user['email']   ?> </td>
                      <td> <?= $row_user['level']   ?> </td>
                      <td> <?= $row_user['waktu']   ?> </td>
                      <td class="kolom_status <?= $row_user['status'] ?>">
                        <button class="btn btn-default">
                          <?= $row_user['status'] ?> 
                        </button> 
                      </td>
                      <td>
                        <!-- Kolom Opt -->
                        <div class="kolom_opt">
                          <button class="btn btn-default btn_opt">
                            <i class="fas fa-cog"></i>
                          </button>
                          <!-- Menu opt -->
                          <div class="menu_opt">

                            <a href="<?= base_url() ?>Admin_user/update/<?= $row_user['user'] ?>">
                              <div class="menu_colom">
                                <div class="col_icon">
                                  <i class="fas fa-pen"></i>
                                </div>
                                <p> 
                                  Ubah Profile
                                </p>
                              </div>
                            </a>
                            <a href="">
                              <div class="menu_colom">
                                <div class="col_icon">
                                  <i class="fas fa-pen"></i>
                                </div>
                                <p> 
                                  Ubah Password
                                </p>
                              </div>
                            </a>

                            <!-- Hapus atau restore data -->
                            <?php if ( $row_user['status'] == "ACTIVE" ){ ?>
                              <!-- Jika datanya belum dihapus, maka hapus datanya -->
                              <!-- Menghapus Data -->

                              <a href="<?= base_url() ?>Admin_user/delete_data/<?= $row_user['id_user']  ?>">
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

                              <a href="<?= base_url() ?>Admin_user/restore_data/<?= $row_user['id_user']  ?>">
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



<!-- Modal -->
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


        <form action="<?= base_url() ?>Admin_user/tambah" method="post">

          <div class="form-group">
            <label> Name : </label>
            <input autosave type="text" name="nama" class="form-control" required placeholder="Your Name">
          </div>

          <div class="form-group">
            <label> User : </label>
            <input autosave type="text" name="user" class="form-control" required>
          </div>

          <div class="form-group">
            <label> Email : </label>
            <input autosave type="text" name="email" class="form-control" required placeholder="Your Email">
          </div>

          <div class="form-group">
            <label> Password : </label>
            <input autosave type="password" name="password" class="form-control"  required placeholder="Your Password">
          </div>

          <div class="form-group">
            <label> Confirm Password : </label>
            <input autosave type="password" name="password_confirm" class="form-control"  required placeholder="Confirm Pasword">
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success form-control">
              Submit
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>
