
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">PROYEK LOKASI</h1>
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
    <form method="POST" action="<?=base_url() ?>Home/tambah_proyek_lokasi">  


      <div class="form-group">
        <label> List Proyek : </label>
        <select class="form-control" name="proyek_id">
          <?php foreach ($data_proyek as $key => $row_proyek): ?>
            <option value="<?= $row_proyek['id'] ?>"> <?= $row_proyek['nama_proyek'] ?>  </option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="form-group">
        <label> List Lokasi : </label>
        <select class="form-control" name="lokasi_id">
          <?php foreach ($data_lokasi as $key => $row_lokasi): ?>
            <option value="<?= $row_lokasi['id'] ?>"> <?= $row_lokasi['nama_lokasi'] ?>  </option>
          <?php endforeach ?>
        </select>
      </div>

      <button class="btn btn-success"> SUBMIT </button>
    </form>

    <h1> Tabel Proyek Lokasi </h1>


    <table class="table">
      <tr style="background: white">
        <td> Proyek </td>
        <td> Lokasi </td>
      </tr>

      <?php foreach ($data_proyek_lokasi as $key => $row_proyek_lokasi): ?>
        <tr>
          <td><?= $this->Proyek_model->get_single(['id' => $row_proyek_lokasi['proyek_id']])['nama_proyek'] ?> </td>
          <td><?= $this->Lokasi_model->get_single(['id' => $row_proyek_lokasi['lokasi_id']])['nama_lokasi'] ?> </td>
        </tr>
      <?php endforeach ?>
    </table>


  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



