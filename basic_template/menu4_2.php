<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu3.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu4.css">


<!-- Section Header -->
<section class="section_header">
	<div class="container">
		<div class="row row_content">
			<div class="col-sm">
				<p class="sub_title"> Testi Klien </p>
				<h1 class="title"> 
					MENU 4.2
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
				<img src="<?=base_url()?>asset/balans_asset/gam/partner.png">
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->

<!-- Section Label -->
<section class="section_label" id="section_label_2">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<h3 class="title">
					Berbagai usaha yang telah berkembang bersama Mekari Jurnal
				</h3>
				<p class="mt-3 mb-4"> 
					Pelajari bagaimana Mekari Jurnal telah memudahkan para pelaku di berbagai level usaha
				</p>

				<div style="display: flex;justify-content: center;">
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
	</div>
</section>
<!-- End Of Section Label -->



<!-- Section profile - Testi  -->
<section class="section_profile grid" id="testi_grid">
	<div class="container">
		<div class="row row_content justify-content-center">



			<!-- Container Card -->
			<div class="col-md-12 container_card card_full pr-4">
				<div class="card">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-5 card_img bg-secondary">
								<div class="frame">
									<img src="<?=base_url()?>asset/balans_asset/gam/co_founder.jpg">
								</div>
							</div>
							<div class="col-sm card_quote">
								<p>
									“Accounting defines your business. Fitur rekonsiliasi & import bank statement yang terintegrasi dengan bank ternama sangat membantu. Tidak ada transaksi yang tidak diketahui oleh akunting.”
								</p>
								<div class="box_role">
									<p class="font-weight-bolder"> 
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
			<!-- End Of Container Card -->

			<?php for ($i=0; $i < 2; $i++) { ?>
				<!-- Container Card -->
				<div class="col-md-6 container_card pr-4">
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
				<!-- End Of Container Card -->
			<?php } ?>
		</div>
	</div>
</section> 	
<!-- End Of Section Profile - Testi -->

<!-- Section box artikel klien -->
<section class="section_artikel section_box style1" id="section_artikel_klien">
	<div class="container-fluid">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Cerita Mekari Jurnal
				di berbagai industri </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 7; $i++) {?>
				<div class="col-sm-4 col_pm">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/artikel_klien.jpg">

						<div class="card_body">
							<div class="container-fluid mt-3">
								<div class="row">
									<div class="col-1 icon_le">
										<img src="<?=base_url()?>asset/balans_asset/gam/cofee.png">
									</div>
									<div class="col">
										<h4 class="title"> 
											Judul
										</h4>
									</div>
								</div>
							</div>
							<p class="text_content text_flow_multi3 mb-1"> 
								"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. 
							</p>

							<div class="box_role">
								<p class="title_artikel"> 
									Aam Sulistiono
								</p>
								<p class="content_artikel"> 
									Co-founder & Chief Partnership and <br> Strategic Officer
								</p>
								<img src="<?=base_url()?>asset/balans_asset/gam/logo2.png" style="width: 150px;">
							</div>	
							
						</div>

					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section> 	
<!-- End Of Section box artikel klien -->



