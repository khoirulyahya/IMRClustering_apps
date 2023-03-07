<!DOCTYPE HTML>  
<html>
<head>
  
<style>

.error {color: #FF0000;}
</style>
</head>
<body>  
<?php $background="<error-daftar style='background:pink; padding:10px; border-radius:3px'>"; ?>

<?php

include('koneksi.php');
//mengeset nilai variabel data yang kosong
$nameErr = $umurErr = $errErr = ""; 
$name  = $umur = $err =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["nama_mahasiswa"])) {
    $nameErr = "$background Name is required";
}elseif(!preg_match("/^[a-zA-Z ]*$/",$_POST["nama_mahasiswa"])) {
      $nameErr = "$background Hanya krakter alphabet yang diperbolehkan"; 
}elseif(strlen($_POST["nama_mahasiswa"])<3){
        $nameErr="$background Data tidak boleh kurang dari 3 karakter";
}elseif(strlen($_POST["nama_mahasiswa"])>5){
        $nameErr="$background  Data tidak boleh lebih dari 5 karakter";
}else{
//kondisi benar kumpulkan nilai variabel
      $name=test_input($_POST["nama_mahasiswa"]);
      $name = mysqli_real_escape_string($koneksi,$name);
  
}
if(empty($_POST["umur_mahasiswa"])){
  $umurErr="$background  Umur is Required";
}elseif(!preg_match("/^[0-9]*$/",$_POST["umur_mahasiswa"])){
$umurErr="$background Hanya data angka yang diperbolehkan";
}elseif(strlen($_POST["umur_mahasiswa"])<1){
  $umurErr="$background Data umur tidak boleh kurang 1 karakter";
}elseif(strlen($_POST["umur_mahasiswa"])>2){
  $umurErr="$background Data umur tidak boleh lebih dari 2 karakter";
}else{
  //kondisi benar kumpulkan nilai variabel
  $umur=test_input($_POST["umur_mahasiswa"]);
  $umur= mysqli_real_escape_string($koneksi,$umur);
}
//Eksekusi Terakhir
if(empty($name)) {
//Ketika adat data yang salah otomatis variabel benar akan bernilai kosong alias null
//maka cek kembali kalau ada data yang bernilai null jangan lakukan eksekusi database
echo "Masih ada data yang kosong"; 
}elseif(empty($umur)){
echo "umur masih kosong";
}else{
  //terakhir lakukan
$perintah=sprintf("INSERT INTO mhs VALUES('null','%s','%d')",$name,$umur);
$jalankan=mysqli_query($koneksi, $perintah);
if(!$jalankan){
$errErr="Gagal menyimpan data=".mysqli_error();
}else{
$err="Berhasil Menyimpan data";
}
}
//
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  Name: <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?php echo $name; ?>" />
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>

   Umur: <input type="text" name="umur_mahasiswa" id="umur_mahasiswa" value="<?php echo $umur; ?>" />
  <span class="error"><?php echo $umurErr;?></span>
  <br><br>

   <input type="submit" name="submit" id="submit" value="Submit"> 
   <input type="reset" name="batal" id="batal" value="Batal"> 
</form>
<br/>
<span class="error"><?php echo $err;?></span>
<span class="error"><?php echo $errErr;?></span>
</body>
</html>
