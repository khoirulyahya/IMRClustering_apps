<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
</head> 
<body> 
	<?php
	include "menu-8.php";
	include 'koneksi.php';
	include "normalisasi.php";
	?>

	<div class="container-fluid"> 
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">
				
				<div class="card-group">
					<div class="card-header col-lg-12">
						<h1 class="card-title">Data Hasil Normalisasi</h1>
						<br>
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th><center>No</center></th>
									<th><center>Kelurahan/Desa</center></th>
									<th><center>Angka Kematian Bayi (IMR)</center></th>
									<th><center>Variabel Kasus BBLR</center></th>
									<th><center>Variabel Kasus Premature</center></th>
									<th><center>Variabel Kasus Komplikasi Persalinan</center></th>
									
								</tr>
							</thead>

							<tbody>
								<?php
								include 'koneksi.php';
								$desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa');
								
								$no = 1;
								foreach($desa as $key => $val){
									?>

									<tr>
										<td><center><?=$no?></center></td>
										<td><?=$val['nama_desa']?></td>
										<td><center><?=$val['var_nAKB']?></center></td>
										<td><center><?=$val['var_nBBLR']?></center></td>
										<td><center><?=$val['var_npremature']?></center></td>
										<td><center><?=$val['var_nKP']?></center></td>
										
									</tr>

									<?php
									$no++;
								}
							?>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="container-fluid">
		<?php include 'hitung_kmeans1.php';?>
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">
				<div class="card-group">
					<div class="card-header col-lg-12">
						<h1 class="card-title">Perhitungan K-Means</h1>
						<br>
						<h3 class="card-title">Pusat Cluster Awal</h3>
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th><center>Centroid</center></th>
									<th><center>Fitur 1</center></th>
									<th><center>Fitur 2</center></th>
									<th><center>Fitur 3</center></th>
									<th><center>Fitur 4</center></th>

									
								</tr>
							</thead>

							<tbody>
								<?php
								// include 'koneksi.php';
								// $desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa');
								
								// $no = 1;
								// foreach($desa as $key => $val){
									?>

									<tr>
										<td><center>1</center></td>
										<td><center><?php echo "<pre>"; print_r($centro1[0][0]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro1[0][1]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro1[0][2]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro1[0][3]); echo "</pre>";?></center></td>
									</tr>
									<tr>
										<td><center>2</center></td>
										<td><center><?php echo "<pre>"; print_r($centro2[0][0]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro2[0][1]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro2[0][2]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro2[0][3]); echo "</pre>";?></center></td>
									</tr>
									<tr>
										<td><center>3</center></td>
										<td><center><?php echo "<pre>"; print_r($centro3[0][0]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro3[0][1]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro3[0][2]); echo "</pre>";?></center></td>
										<td><center><?php echo "<pre>"; print_r($centro3[0][3]); echo "</pre>";?></center></td>
									</tr>
									
									<?php
									// $no++;
								// }
							?>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">
				<div class="card-group">
					<div class="card-header col-lg-12">
						<h3 class="card-title">Jarak Data</h3>
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th rowspan="2"><center>Data ke-</center></th>
									<th colspan="3"><center>Jarak ke Centroid</center></th>
									<th rowspan="2"><center>Cluster diikuti</center></th>
								</tr>
								<tr>
									<th><center>C1</center></th>
									<th><center>C2</center></th>
									<th><center>C3</center></th>
									
								</tr>
								
							</thead>

							<tbody>
								<?php
								// include 'koneksi.php';
								// $desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa');
								
								// $no = 1;
								// $result=$mysqli->query($query);
								// while ($data=mysqli_fetch_assoc($result)){
								// for ($i=0; $i < $jumlahmahasiswa; $i++) {  
								// extract($data);

									?>

									<tr>
										<td><center>
											<?php 
											// echo $no."<br><hr>";
											// echo $no."<br><hr>";
											for ($i = 1; $i <= 12; $i++) {
												echo $i."<hr>";
											}
											for ($j = 1; $j <= 12; $j++) {
												echo $j."<hr>";
											}
											?>
											
										</center></td>
										<td><center><?php include 'hitung_kmeans.php';?></center></td>
										<td><center><?php include 'hitung_kmeans2.php';?></center></td>
										<td><center><?php include 'hitung_kmeans3.php';?></center></td>
										<td><center>
											<?php
											include 'koneksi.php';
											$desus = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi');

											// $no = 1;
											foreach($desus as $key => $vale) {?>
												<?= $vale['set_sementara']."<hr>"; ?>
												<?= $vale['set_sementara']."<hr>"; ?>
												<?php
											}
												?>
										</center></td>
									</tr>
									<tr>
										<td colspan="5"><center><?php echo "<h4>Proses perulangan berhasil dilakukan sebanyak $loop kali</h4>";?></center></td>
									</tr>
									<?php
									// $no++;
								// }
							?>
									
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>

	<?php
	include "footer.php";
	?>
<!-- penghubung js bootstrap -->
	<script src="src/js/jquery.min.js"></script>
	<script src="src/js/bootstrap.bundle.min.js"></script>
</body> 
</html>