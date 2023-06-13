<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../../login.php");
} elseif ($_SESSION['level'] != "admin") {
    header("location:../../user/index.php");
}
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>User Approval</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
    <!-- Style CSS (White)-->
    <link rel="stylesheet" href="../assets/css/White.css">
    <!-- Style CSS (Dark)-->
    <link rel="stylesheet" href="../assets/css/Dark.css">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.css">
    <!-- Icon LineAwesome CSS-->
    <link rel="stylesheet" href="../assets/vendors/lineawesome/css/line-awesome.min.css">

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
                            <a class="dropdown-item" href="../../logout.php">
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
            <h2 style="font-weight: 700;" class="mb-0">Info<span style="font-weight: 500;">Admin</span></h2>
        </div>

        <div class="sidebar-items">
            <div class="accordion" id="sidebar-items">
                <ul>

                    <p class="menu">Apps</p>

                    <li>
                        <a href="../index.php" class="items">
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
                                <a href="authlevels.php">Authorization Levels</a>
                            </li>
                            <li>
                                <a href="approval.php">User Permissions</a>
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
                                <a href="../kerja.php">Kerja</a>
                            </li>

                            <li>
                                <a href="../kerjakuliah.php">Kerja dan Kuliah</a>
                            </li>

                            <li>
                                <a href="../kuliah.php">Kuliah</a>
                            </li>

                            <li>
                                <a href="../mencrkrj.php">Mencari Kerja</a>
                            </li>

                            <li>
                                <a href="../usaha.php">Usaha</a>
                            </li>

                            <li>
                                <a href="../search.php">Cari Data</a>
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
            <h3>User Permissions</h3>
            <?php if (isset($_GET['pesan'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($_GET['pesan']); ?>
                    <button type="button" class="close" onclick="window.location.href='approval.php';" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Permintaan User</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama:</th>
                                        <th>Permintaan penambahan:</th>
                                        <th>User:</th>
                                        <th colspan="3" class="text-center">Aksi:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM request");
                                    while ($log = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $log['nama']; ?></td>
                                            <td><?php echo $log['jenis_table']; ?></td>
                                            <td><?php echo $log['requested_by']; ?></td>
                                            <td><a href="movedata.php?id=<?php echo $log['id']; ?>" class="btn btn-success btn-icon"><i class="fas fa-check"></i> Setuju</a>
                                            </td>
                                            <td><a href="hapusreq.php?id=<?php echo $log['id']; ?>" class="btn btn-danger btn-icon"><i class="fas fa-times"></i> Tolak</a>
                                            </td>
                                            <td><a href="lihatdata.php?id=<?php echo $log['id']; ?>&jenistable=<?php echo $log['jenis_table']; ?>" class="btn btn-info btn-icon"><i class="fas fa-eye"></i> Lihat</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="movedata.php?id=1092472" class="btn btn-success btn-icon"><i class="fas fa-check"></i>
                            Setujui Semua</a>
                        <a href="hapusreq.php?id=2903482" class="btn btn-danger btn-icon"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Permintaan Edit Data User</p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama:</th>
                                        <th>Permintaan perubahan:</th>
                                        <th>User:</th>
                                        <th colspan="3" class="text-center">Aksi:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM requestedit");
                                    while ($log = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $log['nama']; ?></td>
                                            <td><?php echo $log['jenis_table']; ?></td>
                                            <td><?php echo $log['request_by']; ?></td>
                                            <td><a href="movedataed.php?id=<?php echo $log['id']; ?>" class="btn btn-success btn-icon"><i class="fas fa-check"></i> Setuju</a>
                                            </td>
                                            <td><a href="hapusreqed.php?id=<?php echo $log['id']; ?>" class="btn btn-danger btn-icon"><i class="fas fa-times"></i> Tolak</a>
                                            </td>
                                            <td><a href="peekreqed.php?id=<?php echo $log['id']; ?>&jenistable=<?php echo $log['jenis_table']; ?>" class="btn btn-info btn-icon"><i class="fas fa-eye"></i> Lihat</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="../index.php" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                        <a href="movedataed.php?id=1092472" class="btn btn-success btn-icon"><i class="fas fa-check"></i> Setujui Semua</a>
                        <a href="hapusreqed.php?id=2903482" class="btn btn-danger btn-icon"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
                    </div>
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
    <script src="../assets/vendors/bootstrap/js/jquery.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>