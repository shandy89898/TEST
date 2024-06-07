
<!-- Page Login dan Sign Account -->
<div class="box_auth">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-6 container_auth">
				<button class="btn btn-default btn_icon">
					<i class="fas fa-info"></i>
				</button>
				<div class="title_login">
					<h1>
						Auth Code  
					</h1>
					<p>
						Masukkan kode verifikasi yang di kirim ke akun kamu !
					</p>
				</div>

				<form action="" method="post">


					<div class="box_code">

						<div class="col_input">
							<input type="text">
						</div>
						<div class="col_input">
							<input type="text">
						</div>
						<div class="col_input">
							<input type="text">
						</div>
						<div class="col_input">
							<input type="text">
						</div>
						
					</div>

					<div class="footer_form text-center">
						<button class="btn btn-secondary">
							Submit Kode
						</button>
						<br><br>
						<a href="">
							Belum Menerima Kode?? Kirim Ulang
						</a>
					</div>

				</form>



			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {

		var input_code = $('.col_input input'); 
		input_code.val("");
		input_code.prop('readonly', true);
		input_code.attr('maxlength', '1');
		input_code.attr('type', 'number');
		input_code.attr('name', 'kode[]');
		input_code.first().focus();
		input_code.on('keydown', function( event ) {
			var input = $(this);


			var col_input = input.parent('.col_input');
			var nilai_tombol = event.key;
			if ( nilai_tombol === "Backspace" ) {
				// Jika tombol karakter backspace atau tombol hapus di tekan

				// Isi nilai tombol ke input yang sedang di tekan dengan nilai kosong, karena dihapus
				input.val( "" );

				//Buat target input jadi sebelumnya
				var col_input_target = col_input.prev();
			}else{
				// Jika tombol bukan karakter backspace 
				if ( isInteger( nilai_tombol ) == false ) {
					return false;
				}

				// Isi nilai tombol ke input yang sedang di tekan dengan nilai ka
				input.val( nilai_tombol );



				//Buat target input jadi selanjutnya
				var col_input_target = col_input.next();


			}
			col_input_target = col_input_target.filter('.col_input');
			var input_target = col_input_target.find('input');
			input_target.focus();
		});


	});

	function isInteger(value) {
		// Convert the input value to a number and check if it's an integer
		return /^\d+$/.test(value);
	}
</script>
