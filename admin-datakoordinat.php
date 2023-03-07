
<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- penghubung css bootstrap -->
	<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
	<title>Pemetaan Tingkat Kematian Bayi Di Kecamatan Ngemplak</title> 
	<style type="text/css">
		
	</style>
</head> 
<body> 
	<?php
	include "menu-8.php";
	include 'koneksi.php';
	?>
<?php


								      				$country  = mysqli_query($koneksi, "SELECT DISTINCT id_desa FROM tb_koordinat WHERE id_koordinat=1"); //membuat data yg tampil 1 kalau WHERE dihapus maka yg tampil semua data input sejumlah id_desa yg berbeda kuncinya fungsi DISTINCT
								      				$sql_desa = mysqli_query($koneksi, "SELECT * FROM tb_desa") or die (mysqli_error($koneksi));
								      				$edite = mysqli_query($koneksi,"SELECT * FROM tb_koordinat INNER JOIN tb_desa ON tb_koordinat.id_desa = tb_desa.id_desa WHERE `tb_koordinat`.`id_koordinat` = 1");
								      				$row= mysqli_fetch_array($edite);
								      				?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12"><br></div>
				<div class="col-lg-2"><br></div>
				<div class="col-lg-10">

					<div class="card-group">
						<div class="card-body">
							<h1>Data Koordinat Desa</h1>
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-tambah">
								  + Tambah Data
								</button>

								
								<!-- Modal Form Tambah -->
								<div class="modal fade" id="form-tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Koordinat Desa</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<form method="post" action="data-koordinat-act.php">
								      	<div class="form-group row">
								      		<label for="nama_desa" class="col-lg-4">Nama Kelurahan/Desa</label>
								      		<div class="col-lg-8">
								      			<select name="nama_desa" id="nama_desa" class="form-control" required>
								      				<option value="">- Pilih Kelurahan/Desa -</option>
								      				<?php
								      				$sql_desa = mysqli_query($koneksi, "SELECT * FROM tb_desa") or die (mysqli_error($koneksi));
								      				while($data_desa = mysqli_fetch_array($sql_desa)) {
								      					echo '<option value="'.$data_desa['id_desa'].'">'.$data_desa['nama_desa'].'</option>';
								      				} ?>
								      			</select>
								      		</div>
								      	</div>
								      	<div class="form-group row">
								      		<label class="col-lg-4">Latitude</label>
								      		<div class="col-lg-8">
								      			<input type="text" name="latitude" class="form-control" value="" placeholder="Masukan latitude kelurahan/desa . . .">
								      		</div>
								      	</div>
								      	<div class="form-group row">
								      		<label class="col-lg-4">Longitude</label>
								      		<div class="col-lg-8">
								      			<input type="text" name="longitude" class="form-control" value="" placeholder="Masukan longitude kelurahan/desa . . .">
								      		</div>
								      	</div>
								      	<div class="modal-footer">
								      	<input type="hidden" name="id_koordinat" value="<?=@$id_koordinat['id_koordinat']?>">
								      	<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
								      	<a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
								      </div>
								      </form>
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal Form Tambah END -->
								<!-- Modal Form Update-->
									<div class="modal fade" id="form-update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Desa <span id="modal-delete-"></h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<form method="post" action="data-koordinat-act.php" role="form">
									      	<div class="form-group row">
									      		<label class="col-lg-4">ID Kelurahan/Desa</label>
									      		<div class="col-lg-8">
									      			<input readonly type="text" name="nama_desa" id="modal-update-input-nama" class="form-control" value="">
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-4">Latitude</label>
									      		<div class="col-lg-8">
									      			<input type="text" name="latitude" id="modal-update-input-latitude" class="form-control" value="">
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-4">Longitude</label>
									      		<div class="col-lg-8">
									      			<input type="text" name="longitude" id="modal-update-input-longitude" class="form-control" value="">
									      		</div>
									      	</div>
									      	<div class="modal-footer">
									      	<input type="hidden" name="id_koordinat" id="modal-update-idkoordinat" value="">
									      	<button type="submit" name="update" class="btn btn-primary">Update</button>
									      	<a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
									      </div>
									      </form>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Modal Form Update END -->
							<br>
							<br>
							<table class="table table-striped table-bordered">
								<thead class="thead-dark">
									<tr>
										<th><center>No</center></th>
										<th>Kelurahan/Desa</th>
										<th><center>Latitude</center></th>
										<th><center>Longitude</center></th>
										<th><center>Aksi</center></th>
										
									</tr>
								</thead>

								<tbody>
									<?php
									
									$desa = mysqli_query($koneksi, 'SELECT * FROM tb_koordinat 
											INNER JOIN tb_desa ON tb_koordinat.id_desa = tb_desa.id_desa');
									$no = 1;
									foreach($desa as $key => $val){
										?>
										
										<tr>
											<td><center><?=$no?></center></td>
											<td><?=$val['nama_desa']?></td>
											<td><center><?=$val['latitude']?></center></td>
											<td><center><?=$val['longitude']?></center></td>
											<td><center>
												<div class="btn-group">
													<a href="#" class="btn btn-primary button-edit-modal" data-toggle="modal" data-target="#form-update" data-nama="<?=$val['id_desa']?>" data-namae="<?=$val['nama_desa']?>" data-latitude="<?=$val['latitude']?>" data-idkoordinat="<?=$val['id_koordinat']?>" data-longitude="<?=$val['longitude']?>"><i class="fas fa-edit"></i></a>
													<a href="#" class="btn btn-danger button-hapus-modal" data-toggle="modal" data-target="#delete" data-nama="<?=$val['nama_desa']?>" data-idkoordinat="<?=$val['id_koordinat']?>"><i class="fas fa-trash"></i></a>
												</div>
												</center>
											</td>
										</tr>
										
										<?php
										$no++;
									}
									?>
									
			
									<!-- Modal Form Delete-->
												<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data 	</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<h4><center>Apakah anda yakin ingin menghapus data <span id="modal-delete-nama"></span>?</center></h4>
															</div>
															<div class="modal-footer">
																<button id="nodelete" type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancel</button>
																<a id="modal-delete-button" href="" class="btn btn-danger">Delete</a>
															</div>
														</div>
													</div>
												</div>
									<!-- Modal Form Delete END -->
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
					const latitude = $(this).data("latitude");
					$('#modal-update-input-latitude').val(latitude);
					const longitude = $(this).data("longitude");
					$('#modal-update-input-longitude').val(longitude);
					const idkoordinat = $(this).data("idkoordinat");
					$('#modal-update-idkoordinat').val(idkoordinat);
					const namae = $(this).data("namae");
					$('#modal-delete-').html(namae);

				})
				$('.button-hapus-modal').click(function (event) {
					
					const nama = $(this).data("nama");
					$('#modal-delete-nama').html(nama);
					const idkoordinat = $(this).data("idkoordinat");
					$('#modal-delete-button').attr('href', 'data-koordinat-act.php?id_koordinat='+idkoordinat+'&act=hapus')
					

				})
			});
		</script>
</body> 
</html>