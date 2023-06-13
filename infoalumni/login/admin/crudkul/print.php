<?php 
include '../crudkerkul/starter.php';
?>
    <title>Print | Kuliah</title>
</head>
    <body>
        <div class="container">
            <div class="d-flex">
                <img src="../../../images/favicon.ico" class="logo mr-3">
                <h2>Sistem Informasi Alumni</h2>
            </div>
            <hr>
            <div>
                <p>Data Alumni: Kuliah</p>
            </div>
            <hr>

            <div class="mt-1">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th style="width: 25px;">No</th>
                            <th style="width: 60px;">Nama</th>
                            <th style="width: 100px;">Jenis Kelamin</th>
                            <th style="width: 75px;">Nama Universitas</th>
                            <th style="width: 55px;">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
									$limit = 10;
									$paging = isset($_GET['paging'])?(int)$_GET['paging'] : 1;
									$main_page = ($paging>1) ? ($paging * $limit) - $limit : 0;

									$previous = $paging - 1;
									$next = $paging + 1;

									$query = mysqli_query($koneksi,"SELECT * FROM kuliah");
									$totalquery = mysqli_num_rows($query);
									$totalpaging = ceil($totalquery / $limit);

									$querydata = mysqli_query($koneksi,"SELECT * FROM kuliah limit $main_page, $limit");
									$no = 1;
									while($log = mysqli_fetch_assoc($querydata)) { ?>
                        <tr>
                            <td style="width: 25px;"><?= $no; ?></td>
                            <td style="width: 60px;"><?= $log['nama'];?></td>
                            <td style="width: 100px;"><?= $log['jenis_kelamin'];?></td>
                            <td style="width: 65px;"><?= $log['uni_ver'];?></td>
                            <td style="width: 80px"><?= $log['jurusan'];?></td>
                        </tr>
                    <?php 
                    $no++;
                    }
                    ?>
                    </tbody>
            </table>
            <?php 
            define('DirBlock', TRUE);
            include '../crud/footer.php' ?>