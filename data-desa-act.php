<?php
$id_desa 		= $_POST['id_desa']; // input hidden id_desa
$nama_desa 		= $_POST['nama_desa'];
$polygon 		= $_POST['polygon'];

include 'koneksi.php';

// jika act (ada) maka menjalankan (query) hapus data;
if(@$_GET['act'] == 'hapus'){
	$id_desa = $_GET['id_desa'];

	$query = mysqli_query($koneksi, "
		DELETE FROM tb_desa 
		WHERE id_desa = '$id_desa'
		");
}

// jika id desa terbaca (dikirim melalui form) maka menjalakan (query) update data;
elseif(@$id_desa){
	$query = mysqli_query($koneksi, "
		UPDATE tb_desa SET 
		nama_desa 	= '$nama_desa',
		polygon 	= '$polygon'
		WHERE id_desa = '$id_desa'
		") or die(mysqli_error($koneksi));
}
// (query) tambah data;
else{
	$query = mysqli_query($koneksi, "
		INSERT INTO tb_desa (nama_desa, polygon) 
		VALUES ('$nama_desa','$polygon')
		") or die(mysqli_error($koneksi));
}

if($query)
	header('Location: admin-datadesa.php');
?>