<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
  <title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
</head> 
<body> 
	<?php
	include "menu-5.php";
	include 'hitung_kmeans4.php';
	?>
	

	<div style="background-image:url(img/kia.jpg); background-repeat: no-repeat; background-size: cover; height: calc(100vh - 66px);">
	<!-- Tampil Data -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="container-fluid col-lg-10">
				<h2 class="card-title"><center>Data Kesehatan Ibu & Anak (KIA) <br>Kecamatan Ngemplak, Tahun 2020</center></h2>
				<div class="card-group">
					<div class="card-header">
						
						<table class="table table-striped table-bordered bg-white">
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
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End Tampil Data -->
	<hr><br><!-- Pemisah element -->
	<!-- Tampil Data Ringkasan -->
	<div class="container-fluid col-lg-10">
<div class="row">
  <div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Desa</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum0." Desa";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus Premature</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum4." Kasus";?>  </center></p>
    </div>
  </div>
  
</div>
<!-- ganti kolom -->
<div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kelahiran Hidup</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum1." Kelahiran";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus Komplikasi Persalinan</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum5." Kasus";?>  </center></p>
    </div>
  </div>
  
</div>
<!-- ganti kolom -->
<div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kematian Bayi</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum2." Kasus";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus BBLR</center></h5>
      <hr>
      <p class="card-title"><center> <?php echo $sum3." Kasus";?>  </center></p>
    </div>
  </div>
  
</div>
<!-- Akhir Kolom -->
<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
	<div class="col-lg-12"><br></div>
</div>
</div>
</div>
	<!-- End Tampil Data Ringkasan -->

	

	<?php
	include "footer.php";
	?>
<!-- penghubung js bootstrap -->
	<script src="src/js/jquery.min.js"></script>
	<script src="src/js/bootstrap.bundle.min.js"></script>
</body> 
</html>