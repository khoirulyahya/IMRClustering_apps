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
	include "index-akb.php";
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12"><br></div>
			<div class="col-lg-12">
				
				<div class="card-group">
					<div class="card-header">
						<h1 class="card-title">Data Variabel Tingkat Kematian Bayi</h1>
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
									<th><center>Aksi</center></th>
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
										<td>
											<div class="btn-group">
												<a href="#" class="btn btn-primary button-edit-modal" data-toggle="modal" data-target="#form-update" 
												data-idvariabel="<?=$val['id_variabel']?>" 
												data-nama="<?=$val['nama_desa']?>" 
												data-iddesa="<?=$val['id_desa']?>" 
												data-var_jkh="<?=$val['var_JKH']?>" 
												data-var_jkb="<?=$val['var_JKB']?>" 
												data-var_bblr="<?=$val['var_BBLR']?>" 
												data-var_premature="<?=$val['var_premature']?>" 
												data-var_kp="<?=$val['var_KP']?>">
												<i class="fas fa-edit"></i></a>
												<!-- <a href="#" class="btn btn-danger button-hapus-modal" data-toggle="modal" data-target="#delete" data-nama="<?=$val['nama_desa']?>" data-idkoordinat="<?=$val['id_variabel']?>"><i class="fas fa-trash"></i></a> -->
											</div>
										</td>
									</tr>

									<?php
									$no++;
								}
							?>
							<!-- Modal Form Update-->
									<div class="modal fade" id="form-update" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Desa <span id="modal-delete-nama"></span></h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<form method="post" action="data-variabel-act.php" role="form">
									      	<div class="form-group row">
									      		<label class="col-lg-5 col-md-5">ID Kelurahan/Desa</label>
									      		<div class="col-lg-7">
									      			<input readonly="" type="text" name="nama_desa" id="modal-update-input-nama" class="form-control" value="" placeholder="Masukan nama kelurahan/desa . . .">
									      		</div>
									      	</div>
									      	<div class="form-group row">
								      		<label class="col-lg-5 col-md-5">Jumlah Kelahiran Hidup</label>
								      		<div class="col-lg-7">
								      			<input type="number" name="var_JKH" id="modal-update-input-var_JKH" class="form-control" value="" placeholder="Masukan jumlah kasus kelahiran hidup dalam setahun . . ." required>
								      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-5 col-md-5">Jumlah Kematian Bayi</label>
									      		<div class="col-lg-7">
									      			<input type="number" name="var_JKB" id="modal-update-input-var_JKB" class="form-control" value="" placeholder="Masukan jumlah kasus kematian bayi dalam setahun . . ." required>
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-5 col-md-5">Jumlah Kasus BBLR</label>
									      		<div class="col-lg-7">
									      			<input type="number" name="var_BBLR" id="modal-update-input-var_BBLR" class="form-control" value="" placeholder="Masukan jumlah kasus BBLR dalam setahun . . ." required>
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-5 col-md-5">Jumlah Kasus Premature</label>
									      		<div class="col-lg-7">
									      			<input type="number" name="var_premature" id="modal-update-input-var_premature" class="form-control" value="" placeholder="Masukan jumlah kasus premature dalam setahun . . ." required>
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-5 col-md-5">Jumlah Kasus Komplikasi Persalinan</label>
									      		<div class="col-lg-7">
									      			<input type="number" name="var_KP" id="modal-update-input-var_KP" class="form-control" value="" placeholder="Masukan jumlah kasus komplikasi persalinan dalam setahun . . ." required>
									      		</div>
									      	</div>
									      	<div class="modal-footer">
									      	<input type="hidden" name="id_variabel" id="modal-update-idvariabel" value="<?=@$id_variabel['id_variabel']?>">
									      	<button type="submit" name="update" class="btn btn-primary">Update</button>
									      	<a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
									      </div>
									      </form>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Modal Form Update END -->
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
	<script>
		$(document).ready(function() {
			$('.button-edit-modal').click(function (event) {
				
				const nama = $(this).data("nama");
				$('#modal-update-input-nama').val(nama);
				const iddesa = $(this).data("iddesa");
				$('#modal-update-input-nama').val(iddesa);
				const var_JKH = $(this).data("var_jkh");
				$('#modal-update-input-var_JKH').val(var_JKH);
				const var_JKB = $(this).data("var_jkb");
				$('#modal-update-input-var_JKB').val(var_JKB);
				const var_BBLR = $(this).data("var_bblr");
				$('#modal-update-input-var_BBLR').val(var_BBLR);
				const var_premature = $(this).data("var_premature");
				$('#modal-update-input-var_premature').val(var_premature);
				const var_KP = $(this).data("var_kp");
				$('#modal-update-input-var_KP').val(var_KP);
				const idvariabel = $(this).data("idvariabel");
				$('#modal-update-idvariabel').val(idvariabel);
				const namae = $(this).data("nama");
				$('#modal-delete-nama').html(namae);

			})
			$('.button-hapus-modal').click(function (event) {
				
				
				const idvariabel = $(this).data("idvariabel");
				$('#modal-delete-button').attr('href', 'data-variabel-act.php?id_variabel='+idvariabel+'&act=hapus')
				

			})
		});
	</script>
</body> 
</html>