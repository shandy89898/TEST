

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
          <h1> Update Produk : <?= $row_produk['nama_produk'] ?> ( <?= $row_produk['id_produk'] ?> ) </h1>
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
            
            <div class="form-group form-row">
              <div class="col-12">
                <label>Kategori : </label>
              </div>
              <div class="col">
                <select name="id_kategori" class="form-control select2" style="width: 100%;">
                  <?php foreach ($data_kategori as $key => $row_kategori): ?>
                    <option value="<?= $row_kategori['id_kategori'] ?>"> <?= $row_kategori['nama_kategori'] ?> </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col">
                <a href="<?= base_url() ?>Admin_kategori" class="btn btn-secondary">
                  <i class="fas fa-plus"></i> Buat Kategori
                </a>
              </div>
            </div>

            <div class="form-group">
              <label> Nama Produk : </label>
              <input value="<?= $row_produk['nama_produk'] ?>" type="text" class="form-control" name="nama_produk" placeholder="Contoh : Produk Vioretha">
            </div>
            <div class="form-row">

              <div class="col">
                <label>
                  Harga Jual :
                </label>
                <input value="<?= $row_produk['harga_jual'] ?>" type="number" class="form-control" name="harga_jual">
              </div>
              <div class="col">
                <label>
                  Harga Modal :
                </label>
                <input value="<?= $row_produk['harga_modal'] ?>" type="number" class="form-control" name="harga_modal">
              </div>
            </div>
            <div class="form-group">


              <div class="deskripsi_lama">
                <label>
                  Deksripsi Produk Lama :
                </label>
                <p class="text_flow_multi2">
                  <?= $row_produk['deskripsi_produk'] ?>
                </p>
              </div>

              <label> Deskripsi Produk Baru : </label>
              <textarea name="deskripsi_produk" value="<?= $row_produk['deskripsi_produk'] ?>">
              </textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="submit" class="btn btn-success form-control">
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






