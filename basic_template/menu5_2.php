<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/balans_asset/css/menu5.css">


<!-- Section Header -->
<section class="section_header">


	<div class="container">
		<div class="row row_content justify-content-center">
			<div class="col-sm-6 text-center">
				<p class="sub_title"> Teknologi </p>
				<h1 class="title"> 
					SERTIFIKAT
				</h1>
				<p class="text_content"> 
					Pelatihan gratis, tanpa biaya tambahan
				</p>
			</div>
		</div>
	</div>
</section> 	
<!-- End Of Section Header -->



<!-- Section Content Sidebar -->
<section class="section_sidebar">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<div class="sidebar_col">

					<form>
						<?php for ($i=0; $i < 3; $i++) { ?>
							<div class="form-row">
								<div class="col-1 pt-1">
									<input type="radio" name="" id="<?= $i ?>">
								</div>
								<div class="col">
									<label for="<?=$i?>" style="margin-top: 0;"> Akuntansi dan keuangan </label>
								</div>
							</div>
						<?php } ?>
					</form>
					
				</div>

			</div>
			<div class="col">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">



						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>


	
</section>
<!-- End Of Section Content Sidebar -->




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






