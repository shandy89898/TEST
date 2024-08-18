
<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu1.css">


<!-- Section Header -->
<section class="section_header">
	<div class="container">
		<div class="row row_content">
			<div class="col-sm">
				<p class="sub_title"> Teknologi </p>
				<h1 class="title"> 
					MENU 1.1
				</h1>
				<p class="text_content"> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				</p>
				<div class="container-fluid">
					<div class="row">
						<button class="btn btn-default btn_dark">
							<i class="fab fa-whatsapp"></i>
							Whatsapp Sales
						</button>
						<button class="btn btn-default ml-3 btn_light">
							Coba Gratis
						</button>
					</div>
				</div>
			</div>
			<div class="col-sm-6 content_img">
				<img src="<?=base_url()?>asset/balans_asset/gam/banner1.jpg" style="width: 100%;">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->


<!-- Section box Performance -->
<section class="section_box style1" id="section_performance">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Mengapa bisnis menggunakan Laporan Keuangan & Bisnis Balans </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 3; $i++) {?>
				<div class="col-sm col_pm">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/pm1.png">
						<p class="title_artikel"> Laporan terupdate secara real-time </p>
						<p class="content_artikel"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
					</div>
				</div>
			<?php } ?>


		</div>
	</div>
</section> 	
<!-- End Of Section box Performance -->



<!-- Section slide fitur akses slide -->
<section class="section_slide style1" id="section_fitur_akses">
	<div class="container">
		<div class="row row_header justify-content-center">
			<div class="col-12">
				<h1 class="title_section"> Keputusan lebih akurat dengan aplikasi keuangan perusahaan </h1>
			</div>
			<div class="col-sm-6">
				<div class="container-fluid">
					<div class="row row_indicator">
						<?php foreach ($data_indicator as $key => $row_indicator){?>
							<div class="col indicator_col" data-idTarget-slide = "<?=$key?>">
								<?= $row_indicator['title_indicator'] ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div> 
		<div class="row row_content">
			<div class="col-12 container_slide">
				<!-- Loop data - my_slide -->
				<?php foreach ($data_indicator as $key => $row_indicator) {?>
					<div class="container-fluid my_slide" id="<?=$key?>">
						<div class="row">
							<div class="col-sm slide_text">
								<h5 class="font-weight-bolder">
									<?= $row_indicator['title'] ?>
								</h5>
								<p class="cpr"> 
									<?= $row_indicator['content'] ?>
								</p>

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
												<?= $list; ?>
											</div>
										</div>
									<?php } ?>
									<!-- End Of Loop Data Row List -->
								</div>
							</div>
							<div class="col-sm slide_img">
								<img src="<?=base_url()?>asset/balans_asset/gam/img_banner.png">
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- End Of Loop data - my_slide -->
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section slide fitur akses -->


<!-- Section box fitur keuangan -->
<section class="section_box style2" id="section_fitur_keuangan">
	<div class="container">
		<div class="row row_header justify-content-center">
			<div class="col-12">
				<h1 class="title_section"> Beragam fitur untuk kemudahan menghasilkan laporan secara instan </h1>
			</div>
		</div>

		<div class="row row_content">

			<?php for ($i=0; $i < 6; $i++) { ?>
				<div class="col-sm-4 col_box">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/sbx<?=$i+1?>" class="logo_icon">
						<p class="title_artikel"> Fitur <?= $i ?> </p>
						<p class="content_artikel"> 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
						</p>

					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section> 	
<!-- End Of Section box fitur keuangan -->


<!-- Section profile  -->
<section class="section_profile" id="card_profile">
	<div class="container">

		<div class="row row_content justify-content-center">
			<div class="col-sm-7 container_card">
				<div class="card">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-5 card_img">
								<img src="<?=base_url()?>asset/balans_asset/gam/co_founder.jpg">
							</div>
							<div class="col-sm card_quote">
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
					</div>

				</div>
			</div>
		</div>


	</div>

</section> 	
<!-- End Of Section Profile  -->


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



