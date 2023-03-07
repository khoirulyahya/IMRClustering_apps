<?php
$id_koordinat 	= $_POST['id_koordinat']; // input hidden id_desa
$id_desa 		= $_POST['nama_desa'];
$latitude 		= $_POST['latitude'];
$longitude 		= $_POST['longitude'];

include 'koneksi.php';

// jika act (ada) maka menjalankan (query) hapus data;
if(@$_GET['act'] == 'hapus'){
	$id_koordinat = $_GET['id_koordinat'];

	$query = mysqli_query($koneksi, "
		DELETE FROM tb_koordinat 
		WHERE id_koordinat = '$id_koordinat'
		");
}

// jika id koordinat terbaca (dikirim melalui form) maka menjalakan (query) update data;
elseif(@$id_koordinat){
	$query = mysqli_query($koneksi, "
		UPDATE tb_koordinat SET 
		id_desa		= '$id_desa',
		latitude 	= '$latitude',
		longitude 	= '$longitude'
		WHERE id_koordinat = '$id_koordinat'
		") or die(mysqli_error($koneksi));
}
// (query) tambah data;
else{
	$query = mysqli_query($koneksi, "
		INSERT INTO tb_koordinat (id_desa, latitude, longitude) 
		VALUES ('$id_desa', '$latitude', '$longitude')
		") or die(mysqli_error($koneksi));
}

if($query)
	header('Location: admin-datakoordinat.php');
?>