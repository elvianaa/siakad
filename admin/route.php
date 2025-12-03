<?php

$p=$_GET['p'];

switch ($p){
        case 'detail-mhs';
            require_once "detail-mhs.php";
            break;
        case 'detail-dsn';
            require_once "detail-dsn.php";
            break;
        case 'edit-dsn';
            require_once "edit-dsn.php";
            break;
        case 'edit-mhs';
            require_once "edit-mhs.php";
            break;
        case 'hapus-mhs';
            require_once "hapus-mhs.php";
            break;
        case 'hapus-dsn';
            require_once "hapus-dsn.php";
            break;
        case 'dosen';
            require_once "dosen.php";
            break;
        case 'mahasiswa';
            require_once "mahasiswa.php";
            break;
        case 'admin';
            require_once "admin.php";
            break;
        case 'ganti_password';
            require_once "ganti_password.php";
            break;
        case 'tambahmahasiswa';
            require_once "tambahmahasiswa.php";
            break;
        case 'tambahdosen.php';
            require_once "tambahdosen.php";
            break;
        default;
        require_once "admin.php";
        break;
}
        
?>