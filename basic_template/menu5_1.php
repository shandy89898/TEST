<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu5.css">


<!-- Section Header -->
<section class="section_header">
	<div class="container">
		<div class="row row_content justify-content-center">
			<div class="col-sm-6 text-center">
				<p class="sub_title"> Teknologi </p>
				<h1 class="title"> 
					HARGA
				</h1>
				<p class="text_content"> 
					Pelatihan gratis, tanpa biaya tambahan
				</p>
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->


<!-- Section box - section harga  -->
<section class="section_box style1" id="section_harga">
	<div class="container">
		<div class="row row_content">
			<!-- Note : data_produk itu entitas -->
			<?php foreach ($data_produk as $key => $row_produk) { ?>
				<div class="col-sm col_pm">
					<div class="card">

						<!-- Card Body -->
						<div class="card_body">
							<h4 class="title_artikel"> <?= $row_produk['nama_produk'] ?> </h4>
							<p class="content_artikel text_flow_multi2"> 
								<?= $row_produk['deskripsi_produk']  ?>
							</p>
							<div class="box_req">
								<ul>
									<li> Bisnis Kebutuhan : </li>
									<li> Lorem ipsum dolor sit amet asdd fdsa. </li>
									<li> Lorem ipsum dolor sit amet asdd fdsa. </li>
									<li> Lorem ipsum dolor sit amet asdd fdsa. </li>
								</ul>
							</div>

							<div class="box_harga">
								<div class="sub_harga" style="position:relative;text-align: left;"> 
									Rp 20.000.000
									<div style="width: 30%;height: 2px;margin-top: -15px;margin-bottom: 20px;background: red;"></div>
								</div>
								<h3 class="harga">
									Rp <?= number_format( $row_produk['harga_produk']) ?>
									<span>
										/Bulan	
									</span>
								</h3>
								<p> *dibayar per tahun </p>
							</div>

							<button class="btn btn-default btn_dark mt-4">
								<i class="fab fa-whatsapp"></i>
								<span class="ml-2"> WhatsApp Sales </span>
							</button>
						</div>
						<!-- End Of Card Body -->

						<!-- Card Footer -->
						<div class="card_footer">
							<div class="container-fluid">
								<div class="row row_open_footer">
									<div class="col-sm-12" style="padding-left: 0;">
										<i class="fas fa-chevron-down btn_open_footer"></i>
										<p style="font-size: 18px; color: navy;font-weight: bolder;" class="mb-4"> Fitur utama paket <?= $row_produk['nama_produk']  ?> </p>
									</div>
								</div>
							</div>
							<div class="container-fluid container_list">
								<!-- Data produk fitur -->
								<?php
								// Key data_produkFitur didapatkan bukan dari database, tapi dari pembuatan algoritma yang di relasikan di back end menggunakan algoritma di controller 
								$data_produkFitur = $row_produk['data_produkFitur'];
								foreach ($data_produkFitur as $key => $row_produkFitur) {?>
									<div class="row mb-3">
										<div style="width: 20px;" class="text-center">
											<button class="btn btn-success text-center" style="width: 20px;height: 20px;border-radius: 50%;position: relative;">
												<i class="fas fa-check" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);"></i>
											</button>
										</div>
										<div class="col">
											<?= $row_produkFitur['nama_produkFitur']  ?>
										</div>
									</div>
								<?php } ?>
								<!-- End Of Data produk fitur -->


							</div>
						</div>
						<!-- End Of Card Footer -->

						
					</div>
				</div>
			<?php } ?>


		</div>
	</div>
</section> 	
<!-- End Of Section box - section harga  -->


<!-- Section box - section bonus  -->
<section class="section_box style1" id="section_bonus">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="title_section">
					Jaminan data dan bantuan implementasi gratis dari Mekari Jurnal
				</h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 3; $i++) {?>
				<div class="col-sm col_pm">
					<div class="card">
						<!-- Card Body -->
						<div class="card_body">
							<img src="<?=base_url()?>asset/balans_asset/gam/iso.png">
							<h4 class="title_artikel"> Judul </h4>
							<p class="text_flow_multi2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>

						</div>
						<!-- End Of Card Body -->


						
					</div>
				</div>
			<?php } ?>


		</div>
	</div>
</section> 	
<!-- End Of Section box - section bonus  -->

