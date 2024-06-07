

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/balans_asset/css/transaksi.css">
<div class="col-sm content_prime">

    <!-- Container Content -->
    <div class="container-fluid container_content">
        <div class="row">
            <!-- Header Content -->
            <div class="col-12 header_content">
                <div class="container-fluid">
                    <div class="row" style="position: relative;">
                        <h4> Checkout </h4>
                        <!-- <div class="col content_search">
                            <button class="btn btn-default btn_closeSearch">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="col_search">
                                <button class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                <div class="box_search">
                                    <input type="" name="" placeholder="Search">
                                </div>
                            </div>
                            
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- End Of Header Content -->
            <!-- Content Cart -->
            <div class="col-12 content_cart checkout_page">
                <div class="container-fluid">
                    <!-- Row Transaction -->
                    <div class="row row_transaksi">

                        <!-- Cart data -->
                        <div class="col-lg cart_data">

                            <div class="nav_header checkout_info">
                                <p> 
                                    <button class="btn btn-primary" style="widows: 30px;height: 30px;border-radius: 50%;margin-right: 10px;">

                                        <i class="fas fa-info"> </i>
                                    </button>

                                    <span> Biodata Pembeli </span>
                                </p>

                                <p class="title_info">
                                    <?= $row_user['nama'] ?>
                                </p>
                                <p class="contact_info">
                                    <span>
                                        <?= $row_user['user'] ?>
                                    </span>

                                    <span class="ml-2 mr-2">
                                        |
                                    </span>

                                    <span>
                                        <?= $row_user['email'] ?> 
                                    </span>
                                </p>
                                <p class="address_info">
                                    <?= $row_user['alamat'] ?>
                                </p>


                            </div>

                            <div class="container-fluid container_data_cart">

                                <?php foreach ($data_checkout_produk as $key => $row_checkout) {?>
                                    <!-- Row Data Cart -->
                                    <div class="row row_data_cart data_checkout">

                                        <div class="col-12 header_checkout">
                                            <div class="header_item">
                                                <p> ID Pesanan #<?= $row_checkout['id_keranjang'] ?> </p>
                                            </div>
                                            <div class="header_item">
                                                <!-- <p style="line-height: 0px;margin-bottom: 40px;"> Gramedia Official </p> -->
                                            </div>
                                        </div>
                                        <div class="col-12 body_checkout">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="img_detail">
                                                        <?php  
                                                        $row_gambarProduk = $this->ProdukGambar_model->get_single(['id_produk' => $row_checkout['id_produk']]);
                                                        ?>
                                                        <img src="<?= $this->Base_model->get_imgProduk($row_gambarProduk) ?>">
                                                    </div>

                                                    <div class="col cart_detail">
                                                        <div class="data_detail">
                                                            <h3 class="text_flow_multi2 mb-3"> <?= $row_checkout['nama_produk'] ?> </h3>
                                                            <p class="qty_produk"> 1 Item </p>
                                                            <h3 class="font-weight-bolder text_flow_multi2 harga">  
                                                                Rp <?= number_format($row_checkout['total_harga']) ?>
                                                            </h3>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-5 indicator_totalHarga text-right">

                                                        <h3 class="text_flow_multi2">   
                                                            <span style="display: block;margin-bottom: 10px;"> Total : </span>
                                                            Rp <?= number_format( $row_checkout['total_harga'] ) ?>
                                                        </h3>
                                                        <button class="btn btn-default">

                                                        </button>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- End Of Row Data Cart -->
                                <?php } ?>
                                <div class="row row_cart_footer">
                                    <div class="col">
                                        Total Pesanan
                                    </div>
                                    <div class="col">
                                        <h3 class="text-right text_flow_multi2 font-weight-bolder">
                                            Rp <?= number_format($total_harga) ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Cart data -->


                        <!-- cart rincian -->
                        <div class="col-lg-4 cart_rincian">
                            <div class="box_rincian">


                                <!-- Rincian header -->
                                <div class="container-fluid rincian_header">

                                    <div class="row header_cart_rincian">
                                        <div class="col-12">
                                            <h4> Rincian Belanja </h4>
                                        </div>
                                    </div>

                                    <div class="row body_cart_rincian">
                                        <div class="col">
                                            <p class="font-weight-bolder"> Input Kode Promo </p>
                                        </div>
                                        <div class="col-4 text-right" style="padding: 0;">
                                            <a href="#">
                                                Lihat Promo
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-row">
                                                <div class="col-7">
                                                    <input type="text" placeholder="Kode Promo" class="form-control" name="">
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-secondary">
                                                        Klaim
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Of Rincian header -->

                                <!-- Rincian detail -->
                                <div class="container-fluid rincian_detail">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <p class="font-weight-bolder"> Ringkasan Pembayaran </p>
                                        </div>
                                    </div>

                                    <div class="row detail_cart_rincian">

                                        <div class="col-12 detail_transaksi">

                                            <div class="item_transaksi">
                                                <p class="judul_item">  
                                                    Total Harga
                                                </p>
                                                <p class="nilai_item">
                                                    Rp <?= number_format($total_harga) ?>
                                                </p>
                                            </div>

                                            <div class="item_transaksi">
                                                <p class="judul_item">  
                                                    Banyak Pesanan
                                                </p>
                                                <p class="nilai_item">
                                                    <?= $total_pesanan ?> Item
                                                </p>
                                            </div>

                                            <div class="item_transaksi item_rd">
                                                <p class="judul_item">  
                                                    Potongan Kupon
                                                </p>
                                                <p class="nilai_item">
                                                    0
                                                </p>
                                            </div>

                                        </div>
                                        <div class="col-12 total_transaksi">

                                        </div>
                                    </div>



                                </div>
                                <!-- End Of Rincian detail -->

                                <!-- Rincian Submit -->
                                <div class="container-fluid rincian_submit">
                                    <div class="row">
                                        <div class="col-12">

                                            <form action="<?= base_url() ?>App_checkout/validasi_transaksi" method="post">
                                                <?php foreach ($data_checkout_produk as $key => $row_checkout) {?>
                                                    <input type="hidden" name="id_keranjang_banyak[]" value="<?= $row_checkout['id_keranjang'] ?>">
                                                <?php } ?>
                                                <button class="btn btn-success form-control">
                                                    Konfirmasi Bayar
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Of Rincian Submit -->











                            </div>
                        </div>
                        <!-- End Of cart rincian -->

                    </div>
                    <!-- End Of Row Transaction -->

                </div>
            </div>
            <!-- End Of Content Cart -->

        </div>
        <!-- End Of Batas bungkus semua elemen content dibuat -->
    </div>
    <!-- End Of Container Content -->

    <div class="shadow"></div>
</div>






