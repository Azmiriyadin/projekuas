<?php
include "config.php";

if ($_POST) {
    if ($_POST['deletethis'] ?? '') {
        mysqli_query($koneksi,"DELETE FROM `data_mahasiswa` WHERE nim='$_GET[nim]'");
    } else {
        mysqli_query($koneksi,"REPLACE INTO `data_mahasiswa`(`id`, `nim`, `nama_depan`, `nama_belakang`, `tgl_lahir`, `jk`)
        VALUES (null,'$_POST[txtnim]','$_POST[txtnamadepan]','$_POST[txtnamabelakang]','$_POST[txttgllahir]','$_POST[cbojk]')");
    }
    
    header("location:index.php");
}


$data = mysqli_query($koneksi,"SELECT * FROM data_mahasiswa");

if ($_GET['nim'] ?? '') {
    $edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM data_mahasiswa WHERE nim='$_GET[nim]'"));
}

include "view/index.php";