<?php
$id_variabel 	= $_POST['id_variabel']; // input hidden id_desa
$id_desa 		= $_POST['nama_desa'];
$var_JKH 		= $_POST['var_JKH'];
$var_JKB 		= $_POST['var_JKB'];
$var_BBLR 		= $_POST['var_BBLR'];
$var_premature 	= $_POST['var_premature'];
$var_KP 		= $_POST['var_KP'];

include 'koneksi.php';

// jika act (ada) maka menjalankan (query) hapus data;
if(@$_GET['act'] == 'hapus'){
	$id_variabel = $_GET['id_variabel'];

	$query = mysqli_query($koneksi, "
		DELETE FROM tb_variabel 
		WHERE id_variabel = '$id_variabel'
		");
}

// jika id variabel terbaca (dikirim melalui form) maka menjalakan (query) update data;
elseif(@$id_variabel){
	$var_indexsAKB = $var_JKB/$var_JKH*1000;
	$query = mysqli_query($koneksi, "
		UPDATE tb_variabel SET 
		id_desa		= '$id_desa',
		var_JKH 	= '$var_JKH',
		var_JKB 	= '$var_JKB',
		var_BBLR 	= '$var_BBLR',
		var_premature 	= '$var_premature',
		var_KP 	= '$var_KP',
		AKB = '$var_indexsAKB'
		WHERE id_variabel = '$id_variabel'
		") or die(mysqli_error($koneksi));
}
// (query) tambah data;
else{
	$var_indexsAKB = $var_JKB/$var_JKH*1000;
	$query = mysqli_query($koneksi, "
		INSERT INTO tb_variabel (id_desa, var_JKH, var_JKB, var_BBLR, var_premature, var_KP, AKB) 
		VALUES ('$id_desa', '$var_JKH', '$var_JKB', '$var_BBLR', '$var_premature', '$var_KP', '$var_indexsAKB')
		") or die(mysqli_error($koneksi));
}

if($query)
	header('Location: admin-datavariabel.php');
?>