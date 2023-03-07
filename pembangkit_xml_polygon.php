<?php
	include "koneksi.php";
	$x = mysqli_query($koneksi, "SELECT * FROM tb_desa") or die (mysqli_error($koneksi));
	$y = mysqli_fetch_array($x);
	$id = $y['id_desa'];
	$kelurahan = $y['nama_desa']; //pengganti kecamatan	
	$batas = $y['polygon']; //pengganti koordinat
	$urai = explode('+', $batas);
	$max = count($urai)-1;

	//konversi ke array 2D, menghasilkan $koor[i][j]
	for ($i=0;$i<$max;$i++)
	{
		for ($j=0;$j<2;$j++) 
		{
			$koor[i] = explode(',',$urai[$i]);
		}}
		//konversi ke format XML
		header("Content-Type: text/xml");
		echo '<daerah>';
		for ($i=0;$i<$max;$i++)
		{
			echo '<titik ';
				for ($j=0;$j<2;$j++)
				{
					if ($j==1)
						echo 'lintang="' .$koor[$i][$j].'"';
					else
						echo 'bujur="' .$koor[$i][$j].'"';
				}
				echo '/>';
		}
		echo '</daerah>';
?>