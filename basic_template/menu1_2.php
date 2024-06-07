<link rel="stylesheet" type="text/css" href="<?=base_url() ?>asset/balans_asset/css/menu1.css">


<!-- Section Header -->
<section class="section_header">
	<div class="container">
		<div class="row row_content">
			<div class="col-sm">
				<p class="sub_title"> Teknologi </p>
				<h1 class="title"> 
					MENU 1.2
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
				<img src="<?=base_url() ?>asset/balans_asset/gam/banner1.jpg">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->

<!-- Section Artikel -->
<section class="section_article" id="section_about">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="title_section"> Fitur Cashlink Transfer </h1>
			</div>
		</div>
		<div class="row row_content justify-content-center">
			<div class="col-sm-7 mb-2 text-center">
				<p class="content_artikel">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				</p>
			</div>
			<div class="col-sm-8" style="padding: 0;">
				<img src="<?=base_url() ?>asset/balans_asset/gam/artikel.png" style="width: 100%;height: 493px;">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Artikel -->



<!-- Section Grid -->
<section class="section_grid">
	<div class="container">		

		<?php for ($i=0; $i < 4; $i++) { ?>
			<div class="row row_content row_grid">
				<div class="col-sm-6 content_img">
					<img src="<?=base_url() ?>asset/balans_asset/gam/grid.png">
				</div>
				<div class="col-sm content_text">
					<p class="sub_title"> Sudah Terpercaya Sejak Lama </p>
					<h1 class="title"> 
						Judul
					</h1>
					<p class="text_content"> 
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
					</p>
				</div>
			</div>
		<?php } ?>
	</div>
</section> 	
<!-- End Of Section Grid -->


<!-- Section box -->
<section class="section_box style2">
	<div class="container">
		<div class="row row_header justify-content-center">
			<div class="col-12">
				<h1 class="title_section"> Beragam fitur untuk kemudahan menghasilkan laporan secara instan </h1>
			</div>
		</div>

		<div class="row row_content">

			<?php for ($i=0; $i < 3; $i++) { ?>
				<div class="col-sm-4 col_box">
					<div class="card" style="border:none">
						<img src="<?=base_url() ?>asset/balans_asset/gam/sbx<?=$i+1?>" class="logo_icon">
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
<!-- End Of Section box -->


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






