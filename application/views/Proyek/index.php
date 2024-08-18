
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PROYEK DATA</h1>
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
    <h1> Tambah Proyek</h1>
    <form method="POST" action="<?=base_url() ?>Proyek/tambah_proyek">  
      <div class="form-group">
        <label> Nama Proyek </label>
        <input class="form-control" type="text" name="nama_proyek">
      </div>
      <div class="form-group">
        <label> Client </label>
        <input class="form-control" type="text" name="client">
      </div>
      <div class="form-group">
        <label> Tgl Mulai </label>
        <input class="form-control" type="date" name="tgl_mulai">
      </div>
      <div class="form-group">
        <label> Tgl Selesai </label>
        <input class="form-control" type="date" name="tgl_selesai">
      </div>
      <div class="form-group">
        <label> Pimpinan Proyek </label>
        <input class="form-control" type="text" name="pimpinan_proyek">
      </div>
      <div class="form-group">
        <label> Keterangan </label>
        <input class="form-control" type="text" name="keterangan">
      </div>

      <button class="btn btn-success"> SUBMIT </button>
    </form>

    <h1> Tabel Proyek</h1>


    <table class="table">
      <tr style="background: white">
        <td> Nama Proyek </td>
        <td> Client </td>
        <td> TGL MULAI </td>
        <td> TGL SELESAI </td>
        <td> Pimpinan Proyek </td>
        <td> Keterangan </td>
        <td> Created At </td>
        <td> Action </td>
      </tr>


      <?php foreach ($data_proyek as $key => $row_proyek): ?>
        <tr>
          <td><?=$row_proyek['nama_proyek'] ?> </td>
          <td><?=$row_proyek['client'] ?> </td>
          <td><?=$row_proyek['tgl_mulai'] ?> </td>
          <td><?=$row_proyek['tgl_selesai'] ?> </td>
          <td><?=$row_proyek['pimpinan_proyek'] ?> </td>
          <td><?=$row_proyek['keterangan'] ?> </td>
          <td><?=$row_proyek['created_at'] ?> </td>
          <td> <a href="<?= base_url() ?>Proyek/delete_proyek/<?= $row_proyek['id'] ?>"> Hapus </a> </td>
        </tr>
      <?php endforeach ?>
    </table>


  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



