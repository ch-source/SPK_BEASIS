<?php
include"koneksi.php";
$id = $_GET['id'];

$query2="DELETE FROM tbl_testing WHERE id_testing='$id'";
$sql2=mysqli_query($connect, $query2);
if ($sql2) {
  		echo "<script>alert('Data Testing Berhasil Dihapus');
         document.location.href='dashboard.php?p=data_testing'</script>\n";
  	}else{
  		echo "<script>alert('Data Testing Gagal Dihapus');
         document.location.href='dashboard.php?p=data_testing'</script>\n";
}
?>