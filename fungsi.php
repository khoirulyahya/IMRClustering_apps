<?php
function hitung_denda($tempo, $kembali)
{
	$_tempo = strtotime($tempo);
	$_kembali = strtotime($kembali);

	$denda = 0;
	if($_kembali > $_tempo){
		$nominal_denda = 500;
		$denda = (($_kembali - $_tempo) / 86400) * $nominal_denda;
	}

	$return = $denda;

	return $return;
}
?>