<!-- Section slide -->
<section class="section_slide" id="section_slide_katalog">
	<div class="container">

		<div class="row row_indicator">
			<?php foreach ($data_indicator as $key => $row_indicator){?>
				<div class="col indicator_col" data-idTarget-slide = "<?=$key?>">
					<?= $row_indicator['title_indicator'] ?>
				</div>
			<?php } ?>
		</div>
		<div class="row row_content row_box">
			<div class="col-12 container_slide">
				<!-- Loop data - my_slide -->
				<?php foreach ($data_indicator as $key => $row_indicator) {?>
					<div class="container-fluid my_slide" id="<?=$key?>">
						<div class="row">
							<!-- Slide Text -->
							<div class="col-sm slide_text pt-5">
								<h5 class="font-weight-bolder mb-5">
									<?= $row_indicator['title'] ?>
								</h5>

								<div class="container-fluid list_item">
									<!-- Loop Data Row List -->
									<?php 
									$list_item = $row_indicator['list_item'];
									foreach ($list_item as $key => $list){
										?>
										<div class="row row_list">
											<div class="col-1 col_icon">
												<div class="icon_check">
													<i class="fas fa-check"></i>
												</div>
											</div>
											<div class="col col_text">
												<h5 class="title font-weight-bolder mb-2">
													<?= $list; ?>
												</h5>
												<p class="text_flow_multi2">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor incididunt ut labore et dolore magna aliqua.
												</p>
											</div>
										</div>
									<?php } ?>
									<!-- End Of Loop Data Row List -->
								</div>
							</div>
							<!-- End Of Slide Text -->

							<!-- Slide Img -->
							<div class="col-sm slide_img" style="padding-right: 0;">
								<img src="<?=base_url()?>asset/balans_asset/gam/co_founder2.jpg">
								<div class="cover">
									<p class="content_artikel">
										“Accounting defines your business. Fitur rekonsiliasi & import bank statement yang terintegrasi dengan bank ternama sangat membantu. Tidak ada transaksi yang tidak diketahui oleh akunting.”
									</p>
									<div class="box_role">
										<p class="title_artikel"> 
											Aam Sulistiono
										</p>
										<p class="content_artikel"> 
											Co-founder & Chief Partnership and <br> Strategic Officer
										</p>
										<img src="<?=base_url()?>asset/balans_asset/gam/logo.png">
									</div>	
								</div>
							</div>
							<!-- End Of Slide Img -->

						</div>
					</div>
				<?php } ?>
				<!-- End Of Loop data - my_slide -->
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section slide -->


<!-- Section box - section add  -->
<section class="section_box style1" id="section_add">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="title_section">
					Rekomendasi add-ons
				</h1>
			</div>
		</div>
		<div class="row row_content justify-content-center">
			<?php for ($i=0; $i < 3; $i++) {?>
				<div class="col-sm-6 col_pm mb-3">
					<div class="card">
						<!-- Card Body -->
						<div class="card_body">
							<div class="container-fluid mb-3">
								<div class="row">
									<div class="col-1 text-center" style="padding-left:0;">
										<img src="<?=base_url()?>asset/balans_asset/gam/iso.png" style="width: 40px;height: 40px;">
									</div>
									<div class="col" style="padding-left:10px"> 
										<h4 class="title_artikel" style="margin-top: 5px;margin-bottom: 0;"> Judul </h4>
									</div>
								</div>
							</div>

							<p class="text_flow_multi2 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>

						</div>
						<!-- End Of Card Body -->


						
					</div>
				</div>
			<?php } ?>


		</div>
	</div>
</section> 	
<!-- End Of Section box - section add  -->



<!-- Section FAQ -->
<section class="section_faq" style="background: none;">
	<div class="container">
		<!-- Row Content -->
		<div class="row row_content">
			<!-- Col Desc -->
			<div class="col-sm-6 col_desc">
				<h1 class="title_section"> Frequently Asked Questions (FAQ) </h1>
			</div>
			<!-- End Of Col Desc -->
			<!-- Col Faq -->
			<div class="col-sm col_faq">
				<!-- Box Faq - Loop -->
				<?php for ($j=0; $j < 3; $j++) { ?>
					<div class="box_faq">
						<!-- Header Faq -->	

						<div class="header_faq">
							Apa manfaat dari produk sistem akuntansi online ?

							<button class="btn btn-default btn_headerFaq">
								<i class="fas fa-chevron-right open"></i>
								<i class="fas fa-times close"></i>
							</button>
						</div>
						<!-- End Of Header Faq -->
						<!-- Body Faq -->
						<div class="body_faq">
							<p> Ada 5 manfaat besar dari menggunakan software akuntansi online, antara lain: </p>
							<?php for ($i=0; $i < 2; $i++) { ?>
								<p> <?=$i?> Memudahkan pekerjaan pemilik usaha: software ini bermanfaat untuk membantu pemilik usaha atau perusahaan. </p>
							<?php } ?>
						</div>
						<!-- End Of Body Faq -->

					</div>
				<?php } ?>
				<!-- End Of Box Faq - Loop -->

			</div>
			<!-- End Of Col Faq -->
		</div>
		<!-- End Of Row Content -->
	</div>
</section> 	
<!-- End Of Section FAQ -->

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.row_open_footer').on('click', function(e) {
			var container_list = $('.container_list');
			if ( container_list.is(':visible') == false ) {
				//Jika hilang, maka munculkan listnya
				container_list.fadeIn();
			}else{
				//Jika muncul, maka hilangkan listnya
				container_list.hide();
			}
		});
	});
</script>




