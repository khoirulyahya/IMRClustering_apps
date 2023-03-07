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
  include 'hitung_kmeans4.php';
	?>
  <div class="card-body">
      <?php echo "<h1>Selamat Datang, " . $_SESSION['username'] ."!". "</h1>";?>
      <!-- <p class="card-title"><center> <h2>SELAMAT DATANG, ADMIN</h2>  </center></p> -->
    </div>
  
<!--Cards  -->
<!-- Model Rapi -->
<div class="container-fluid col-lg-10">
<div class="row">
  <div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Desa</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum0." Desa";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus Premature</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum4." Kasus";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-danger mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Desa Tingkat Kematian Bayi Tinggi</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum8." Desa";?>  </center></p>
    </div>
  </div>
</div>
<!-- ganti kolom -->
<div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kelahiran Hidup</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum1." Kelahiran";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus Komplikasi Persalinan</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum5." Kasus";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-warning mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Desa Tingkat Kematian Bayi Sedang</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum6." Desa";?>  </center></p>
    </div>
  </div>
</div>
<!-- ganti kolom -->
<div class="container-fluid col-lg-3">
  <div class="card text-white bg-info mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kematian Bayi</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum2." Kasus";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-secondary mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Kasus BBLR</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum3." Kasus";?>  </center></p>
    </div>
  </div>
  <div class="card text-white bg-success mb-5" style="max-width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><center>Jumlah Desa Tingkat Kematian Bayi Rendah</center></h5>
      <hr>
      <p class="card-title"><center> <?php   echo $sum7." Desa";?>  </center></p>
    </div>
  </div>
</div>
<!-- Akhir Kolom -->
</div>
</div>
<!-- Akhir Cards Model Rapi -->

  <br>
  <br>
  <br>

	<?php
	include "footer.php";
	?>

<!-- penghubung js bootstrap -->
	<script src="src/js/jquery.min.js"></script>
	<script src="src/js/bootstrap.bundle.min.js"></script>
</body> 
</html>