<?php
$db=new mysqli("localhost","root","","db_siakad");
if($db){
    //echo"koneksi ke database berhasil" ;
}else{
    echo"koneksi ke database gagal";
}
?>