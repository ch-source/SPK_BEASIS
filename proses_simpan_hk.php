<?php
include"koneksi.php";
$id=$_POST['id'];
$kelas=$_POST['kelas'];
$nama=$_POST['nama'];
$periode=$_POST['periode'];
$tahun=$_POST['tahun'];
$tgl=$_POST['tgl'];
$pa=$_POST['pa'];
$pi=$_POST['pi'];
$ph=$_POST['ph'];
$phi=$_POST['phi'];
$tanggungan=$_POST['tanggungan'];
$transportasi=$_POST['transportasi'];
$status=$_POST['status'];

$count=count($id);
$sql="INSERT INTO `tbl_hasil_klasifikasi` (`id_hk`, `id_testing`, `nama`, `kelas`, `periode`, `tahun`, `tanggal`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `tanggungan`, `transportasi`, `status`) VALUES ";
for ($i=0; $i <$count ; $i++) { 
  $sql.="('', '{$id[$i]}', '{$nama[$i]}', '{$kelas[$i]}', '{$periode[$i]}', '{$tahun[$i]}', '{$tgl[$i]}', '{$pa[$i]}', '{$pi[$i]}', '{$ph[$i]}', '{$phi[$i]}', '{$tanggungan[$i]}', '{$transportasi[$i]}', '{$status[$i]}')";
  $sql.=",";
}

$sql=rtrim($sql,",");
      $insert=$connect->query($sql);
      if (!$insert) {
        echo "<script>alert('Opss!, Data Hasil Klasifikasi Gagal Disimpan');
        document.location.href='dashboard.php?p=input_hk'</script>\n";
      }else{
      echo "<script>alert('Data Hasil Klasifikasi Berhasil Disimpan');
        document.location.href='dashboard.php?p=data_hasil_klasifikasi'</script>\n"; 
      }
?>