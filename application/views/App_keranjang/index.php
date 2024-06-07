
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/balans_asset/css/transaksi.css">
<div class="col-sm content_prime">
    <!-- Container Content -->
    <div class="container-fluid container_content">
        <!-- Batas bungkus semua elemen content dibuat -->
        <div class="row">
            <!-- Header Content -->
            <div class="col-12 header_content">
                <div class="container-fluid">
                    <div class="row" style="position: relative;">
                        <h4> Keranjang </h4>
                        <!--                         <div class="col content_search">
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
            <div class="col-12 content_cart">
                <form method="post" action="<?= base_url() ?>App_checkout">
                    <div class="container-fluid">
                        <div class="row row_transaksi">

                            <!-- Cart data -->
                            <div class="col-lg cart_data">
                                <div class="nav_header">
                                    Banyak Item : <?= count($data_keranjang) ?>
                                </div>

                                <div class="container-fluid container_data_cart">

                                    <?php  foreach ($data_keranjang as $key => $row_keranjang ) {?>
                                        <!-- Row Data Cart -->
                                        <div class="row row_data_cart">

                                            <div class="img_detail">
                                                <div class="header_item mb-3">
                                                    <input type="checkbox" class="form-control" name="id_keranjang_banyak[]" value="<?= $row_keranjang['id_keranjang'] ?>"  >
                                                </div>
                                                <?php  
                                                $row_gambarProduk = $this->ProdukGambar_model->get_single(['id_produk' => $row_keranjang['id_produk']]);
                                                ?>
                                                <img src="<?= $this->Base_model->get_imgProduk( $row_gambarProduk ) ?>">
                                            </div>
                                            <div class="col cart_detail">
                                                <div class="header_item">
                                                    <p> #<?= $row_keranjang['id_keranjang'] ?> </p>
                                                </div>
                                                <div class="data_detail">
                                                    <h3 class="text_flow_multi2 pt-3 mb-3"> <?= $row_keranjang['nama_produk'] ?> </h3>
                                                    <h3 class="font-weight-bolder text_flow_multi2 harga"> 
                                                        Rp <?= number_format($row_keranjang['harga_jual']) ?>
                                                    </h3>
                                                </div>
                                            </div>

                                            <!--                                             <div class="col-md indicator_cart">
                                                <div class="indicator_box">
                                                    <button type="button" class="btn btn-primary" id="btn_plus_indicator">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    <input type="text" name="qty" class="indicator_input" value="0" placeholder="QTY">
                                                    <button type="button" class="btn btn-primary" id="btn_minus_indicator">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div> -->

                                            <div class="col-md-3 indicator_totalHarga text-right">
                                                <h3 class="text_flow_multi2"> 
                                                    Rp <?= number_format($row_keranjang['harga_jual']) ?>
                                                </h3>
                                                <button class="btn btn-default">
                                                    <i class="fas fa-trash"></i>
                                                    <span class="ml-3"> Hapus </span>
                                                </button>
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
                                                Rp <?= number_format($total_hargaKeranjang)  ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Cart data -->


                            <!-- cart rincian -->
                            <div class="col-sm-4 cart_rincian">
                                <div class="box_rincian">
                                    <div class="container-fluid">
                                        <div class="row header_cart_rincian">
                                            <div class="col-12">
                                                <h4> Rincian Pembayaran </h4>
                                            </div>

                                        </div>
                                        <div class="row body_cart_rincian">
                                            <div class="col">
                                                <p class="font-weight-bolder"> Ringkasan Pembayaran </p>
                                            </div>
                                            <div class="col">
                                                <p class="text_flow_multi2"> 
                                                    Rp <?= number_format($total_hargaKeranjang) ?>
                                                </p>
                                            </div>
                                        </div>  

                                        <div class="row">
                                            <div class="col-12">

                                                <button name="submit" type="submit" class="btn btn-success form-control">
                                                    Lanjutkan Bayar
                                                </button>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Of cart rincian -->

                        </div>
                    </div>
                </form>
            </div>
            <!-- End Of Content Cart -->

        </div>
    </div>
    <!-- End Of Container Content -->

    <div class="shadow"></div>
</div>



<script type="text/javascript">
    $(function(e) {
        let input_check = $('input[type=checkbox]');
        input_check.prop('checked', true);
        $('form').on('submit', function(e) {
            let input_check = $('input[type=checkbox]');
            let banyak_check = input_check.filter(':checked').length ;
            //Buat handling jika tidak ada yang di check, maka tidak bisa melakukan form submit 
            if ( banyak_check < 1 ) {
              Swal.fire({
                title: "Pilih produk yang ingin di pesan!",
                icon: "info",
            });
          }else{
            return true;
        }
        return false;
    });
    });
</script>








