<?php
include "koneksi.php";

//mengambil data dari form input
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$nama_pembuat = $_POST['nama_pembuat'];
$jabatan = $_POST['jabatan'];
$ruangan = $_POST['ruangan'];


$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM events WHERE ruangan='$ruangan' AND start_event='$start'"));
if ($cek > 0) {
    echo "<script>window.alert('Ruangan sudah dibooking')
    window.location='index.php'</script>";
} else {
    //insert data ke dalam database
    mysqli_query($koneksi, "insert into events set title='$title', start_event='$start', end_event='$end', nama_pembuat='$nama_pembuat', jabatan='$jabatan', ruangan='$ruangan' ");
    //kembali ke halaman index.php
    header("location: index.php");
}
