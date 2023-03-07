<?php
$id_admin 		= $_POST['id_admin']; // input hidden id_admin
$nama 		= $_POST['nama'];
$email 		= $_POST['email'];
$username 		= $_POST['username'];
$ubah 		= $_POST['password'];
$password 	= md5($ubah);

include 'koneksi.php';

// jika act (ada) maka menjalankan (query) hapus data;
if(@$_GET['act'] == 'hapus'){
	$id_admin = $_GET['id_admin'];

	$query = mysqli_query($koneksi, "
		DELETE FROM admin 
		WHERE id_admin = '$id_admin'
		");
}

// jika id admin terbaca (dikirim melalui form) maka menjalakan (query) update data;
elseif(@$id_admin){
	$query = mysqli_query($koneksi, "
		UPDATE admin SET 
		nama		= '$nama',
		email 	= '$email',
		username 	= '$username',
		password 	= '$password'
		WHERE id_admin = '$id_admin'
		") or die(mysqli_error($koneksi));
}
// (query) tambah data;
else{
	$query = mysqli_query($koneksi, "
		INSERT INTO admin (nama, email, username, password) 
		VALUES ('$nama', '$email', '$username','$password')
		") or die(mysqli_error($koneksi));
}

if($query)
	header('Location: admin-tampil.php');
?>