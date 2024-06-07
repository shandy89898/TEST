

<div class="col-sm content_prime">
    <!-- Container content -->
    <div class="container-fluid container_content">

        <div class="row">

            <!-- Header Content -->
            <div class="col-12 header_content">
                <div class="container-fluid">
                    <div class="row" style="position: relative;">
                        <h4> Dashboard </h4>
                    </div>
                </div>
            </div>
            <!-- End Of Header Content -->
        </div>

        <div class="row row_card">


            <div class="col-md-3 col_card">
                <div class="card">
                    <div class="card-body">

                        <button data-target="detail_pengeluaran" class="btn btn-default btn_corner">
                            <i class="fas fa-share"></i>
                            <p> Detail </p>
                        </button>

                        <div class="card_icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <p class="title_card"> Total Pengeluaran </p>
                        <h3 class="value_card">
                            Rp 200.000
                        </h3>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col_card">
                <div class="card">
                    <div class="card-body">

                        <button data-target="detail_transaksi"  class="btn btn-default btn_corner">
                            <i class="fas fa-share"></i>
                            <p> Detail </p>
                        </button>

                        <div class="card_icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <p class="title_card"> Total Transaksi </p>
                        <h3 class="value_card">
                            20 Transaksi
                        </h3>

                    </div>
                </div>
            </div>


            <div class="col-md-3 col_card">
                <div class="card">
                    <div class="card-body">

                        <button data-target="detail_keranjang" class="btn btn-default btn_corner">
                            <i class="fas fa-share"></i>
                            <p> Detail </p>
                        </button>
                        <div class="card_icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <p class="title_card"> Total Keranjang </p>
                        <h3 class="value_card">
                            20 Produk
                        </h3>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col_card">
                <div class="card">
                    <div class="card-body">
                        <button data-target="detail_kupon" class="btn btn-default btn_corner">
                            <i class="fas fa-share"></i>
                            <p> Detail </p>
                        </button>
                        <div class="card_icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <p class="title_card"> Total Kupon </p>
                        <h3 class="value_card">
                            20 Produk
                        </h3>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="container_detail">


                    <button class="btn btn-default btn_corner">
                        <i class="fas fa-times"></i>
                    </button>

                    <section class="section_detail active" id="detail_pengeluaran">
                        <h1> Detail Pengeluaran </h1>
                    </section>

                    <section class="section_detail" id="detail_keranjang">
                        <h1> Detail Keranjang </h1>
                    </section>

                    <section class="section_detail" id="detail_transaksi">
                        <h1> Detail Transaksi </h1>
                    </section>

                    <section class="section_detail" id="detail_kupon">
                        <h1> Detail Kupon </h1>
                    </section>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- End Of Container content -->


    <div class="shadow"></div>
</div>





<script type="text/javascript">
    $(function(e) {
        $('.col_card .btn_corner').on('click', function(e) {
            var btn_corner = $(this);
            var data_target = btn_corner.attr('data-target');

            // Hilangkan semua section detail yg aktif
            var section_detail =$('.section_detail');
            section_detail.removeClass('active');

            // Munculkan aktif yang section detail target dengan relasi id
            var section_detail_target = section_detail.filter('#'+ data_target);
            section_detail_target.addClass('active'); 


            // Jika responsive hilanguntuk container detail, maka munculkannya sebagai modal
            var container_detail = $('.container_detail');
            if ( container_detail.is(':visible') == false ) {
                container_detail.show();
            }   

        });
        $('.container_detail .btn_corner').click(function(e) {
            $('.container_detail').hide();
        });
    });
</script>



