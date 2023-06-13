<?php
include '../koneksi.php';
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
} elseif ($_SESSION['level'] != "admin") {
    header("location:../user/index.php");
}
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tabel Usaha</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
    <!-- Style CSS (White)-->
    <link rel="stylesheet" href="assets/css/White.css">
    <!-- Style CSS (Dark)-->
    <link rel="stylesheet" href="assets/css/Dark.css">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
    <!-- Icon LineAwesome CSS-->
    <link rel="stylesheet" href="assets/vendors/lineawesome/css/line-awesome.min.css">

</head>

<body>

    <!--Topbar -->
    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="las la-bars"></i>
            </button>
        </div>
        <div class="menu">

            <ul>

                <li>
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" title="Dark Or White" />
                            Dark Mode
                            <div class="slider round"></div>
                        </label>
                    </div>
                </li>

                <li>
                    <div class="dropdown">
                        <div class="dropdown-toggle" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><?php echo $_SESSION['nama']; ?></span>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                            <a class="dropdown-item" href="../logout.php">
                                <i class="las la-sign-out-alt mr-2"></i> Sign Out
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!--Sidebar-->
    <div class="sidebar transition overlay-scrollbars">
        <div class="logo">
            <h2 style="font-weight: 700;" class="mb-0">SisInfo<span style="font-weight: 500;">Admin</span></h2>
        </div>

        <div class="sidebar-items">
            <div class="accordion" id="sidebar-items">
                <ul>

                    <p class="menu">Apps</p>

                    <li>
                        <a href="index.php" class="items">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    <p class="menu">Admin Menu</p>

                    <li id="headingTwo">
                        <a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas la-wrench"></i>
                            <span>Abilities</span>
                            <i class="fas la-angle-right"></i>
                        </a>
                    </li>
                    <div id="collapseTwo" class="collapse submenu" aria-labelledby="headingTwo" data-parent="#sidebar-items">
                        <ul>

                            <li>
                                <a href="profileadjust/authlevels.php">Authorization Levels</a>
                            </li>
                            <li>
                                <a href="profileadjust/approval.php">User Permissions</a>
                            </li>

                        </ul>
                    </div>

                    <p class="menu">Pages</p>

                    <li id="headingThree">
                        <a href="onclick();" class="submenu-items" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                            <i class="fas la-cog"></i>
                            <span>Tables</span>
                            <i class="fas la-angle-right"></i>
                        </a>
                    </li>
                    <div id="collapsefour" class="collapse submenu" aria-labelledby="headingThree" data-parent="#sidebar-items">
                        <ul>

                            <li>
                                <a href="kerja.php">Kerja</a>
                            </li>

                            <li>
                                <a href="kerjakuliah.php">Kerja dan Kuliah</a>
                            </li>

                            <li>
                                <a href="kuliah.php">Kuliah</a>
                            </li>

                            <li>
                                <a href="mencrkrj.php">Mencari Kerja</a>
                            </li>

                            <li>
                                <a href="usaha.php">Usaha</a>
                            </li>

                            <li>
                                <a href="search.php">Cari Data</a>
                            </li>

                        </ul>
                    </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay"></div>


    <!--Content Start-->
    <div class="content transition">
        <div class="container-fluid dashboard">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Table Usaha</h5>
                        <?php if (isset($_GET['pesan'])) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($_GET['pesan']); ?>
                                <button type="button" class="close" onclick="window.location.href='usaha.php';" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <a href="crudusaha/tambah.php" class="btn btn-primary btn-icon"><i class="fas fa-plus"></i>
                                Tambah Data</a>
                            <a href="crudusaha/print.php" target="_blank" class="btn btn-info btn-icon"><i class="fas fa-print"></i> Print</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jenis Usaha</th>
                                        <th>Alamat Usaha</th>
                                        <th>Tahun Mulai Usaha</th>
                                        <th>Gambar:</th>
                                        <th class="text-center" colspan="2">Aksi:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $limit = 20;
                                    $paging = isset($_GET['paging']) ? (int)$_GET['paging'] : 1;
                                    $main_page = ($paging > 1) ? ($paging * $limit) - $limit : 0;

                                    $previous = $paging - 1;
                                    $next = $paging + 1;

                                    $query = mysqli_query($koneksi, "SELECT * FROM usaha");
                                    $totalquery = mysqli_num_rows($query);
                                    $totalpaging = ceil($totalquery / $limit);

                                    $querydata = mysqli_query($koneksi, "SELECT * FROM usaha ORDER BY id DESC limit $main_page, $limit");
                                    $no = 1;
                                    while ($log = mysqli_fetch_assoc($querydata)) { ?>
                                        <tr>
                                            <td><?php echo $log['nama']; ?></td>
                                            <td><?php echo $log['jenis_kelamin']; ?></td>
                                            <td><?php echo $log['jenis_usaha']; ?></td>
                                            <td><?php echo $log['alamat_usaha']; ?></td>
                                            <td><?php echo $log['tahun_usaha']; ?></td>
                                            <?php if ($log['gambar'] != "") { ?>
                                                <td><a href="crudusaha/lihat.php?id=<?php echo $log['id']; ?>"><img src="crudusaha/gambar/<?php echo $log['gambar']; ?>" style="width:50px;"></a></td>
                                            <?php } ?>
                                            <?php if ($log['gambar'] == "") { ?>
                                                <td>Tidak ada gambar</td>
                                            <?php } ?>
                                            <td class="text-center"><a href="crudusaha/edit.php?id=<?php echo $log['id']; ?>" class="btn btn-warning btn-icon"><i class="fas fa-edit"></i> Edit</td>
                                            <td class="text-center"><a href="crudusaha/hapus.php?id=<?php echo $log['id']; ?>" class="btn btn-danger btn-icon" onclick="return confirm('Yakin ingin hapus data?')"><i class="fas fa-trash-alt"></i> Hapus</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <?php if (mysqli_num_rows($querydata) > 0) { ?>
                        <ul class="pagination bgadjust justify-content-center">
                            <li class="page-item bgadjust">
                                <a class="page-link bgadjust bgadjust-hover" <?php if ($paging > 1) {
                                                                                    echo "href='?paging=$previous'";
                                                                                } ?>><i class="fas fa-backward"></i></a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $totalpaging; $x++) {
                            ?>
                                <li class="page-item bgadjust"><a class="page-link bgadjust bgadjust-hover" href="?paging=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item bgadjust">
                                <a class="page-link bgadjust bgadjust-hover" <?php if ($paging < $totalpaging) {
                                                                                    echo "href='?paging=$next'";
                                                                                } ?>><i class="fas fa-forward"></i></a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <div class="footer transition">
        <hr>
        <p>
            Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> <a expr:href='data:blog.homepageUrl'><data:blog.title/></a>. All rights reserved. | Repost by <a href='https://sharecodingan.blogspot.com/' title='sharecodingan.blogspot.com' target='_blank'>ShareCodingan</a>
        </p>
    </div>

    <!-- Loader -->
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="loader-overlay"></div>

    <!-- Library Javascipt-->
    <script src="assets/vendors/bootstrap/js/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>