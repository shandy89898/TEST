

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
          <h1> Atur Menu </h1>
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
                Cari Menu :
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

    <!-- Contaiener Table -->
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
                  <th> Id Menu </th>
                  <th> Nama Menu </th>
                  <th> Waktu </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>

                <!-- Loop Data -->
                <?php foreach ($data_menu as $key => $row_menu): ?>
                  <tr>
                    <th> <?=$row_menu['id_menu'] ?> </th>
                    <th> <?=$row_menu['nama_menu'] ?> </th>
                    <th> <?=$row_menu['waktu'] ?> </th>
                    <td class="kolom_status <?= $row_menu['status'] ?>">
                      <button class="btn btn-default">
                        <?= $row_menu['status'] ?> 
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

                          <a href="<?= base_url() ?>Admin_menu/update/<?= $row_menu['id_menu'] ?>">
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
                          <?php if ( $row_menu['status'] == "ACTIVE" ){ ?>
                            <!-- Jika datanya belum dihapus, maka hapus datanya -->
                            <!-- Menghapus Data -->

                            <a href="<?= base_url() ?>Admin_menu/delete_data/<?= $row_menu['id_menu']  ?>">
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

                            <a href="<?= base_url() ?>Admin_menu/restore_data/<?= $row_menu['id_menu']  ?>">
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


<!-- jQuery -->
<script src="<?=base_url()?>asset/admin_asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>asset/admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(function(e) {
    $('.btn_opt').on('click', function(e) {
      var btn_opt = $(this);
      var kolom_opt = btn_opt.parents('.kolom_opt');
      var menu_opt = kolom_opt.find('.menu_opt');
      menu_opt.show( function(e) {
        //Call back, jika terbuka dan user klik elemen lain, maka elemen ini akan tertutup
        $( 'html').bind('click', function(e) {
          var target_click = $(e.target);
          //Jika bukan menu row yang sedang dibuka yang di klik, maka menu row ini akan tertutup 
          if ( target_click.is('.menu_opt ') == false ) {
            menu_opt.hide();
          }
          //Batalkan event html agar keadaan kembali ke semula 
          $( 'html' ).unbind('click');
        });
      } );
    });
  });
</script>


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


        <form action="<?=base_url()?>Admin_menu/tambah" method="post">



          <div class="form-group">
            <label for="nama_menu"> Nama Menu : </label>
            <input type="text" name="nama_menu" id="nama_menu" class="form-control" required>
          </div>

          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success form-control"> Tambah <i class="fas fa-plus"></i> </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
