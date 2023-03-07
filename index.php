<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="src/css/bootstrap.min.css"> 
  <title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG7FscIk67I9yY_fiyLc7-_1Aoyerf96E&callback=initialize"></script>
  <script src="app.js"></script>
  <style type="text/css">
    .back-to-top {
    float: right;

    }
  </style>
</head> 
<body>
    <div id="top"> 
        <?php
          include "menu-5.php";
          include 'hitung_kmeans4.php';
          if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
              echo "Login gagal! username dan password salah!";
            }else if($_GET['pesan'] == "logout"){
              echo "Anda telah berhasil logout";
            }else if($_GET['pesan'] == "belum_login"){
              echo "Anda harus login untuk mengakses halaman admin";
            }
          }
        ?>
        <!-- Jumbotron -->
        <div class="jumbotron-fluid card-header" style="background-image:url(img/kia.jpg); background-repeat: no-repeat; background-size: cover; height: calc(100vh - 66px);">
          <div class="container-fluid">
            <h1 class="text-dark display-4"><p class="font-weight-bold"><br>PEMETAAN TINGKAT KEMATIAN BAYI <br> DI KECAMATAN NGEMPLAK, BOYOLALI</p></h1>
            <hr class="my-4">
              <div class="container-fluid row col-lg-8">
                <blockquote class="blockquote">
                      <p class="text-dark mb-0" style="text-indent: 30px;" class="text-justify">Angka Kematian Bayi (AKB) merupakan jumlah penduduk yang meninggal sebelum mencapai usia 1 tahun yang dinyatakan dalam 1.000 kelahiran hidup pada tahun yang sama. Angka tersebut yang akan menjadi indikator penilaian derajat kesehatan masyarakat. Angka Kematian Bayi (AKB) merupakan salah satu indikator dalam menentukan tingkat kesehatan masyarakat dan kesejahteraan suatu bangsa.</p><br>
                      <p class="text-dark mb-0" style="text-indent: 30px;" class="text-justify">Angka Kematian Bayi (AKB) di Indonesia tergolong masih tinggi dibandingkan negara ASEAN lainnya, yaitu 4,2 kali lebih tinggi dari Negara Malaysia, 1,2 kali lebih tinggi dari Negara Filipina dan 2,2 kali lebih tinggi dari Negara Thailand (Kementerian Kesehatan RI, 2013). Berdasarkan data Survei Demografi dan kesehatan Indonesia (SDKI) tahun 2017 menunjukan penurunan angka kematian bayi dari 35 per 1.000 KH tahun 2002 menjadi 24 per 1.000 KH tahun 2017.</p>
                </blockquote>
              </div>
              <a class="btn btn-primary btn-lg" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" data-toggle="tooltip" data-placement="right" title="Peta wilayah tingkat kematian bayi">LIHAT PETA!</a>
          </div>
        </div>

      <!-- <div style="background-image:url(img/kia.jpg); background-repeat: no-repeat; background-size: cover; height: calc(100vh - 66px);">
      -->
        <!-- <br> -->
        <div id="collapseExample">
          <h2 class="card-body bg-primary text-white"><center>Peta Wilayah Tingkat Kematian Bayi<br>
          Di Kecamatan Ngemplak, Boyolali Tahun 2020</center></h2>
          <div class="card-body">
            <!-- elemen untuk menampilkan peta -->
            <div class="col-lg-12 col-md-12" id="map-canvas" style="height: 580px;">
            </div>
            <!-- elemen untuk menampilkan peta -->
            <a class="btn btn-primary btn-md" href="#daftarwil" role="button" aria-expanded="false" aria-controls="collapseExample" data-toggle="tooltip" data-placement="right" title="Daftar wilayah tingkat kematian bayi">LIHAT DAFTAR!</a>
          </div>
        </div>
        
        
        <!-- Pemisah Element bosqu -->
        <!-- Tampil Desa by Status -->
        <div class="container-fluid bg-secondary card-header" id="daftarwil">
          <h3 class="text-white card-body"><center>Daftar Wilayah Tingkat Kematian Bayi<br>
            Di Kecamatan Ngemplak, Boyolali</center></h3>
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
            <div class="card-header">
              <a class="btn btn-light btn-lg float-right" href="#top" role="button" data-toggle="tooltip" data-placement="top" title="Back on top"><span class="fas fa-chevron-up"></span></a>
              <br>
              <br>
              <br>
              <br>
            </div>  
        </div>
      </div>
    </div>
    

    <?php
    include "footer.php";
    ?>
  <!-- penghubung js bootstrap -->
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    </script>
</body> 
</html>