<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu4.css">



<!-- Section Slide Show -->
<section class="section_header section_slideshow" id="slideshow_header">
	
	<div class="row row_content" style="margin-right: 0;">
		<!-- col slide img -->
		<div class="col-sm-12 col_slideimg">
			<div id="slideshow1" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php 
					for ($i=1; $i < 3; $i++) { ?>
						<div class="carousel-item">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-7 col_slidethumb">
										<img src="<?=base_url()?>asset/balans_asset/gam/artikel_banner.jpg" alt="...">
									</div>
									<div class="col-sm col_slidecontent">
										<!-- Melayang -->
										<div class="content_fly">
											<p class="sub_title"> PAST EVENT </p>
											<h2 class="title"> 
												SLIDE <?= $i  ?>
											</h2>
											<p class="text_content text_flow_multi3 mb-1"> 
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. 
											</p>
											<a href="">
												Pelajari Selengkapnya
											</a>
										</div>

										<div class="penulis">
											<p class="sub_title">
												BY 
												<b style="color:#000">
													SHANDY
												</b>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- end of col slide img -->
		<div class="col-sm col_stepIndicator">



			
		</div>

	</div>
</section>
<!-- End Of Section Slide Show -->


<!-- Section box artikel blog -->
<section class="section_artikel section_box style1" id="section_artikel_blog">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Artikel Terbaru </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 7; $i++) {?>
				<div class="col-sm-6 col_pm">
					<div class="card">

						<img src="<?=base_url()?>asset/balans_asset/gam/artikel_banner.jpg">
						<div class="sub_title"> 
							<div class="penulis">
								<p class="sub_title">
									BY 
									<b style="color:#000">
										SHANDY
									</b>
								</p>
							</div>
							PAST EVENT 
						</div>
						<h3 class="title"> 
							ARTIKEL <?= $i  ?>
						</h3>
						<p class="text_content text_flow_multi3 mb-1"> 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. 
						</p>
						<a href="">
							Pelajari Selengkapnya
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section> 	
<!-- End Of Section box artikel blog -->

<!-- Section box artikel publikasi -->
<section class="section_artikel section_box style1" id="section_artikel_publikasi">
	<div class="container">
		<div class="row row_header">
			<div class="col-12">
				<h1 class="judul_section"> Publikasi </h1>
			</div>
		</div>
		<div class="row row_content">
			<?php for ($i=0; $i < 7; $i++) {?>
				<div class="col-sm-4 col_pm">
					<div class="card">
						<img src="<?=base_url()?>asset/balans_asset/gam/buku.jpg">
						<h3 class="title"> 
							SLIDE <?= $i  ?>
						</h3>
						<p class="text_content text_flow_multi3 mb-1"> 
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. 
						</p>
						<a href="">
							Pelajari Selengkapnya
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section> 	
<!-- End Of Section box artikel publikasi -->

<script type="text/javascript">
	$(function(e) {
		$('#slideshow1').carousel({
			interval: 1000
		});
		$('#slideshow1 .carousel-item').first().addClass('active');

	});
</script>




