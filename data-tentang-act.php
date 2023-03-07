<?php
$id 		= $_POST['id']; // input hidden id_desa
$tentang 	= $_POST['textarea'];

include 'koneksi.php';

// jika act (ada) maka menjalankan (query) hapus data;
if(@$_GET['act'] == 'hapus'){
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "
		DELETE FROM tb_tentang 
		WHERE id = '$id'
		");
}

// jika id desa terbaca (dikirim melalui form) maka menjalakan (query) update data;
elseif(@$id){
	$query = mysqli_query($koneksi, "
		UPDATE tb_tentang SET 
		tentang 	= '$tentang',
		WHERE id = '$id'
		") or die(mysqli_error($koneksi));
}
// (query) tambah data;
else{
	$query = mysqli_query($koneksi, "
		INSERT INTO tb_tentang (tentang) 
		VALUES ('$tentang')
		") or die(mysqli_error($koneksi));
}

if($query)
	header('Location: admin-tentang.php');
?>