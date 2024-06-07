
<!-- Sidebar Cart -->
<div class="sidebar sidebar_right" style="display: none;">
	<div class="content_sidebar">
		<button class="btn btn-default btn_close">
			<i class="fas fa-times"></i>
		</button>
		<!-- container header -->
		<div class="container-fluid container_header">
			<div class="row row_header">
				<div class="col-12 text-left">
					<h4> 
						Cart
					</h4>
				</div>
			</div>
		</div>
		<!-- End Of container header -->

		<!-- Container Sidebar menu data -->
		<script type="text/javascript">
			$(function(e) {
				$('.container_menu_data').find('.row_menu').eq(0).find('.header_menu_data').addClass('active');
			});
		</script>
		<div class="container-fluid container_menu_data">

			<?php for ($i=0; $i < 5; $i++) { ?>
				<!-- Row Menu -->
				<div class="row row_menu bg-danger">


				</div>
				<!-- End Of Row Data Menu -->

			<?php  } ?>
		</div>
		<!-- End Of Container menu data -->

	</div>
	<!-- End Of Content Sidebar -->

</div>
<!-- End Of Sidebar -->


</div>
<!-- End Of Row  -->

</div>
<!-- End Of Container fluid sidebar -->


<script type="text/javascript">

</script>

</body>
</html>
