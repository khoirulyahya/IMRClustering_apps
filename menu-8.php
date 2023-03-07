<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
<!-- NAVBAR START! -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <!-- JUDUL WEBSITE & LOGO START! -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <a class="navbar-brand" href="admin.php">
      <img src="img/Bootstrap.png" width="30" height="30">
      Aplikasi Pemetaan Tingkat Kematian Bayi
    </a>
  </nav>
  <!-- JUDUL WEBSITE & LOGO END! -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php
    $uri = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    ?>
    <ul class="navbar-nav mx-auto">
      <li class="nav-item <?=($uri == 'admin') ? 'active' : ''?>">
        <a class="nav-link" href="admin.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown <?=(in_array($uri, array('admin-datadesa','admin-datavariabel'))) ? 'active' : ''?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item <?=($uri == 'admin-datadesa') ? 'active' : ''?>" href="admin-datadesa.php">Data Desa</a>
          <a class="dropdown-item <?=($uri == 'admin-datavariabel') ? 'active' : ''?>" href="admin-datavariabel.php">Data Variabel</a>
        </div>
      </li>
      <li class="nav-item <?=($uri == 'admin-perhitungan') ? 'active' : ''?>">
        <a class="nav-link" href="admin-perhitungan.php">Perhitungan</a>
      </li>
      <li class="nav-item <?=($uri == 'admin-hasil') ? 'active' : ''?>">
        <a class="nav-link" href="admin-hasil.php">Hasil Clustering</a>
      </li>
      <li class="nav-item <?=($uri == 'laporan') ? 'active' : ''?>">
        <a href="laporan.php" class="nav-link" target="_blank">Unduh
          <img src="img/icon/folder.png" width="20" height="20"></a> 
        </li>

      </ul>
      <ul class="navbar-nav mx-auto">
        <li class="nav-item dropdown <?=(in_array($uri, array('admin-tampil','registrasi','logout'))) ? 'active' : ''?>">
          <a class="nav-link dropdown-toggle navbar-text mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i>
            ADMIN
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item <?=($uri == 'admin-tampil') ? 'active' : ''?>" href="admin-tampil.php">Profile Admin</a>
            <a href="" data-toggle="modal" data-target="#registrasi" class="dropdown-item btn btn-outline-light mr-3">+ Tambah Admin</a>
            <a href="" data-toggle="modal" data-target="#logout" class="dropdown-item btn btn-outline-light mr-3"><img src="img/icon/user2.png" width="20" height="20">Logout</a>
          </div>
        </li>
      </ul>
        <!-- <a class="navbar-text mr-3" href="admin-tampil.php"> <i class="fas fa-users"></i>
          ADMIN
        </a>
        <a href="" data-toggle="modal" data-target="#registrasi" class="btn btn-outline-light bg-success mr-3">+ Tambah Admin</a>
        <a href="" data-toggle="modal" data-target="#logout" class="btn btn-outline-light bg-danger mr-3"><img src="img/icon/user2.png" width="20" height="20">Logout</a> -->
      </div>
      <!-- Modal Form Register-->
      <div class="modal fade" id="registrasi" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">+ Tambah Admin   </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="registrasi-act.php">
                <div class="form-group" align="left">
                  <label for="nama"><i class="fas fa-address-card"></i> Nama Lengkap </label>
                  <input type="text" class="form-control" placeholder="ketikkan nama lengkap anda" name="nama" autocomplete="off" required pattern="[a-zA-Z\s]*">
                </div>
                <div class="form-group" align="left">
                  <label for="email"><i class="fas fa-at"></i> Email </label>
                  <input type="email" class="form-control" placeholder="ketikkan email anda" name="email" autocomplete="off" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                </div>
                <div class="form-group" align="left">
                  <label for="username"><i class="fas fa-user"></i> Username </label>
                  <input type="text" class="form-control" placeholder="ketikkan username anda" name="username" autocomplete="off" required>
                </div>

                <div class="form-group" align="left">
                  <label for="password"><i class="fas fa-key"></i> Password </label>
                  <input type="password" class="form-control" placeholder="ketikkan password anda" name="password"required>
                </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_admin" value="<?=@$admin['id_admin']?>">
                <button id="nologin" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <!-- <a id="modal-login-button" href="admin.php" class="btn btn-success">Login</a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Form Register END -->

    <!-- Modal Form Logout-->
    <div class="modal fade" id="logout" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Logout  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4><center>Apakah anda yakin ingin logout, <?=$_SESSION['username']?>?</center></h4>
          </div>
          <div class="modal-footer">
            <button id="nologout" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
            <a id="modal-logout-button" href="logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Form Delete END -->
  </nav>
  <!-- NAVBAR END! -->
