


<div class="col-sm content_prime">
    <!-- Semua content yang primer elemennya berdasarkan didalam sini -->
    <div class="container-fluid container_content">
        <!-- Row Batas bungkus semua elemen content dibuat -->
        <div class="row">
            <!-- Header content -->
            <div class="col-12 header_content">
                <div class="container-fluid">
                    <div class="row" style="position: relative;">
                        <h4> Produk </h4>


                    </div>
                </div>
            </div>
            <!-- End Of Header content -->
            <!-- container card Data -->
            <div class="col-12 container_card_data">
                <div class="container-fluid">
                    <div class="row">
                        <!-- card data grid -->
                        <?php foreach ($data_produk as $key => $row_produk){ ?>
                            <div class="col-md-4 card_data">

                                <!-- End Of Card grid -->
                                <div class="card card_grid">
                                    <div class="card-body">

                                        <?php 
                                        $id_produk = $row_produk['id_produk'];
                                        $row_img = $this->ProdukGambar_model->get_single( ['id_produk' => $id_produk] );
                                        ?>

                                        <img src=" <?= $this->Base_model->get_imgProduk($row_img) ?> " class="img_thumb">
                                        <div class="info_produk">
                                            <button class="btn btn-default btn_popup_info">
                                                <i class="fas fa-info"></i>
                                            </button>
                                            <p class="text_flow_multi2 nama_produk">
                                                <?= $row_produk['nama_produk'] ?>
                                            </p>
                                            <p class="harga_produk">
                                                Rp <?= number_format($row_produk['harga_jual']) ?> / Bulan
                                            </p>
                                        </div>

                                        <a href="<?=base_url()?>App_view_produk/?id_produk=<?= $row_produk['id_produk'] ?>" class="mt-3 btn btn-success form-control">
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                            Order
                                        </a>
                                    </div>
                                </div>
                                <!-- End Of Card grid -->

                                <!-- Pop Info Deskripsi Produk Yang Akan Melayang Dimensi Yang Berbeda -->
                                <!-- Pop Up -->
                                <div class="popUp_info">
                                    <div class="backdrop"></div>
                                    <!-- Modal popup -->
                                    <div class="modal_popup">
                                        <!-- Container Deskripsi -->
                                        <div class="container-fluid container_deskripsi">

                                            <div class="row">
                                                <!-- Col Info Header -->
                                                <div class="col-12 col_info_header">
                                                    <h3>
                                                        Produk <?= $i ?>
                                                    </h3>
                                                    <button class="btn btn-default btn_close_popup">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <!-- End Of Col Info Header -->

                                                <!-- Col Info Deskripsi -->
                                                <div class="col-12 col_info_deskripsi">
                                                    <p class="content_artikel text_flow_multi2"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                                    <div class="box_req">
                                                        <ul>
                                                            <li> Bisnis Kebutuhan : </li>
                                                            <li> Lorem ipsum dolor sit amet asdd fdsa. </li>
                                                            <li> Lorem ipsum dolor sit amet asdd fdsa. </li>
                                                            <li> Lorem ipsum dolor sit amet asdd fdsa. </li>
                                                        </ul>
                                                    </div>

                                                    <div class="box_harga">
                                                        <h3 class="harga">
                                                            Rp 5.000.000 
                                                            <span>
                                                                /Bulan  
                                                            </span>
                                                        </h3>
                                                        <p> *dibayar per tahun </p>
                                                    </div>

                                                </div>
                                                <!-- End Of Col Info Deskrsipsi -->
                                            </div>

                                        </div>
                                        <!-- End Of Container Deskripsi --->

                                        <!-- Container list fitur -->
                                        <div class="container-fluid container_list">
                                            <div class="row row_header_list justify-content-center">
                                                <div class="col-sm-3 text-center">
                                                    <h4 class="font-weight-bolder"> Fitur </h4>
                                                </div>
                                            </div>
                                            <?php for ($j=0; $j < 5; $j++) { ?>
                                                <div class="row row_list_fitur justify-content-center mb-3">
                                                    <div style="width: 20px;">
                                                        <button class="btn btn-success text-center" style="width: 20px;height: 20px;border-radius: 50%;position: relative;">
                                                            <i class="fas fa-check" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        Lorem ipsum dolor sit amet 
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- End Of Container list fitur -->

                                    </div>
                                    <!-- End Of Modal popup -->
                                </div>
                                <!-- End Of Pop Up -->
                            </div>
                        <?php } ?>
                        <!-- End Of card data -->
                    </div>
                </div>

            </div>
            <!--End Of container card Data -->
        </div>
        <!-- End Of Row Batas bungkus semua elemen content dibuat -->
    </div>
    <div class="shadow"></div>
</div>





