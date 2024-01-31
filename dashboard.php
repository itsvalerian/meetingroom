<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>App Ruang Meeting</title>
    <link rel="icon" href="assets/gmbr.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">App RoomMeet</div>
            <div class="list-group list-group-flush">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"> <i class="fa fa-bars fa-lg"></i> </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Kembali</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pembuat</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Title</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "select * from events");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $d['nama_pembuat'] ?></td>
                                <td><?= $d['jabatan'] ?></td>
                                <td><?= $d['title'] ?></td>
                                <td><?= $d['ruangan'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($d['start_event'])); ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($d['end_event'])); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>