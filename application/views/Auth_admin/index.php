
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
						Login Admin 
					</h1>
					<p>
						Masuk menggunakan akun admin kamu
					</p>
				</div>

				<form action="<?= base_url()?>Auth_admin/login" method="post">

					<div class="form-group">
						<label for="user"> User atau Email : </label>
						<input class="form-control" type="text" name="user" placeholder="Masukkan username admin kamu">
					</div>

					<div class="form-group">
						<label for="password"> Password : </label>
						<input class="form-control" type="text" name="password" placeholder="Masukkan password kamu">
					</div>

					<div class="form-group text-right">
						<button class="btn btn-secondary">
							Login 
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

