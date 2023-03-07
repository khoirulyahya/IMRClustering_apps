<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
	<title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
</head> 
<body> 
	<?php
	include "menu-8.php";

	$id_desa = '';
	if(@$_GET['id_desa']){
		$id_desa = $_GET['id_desa'];

		include "koneksi.php";
		$desa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_desa WHERE id_desa = '".$id_desa."'"));
	}
	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h1>Tambah Data Variabel</h1>
						<br>
						<form method="post" action="data-desa-act.php">
							<div class="form-group row">
								<label class="col-lg-4">Nama Kelurahan/Desa</label>
								<div class="col-lg-8">
									<input type="text" name="nama_desa" class="form-control" value="<?=@$desa['nama_desa']?>" placeholder="Masukan nama kelurahan/desa . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Jumlah Kelahiran Hidup</label>
								<div class="col-lg-8">
									<input type="number" name="latitude" class="form-control" value="<?=@$desa['latitude']?>" placeholder="Masukan jumlah kasus kelahiran hidup dalam setahun . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Jumlah Kematian Bayi</label>
								<div class="col-lg-8">
									<input type="number" name="longitude" class="form-control" value="<?=@$desa['longitude']?>" placeholder="Masukan jumlah kasus kematian bayi dalam setahun . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Jumlah Kasus BBLR</label>
								<div class="col-lg-8">
									<input type="number" name="latitude" class="form-control" value="<?=@$desa['latitude']?>" placeholder="Masukan jumlah kasus BBLR dalam setahun . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Jumlah Kasus Premature</label>
								<div class="col-lg-8">
									<input type="number" name="longitude" class="form-control" value="<?=@$desa['longitude']?>" placeholder="Masukan jumlah kasus premature dalam setahun . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Jumlah Kasus Komplikasi Persalinan</label>
								<div class="col-lg-8">
									<input type="number" name="longitude" class="form-control" value="<?=@$desa['longitude']?>" placeholder="Masukan jumlah kasus komplikasi persalinan dalam setahun . . .">
								</div>
							</div>
							<br><br>
							<div class="form-group row justify-content-end align-items-center">
								<input type="hidden" name="id_desa" value="<?=@$desa['id_desa']?>">
								<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
								<a href="admin-datadesa.php" class="btn btn-danger">Batal</a>
							</div>
						</form>
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
</body> 
</html>