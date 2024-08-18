
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">LOKASI DATA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!--             <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section> 

      <style type="text/css">
        form{
          border: 2px solid black;
          margin-bottom: 20px;
          padding: 20px;
        }
        section{
          padding: 20px;
        }
      </style>
      <h1> Tambah Lokasi</h1>
      <form method="POST" action="<?=base_url() ?>Lokasi/tambah_lokasi">  
        <div class="form-group">
          <label> Nama Lokasi </label>
          <input class="form-control" type="text" name="nama_lokasi">
        </div>
        <div class="form-group">
          <label> Negara </label>
          <input class="form-control" type="text" name="negara">
        </div>
        <div class="form-group">
          <label> Provinsi </label>
          <input class="form-control" type="text" name="provinsi">
        </div>
        <div class="form-group">
          <label> Kota </label>
          <input class="form-control" type="text" name="kota">
        </div>

        <button class="btn btn-success"> SUBMIT </button>
      </form>

      <h1> Tabel Lokasi</h1>


      <table class="table">
        <tr style="background: white">
          <td> Nama Lokasi </td>
          <td> Negara </td>
          <td> Provinsi </td>
          <td> Kota </td>
          <td> Created At </td>
          <td> Action </td>
        </tr>


        <?php foreach ($data_lokasi as $key => $row_lokasi): ?>
          <tr>
            <td><?=$row_lokasi['nama_lokasi'] ?> </td>
            <td><?=$row_lokasi['negara'] ?> </td>
            <td><?=$row_lokasi['provinsi'] ?> </td>
            <td><?=$row_lokasi['kota'] ?> </td>
            <td><?=$row_lokasi['created_at'] ?> </td>
            <td> <a href="<?= base_url() ?>Lokasi/delete_lokasi/<?= $row_lokasi['id'] ?>"> Hapus </a> </td>
          </tr>
        <?php endforeach ?>
      </table>


    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



