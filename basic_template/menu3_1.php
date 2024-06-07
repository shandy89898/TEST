<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu3.css">


<!-- Section Header -->
<section class="section_header">
	<div class="container">
		<div class="row row_content">
			<div class="col-sm">
				<p class="sub_title"> Partnership </p>
				<h1 class="title"> 
					MENU 3.1
				</h1>
				<p class="text_content"> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				</p>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-7" style="padding:0">
							<button class="form-control btn btn-default btn_dark">
								<i class="fab fa-whatsapp"></i>
								Daftar Partnership Program
							</button>
						</div>

					</div>
				</div>
			</div>
			<div class="col-sm-6 content_img">
				<img src="<?=base_url()?>asset/balans_asset/gam/partner.png">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->

<!-- Section Label -->
<section class="section_label" id="section_label_first">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<div class="container-fluid">
					<div class="row">

						<div class="col-sm box_label">
							<img src="<?=base_url()?>asset/balans_asset/gam/lamp.svg">
							<h3 class="title_label"> 35.000+ </h3>	
							<p> Klien </p>	
							<hr>
						</div>
						<div class="col-sm box_label">
							<img src="<?=base_url()?>asset/balans_asset/gam/user.svg">
							<h3 class="title_label"> 1000.000+ </h3>	
							<p> Pengguna </p>	
							<hr>
						</div>
						<div class="col-sm box_label">
							<img src="<?=base_url()?>asset/balans_asset/gam/rp.svg">
							<h3 class="title_label"> 9+ Triliun </h3>	
							<p> Transaksi </p>	
							<hr>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Of Section Label -->

<!-- Section box manfaat -->
<section class="section_box style1" id="section_manfaat">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Beragam Manfaat Menjadi Partner </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 3; $i++) {?>
				<div class="col-sm col_pm">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/lamp2.svg">
						<p class="title_artikel"> Judul Manfaat </p>
						<p class="content_artikel"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. </p>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section> 	
<!-- End Of Section box manfaat -->



<!-- Section box program -->
<section class="section_box style1" id="section_program">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Beragam program Menjadi Partner </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 3; $i++) {?>
				<div class="col-sm col_pm">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/program.jpg">
						<p class="title_artikel"> Judul program </p>
						<p class="content_artikel">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat, Duis aute irure dolor in.
						</p>

						<a href="" class="mt-3">
							Pelajari Lebih Lanjut
							<span>
								<i class="fas fa-arrow-right"></i>
							</span>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row justify-content-center row_btn">
			<div class="col-sm-6 text-center">
				<p>
					
					Bingung memilih produk yang cocok untuk kemitraan?
				</p>
				<button class="mt-2 btn btn-default btn_dark" style="padding:10px;">
					<i class="fab fa-whatsapp"></i>
					<span>
						Konsultasi dengan advisor 
					</span>
				</button>
			</div>

		</div>
	</div>
</section> 	
<!-- End Of Section box program -->



<!-- Section box fitur saas -->
<section class="section_box style2" id="section_fitur_saas">
	<div class="container">
		<div class="row row_header justify-content-center">
			<div class="col-12">
				<h1 class="title_section"> Referensikan produk SaaS terbaik di Indonesia </h1>
			</div>
		</div>

		<div class="row row_content">

			<?php for ($i=0; $i < 8; $i++) { ?>
				<div class="col-sm-3 col_box">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/talenta.svg" class="logo_icon">
						<p class="title_artikel"> SaaS <?= $i +1 ?></p>
						<p class="content_artikel"> 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
						</p>

					</div>
				</div>
			<?php } ?>
		</div>
		<div class="row justify-content-center row_btn">
			<div class="col-sm-6 text-center">
				<p>

					Bingung memilih produk yang cocok untuk kemitraan?
				</p>
				<button class="mt-2 btn btn-default btn_dark" style="padding:10px;">
					<i class="fab fa-whatsapp"></i>
					<span>
						Konsultasi dengan advisor 
					</span>
				</button>
			</div>



		</div>
	</div>
</section> 	
<!-- End Of Section box fitur saas -->


<!-- Section profile - Testi  -->
<section class="section_profile grid" id="card_testi_ekonomi">
	<div class="container">
		<div class="row row_header">
			<div class="col-sm-12">
				<h1 class="title_section"> Bersama Kembangkan Ekonomi </h1>
			</div>
		</div>

		<div class="row row_content justify-content-center">
			<?php for ($i=0; $i < 2; $i++) { ?>
				<div class="col-md-6 container_card pr-2">
					<div class="card">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-4 card_img bg-secondary">
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
			<?php } ?>
		</div>


	</div>

</section> 	
<!-- End Of Section Profile - Testi -->

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






