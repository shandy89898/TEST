<style type="text/css">
footer{
	padding-top: 30px;
}
footer .logo img{
	width: 100%;
	height: 100px;
}
footer > div > .row{
	border-bottom: 2px solid #000;
	padding-bottom: 20px;
}
.col_list .title_list{
	margin-bottom: 20px;
	font-weight: bolder;
}
.col_list a{
	width: 100%;
	display: block;
	margin-bottom: 15px;
	text-decoration: none;
	color: #000;
}
.row_socmed .logo img{
	display: inline-block;
	width: 25px;
	height: 25px;
	margin-right: 10px;
}
</style>



<!-- Section Foot -->
<section class="section_foot">
	<div class="container">
		<!-- Row Content -->
		<div class="row row_content row_box">
			<!-- Col thumb -->
			<div class="col-sm-7 col_foot_thumb">
				<img src="<?= base_url() ?>asset/balans_asset/gam/logo.png">
				<h1 class="title_section">
					Waktunya untuk fokus pada pertumbuhan bisnis Anda
				</h1>
				<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>				
			</div>
			<!--End Of Col thumb -->

			<!-- Col foot btn -->
			<div class="col-sm col_foot_btn">
				<div style="position:absolute;top: 50%;transform: translateY(-50%);">
					<button class="btn btn-default btn_dark">
						<i class="fab fa-whatsapp"></i>
						Whatsapp Sales
					</button>
					<button class="btn btn-default btn_light">
						Coba Gratis
					</button>
				</div>
			</div>
			<!-- End Of Col foot btn -->

			<!-- Col support -->
			<div class="col-12 col_support">
				<div class="box_support">
					<div class="container-fluid">
						<div class="row row_support">
							<?php for ($i=0; $i < 3; $i++) {?>
								<div class="col-sm col_box_support">
									<img src="<?= base_url() ?>asset/balans_asset/gam/s1.png" class="logo_support">
									<h5 class="title_support"> Training Gratis </h5>
									<p> Bantuan implementasi hingga training tanpa biaya tambahan </p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- End Of Col support -->
		</div>
		<!-- End Of Row Content -->
	</div>
</section> 	
<!-- End Of Section Foot -->
<footer>

	<div class="container-fluid">
		<div class="row row_logo">
			<div class="col-3 logo">
				<img src="<?= base_url() ?>asset/balans_asset/gam/logo2.png">
			</div>
			<?php for ($i=0; $i < 4; $i++) {?>
				<div class="col-2 col_list">
					<h5 class="title_list"> Tentang </h5>
					<a href=""> List Balance </a>
					<a href=""> List Balance </a>
					<a href=""> List Balance </a>
				</div>
			<?php } ?>
		</div>
		<div class="row row_socmed mt-5">
			<div class="col-3 logo">
				<?php for ($i=0; $i < 5; $i++) { ?>
					<img src="<?= base_url() ?>asset/balans_asset/gam/tw.png">
				<?php } ?>
			</div>
			<div class="col">
				<div class="container-fluid">
					<?php for ($i=0; $i < 5; $i++) {?>
						<div class="row mb-3">
							<div class="col-2 daerah">
								Jakarta
							</div>
							<div class="col">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</footer>


<script type="text/javascript">
	$(document).ready(function(e) {
		var title = "<?= $nama_fitur ?>";
		var sub_title = "<?= $nama_jenis_fitur ?>";	
		var section_header = $('.section_header');
		section_header.find('.title').text(title);
		section_header.find('.sub_title').text(sub_title);
	});
</script>

</body>
</html>