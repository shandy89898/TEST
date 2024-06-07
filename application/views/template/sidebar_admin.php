

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>Admin_dashboard" class="brand-link">
    <img src="<?=base_url()?>asset/main_asset/gam/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Balans Admin</span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel user_panel mt-3 pb-3 mb-3">
      <div class="image">
        <img src="<?=base_url()?>asset/balans_asset/gam/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info_user">
        <a href="#" class="d-block">Irshandy</a>
      </div>

    </div>





    <!-- Sidebar Menu -->
    <nav class="mt-2">


      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <?php foreach ($this->Base_model->data_sidebar_admin as $row_menu ): ?>

          <li class="nav-item">
            <a href="<?= base_url() .$row_menu['url_menu'] ?>" class="nav-link">
              <i class="nav-icon <?= $row_menu['icon'] ?>"></i>
              <p>
                <?= $row_menu['nama_menu'] ?>
                <?php if (isset($row_menu['sub_menu'])): ?>
                  <i class="right fas fa-angle-left"></i>
                <?php endif ?>
              </p>
            </a>
            <!-- Jika pada strukutru data array ada key sub menu dan berbentuk array -->
            <?php if ( isset($row_menu['sub_menu']) && !empty($row_menu['sub_menu']) ): ?>

            <ul class="nav nav-treeview">
              <?php foreach ($row_menu['sub_menu'] as $row_submenu ) {?>
                <li class="nav-item">
                  <a href="<?= base_url() . $row_submenu['url_menu'] ?>" class="nav-link active">
                    <i class="nav-icon <?= $row_submenu['icon']  ?>"></i>
                    <p><?= $row_submenu['nama_menu']  ?></p>
                  </a>
                </li>
              <?php } ?>
            </ul>
          <?php endif ?>

        </li>
      <?php endforeach ?>




    </ul>
  </nav>
  <!-- /.sidebar-menu -->


</div>
<!-- /.sidebar -->
</aside>




