
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/balans_asset/css/transaksi.css">

<div class="col-sm content_prime">
	<!-- Semua content yang primer elemennya berdasarkan didalam sini -->
	<div class="container-fluid container_content">

		<div class="row">

			<div class="col-sm-6">

				<div class="img_indicator">
					<?php foreach ($data_produk_gambar as $row_produk_gambar): ?>
						<img src="<?= $this->Base_model->get_imgProduk( $row_produk_gambar ) ?>">
					<?php endforeach ?>
				</div>
				<div class="img_frame">
					<img alt="Your Image Product">
				</div>

			</div>
			<div class="col-sm col_product_info">

				<div class="product_name">
					<h3> <?= $row_produk['nama_produk'] ?> </h3>
				</div>

				<div class="product_price">
					<h1> Rp <?= number_format($row_produk['harga_jual']) ?> </h1>
				</div>

				<div class="product_description">
					<p class="text_flow_multi3">
						<?= 
						$row_produk['deskripsi_produk'];
						?>

					</p>
				</div>

				<div class="product_button">
					<div class="container-fluid">
						<div class="row">

							<!-- 							<div class="col-sm" style="padding: 0;">
								<div class="indicator_cart">
									<div class="indicator_box">
										<button type="button" class="btn btn-primary" id="btn_plus_indicator">
											<i class="fas fa-plus"></i>
										</button>
										<input type="text" name="qty" class="indicator_input" value="0" placeholder="QTY">
										<button type="button" class="btn btn-primary" id="btn_minus_indicator">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
							</div> -->
							
							<div class="col-sm">
								<a href="<?= base_url() ?>App_keranjang/tambah_item_keranjang/<?= $row_produk['id_produk'] ?>" class="btn btn-secondary btn_order">
									Add To Cart <i class="fas fa-shopping-bag"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="product_info">

					<div class="text_info">  
						<span> SKU : </span> 1132131
					</div class="text_info">
					<div class="text_info">  
						<span> Categories : </span> Application, Service
					</div class="text_info">
					<style type="text/css">
					.link_share *{
						font-size: 30px;
					}
					.link_share button{
						padding: 5px;
					}
				</style>
				<div class="text_info ml-3">  
					<span> Share : </span> 
					<a href="https://whatsapp.com" class="link_share">
						<button class="btn btn-default">
							<i class="fab fa-whatsapp"></i>
						</button>
					</a>
					<a href="https://facebook.com" class="link_share">
						<button class="btn btn-default">
							<i class="fab fa-facebook"></i>
						</button>
					</a>
				</div class="text_info">

			</div>





		</div>

	</div>

</div>
<div class="shadow"></div>
</div>

<script type="text/javascript">

	$(function(e) {
		img_frame_src();
		$('.img_indicator img').on('click', function(e) {

			//Menghilangkan yang sedang aktif
			var img_indicator_active = $('.img_indicator img');
			img_indicator_active.removeClass('active');

			//Menambahkan yang aktif yang sedabg di klik
			var img_indicator_target = $(this);
			img_indicator_target.addClass('active');


			img_frame_src();

		});
		$('.img_indicator').find('img').first().click();
		
	});
	function img_frame_src() {
		//Yang di frame menampilkan gambar yang sedang aktif
		var img_indicator_active = $('.img_indicator img').filter('.active');
		var img_src = img_indicator_active.attr('src');
		//Implementasikan ke frame 
		var img_frame = $('.img_frame img ');
		img_frame.attr('src', img_src);
	}


</script>
