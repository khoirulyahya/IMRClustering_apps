<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
	<title>Tutorial Bootstrap 4 - www.malasngoding.com</title> 
</head> 
<body> 
	<?php
	include "menu-8.php";
	?>
	<div class="container">
		
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">
			<h2><center>Tentang<br></center></h2>
			</div>
			<form method="post" action="data-tentang-act.php">
				<textarea type="text" id="summernote" placeholder="test" name="textarea"></textarea>
				<input type="hidden" name="id" value="<?=@$id['id']?>">
				<button type="submit" name="simpan" class="btn btn-primary">Update</button>
				<a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
				</form>
				<div class="col-lg-12"><br></div>
				

				
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr class="nw">
							<th>Tentang</th>
							<th><center>Aksi</center></th>
						</tr>
					</thead>

					<tbody>
						<?php
						include 'koneksi.php';
						$desa = mysqli_query($koneksi, 'SELECT * FROM tb_tentang ');
						$no = 1;
						foreach($desa as $key => $val){
							?>

							<tr>
								<td><?=$val['tentang']?></td>
								<td><center>
									<div class="btn-group">
										<a href="#summernote?id=<?=$val['id']?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
										<a href="data-tentang-act.php?id=<?=$val['id']?>&act=hapus" class="btn btn-danger"><i class="fas fa-trash"></i></a>
									</div>
								</center>
							</td>
						</tr>

						<?php
						$no++;
					}
					?>

				</tbody>
			</table>

			</div>



	<?php
	include "footer.php";
	?>
<!-- penghubung js bootstrap -->
	<script src="src/js/jquery.min.js"></script>
	<script src="src/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
				    $(document).ready(function() {
				        $('#summernote').summernote();
				    });
				  </script>
</body> 
</html>