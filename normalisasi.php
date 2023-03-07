<?php
	$host="localhost";
	$user="root";
	$password="password";
	$db="pemetaan_TKB";

	$kon = mysqli_connect($host,$user,$password,$db);
	$hasil=mysqli_query($kon,"select * from tb_variabel");

	//menampilkan data dengan perulangan while
	while ($data = mysqli_fetch_array($hasil)): $var_JKH[] =  $data['var_JKH']; 
		 $var_JKB[] =  $data['var_JKB'];
		 $var_BBLR[] =  $data['var_BBLR'];
		 $var_premature[] =  $data['var_premature'];
		 $var_KP[] =  $data['var_KP'];
		 $var_AKB[] =  $data['AKB'];

?>

<?php endwhile; ?>

<?php
	//Fungsi mencari kueri single data
	function caridatanor($kon,$query){
		$row=$kon->query($query)->fetch_array();
		return $row[0];
	}

	//Inisialisasi Cluster Awal
	$jumlahdata=caridatanor($kon,"select count(*) from tb_variabel");
	// echo "<br>"."Jumlah data adalah = ".$jumlahdata."<br><hr>"; //Script tampil
	for ($i=0; $i<$jumlahdata; $i++) {
		$clusterawal[$i]="1";
	}
	$status='false';
	$loop='0';
	$x=0;

	//perulangan mencari AKB darri rumus IMR (JKB/JKH*1000)




	$minimal_AKB = min($var_AKB);
	$maximal_AKB = max($var_AKB);
	$minimal_BBLR = min($var_BBLR);
	$maximal_BBLR = max($var_BBLR);
	$minimal_premature = min($var_premature);
	$maximal_premature = max($var_premature);
	$minimal_premature = min($var_premature);
	$maximal_premature = max($var_premature);
	$minimal_KP = min($var_KP);
	$maximal_KP = max($var_KP);
		
	$normalisasi1=0;
	$normalisasi2=0;
	$normalisasi3=0;
	$normalisasi4=0;

?>
<!-- Variabel AKB terendah : <?php echo $minimal_AKB; ?> <br>
Variabel AKB tertinggi : <?php echo $maximal_AKB; ?> <br>
Variabel BBLR terendah : <?php echo $minimal_BBLR; ?> <br>
Variabel BBLR tertinggi : <?php echo $maximal_BBLR; ?> <br>
Variabel Premature terendah : <?php echo $minimal_premature; ?> <br>
Variabel Premature tertinggi : <?php echo $maximal_premature; ?> <br>
Variabel KP  terendah : <?php echo $minimal_KP; ?> <br>
Variabel KP  tertinggi : <?php echo $maximal_KP; ?> <br>
<? echo "<hr>";?> -->

<?php
	while ($status=='false'){

		// echo "normalisasi data ke-";
		// echo "<pre>";
		// print_r($normalisasi1."<br>");
		// print_r($normalisasi2."<br>");
		// print_r($normalisasi3."<br>");
		// print_r($normalisasi4."<br>");
		
		// echo "</pre>";
		// echo "<hr>";

		$query="select * from tb_variabel";
		$result=$kon->query($query);
		while ($data=mysqli_fetch_assoc($result)){
			extract($data);
					//deklarasi variabel 
			
			//Proses Pencarian Nilai Normalisasi
			$normalisasi1=($AKB - $minimal_AKB)/($maximal_AKB - $minimal_AKB);
			$normalisasi2=($var_BBLR - $minimal_BBLR)/($maximal_BBLR - $minimal_BBLR);
			$normalisasi3=($var_premature - $minimal_premature)/($maximal_premature - $minimal_premature);
			$normalisasi4=($var_KP - $minimal_KP)/($maximal_KP - $minimal_KP);
			insert_normal($kon,$id_desa,$id_variabel,$normalisasi1,$normalisasi2,$normalisasi3,$normalisasi4);

			
			// echo "Data ke-".$id_desa."<br>";
			// echo "AKB = ".number_format($AKB,2)."<br>"; //number_format untuk membatasi angka dibelakang koma
			// echo "normalisasi AKB = ".number_format($normalisasi1,2)."<br>";
			// echo "normalisasi BBLR = ".number_format($normalisasi2,2)."<br>";
			// echo "normalisasi Premature = ".number_format($normalisasi3,2)."<br>";
			// echo "normalisasi KP = ".number_format($normalisasi4,2)."<br>";
			
			// echo "<hr>"; //number_format untuk membatasi angka dibelakang koma
			

	}
	$status='true';
		//Script perulangan normalisasi
		for ($i=0; $i<$jumlahdata; $i++) {
			if($clusterawal[$i]!=1){
				$status='false';
			}
		}

		if ($status=='false'){
			$clusterawal=1;
		}
	}

	function insert_normal($kon,$id_desa,$id_variabel,$normalisasi1,$normalisasi2,$normalisasi3,$normalisasi4){
		// if (@$id_desa){
		//script update
			$stmt=$kon->prepare("update tb_hasil_normalisasi set 
				id_desa = '$id_desa',
				id_variabel = '$id_variabel',
				var_nAKB = '$normalisasi1',
				var_nBBLR = '$normalisasi2',
				var_npremature = '$normalisasi3',
				var_nKP = '$normalisasi4'
				where id_desa='$id_desa'") or die(mysqli_error($kon));


		// }else{
		//script insert
		// $stmt=$kon->prepare("insert into tb_hasil_normalisasi (id_desa, id_variabel, var_nAKB, var_nBBLR, var_npremature, var_nKP)
		// 	values ('$id_desa','$id_variabel','$normalisasi1','$normalisasi2','$normalisasi3','$normalisasi4')") or die(mysql_error($kon));
		
		
		$stmt->execute();
	// }
	}
?>





