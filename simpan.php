<?php
include "koneksi.php";

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $nama_pembuat = $_POST['nama_pembuat'];
    $jabatan = $_POST['jabatan'];
    $ruangan = $_POST['ruangan'];

    mysqli_query($koneksi, "INSERT INTO events VALUES ('', '$title', '$start', '$end', '$nama_pembuat', '$jabatan', '$ruangan')");
    header("location: index.php");
}
