


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/balans_asset/css/transaksi.css">
<div class="col-sm content_prime">
    <!-- Container Content -->
    <div class="container-fluid container_content">
        <div class="row">
            <!-- Header Content -->
            <div class="col-12 header_content">
                <div class="container-fluid">
                    <div class="row text-center justify-content-center" style="position: relative;">
                        <h4> Pembayaran </h4>
                    </div>
                </div>
            </div>
            <!-- End Of Header Content -->
            <!-- Content Cart -->
            <div class="col-12 content_cart checkout_page">
                <div class="container-fluid">
                    <!-- Row Transaction -->
                    <div class="row row_transaksi justify-content-center">

                        <!-- cart rincian -->
                        <div class="col-md-8 cart_rincian">
                            <!-- Box Rincian -->
                            <div class="box_rincian">


                                <!-- Rincian header -->
                                <div class="container-fluid rincian_header">

                                    <div class="row header_cart_rincian">
                                        <div class="col-12">
                                            <h5> Midtrans Gateway </h5>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Of Rincian header -->

                                <!-- Rincian pesanan -->
                                <div class="container-fluid rincian_pesanan">
                                    <div class="row row_info_pembayaran">
                                        <div class="col item_rincian">
                                            <p class="judul"> 
                                                Nomor Pesanan 
                                            </p>
                                            <p class="nilai"> 
                                                #<?= $row_transaksi['id_transaksi'] ?>
                                            </p>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a href="#">
                                                Salin
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row row_info_pembayaran">
                                        <div class="col item_rincian">
                                            <p class="judul"> 
                                                Tanggal Pemesanan 
                                            </p>
                                            <p class="nilai"> 
                                                <?= $row_transaksi['waktu'] ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row row_info_pembayaran">
                                        <div class="col item_rincian">
                                            <p class="judul"> 
                                                Total Pembayaran 
                                            </p>
                                            <p class="nilai"> 
                                                Rp <?= number_format($row_transaksi['total_harga']) ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row row_info_pembayaran">
                                        <div class="col item_rincian">
                                            <p class="judul"> 
                                                Status Pembayaran 
                                            </p>
                                            <p class="nilai"> 
                                                Unpaid
                                            </p>
                                        </div>
                                    </div>


                                </div>
                                <!-- End Of Rincian pesanan -->


                                <style type="text/css">
                                .rincian_submit a{
                                    margin-bottom: 20px;
                                }
                            </style>
                            <!-- Rincian Submit -->
                            <div class="container-fluid rincian_submit">
                                <div class="row">
                                    <div class="col-12">
                                        <button id="btn_submit_transaksi" class="btn btn-success form-control mb-3">
                                            Bayar Sekarang
                                        </button>
                                        <a href="<?= base_url() ?>App_produk" class="btn btn-primary form-control">
                                            Belanja Lagi
                                        </a >
                                        <a href="<?= base_url() ?>App_transaksi" class="btn btn-default form-control" style="border:2px solid #ccc">
                                            Lihat Riwayat Transaksi
                                        </a >
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Rincian Submit -->

                        </div>
                        <!-- End Of Box Rincian -->

                    </div>
                    <!-- End Of cart rincian -->

                </div>
                <!-- End Of Row Transaction -->

            </div>
        </div>
        <!-- End Of Content Cart -->

    </div>
    <!-- End Of Container Content -->
</div>
<div class="shadow"></div>
</div>



<?php
$id_transaksi = $row_transaksi['id_transaksi'];
$ajax = uniqid(); //Agar bagus aja wkwkwk, padahal mah gak pengaru nilainya 
?>

<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="<?= $token_clientKey_midtrans ?>"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        var btn_submit_transaksi = $('#btn_submit_transaksi');
        btn_submit_transaksi.on('click', function(e) {
            // Lakukan Ajax Untuk Get Token Snap transaksi Di Interface controller
            $.ajax({
                url : '<?= base_url() ?>' + 'Pembayaran/get_token',
                type : 'POST',
                data : { id_transaksi : '<?= $id_transaksi ?>', transaksi_submit_ajax : '<?= $ajax ?>' },
                error : function() {
                    alert('Error Request');
                },
                success : function( response ) {
                    console.log('Sukses request ke Midtrans untuk token snap dengan token :' + response);
                    // alert( response );
                    let token_snap_transaction  = response;
                    window.snap.pay( token_snap_transaction );

                }
            })



        });
    });
</script>









