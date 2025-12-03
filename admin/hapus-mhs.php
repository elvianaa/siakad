<?php
$idx=$_GET['id'];
require_once "../config.php";
$sql="delete from mhs where id='$idx'";
if($db->query($sql)){
    echo "<script>
    alert('Data berhasil dihapus!');
    window.location.href='./?p=mahasiswa';</script>";
}else{
    echo "<script>
    alert('Data gagal dihapus!');
    window.location.href='./?p=mahasiswa';</script>";
}
?>