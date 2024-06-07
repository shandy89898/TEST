

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
          <h1> Update Kategori : <?= $row_kategori['nama_kategori'] ?> </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="container-fluid">
      <div class="row">

        <div class="col-12" style="background: #fff;padding: 20px;">
          <form action="" method="post">
            <div class="form-group">
              <label> Nama Kategori : </label>
              <input required type="text" class="form-control" name="nama_kategori" value="<?= $row_kategori['nama_kategori'] ?>">
              <p class="input_rules"> Nama kategori tidak boleh sama dengan yang sudah dibuat </p>
            </div>
            <div class="form-group">

              <div class="deskripsi_lama">
                <label>
                  Deksripsi Kategori Lama :
                </label>
                <p class="text_flow_multi2">
                  <?= $row_kategori['deskripsi_kategori'] ?>
                </p>
              </div>
              <label> Deskripsi Kategori : </label>
              <textarea value="<?= $row_kategori['deskripsi_kategori'] ?>"  name="deskripsi_kategori" class="form-control"></textarea>
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


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->






