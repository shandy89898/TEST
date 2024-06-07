

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS Source -->
    <link rel="stylesheet" href="<?=base_url()?>asset/balans_asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <!-- End Of CSS Source -->
    <script src="<?=base_url()?>asset/balans_asset/js/jquery.min.js"></script>
    <script src="<?=base_url()?>asset/balans_asset/js/sweetalert.min.js"></script>
    <script src="<?=base_url()?>asset/balans_asset/js/jquery.slim.min.js"></script>
    <script src="<?=base_url()?>asset/balans_asset/js/popper.min.js"></script>
    <script src="<?=base_url()?>asset/balans_asset/js/bootstrap.bundle.min.js"></script>

    <script src="<?=base_url()?>asset/balans_asset/js/jquery-ui.js"></script>
    <script src="<?=base_url()?>asset/balans_asset/js/main.js"></script>

    <title> Balans </title>

    <style type="text/css">
    .icon_fitur{
        width: 30px;
        height: 30px;
    }
</style>
</head>
<body>


    <header>
        <nav>
            <div class="container-fluid">
                <div class="row">
                    <!-- Akan muncul ketika dia di responsive mobile -->
                    <div class="col icon_bar">
                        <button class="btn btn-default btn_nav_header">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!-- Logo Section -->
                    <div class="col logo_section">
                        <a href="index.php">
                            <img src="<?=base_url()?>asset/balans_asset/gam/logo.png" class="logo_header">
                        </a>
                        <!-- <p> Digti </p> -->
                    </div>
                    <!-- End OF Logo Section -->

                    <!-- Menu Section - Tampilan awal hilang, Jika di responsive mobile dia akan hilang dan menjadi melayang -->
                    <div class="col-8 text-center menu_section">

                        <!-- Akan muncul ketika tampilan responsive mobile -->
                        <div class="header_responsive">
                            <h1>
                                Daftar Menu 
                            </h1>
                            <h1 class="btn_nav_header">
                                <i class="fas fa-times"></i>
                            </h1>

                        </div>
                        <!-- End of Akan muncul ketika tampilan responsive mobile -->


                        <!-- Content Menu - Loop Data Menu -->
                        <?php 
                        $data_menu = $this->Menu_model->get_many();
                        ?>
                        <?php foreach ($data_menu as $key => $row_menu) {?>

                            <!-- Ambil data jenis fitur berdasarkan id menunya -->
                            <?php 
                            $id_menu = $row_menu['id_menu'];
                            $data_jenis_fitur = $this->JenisFitur_model->get_many( ['id_menu' => $id_menu ] );
                            ?>

                            <div class="content_menu btn btn-default">

                                <button class="btn btn-default btn_content_menu" style="margin-top:0;padding-top: 0;">
                                    <?= $row_menu['nama_menu']  ?>
                                </button>
                                
                                <!-- Menu section container - Melayanng -->
                                <div class="menu_section_container" >
                                    <!-- Sidebar section -->
                                    <div class="sidebar_section">
                                        <div class="cover"></div>
                                        <div class="container_menu_section">
                                            <div class="row_menu_fitur header_section">
                                                <?=$row_menu['nama_menu']?>
                                            </div>
                                            <!-- loop jenis fitur -->
                                            <?php 

                                            foreach ($data_jenis_fitur as $key => $row_jenis_fitur) {?>
                                                <div class="row_menu_fitur data_jenis_fitur" data-idJenis-fitur="<?=$row_jenis_fitur['id_jenis_fitur']?>">

                                                    <?= $row_jenis_fitur['nama_jenis_fitur'] ?>

                                                </div>


                                            <?php } ?>
                                            <!-- End Of loop jenis fitur -->
                                        </div>
                                    </div>
                                    <!-- End Of Sidebar section -->

                                    <!-- Content Section - Loop Jenis Fitur - Lebarnya menyesuaikan -->
                                    <?php foreach ($data_jenis_fitur as $key => $row_jenis_fitur) { ?>
                                        <div class="content_section data_jenis_fitur" id="<?=$row_jenis_fitur['id_jenis_fitur']?>">
                                            <div class="container-fluid">
                                                <div class="row row_header_section pb-2" style="padding-top: 0!important">
                                                    <div class="col-12 col_header_row">
                                                        <?= $row_jenis_fitur['nama_jenis_fitur'] ?>
                                                        <button class="btn btn-default btn_close_fitur">
                                                            <!-- AKan muncul saat responsive mobile dan hanya menjadi parameter gak ngaruh ke tampilan ui-->
                                                            <span class="param_mobile"></span>
                                                            <i class="fas fa-times" ></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Row untuk col data fitur -->
                                                <div class="row">
                                                    <!-- Data Fitur -->
                                                    <!-- Ambil data fitur berdasarkan id jenis fitur -->
                                                    <?php 
                                                    $id_jenis_fitur = $row_jenis_fitur['id_jenis_fitur'];
                                                    $data_fitur = $this->Fitur_model->get_many(
                                                        ["id_jenis_fitur" => $id_jenis_fitur ]
                                                    );
                                                    foreach ($data_fitur as $key => $row_fitur) {
                                                        $id_fitur = $row_fitur['id_fitur'];
                                                        $link = base_url() . "landing?id_fitur=".$id_fitur;
                                                        ?>
                                                        <div class="col-sm-4 col_fitur">
                                                            <a href="<?= $link ?>">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-2 pt-2">
                                                                            <!-- Ambil icon fitur - hasil inner join antara tabel data fitur dengan data fitur icon -->
                                                                            <?php 
                                                                            $row_fitur_icon = $this->FiturIcon_model->get_single( ['id_fitur' => $row_fitur['id_fitur'] ] );

                                                                            if ( !empty($row_fitur_icon) ) {
                                                                                $icon = $row_fitur_icon;
                                                                            }else{
                                                                                $icon = "ERORSASDADS"; //Agar yang di load gambar eror
                                                                            }
                                                                            $icon_src = $this->Base_model->get_imgFiturIcon( $row_fitur_icon );
                                                                            ?>
                                                                            <img class="icon_fitur" src="<?= $icon_src ?>">
                                                                        </div>
                                                                        
                                                                        <div class="col" style="padding-top:0">

                                                                            <p id="nama_fitur" style="margin-bottom:0">
                                                                                <?= $row_fitur['nama_fitur'] ?>
                                                                            </p>
                                                                            <p style="color: grey;"> Lorem ipsum de lorot </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- End Of Data Fitur -->
                                                </div>
                                                <!-- End Of Row untuk col data fitur -->

                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- End Of Content Section -->
                                </div>
                                <!-- End Of Menu section container -->
                            </div>
                        <?php } ?>
                        <!-- End Of Content Menu - Loop Data Menu Fitur -->
                    </div> 


                    <!-- End Of Menu Section -->

                    <div class="col text-center" style="padding: 0;">
                        <a href="auth.php" class="btn btn-success btn_contact" style="position: absolute;top: 0;left: 0;width: 100%;">
                            <span class="caption"> Contact </span>
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

        </nav>
    </header>










