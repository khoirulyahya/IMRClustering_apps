<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG7FscIk67I9yY_fiyLc7-_1Aoyerf96E&callback=initialize"></script>
	<script src="app.js"></script>
</head> 
<body> 
	<?php
	include "menu-8.php";
	include 'hitung_kmeans4.php';
	?>
	<h2 class="card-body"><center>Peta Wilayah Tingkat Kematian Bayi<br>
		Di Kecamatan Ngemplak, Boyolali Tahun 2020</center></h2>
		<hr class="my-0">

		<div class="card-body">
			<!-- elemen untuk menampilkan peta -->
			<div class="col-lg-12 col-md-12" id="map-canvas" style="height: 550px;">

			</div>
			<!-- elemen untuk menampilkan peta -->
		</div>
<hr class="my-2">
  <!-- Pemisah Element bosqu -->
  <!-- Tampil Desa by Status -->
<div class="container-fluid">
<h3><center>Daftar Wilayah Tingkat Kematian Bayi<br>
  Di Kecamatan Ngemplak, Boyolali</center></h3><br>
<div class="row">
<div class="col-lg-4 p-2 mb-2 bg-danger text-white">
  <center><h4>Status Cluster Tinggi</h4></center>
  <table class="table table-striped table-bordered bg-white">
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

</div>
<div class="col-lg-4 p-2 mb-2 bg-warning text-dark">
  <center><h4>Status Cluster Sedang</h4></center>
  <table class="table table-striped table-bordered bg-white">
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

</div>
<div class="col-lg-4 p-2 mb-2 bg-success text-white">
  <center><h4>Status Cluster Rendah</h4></center>
  <table class="table table-striped table-bordered bg-white">
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

</div>

</div>
<!-- Akhir Tampil by Status -->
<br>
<br>
<br>
	<?php
	include "footer.php";
	?>
<!-- penghubung js bootstrap -->
	<!-- <script src="src/js/jquery.min.js"></script> -->
	<script src="src/js/bootstrap.bundle.min.js"></script>
</body> 
</html>