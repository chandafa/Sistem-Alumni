<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../../login.php");
} elseif ($_SESSION['level'] != "admin") {
    header("location:../../user/index.php");
}

define('DirRegBlock', TRUE);
include '../../koneksi.php';
include '../../daftar/daftar.php';
?>
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Authorization</title>

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
            <h2 style="font-weight: 700;" class="mb-0">SisInfo<span style="font-weight: 500;">Admin</span></h2>
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
            <h3>Authorization Level, <?php echo $_SESSION['nama']; ?></h3>
            <?php if (isset($_GET['pesan'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($_GET['pesan']); ?>
                    <button type="button" class="close" onclick="window.location.href='authlevels.php';" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <button data-toggle="modal" data-target="#buatAkun" class="btn btn-icon btn-primary"><i class="fas fa-user-plus"></i> Tambah User</button>
                        </div>
                        <div class="modal fade" id="buatAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input class="form-control form-control-sm" name="username" type="text" placeholder="Input your username" required>
                                                <label>Nama:</label>
                                                <input class="form-control form-control-sm" name="nama" type="text" placeholder="Input your name" required>
                                                <label>Password:</label>
                                                <input class="form-control form-control-sm" name="password" type="password" placeholder="Input your password" required>
                                                <label>Confirm Password:</label>
                                                <input class="form-control form-control-sm" name="passwordconfirm" type="password" placeholder="Confirm your password" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="regisforadmin" class="btn btn-primary">Add User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Authorisasi User</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center fonts-big">Nama:</th>
                                        <th class="text-center fonts-big">Username:
                                        <th>
                                        <th class="text-center fonts-big">Leveling:</th>
                                        <th class="text-center fonts-big" colspan="2">Aksi:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM users");
                                    while ($log = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="text-center fonts-big"><?php echo $log['nama']; ?></td>
                                            <td class="text-center fonts-big"><?php echo $log['username']; ?></td>
                                            <td class="text-center fonts-big">
                                                <form action="authchange.php" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $log['id']; ?>">
                                                    <div class="form-group">
                                                        <?php if ($log['level'] == 'newuser') { ?>
                                                            <button type="submit" name="approve" class="btn btn-success btn-icon"><i class="fas fa-check"></i></button>
                                                        <?php } ?>
                                                        <?php if ($log['level'] != 'newuser') { ?>
                                                            <div class="selectdiv">
                                                                <select name="leveling">
                                                                    <option value="admin" <?php if ($log['level'] == 'admin') : ?> selected="selected" <?php endif; ?>>Admin</option>
                                                                    <option value="user" <?php if ($log['level'] == 'user') : ?> selected="selected" <?php endif; ?>>User</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-icon"><i class="fas fa-user-edit"></i> Change
                                                    Level</button>
                                            </td>
                                            </form>
                                            <td class="text-center"><a class="btn btn-info btn-icon" href="editprofdata.php?id=<?php echo $log['id']; ?>"><i class="fas fa-pen"></i> Edit</a></td>
                                            <td class="text-center"><a class="btn btn-danger btn-icon" onclick="return confirm('Yakin hapus data?')" href="hapus.php?id=<?php echo $log['id']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="../index.php" class="btn btn-primary btn-icon">
                            <i class="fas fa-arrow-left"></i>
                            Kembali</a>
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