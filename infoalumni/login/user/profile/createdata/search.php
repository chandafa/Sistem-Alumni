<?php
include '../../../koneksi.php';
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search | SisInfoAlumni</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../../../admin/assets/vendors/bootstrap/css/bootstrap.css">
    <!-- Style CSS (White)-->
    <link rel="stylesheet" href="../../../admin/assets/css/White.css">
    <link rel="stylesheet" href="../../../admin/assets/vendors/fontawesome/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="nav">
            <li class="nav-item">
                <a href="../../index.php" class="nav-link">Back to Home</a>
            </li>
        </ul>
    </nav>
    <div class="card align-items-center">
        <div class="card-header">
            Search
        </div>
        <div class="card-body">
            <div class="card-title">
                <form class="form-inline" method="GET">
                    <div class="selectdiv" style="width:165px">
                        <select name="kategori">
                            <option value="all">All</option>
                            <option value="kerja">Kerja</option>
                            <option value="kuliah">Kuliah</option>
                            <option value="kerjakuliah">Kerja & Kuliah</option>
                            <option value="mencarikerja">Mencari Kerja</option>
                            <option value="usaha">Membuka Usaha</option>
                        </select>
                    </div>
                    <input class="form-control mx-sm-2" type="text" name="pencarian" placeholder="Search">
                    <button type="submit" name="cari" class="btn btn-secondary btn-icon mb-2"><i
                            class="fas fa-search"></i></button>
                    <button type="button" onclick="location.href='search.php';"
                        class="btn block btn-secondary btn-icon mb-2"><i class="fas fa-redo-alt"></i></button>
                </form>
            </div>
            <div class="alert alert-warning">Jika data yang kamu cari tidak ditemukan. Cobalah untuk memilih kategori.
            </div>
            <?php if (isset($_GET['sdu'])) {
                echo $_GET['sdu'];
            } ?>
            <?php if (isset($_GET['kategori'])) {
                $kategori = $_GET['kategori'];
                echo $kategori;
                if ($kategori == 'kerja') { ?>
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama: </th>
                        <th>Jenis Kelamin: </th>
                        <th>Nama Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Tahun Kerja</th>
                        <th>Gambar:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $search = $_GET['pencarian'];
                            $query = mysqli_query($koneksi, "SELECT * FROM kerja WHERE nama LIKE '%$search%' ORDER BY id ASC");
                            $result = mysqli_num_rows($query);
                            if ($result == 0) {
                                header("location:search.php?sdu=Data tidak ditemukan.");
                                die();
                            }
                            while ($log = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= $log['nama']; ?></td>
                        <td><?= $log['jenis_kelamin']; ?></td>
                        <td><?= $log['nama_perusahaan']; ?></td>
                        <td><?= $log['jabatan']; ?></td>
                        <td><?= $log['tahun_kerja']; ?></td>
                        <?php if ($log['gambar'] != "") { ?>
                        <td><a href="crud/lihat.php?id=<?= $log['id']; ?>"><img src="crud/gambar/<?= $log['gambar']; ?>"
                                    style="width:50px;"></a></td>
                        <?php } ?>
                        <?php if ($log['gambar'] == "") { ?>
                        <td>Tidak ada gambar</td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end of if kategori-->
            <?php } ?>
            <!--Start of kuliah-->
            <?php if ($kategori == 'kuliah') { ?>
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Universitas</th>
                        <th>Jurusan</th>
                        <th>Gambar:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $search2 = $_GET['pencarian'];
                            $query2 = mysqli_query($koneksi, "SELECT * FROM kuliah WHERE nama LIKE '%$search2%' ORDER BY id ASC");
                            $result2 = mysqli_num_rows($query2);
                            if ($result2 == 0) {
                                header("location:search.php?sdu=Data tidak ditemukan.");
                                die();
                            }
                            while ($log2 = mysqli_fetch_assoc($query2)) { ?>
                    <tr>
                        <td><?= $log2['nama']; ?></td>
                        <td><?= $log2['jenis_kelamin']; ?></td>
                        <td><?= $log2['uni_ver']; ?></td>
                        <td><?= $log2['jurusan']; ?></td>
                        <?php if ($log2['gambar'] != "") { ?>
                        <td><a href="crudkul/lihat.php?id=<?= $log2['id']; ?>"><img
                                    src="crudkul/gambar/<?= $log2['gambar']; ?>" style="width:50px;50px;"></a></td>
                        <?php } ?>
                        <?php if ($log2['gambar'] == "") { ?>
                        <td>Tidak ada gambar</td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end of if kategori-->
            <?php } ?>
            <!--Start of kerja kuliah-->
            <?php if ($kategori == 'kerjakuliah') { ?>
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Tahun Kerja</th>
                        <th>Nama Universitas</th>
                        <th>Jurusan</th>
                        <th>Gambar:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $search3 = $_GET['pencarian'];
                            $query3 = mysqli_query($koneksi, "SELECT * FROM kerjakuliah WHERE nama LIKE '%$search3%' ORDER BY id ASC");
                            $result3 = mysqli_num_rows($query3);
                            if ($result3 == 0) {
                                header("location:search.php?sdu=Data tidak ditemukan.");
                                die();
                            }
                            while ($log3 = mysqli_fetch_assoc($query3)) { ?>
                    <tr>
                        <td><?= $log3['nama']; ?></td>
                        <td><?= $log3['jenis_kelamin']; ?></td>
                        <td><?= $log3['nama_perusahaan']; ?></td>
                        <td><?= $log3['jabatan']; ?></td>
                        <td><?= $log3['tahun_kerja']; ?></td>
                        <td><?= $log3['uni_ver']; ?></td>
                        <td><?= $log3['jurusan']; ?></td>
                        <?php if ($log3['gambar'] != "") { ?>
                        <td><a href="crudkerkul/lihat.php?id=<?= $log3['id']; ?>"><img
                                    src="crudkerkul/gambar/<?= $log3['gambar']; ?>" style="width:50px;50px;"></a>
                        </td>
                        <?php } ?>
                        <?php if ($log3['gambar'] == "") { ?>
                        <td>Tidak ada gambar</td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
                <!--End of if kategori-->
                <?php } ?>
                <!--Start of mencarikerja-->
                <?php if ($kategori == 'mencarikerja') { ?>
                <table class="table table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat:</th>
                            <th>Nomor Kontak:</th>
                            <th>Alasan Mencari Kerja:</th>
                            <th>Gambar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $search4 = $_GET['pencarian'];
                                $query4 = mysqli_query($koneksi, "SELECT * FROM mencari_kerja WHERE nama LIKE '%$search4%' ORDER BY id ASC");
                                $result4 = mysqli_num_rows($query4);
                                if ($result4 == 0) {
                                    header("location:search.php?sdu=Data tidak ditemukan.");
                                    die();
                                }
                                while ($log4 = mysqli_fetch_assoc($query4)) { ?>
                        <tr>
                            <td><?= $log4['nama']; ?></td>
                            <td><?= $log4['jenis_kelamin']; ?></td>
                            <td><?= $log4['alamat']; ?></td>
                            <td><a href="https://api.whatsapp.com/send?phone=<?= $log4['kontak'];?>" target="_blank"><?= $log4['kontak'];?></a></td>
                            <td><?= $log4['alasan_cari_kerja']; ?></td>
                            <?php if ($log4['gambar'] != "") { ?>
                            <td><a href="crudmencrkrj/lihat.php?id=<?php echo $log4['id']; ?>"><img
                                        src="crudmencrkrj/gambar/<?php echo $log4['gambar']; ?>"
                                        style="width:50px;"></a>
                            </td>
                            <?php } ?>
                            <?php if ($log4['gambar'] == "") { ?>
                            <td>Tidak ada gambar</td>
                            <?php } ?>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <!--End of if kategori-->
                <?php } ?>
                <!--Start of usaha-->
                <?php if ($kategori == 'usaha') { ?>
                <table class="table table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jenis Usaha</th>
                            <th>Alamat Usaha</th>
                            <th>Tahun Mulai Usaha</th>
                            <th>Gambar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $search5 = $_GET['pencarian'];
                                $query5 = mysqli_query($koneksi, "SELECT * FROM usaha WHERE nama LIKE '%$search5%' ORDER BY id ASC");
                                $result5 = mysqli_num_rows($query5);
                                if ($result5 == 0) {
                                    header("location:search.php?sdu=Data tidak ditemukan.");
                                    die();
                                }
                                while ($log5 = mysqli_fetch_assoc($query5)) { ?>
                        <tr>
                            <td><?= $log5['nama']; ?></td>
                            <td><?= $log5['jenis_kelamin']; ?></td>
                            <td><?= $log5['jenis_usaha']; ?></td>
                            <td><?= $log5['alamat_usaha']; ?></td>
                            <td><?= $log5['tahun_usaha']; ?></td>
                            <?php if ($log5['gambar'] != "") { ?>
                            <td><a href="crudusaha/lihat.php?id=<?php echo $log5['id']; ?>"><img
                                        src="crudusaha/gambar/<?php echo $log5['gambar']; ?>" style="width:50px;"></a>
                            </td>
                            <?php } ?>
                            <?php if ($log5['gambar'] == "") { ?>
                            <td>Tidak ada gambar</td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!--End of if kategori-->
                <?php } ?>
                <!--Start of all categories search-->
                <?php if ($kategori == 'all') {
                        $searchall = $_GET['pencarian'];
                        //first search
                        $queryall1 = mysqli_query($koneksi, "SELECT * FROM kerja where nama LIKE '%$searchall%' ORDER BY id ASC");
                        $allresult1 = mysqli_num_rows($queryall1);
                        if ($allresult1 > 0) {
                            header('location:search.php?kategori=kerja&pencarian=' . $searchall);
                        } else {
                            $queryall2 = mysqli_query($koneksi, "SELECT * FROM kuliah where nama LIKE '%$searchall%' ORDER BY id ASC");
                            $allresult2 = mysqli_num_rows($queryall2);
                            if ($allresult2 > 0) {
                                header('location:search.php?kategori=kuliah&pencarian=' . $searchall);
                            } else {
                                $queryall3 = mysqli_query($koneksi, "SELECT * FROM kerjakuliah where nama LIKE '%$searchall%' ORDER BY id ASC");
                                $allresult3 = mysqli_num_rows($queryall3);
                                if ($allresult3 > 0) {
                                    header('location:search.php?kategori=kerjakuliah&pencarian=' . $searchall);
                                } else {
                                    $queryall4 = mysqli_query($koneksi, "SELECT * FROM mencari_kerja where nama LIKE '%$searchall%' ORDER BY id ASC");
                                    $allresult4 = mysqli_num_rows($queryall4);
                                    if ($allresult4 > 0) {
                                        header('location:search.php?kategori=mencarikerja&pencarian=' . $searchall);
                                    } else {
                                        $queryall5 = mysqli_query($koneksi, "SELECT * FROM usaha where nama LIKE '%$searchall%' ORDER BY id ASC");
                                        $allresult5 = mysqli_num_rows($queryall5);
                                        if ($allresult5 > 0) {
                                            header('location:search.php?kategori=usaha&pencarian=' . $searchall);
                                        } else {
                                            header('location:search.php?sdu=Data tidak ditemukan.');
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                <!--Check variable value-->
                <?php } ?>
        </div>
    </div>
</body>
<script src="../../../admin/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>