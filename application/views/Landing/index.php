


<!-- Section Banner -->
<section id="section_banner" style="position: relative;padding: 0!important;margin-top: 0;">
	<img src="<?=base_url()?>asset/balans_asset/gam/img_banner.jpg" class="bg_banner">
	<div class="content">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-sm-7 box_text">
					<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<p> Software Akutansi Mutakhir </p>
								<h1 class="title"> 
									Balance
									<br> 
									Software
								</h1>
								<!-- 	<button class="btn btn-success btn_page mt-3 btn_banner">
									Scroll Me <i class="fab fa-whatsapp"></i>
								</button> -->
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

</section>	
<!-- End Of Section Banner -->


<!-- Section About -->
<section class="section_article" id="section_about">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="title_section"> About Us </h1>
			</div>
		</div>
		<div class="row row_content">
			<div class="col-sm">
				<p class="sub_title"> Sudah Terpercaya Sejak Lama </p>
				<h1 class="title"> 
					Judul
				</h1>
				<p class="text_content"> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				</p>
			</div>
			<div class="col-sm-6 content_img">
				<img src="<?=base_url()?>asset/balans_asset/gam/logo2.png" style="width: 100%;">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section About -->



<!-- Section Ads -->
<section id="section_ads">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h5> Balance banyak dipercaya oleh perusahaan besar </h5>
			</div>
		</div>
		<div class="row row_content">
			<div class="col-12">

				<!-- Marquee Container -->
				<div class="marquee_container">
					<div class="marquee">
						<div class="container-fluid">
							<div class="row" style="height: 100%;">
								<?php for ($i=0; $i < 5; $i++) { ?>
									<div class="col" style="height:100%">
										<img src="<?=base_url()?>asset/balans_asset/gam/logo.png">
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<!-- End Of Marquee Contaiener -->

			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Ads -->


<!-- Section fitur slide -->
<section class="section_slide" id="section_fitur">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="title_section"> Software akuntansi untuk segala kebutuhan </h1>
			</div>
		</div> 

		<div class="row row_indicator">
			<?php foreach ($data_indicator as $key => $row_indicator){?>
				<div class="col indicator_col" data-idTarget-slide = "<?=$key?>">
					<?= $row_indicator['title_indicator'] ?>
				</div>
			<?php } ?>
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
<!-- End Of Section fitur slide -->


<!-- Section Reason -->
<section id="section_reason" style="background: none;">
	<div class="container">
		<div class="row row_content">
			<!-- Col Reason -->
			<div class="col-md-6 col_reason">
				<div class="container-fluid">
					<div class="row row_header">
						<div class="col-12 text-left">
							<h1 class="title_section"> Mengapa Balance ? </h1>
						</div>
					</div>
					<div class="row">
						<?php for ($i=0; $i < 4; $i++) {?>
							<div class="col-sm-6 box_reason">
								<div class="card" style="width: 100%;">
									<img class="icon_reason" src="<?=base_url()?>asset/balans_asset/gam/i<?=$i+1;?>.png">
									<div class="card-body">
										<h5 class="card-title">Card title</h5>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- End Of Col Reason -->
			<!-- Col Reason Thumb -->
			<div class="col-md col_reason_thumb">
				<img src="<?=base_url()?>asset/balans_asset/gam/apps_rev.png">
			</div>
			<!-- End Of Col Reason Thumb -->

			
		</div>
	</div>
</section> 	
<!-- End Of Section Reason -->

<!-- Section industri slide -->
<section class="section_slide" id="section_industri">
	<div class="container">
		<div class="row row_header">
			<div class="col-12 text-left">
				<h1 class="title_section"> Dukungan dari Mekari Jurnal untuk
				kembangkan berbagai industri </h1>
			</div>
		</div> 

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
<!-- End Of Section industri slide -->


<!-- Section FAQ -->
<section class="section_faq" style="background: none;">
	<div class="container">
		<!-- Row Content -->
		<div class="row row_content">
			<!-- Col Desc -->
			<div class="col-sm-6 col_desc">
				<h1 class="title_section"> Apa itu software akuntansi online? </h1>
				<p>
					Software akuntansi online adalah perangkat lunak untuk mencatat, mengolah, menampilkan data transaksi akuntansi bisnis untuk memberikan solusi bagi perusahaan terkait pembukuan, laporan keuangan, invoice dan neraca keuangan secara online serta real-time.
				</p>
				<p>
					Mekari Jurnal menjadi solusi untuk perusahaan dalam mengelola keuangan secara menyeluruh dari satu software mulai dari akuntansi, operasional keuangan, inventori & gudang dan perencanaan & analisa keuangan.
				</p>
				<div class="content_btn">
					<button class="btn btn-default btn_dark">
						<i class="fab fa-whatsapp"></i>
						Whatsapp Sales
					</button>
					<button class="btn btn-default ml-3 btn_light">
						Coba Gratis
					</button>
				</div>
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





