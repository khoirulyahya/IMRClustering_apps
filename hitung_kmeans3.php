<?php
//Koneksi Basis Data
$mysqli=new mysqli("localhost","root","password","pemetaan_TKB");
//cek koneksi
if  (mysqli_connect_errno()){
	echo "Tidak Terhubung";
	exit;
}

//Fungsi mencari kueri single data
function caridata3($mysqli,$query){
	$row=$mysqli->query($query)->fetch_array();
	return $row[0];
}

//Inisialisasi Cluster Awal
$jumlahmahasiswa=caridata3($mysqli,"select count(*) from tb_hasil_normalisasi");
// echo $jumlahmahasiswa; Script tampil
for ($i=0; $i<$jumlahmahasiswa; $i++) {
	$clusterawal[$i]="1";
}

//Set Default Nilai Centroid 1,2,3
$centro1[0] = array('1.000','0.667','0.000','0.559');
$centro2[0] = array('0.000','0.000','0.000','0.102');
$centro3[0] = array('0.000','0.000','0.000','0.220');

$status='false';
$loop='0';
$x=0;
while ($status=='false'){

	// echo "<pre>";
	// print_r($centro1[$loop]);
	// print_r($centro2[$loop]);
	// print_r($centro3[$loop]);
	// echo "</pre>";
	// echo "<hr>";

	//Proses K-Means Perhitungan
	$query="select * from tb_hasil_normalisasi";
	$result=$mysqli->query($query);
	while ($data=mysqli_fetch_assoc($result)){
		extract($data);
		// echo $data['nim']; digunakan extract sehingga menjadi ringkas seperti dibawah ini
		// echo $nim;
		$hasilc1=0;
		$hasilc2=0;
		$hasilc3=0;
		//Proses Pencarian Nilai Centro 1
		$hasilc1=sqrt(pow($var_nAKB-$centro1[$loop][0],2) + 
				pow($var_nBBLR-$centro1[$loop][1],2) +
				pow($var_npremature-$centro1[$loop][2],2)+
				pow($var_nKP-$centro1[$loop][3],2));
		//Tampil hasil perhitungan jarak
		// echo "jarak C1 dengan Data ke".$x." <br>";
		// echo number_format($hasilc1,3)."<br>"; //number_format untuk membatasi angka dibelakang koma
		// var_dump($hasilc1);
		// echo "<hr>"; //number_format untuk membatasi angka dibelakang koma

		//Proses Pencarian Nilai Centro 2
		$hasilc2=sqrt(pow($var_nAKB-$centro2[$loop][0],2) + 
				pow($var_nBBLR-$centro2[$loop][1],2) +
				pow($var_npremature-$centro2[$loop][2],2) +
				pow($var_nKP-$centro2[$loop][3],2));
		//Tampil hasil perhitungan jarak
		// echo "jarak C2 dengan Data ke".$x." <br>";
		// echo number_format($hasilc2,3); //number_format untuk membatasi angka dibelakang koma
		// echo "<hr>"; //number_format untuk membatasi angka dibelakang koma

		//Proses Pencarian Nilai Centro 3
		$hasilc3=sqrt(pow($var_nAKB-$centro3[$loop][0],2) + 
				pow($var_nBBLR-$centro3[$loop][1],2) +
				pow($var_npremature-$centro3[$loop][2],2) +
				pow($var_nKP-$centro3[$loop][3],2));
		//Tampil hasil perhitungan jarak
		// echo "jarak C3 dengan Data ke".$x." <br>";
		echo number_format($hasilc3,3); //number_format untuk membatasi angka dibelakang koma
		echo "<hr>"; //number_format untuk membatasi angka dibelakang koma

		//Mencari Nilai Terkecil
		if ($hasilc1<$hasilc2 && $hasilc1<$hasilc3){
			$clusterakhir[$x]='C1';
			// update_mahasiswa($mysqli,$id_hasil_normalisasi,'C1');
		}else if($hasilc2<$hasilc1 && $hasilc2<$hasilc3){
			$clusterakhir[$x]='C2';
			// update_mahasiswa($mysqli,$id_hasil_normalisasi,'C2');
		}else{
			$clusterakhir[$x]='C3';
			// update_mahasiswa($mysqli,$id_hasil_normalisasi,'C3');
		}

		//Penambahan Counter Index
		$x+=1;

	}
	
	$loop+=1;
	//Proses mencari centroid Baru diambil dari basis data
	//Centroid Baru Pusat 1
	$centro1[$loop][0]=caridata3($mysqli,"select avg(var_nAKB) from tb_hasil_normalisasi where set_sementara='C1'");
	$centro1[$loop][1]=caridata3($mysqli,"select avg(var_nBBLR) from tb_hasil_normalisasi where set_sementara='C1'");
	$centro1[$loop][2]=caridata3($mysqli,"select avg(var_npremature) from tb_hasil_normalisasi where set_sementara='C1'");
	$centro1[$loop][3]=caridata3($mysqli,"select avg(var_nKP) from tb_hasil_normalisasi where set_sementara='C1'");

	//Centroid Baru Pusat 2
	$centro2[$loop][0]=caridata3($mysqli,"select avg(var_nAKB) from tb_hasil_normalisasi where set_sementara='C2'");
	$centro2[$loop][1]=caridata3($mysqli,"select avg(var_nBBLR) from tb_hasil_normalisasi where set_sementara='C2'");
	$centro2[$loop][2]=caridata3($mysqli,"select avg(var_npremature) from tb_hasil_normalisasi where set_sementara='C2'");
	$centro2[$loop][3]=caridata3($mysqli,"select avg(var_nKP) from tb_hasil_normalisasi where set_sementara='C2'");
	
	//Centroid Baru Pusat 3
	$centro3[$loop][0]=caridata3($mysqli,"select avg(var_nAKB) from tb_hasil_normalisasi where set_sementara='C3'");
	$centro3[$loop][1]=caridata3($mysqli,"select avg(var_nBBLR) from tb_hasil_normalisasi where set_sementara='C3'");
	$centro3[$loop][2]=caridata3($mysqli,"select avg(var_npremature) from tb_hasil_normalisasi where set_sementara='C3'");
	$centro3[$loop][3]=caridata3($mysqli,"select avg(var_nKP) from tb_hasil_normalisasi where set_sementara='C3'");
	
	$status='true';
	//Pengecekan apakah iterasi berlanjut/tidak
	for ($i=0; $i<$jumlahmahasiswa; $i++) {
		if($clusterawal[$i]!=$clusterakhir[$i]){
			$status='false';
		}
	}

	if ($status=='false'){
		$clusterawal=$clusterakhir;
	}
}
// $sum0=caridata($mysqli,"select count(id_desa) from tb_desa");
// $sum1=caridata($mysqli,"select sum(var_JKH) from tb_variabel");
// $sum2=caridata($mysqli,"select sum(var_JKB) from tb_variabel");
// $sum3=caridata($mysqli,"select sum(var_BBLR) from tb_variabel");
// $sum4=caridata($mysqli,"select sum(var_premature) from tb_variabel");
// $sum5=caridata($mysqli,"select sum(var_KP) from tb_variabel");
// $sum6=caridata($mysqli,"select count(*) from tb_hasil_normalisasi where set_sementara='C3'");
// $sum7=caridata($mysqli,"select count(*) from tb_hasil_normalisasi where set_sementara='C2'");
// $sum8=caridata($mysqli,"select count(*) from tb_hasil_normalisasi where set_sementara='C1'");
// echo "Proses berhasil dilakukan sebanyak $loop kali";


