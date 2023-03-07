<?php
header('Content-Type: application/json');

require ('koneksi.php');

// $tahun=date('Y');

$sql = mysqli_query($koneksi, "SELECT a.id_desa as iddes, a.nama_desa as namadesa, a.polygon as pol, b.var_JKH as jkh, b.var_JKB as jkb, b.var_BBLR as bblr, b.var_premature as premature, b.var_KP as kp, c.set_sementara as sem FROM tb_desa a INNER JOIN tb_variabel b on b.id_desa=a.id_desa INNER JOIN tb_hasil_normalisasi c on c.id_desa=a.id_desa");

$json = '{"ngemplak": {';
$json .= '"lahan":[ ';
while($x = mysqli_fetch_assoc($sql)){
    // $qcamat=mysqli_query($koneksi, "select nama_kecamatan from kecamatan where id_kecamatan='$x[kecamatan]'");
    // $hcamat=mysqli_fetch_array($qcamat);
    // $ncamat=$hcamat['nama_kecamatan'];
	
	// $qkel=mysqli_query($koneksi, "select nama_desa from tb_desa where id_desa='$x[id_desa]'");
 //    $hkel=mysqli_fetch_array($qkel);
 //    $nkel=$hkel['nama_desa'];
	
	
	// $qwarna=mysqli_query($koneksi, "select * from tb_hasil_normalisasi where set_sementara='set_sementara'");
		if ($x['sem']=='C2'){
			$hwarna='#008000';
		}else if($x['sem']=='C3'){
			$hwarna='#FFFA00';
		}else{
			$hwarna='#FF0000';
		}

    // $hwarna=mysqli_fetch_array($qwarna);
    // $warna=$hwarna['warna'];
	// $cek=$hwarna['nama_status'];
		if ($x['sem']=='C3'){
			$status='Rendah';
		}else if($x['sem']=='C2'){
			$status='Sedang';
		}else{
			$status='Tinggi';
		}
     
	$json .= '{';
	$json .= '"id":"'.$x['iddes'].'",
		"nama_lokasi":"'.htmlspecialchars($x['namadesa']).'",
		"jukehi":"'.$x['jkh'].'",
		"jukeba":"'.$x['jkb'].'",
		"jukebb":"'.$x['bblr'].'",
		"jukepre":"'.$x['premature'].'",
		"jukekp":"'.$x['kp'].'",
		"polygon":"'.$x['pol'].'",
		"cluster":"'.$status.'",
		"warna":"'.$hwarna.'"
	},';
}

$json = substr($json,0,strlen($json)-1);
$json .= ']';
$json .= '}}';

echo $json;

?>