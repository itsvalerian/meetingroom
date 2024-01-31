<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Ruang Meeting</title>
    <link rel="icon" href="assets/gmbr.png">
    <link rel="stylesheet" href="assets/fullcalendar.css">
    <link rel="stylesheet" href="assets/bootstrap.css">
    <script src="assets/jquery.min.js"></script>
    <script src="assets/jquery-ui.min.js"></script>
    <script src="assets/moment.min.js"></script>
    <script src="assets/fullcalendar.min.js"></script>
</head>

<body>
    <br>
    <h2 class="text-center">App Ruang Meeting</h2>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div     class="alert alert-info" role="alert">
                    <h4 style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Form Kegiatan</h4>
                </div>
                <div class="card">
                    <form action="proses.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-label">Nama Pembuat</div>
                                <input id="nama_pembuat" name="nama_pembuat" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Jabatan/Divisi</div>
                                <input id="jabatan" name="jabatan" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Keterangan Kegiatan</div>
                                <textarea name="title" class="form-control" id="title" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-label">Ruang Meeting</div>
                                <select name="ruangan" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="Arjuna">Arjuna</option>
                                    <option value="Bimasena">Bimasena</option>
                                    <option value="Satria">Satria</option>
                                    <option value="Kirana">Kirana</option>
                                    <option value="Yudistira">Yudistira</option>
                                    <option value="Chandradimuka">Chandradimuka</option>
                                    <option value="Sadewa">Sadewa</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Mulai</div>
                                <input type="datetime-local" class="form-control" name="start" id="mulai">
                            </div>
                            <div class="form-group mt-4">
                                <div class="form-label">Tgl Selesai</div>
                                <input type="datetime-local" class="form-control" name="end" id="selesai">
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="text-right mb-2">
                    <a style="background-color: #DCDCDC;" class="btn btn-sm text-dark" href="dashboard.php" role="button">Detail</a>
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <script>
        //Persiapan jqeury
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                //izinkan table bisa diedit
                editable: true,
                //atur header kalendar
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                //tampilkan data dari database
                events: 'tampil.php',
                //izinkan tabel/kalender bisa dipilih/edit
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    //tampilkan pesan input
                    var title = prompt('Masukkan judul kegiatan');
                    if (title) {
                        //tampung tgl yg dipilih ke dalam variabel start dan end
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        //perintah ajax lempar data untuk disimpan
                        $.ajax({
                            url: "simpan.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                nama_pembuat: nama_pembuat,
                                jabatan: jabatan,
                                ruangan: ruangan,
                            },
                            success: function() {
                                //jika disimpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Simpan jadwal berhasil!');
                            }
                        });
                    }
                },
                //event ketika judul kegiatan diseret/drop
                eventDrop: function(event) {
                    if (confirm("Apakah anda yakin ubah jadwal?")) {
                        //tampung tgl yg dipilih ke dalam variabel start dan end
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;

                        //perintah ajax lempar data untuk disimpan
                        $.ajax({
                            url: "ubah.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function() {
                                //jika disimpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Ubah jadwal berhasil!');
                            }
                        });
                    }

                },
                //event ketika judul diklik
                eventClick: function(event) {
                    if (confirm("Apakah anda yakin akan hapus kegiatan ini?")) {
                        var id = event.id;
                        //perintah ajax lempar data untuk disimpan
                        $.ajax({
                            url: "hapus.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                //jika disimpan sukses refresh kalender dan tampilkan pesan sukses
                                calendar.fullCalendar('refetchEvents');
                                alert('Jadwal berhasil dihapus!');
                            }
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>