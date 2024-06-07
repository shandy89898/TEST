

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
          <h1> Update User : <?= $row_user['nama'] ?> ( <?= $row_user['user'] ?> ) </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="container-fluid">
      <div class="row"> 

        <div class="col-12" style="background: #fff;padding: 20px;">

          <!-- Update Profile -->
          <div class="profile_section text-center">
            <div class="profile_img">
              <img src="<?= base_url() ?>asset/balans_asset/gam/user.png">
            </div>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#modal_update_img">
              Ubah Gambar <i class="fas fa-pen"></i>
            </button>
          </div>

          <form action="" method="post" id="form_update_profile">

            <h3 class="mb-3"> Informasi Personal </h3>

            <div class="form-group">
              <label> Name : </label>
              <input value="<?= $row_user['nama'] ?>" autosave type="text" name="nama" class="form-control" required placeholder="Your Name">
            </div>

            <div class="form-group">
              <div class="deskripsi_lama">
                <label>
                  Alamat Sebelumnya :
                </label>
                <p class="text_flow_multi2">
                  <?= $row_user['alamat'] ?>
                </p>
              </div>
            </div>

            <div class="form-group">
              <label> Alamat Baru : </label>
              <textarea name="alamat" value="<?= $row_user['alamat'] ?>">
              </textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-success form-control" type="submit" name="submit" value="<?= uniqid() ?>">
                Submit informasi personal
              </button>
            </div>
          </form>


        </div>

      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Gambar User -->
<div class="modal fade" id="modal_update_img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="col-12">
                <form action="" method="post" enctype="multipart/form-data" id="form_update_img"> 
                  <div class="box_upload profile_img">
                    <div class="before_upload">
                      <h1> <i class="fas fa-upload"></i> </h1>
                    </div>
                    <div class="after_upload">
                      <img src="<?= base_url() ?>asset/balans_asset/gam/logo.png" class="img_frame">
                    </div>
                    <!-- Another dimension -->
                    <input type="file" name="upload_gambar_profile" class="upload_img">
                    <input type="hidden" name="update_img_profile" value="<?= uniqid() ?>">
                  </div>

                  <div class="form-group">
                    <button class="btn btn-success form-control" name="submit" value="submit">
                      <i class="fas fa-upload"></i>
                      Ubah Gambar Profile
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $('#modal_update').modal('show');
</script>





