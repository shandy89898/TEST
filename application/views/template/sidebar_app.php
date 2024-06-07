
<!-- Sidebar -->
<div class="sidebar sidebar_left">
    <div class="content_sidebar">
        <button class="btn btn-default btn_close">
            <i class="fas fa-times"></i>
        </button>
        <!-- container header -->

        <div class="container-fluid container_header">
            <div class="row row_header justify-content-center">
                <img src="<?=base_url()?>asset/main_asset/gam/logo.png" class="logo">
            </div>
        </div>
        <!-- End Of container header -->

        <!-- Container Sidebar menu data -->
        <script type="text/javascript">
            $(function(e) {
                $('.container_menu_data').find('.row_menu').eq(0).find('.header_menu_data').addClass('active');
            });
        </script>
        <style type="text/css">
            .row_menu{
                padding: 0;
            }
            .col_menu{
                max-width: 100%;
                word-wrap: break-word;
                text-align: center;
                padding: 0;
            }
            .col_menu a{
                text-align: center;
                font-size: 13px !important;
                display: block;
            }
            .col_menu a i{
                margin-bottom: 5px;
                font-size: 25px !important;
            }
        </style>
        <div class="container-fluid container_menu_data">
            <?php foreach ($this->Base_model->data_sidebar_app as $key_index => $row_sidebar_menu ){?>
                <?php 
                $nama_menu = $row_sidebar_menu['nama_menu'];
                $icon_menu = $row_sidebar_menu['icon_menu'];
                $url_menu = $row_sidebar_menu['url_menu'];
                ?>
                <!-- Row Menu -->
                <div class="row row_menu" style="padding: 0;">
                    <div class="col-12 col_menu">
                        <a href="<?= base_url() . $url_menu ?>">
                            <i class="<?= $icon_menu ?>"> </i>
                            <br>
                            <?= $nama_menu ?>
                        </a>
                    </div>
                </div>
                <!-- End Of Row Data Menu -->
            <?php  } ?>
        </div>
        <!-- End Of Container menu data -->

    </div>
    <!-- End Of Content Sidebar -->


</div>
<!-- End Of Sidebar -->





<!-- Lanjutannya di halaman terkait agar sifat flex terimplementasikan -->