// function update_mahasiswa($mysqli,$id_hasil_normalisasi,$nilai){

// 	$stmt=$mysqli->prepare("update tb_hasil_normalisasi set 
// 		set_sementara=?
// 		where id_hasil_normalisasi=?");
// 	$varescapestring=mysqli_real_escape_string($mysqli,$nilai);
// 	$varescapestrings=mysqli_real_escape_string($mysqli,$id_hasil_normalisasi);
// 	$stmt->bind_param("ss",$varescapestring,$varescapestrings);
// 	$stmt->execute();
// }
?>
<!-- 
<h1>Data Hasil Normalisasi</h1>
								
						<br>
						<table>
							<thead>
								<tr>
									<th><center>No</center></th>
									<th><center>Kelurahan/Desa</center></th>
									<th><center>Variabel Angka Kematian Bayi</center></th>
									<th><center>Variabel Kasus BBLR</center></th>
									<th><center>Variabel Kasus Premature</center></th>
									<th><center>Variabel Kasus Komplikasi Persalinan</center></th>
									<th><center>Cluster yg diikuti</center></th>
									<th><center>C2</center></th>
									
								</tr>
							</thead>

							<tbody>
								<?php
								
								$desa = mysqli_query($mysqli, 'SELECT * FROM tb_hasil_normalisasi');
								
								$no = 1;
								foreach($desa as $key => $val){
									?>

									<tr>
										<td><center><?=$no?></center></td>
										<td><?=$val['id_hasil_normalisasi']?></td>
										<td><center><?=$val['var_nAKB']?></center></td>
										<td><center><?=$val['var_nBBLR']?></center></td>
										<td><center><?=$val['var_npremature']?></center></td>
										<td><center><?=$val['var_nKP']?></center></td>
										<td><center><?=$val['set_sementara']?></center></td>
										<?$s=caridata($mysqli,"select (id_desa) from tb_hasil_normalisasi where set_sementara='C3'");?>
										<td><center><?=$s?></center></td>
										
									</tr>

									<?php
									$no++;
								}
							?>
							
							</tbody>
						</table> -->