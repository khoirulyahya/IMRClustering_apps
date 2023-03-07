<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="src/css/bootstrap.min.css">

	<title><?php ?></title>
	<style type="text/css">
		@page {
			size: A4;
		}
	</style>
</head>
<body>
	<?php include 'hitung_kmeans4.php';?>
	<center><h4><b>Laporan Tingkat Kematian Bayi<br>Kecamatan Ngemplak, Boyolali<br>Tahun 2020</b></h4></center>
								
						<br>
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th><center>No</center></th>
									<th><center>Kelurahan/Desa</center></th>
									<th><center>Jumlah Kelahiran Hidup</center></th>
									<th><center>Jumlah Kematian Bayi</center></th>
									<th><center>Jumlah Kasus BBLR</center></th>
									<th><center>Jumlah Kasus Premature</center></th>
									<th><center>Jumlah Kasus Komplikasi Persalinan</center></th>
								</tr>
							</thead>

							<tbody>
								<?php
								include 'koneksi.php';
								$desa = mysqli_query($koneksi, 'SELECT * FROM tb_variabel RIGHT JOIN tb_desa ON tb_variabel.id_desa = tb_desa.id_desa');
								
								$no = 1;
								foreach($desa as $key => $val){
									?>

									<tr>
										<td><center><?=$no?></center></td>
										<td><?=$val['nama_desa']?></td>
										<td><center><?=$val['var_JKH']?></center></td>
										<td><center><?=$val['var_JKB']?></center></td>
										<td><center><?=$val['var_BBLR']?></center></td>
										<td><center><?=$val['var_premature']?></center></td>
										<td><center><?=$val['var_KP']?></center></td>
									</tr>
									
									<?php
									$no++;
								}
								?>
							</tbody>
							<tbody>
								<tr>
									<td colspan="2"><center>TOTAL</center></td>
									<!-- <td></td> -->
									<td><center><?=$sum1?></center></td>
									<td><center><?=$sum2?></center></td>
									<td><center><?=$sum3?></center></td>
									<td><center><?=$sum4?></center></td>
									<td><center><?=$sum5?></center></td>
								</tr>
							</tbody>
						</table>
	<table class="table table-striped table-bordered">
		<thead class="thead-dark">
			<tr>
				<!-- <th><center>No</center></th> -->
				<th><center>Jumlah Desa</center></th>
				<th><center>Jumlah Desa Tingkat Kematian Bayi Tinggi</center></th>
				<th><center>Jumlah Desa Tingkat Kematian Bayi Sedang</center></th>
				<th><center>Jumlah Desa Tingkat Kematian Bayi Rendah</center></th>
			</tr>
		</thead>

		<tbody>
			<?php

			$no = 1;
			?>

			<tr>
				<!-- <td><center><?=$no?></center></td> -->
				<td><center><?=$sum0." Desa"?></center></td>
				<td><center><?=$sum6." Desa"?></center></td>
				<td><center><?=$sum7." Desa"?></center></td>
				<td><center><?=$sum8." Desa"?></center></td>
			</tr>

			<?php
			$no++;
			?>
		</tbody>
	</table>
<!-- Tampil Desa by Status -->
<hr>
	<table class="table table-striped table-bordered">
		<thead class="thead-dark">
			<tr>
				<th colspan="2"><center><b>Status Tinggi</b></center></th>
				<th colspan="2"><center><b>Status Sedang</b></center></th>
				<th colspan="2"><center><b>Status Rendah</b></center></th>
			</tr>			
		</thead>

		<tbody>
			<tr>
				<th colspan="2">
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th><center>No</center></th>
							<th>Kelurahan/Desa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa WHERE set_sementara="C1" ');
						$no = 1;
						foreach($desa as $key => $val){
							?>

							<tr>
								<td><center><?=$no?></center></td>
								<td><?=$val['nama_desa']?></td>

							</tr>

							<?php
							$no++;
						}
						?>


					</tbody>
				</table>
				</th>
				<th colspan="2">
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th><center>No</center></th>
							<th>Kelurahan/Desa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa WHERE set_sementara="C3" ');
						$no = 1;
						foreach($desa as $key => $val){
							?>

							<tr>
								<td><center><?=$no?></center></td>
								<td><?=$val['nama_desa']?></td>
								
							</tr>
							
							<?php
							$no++;
						}
						?>
						
						
					</tbody>
				</table>
				</th>
				<th colspan="2">
				<table class="table table-bordered">
					<thead class="thead-dark">
						<tr>
							<th><center>No</center></th>
							<th>Kelurahan/Desa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'koneksi.php';
						$desa = mysqli_query($koneksi, 'SELECT * FROM tb_hasil_normalisasi RIGHT JOIN tb_desa ON tb_hasil_normalisasi.id_desa = tb_desa.id_desa WHERE set_sementara="C2" ');
						$no = 1;
						foreach($desa as $key => $val){
							?>

							<tr>
								<td><center><?=$no?></center></td>
								<td><?=$val['nama_desa']?></td>
								
							</tr>
							
							<?php
							$no++;
						}
						?>
						
						
					</tbody>
				</table>
				</th>
			</tr>			
			

			
		</tbody>
		
	</table>
<!-- Akhir Tampil by Status -->

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>