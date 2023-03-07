
	<!-- NAVBAR START! -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
<!-- JUDUL WEBSITE & LOGO START! -->
		<nav class="navbar navbar-expand-lg navbar-dark">

			<a class="navbar-brand" href="index.php">
				<img src="img/Bootstrap.png" width="30" height="30">
				-Means Clustering
			</a>
		</nav>
<!-- JUDUL WEBSITE & LOGO END! -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php
		$uri = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		?>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?=($uri == 'index') ? 'active' : ''?>">
					<a class="nav-link" href="index.php">				
					Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item <?=($uri == 'user-datadesa') ? 'active' : ''?>">
					<a class="nav-link" href="user-datadesa.php">Data Desa</a>
				</li>
				<li class="nav-item <?=($uri == 'user-tentang') ? 'active' : ''?>">
					<a class="nav-link" href="user-tentang.php">Tentang</a>
				</li>
				</ul>
				<a href="laporan.php" class="btn btn-outline-dark btn-warning mr-3" target="_blank">Unduh
				<img src="img/icon/folder.png" width="20" height="20"></a> 
				<a href="" data-toggle="modal" data-target="#login" class="btn btn-outline-light btn-success mr-3">Login
				<img src="img/icon/login1.png" width="20" height="20"></a> 
		</div>
		<!-- Modal Form Login-->
		<div class="modal fade" id="login" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				
				<?php 
				 
				include 'koneksi.php';
				 
				error_reporting(0);
				 
				session_start();
				 
				if (isset($_SESSION['username'])) {
				    header("Location: admin.php");
				}
				 
				if (isset($_POST['login'])) {
				    $email = $_POST['username'];
				    $password = md5($_POST['password']);
				 
				    $sql = "SELECT * FROM admin WHERE username='$email' AND password='$password' OR email='$email' AND password='$password'";
				    $result = mysqli_query($koneksi, $sql);
				    if ($result->num_rows > 0) {
				        $row = mysqli_fetch_assoc($result);
				        $_SESSION['username'] = $row['username'];
				        header("Location: admin.php");
				    } else {
				        echo "<script>alert('Username/email atau password Anda salah. Silahkan coba lagi!')</script>";
				    }
				}
				 
				?>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Login 	</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="">
							<div class="form-group" align="left">
								<label for="username"><i class="fas fa-user"></i> Username or email</label>
								<input type="text" class="form-control" id="username" placeholder="ketikkan username anda" name="username" required value="<?php echo $email ?>">
							</div>
							<div class="form-group" align="left">
								<label for="password"><i class="fas fa-key"></i> Password </label>
								<input type="password" class="form-control" id="password" placeholder="ketikkan password anda" name="password"required>
							</div>
						</div>
					<div class="modal-footer">
						<button id="nologin" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
						<button type="submit" name="login" class="btn btn-success">Login</button>
						<!-- <a id="modal-login-button" href="admin.php" class="btn btn-success">Login</a> -->
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal Form Login END -->
	</div>
	</nav>
<!-- NAVBAR END! -->
