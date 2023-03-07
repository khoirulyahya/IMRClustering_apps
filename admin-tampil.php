
<!doctype html> 
	<html> 
	<head> 
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- penghubung css bootstrap -->
		<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
		<title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
		<style type="text/css">

		</style>
	</head> 
	<body> 
		<?php
		include "menu-8.php";
		include 'koneksi.php';
		?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12"><br></div>
				
				<div class="col-lg-12">

					<div class="card-group col-lg-12">
						<div class="card-header col-lg-12">
							<h1>Data Admin</h1>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrasi">
								+ Tambah Data
							</button><br>
							<!-- Modal Form Update-->
							<div class="modal fade" id="admin-update" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">+ Update Admin   </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post" action="registrasi-act.php">
												<div class="form-group" align="left">
													<label for="nama"><i class="fas fa-address-card"></i> Nama Lengkap </label>
													<input type="text" class="form-control" id="modal-update-input-nama" placeholder="ketikkan nama lengkap anda" name="nama" autocomplete="off" required pattern="[a-zA-Z\s]*">
												</div>
												<div class="form-group" align="left">
													<label for="email"><i class="fas fa-at"></i> Email </label>
													<input type="email" class="form-control" id="modal-update-input-email" placeholder="ketikkan email anda" name="email" autocomplete="off" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
												</div>
												<div class="form-group" align="left">
													<label for="username"><i class="fas fa-user"></i> Username </label>
													<input type="text" class="form-control" id="modal-update-input-username" placeholder="ketikkan username anda" name="username" autocomplete="off" required>
												</div>
												<div class="form-group" align="left">
													<label for="password"><i class="fas fa-key"></i> Password </label>
													<input type="password" class="form-control" id="modal-update-input-password" placeholder="ketikkan password anda" name="password" required>
												</div>
											</div>
											<div class="modal-footer">
												<input type="hidden" name="id_admin" id="modal-update-id_admin" value="">
												<button id="nologin" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
												<button type="submit" name="submit" class="btn btn-success">Update</button>
												<!-- <a id="modal-login-button" href="admin.php" class="btn btn-success">Login</a> -->
											</div>
										</form>
									</div>
								</div>
							</div>
						
						<!-- Modal Form Update END -->
						<br>
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th><center>No</center></th>
									<th><center>Nama Lengkap</center></th>
									<th><center>Email</center></th>
									<th><center>Username</center></th>
									<th><center>Password</center></th>
									<th><center>Aksi</center></th>

								</tr>
							</thead>

							<tbody>
								<?php

								$desa = mysqli_query($koneksi, 'SELECT * FROM admin');
								$no = 1;
								foreach($desa as $key => $val){
									?>

									<tr>
										<td><center><?=$no?></center></td>
										<td><?=$val['nama']?></td>
										<td><center><?=$val['email']?></center></td>
										<td><center><?=$val['username']?></center></td>
										<td><center><?=$val['password']?></center></td>
										<td><center>
											<div class="btn-group">
												<a href="#" class="btn btn-primary button-edit-modal" data-toggle="modal" data-target="#admin-update" data-nama="<?=$val['nama']?>" data-email="<?=$val['email']?>" data-username="<?=$val['username']?>" data-password="<?=$val['password']?>" data-id_admin="<?=$val['id_admin']?>"><i class="fas fa-edit"></i></a>
												<a href="#" class="btn btn-danger button-hapus-modal" data-toggle="modal" data-target="#delete" data-nama="<?=$val['nama']?>" data-id_admin="<?=$val['id_admin']?>"><i class="fas fa-trash"></i></a>
											</div>
										</center>
									</td>
								</tr>

								<?php
								$no++;
							}
							?>


							<!-- Modal Form Delete-->
							<div class="modal fade" id="delete" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data 	</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<h4><center>Apakah anda yakin ingin menghapus data <span id="modal-delete-nama"></span>?</center></h4>
										</div>
										<div class="modal-footer">
											<button id="nodelete" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
											<a id="modal-delete-button" href="" class="btn btn-danger">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal Form Delete END -->
						</tbody>
					</table>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include "footer.php";
?>
<!-- penghubung js bootstrap -->
<script src="src/js/jquery.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>
<script>
	$(document).ready(function() {
		$('.button-edit-modal').click(function (event) {

			const nama = $(this).data("nama");
			$('#modal-update-input-nama').val(nama);
			const email = $(this).data("email");
			$('#modal-update-input-email').val(email);
			const username = $(this).data("username");
			$('#modal-update-input-username').val(username);
			const password = $(this).data("password");
			$('#modal-update-input-password').val(password);
			const id_admin = $(this).data("id_admin");
			$('#modal-update-id_admin').val(id_admin);


		})
		$('.button-hapus-modal').click(function (event) {

			const nama = $(this).data("nama");
			$('#modal-delete-nama').html(nama);
			const id_admin = $(this).data("id_admin");
			$('#modal-delete-button').attr('href', 'registrasi-act.php?id_admin='+id_admin+'&act=hapus')


		})
	});
</script>
</body> 
</html>