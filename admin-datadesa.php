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
	?>

		<div class="container">
			<div class="row">
				<div class="col-lg-12"><br></div>
				<!-- <div class="col-lg-2"><br></div> -->
				<div class="col-lg-12 col-md-12 table-responsive">

					<div class="card-group">
						<div class="card-header">
							<h1>Data Desa</h1>
							<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-tambah">
								  + Tambah Data
								</button><br>
							<br>

								
								<!-- Modal Form Tambah -->
								<div class="modal fade" id="form-tambah" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Desa</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<form method="post" action="data-desa-act.php">
								      	<div class="form-group row">
								      		<label class="col-lg-4">Nama Kelurahan/Desa</label>
								      		<div class="col-lg-8">
								      			<input type="text" name="nama_desa" class="form-control" value="<?=@$desa['nama_desa']?>" placeholder="Masukan nama kelurahan/desa . . ." required pattern="[a-zA-Z\s]*">
								      		</div>
								      	</div>
								      	<div class="form-group row">
								      		<label class="col-lg-4">Koordinat Kelurahan/Desa</label>
								      		<div class="col-lg-8">
								      			<textarea type="text" name="polygon" class="form-control" value="<?=@$desa['polygon']?>" placeholder="Masukan koordinat polygon kelurahan/desa . . ." required></textarea>
								      		</div>
								      	</div>
								      	<div class="modal-footer">
								      	<input type="hidden" name="id_desa" value="<?=@$desa['id_desa']?>">
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
									<div class="modal fade" id="form-update" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Desa <span id="modal-delete-"></h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									      	<form method="post" action="data-desa-act.php?" role="form">
									      	<div class="form-group row">
									      		<label class="col-lg-4">Nama Kelurahan/Desa</label>
									      		<div class="col-lg-8">
									      			<input type="text" name="nama_desa" id="modal-update-input-nama" class="form-control" value="" placeholder="Masukan nama kelurahan/desa . . ." required pattern="[a-zA-Z\s]*">
									      		</div>
									      	</div>
									      	<div class="form-group row">
									      		<label class="col-lg-4">Koordinat Kelurahan/Desa</label>
									      		<div class="col-lg-8">
									      			<textarea type="text" name="polygon" id="modal-update-polygon" class="form-control" value="" placeholder="Masukan koordinat polygon kelurahan/desa . . ." required></textarea>
									      		</div>
									      	</div>
									      	
									      	<div class="modal-footer">
									      	<input type="hidden" name="id_desa" id="modal-update-iddesa" value="">
									      	<button type="submit" name="update" class="btn btn-primary">Update</button>
									      	<a href="#" class="btn btn-danger" data-dismiss="modal">Batal</a>
									      </div>
									      </form>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Modal Form Update END -->
							
							<table class="table table-striped table-bordered">
								<thead class="thead-dark">
									<tr class="nw">
										<th><center>No</center></th>
										<th>Kelurahan/Desa</th>
										<th><center>Koordinat</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>

								<tbody>
									<?php
									include 'koneksi.php';
									$desa = mysqli_query($koneksi, 'SELECT * FROM tb_desa ');
									$no = 1;
									foreach($desa as $key => $val){
										?>

										<tr>
											<td><center><?=$no?></center></td>
											<td><?=$val['nama_desa']?></td>
											<td><?=substr($val['polygon'], 0, 50) ?></td>
											<td><center>
												<div class="btn-group">
													<a href="#" class="btn btn-primary button-edit-modal" data-toggle="modal" data-target="#form-update" data-polygon="<?=$val['polygon']?>" data-nama="<?=$val['nama_desa']?>" data-namae="<?=$val['nama_desa']?>" data-iddesa="<?=$val['id_desa']?>"><i class="fas fa-edit"></i></a>
													<a href="#" class="btn btn-danger button-hapus-modal" data-toggle="modal" data-target="#delete" data-nama="<?=$val['nama_desa']?>" data-iddesa="<?=$val['id_desa']?>"><i class="fas fa-trash"></i></a>
												</div>
												</center>
											</td>
										</tr>
										
										<?php
										$no++;
									}
									?>
									
			
									<!-- Modal Form Delete-->
												<div class="modal fade" id="delete" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
					const iddesa = $(this).data("iddesa");
					$('#modal-update-iddesa').val(iddesa);
					const polygon = $(this).data("polygon");
					$('#modal-update-polygon').val(polygon);
					const namae = $(this).data("namae");
					$('#modal-delete-').html(namae);
					

				})
				$('.button-hapus-modal').click(function (event) {
					
					const nama = $(this).data("nama");
					$('#modal-delete-nama').html(nama);
					const iddesa = $(this).data("iddesa");
					$('#modal-delete-button').attr('href', 'data-desa-act.php?id_desa='+iddesa+'&act=hapus')
					

				})
			});
		</script>
</body> 
</html>