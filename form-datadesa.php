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

		include "koneksi.php";

	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">

				<div class="card">
					<div class="card-body">
						<h1>Tambah Data Desa</h1>
						<br>
						<form method="post" action="data-desa-act.php">
							<div class="form-group row">
								<label class="col-lg-4">Nama Kelurahan/Desa</label>
								<div class="col-lg-8">
									<select name="data_pasien" id="nama_desa" class="form-control" required>
								      		<option value="">- Pilih Kelurahan/Desa -</option>
								      		<?php
								      		$sql_pasien = mysqli_query($con, "SELECT * FROM tb_desa") or die (mysqli_error($con));
								      		while($data_pasien = mysqli_fetch_array($sql_pasien)) {
								      			echo '<option>22</option>';
								      		} ?>		
								     </select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Latitude</label>
								<div class="col-lg-8">
									<input type="number" name="latitude" class="form-control" value="<?=@$desa['latitude']?>" placeholder="Masukan latitude kelurahan/desa . . .">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4">Longitude</label>
								<div class="col-lg-8">
									<input type="number" name="longitude" class="form-control" value="<?=@$desa['longitude']?>" placeholder="Masukan longitude kelurahan/desa . . .">
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