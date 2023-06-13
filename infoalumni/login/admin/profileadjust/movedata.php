<?php
    include '../../koneksi.php';
    session_start();
    if($_SESSION['status']!="sudah_login"){
        header("location:../../login.php");
        die;
    }elseif($_SESSION['level']!="admin"){
      header("location:../../user/index.php");
      die;
    }
    if(!isset($_GET['id'])){
        echo '<a href="https://instagram.com/al_nv23">Report Here</a><br>';
        die('Go-To Hell Shit. Anyway if you find any other bugs. reports it right away!');
    }
                    $id = $_GET['id'];
                    if($id == "1092472"){
                        $data = mysqli_query($koneksi,"SELECT * FROM request");
                        $row = mysqli_fetch_array($data);
                        if(empty($row['nama'])){
                            header("location:approval.php?pesan=TIDAK ADA DATA. LIHAT?");
                        }else{
                            $data = mysqli_query($koneksi,"SELECT * FROM request");
                        }
                    } else {
                    $data = mysqli_query($koneksi,"SELECT * FROM request where id='$id'");
                    };
                    while($log = mysqli_fetch_array($data)) {
                    $nama = $log['nama'];
                    $tabel = $log['jenis_table'];
                    $jenis_kelamin = $log['jenis_kelamin'];
                    $perusahaan = $log['nama_perusahaan'];
                    $jabatan = $log['jabatan'];
                    $tahun = $log['tahun_kerja'];
                    $namauni = $log['nama_univer'];
                    $jurusan = $log['jurusan'];
                    $alamat = $log['alamat'];
                    $kontak = $log['kontak'];
                    $alasan = $log['alasan'];
                    $jenisusaha = $log['jenis_usaha'];
                    $alamatusaha = $log['alamat_usaha'];
                    $tahun_usaha = $log['tahun_usaha'];
                    $gambar = $log['gambar'];

                   if($tabel == "kerja"){ 
                                $query = "INSERT INTO kerja(nama,jenis_kelamin,nama_perusahaan,jabatan,tahun_kerja,gambar) values ('$nama','$jenis_kelamin','$perusahaan',
                                '$jabatan','$tahun','$gambar')";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil ditambah.");
                                }
                            }
                   if($tabel == "kerjakuliah"){
                                $query = "INSERT INTO kerjakuliah(nama,jenis_kelamin,nama_perusahaan,jabatan,tahun_kerja,uni_ver,jurusan,gambar) values ('$nama','$jenis_kelamin','$perusahaan',
                                '$jabatan','$tahun','$namauni','$jurusan','$gambar')";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil ditambah.");
                                }
                            }
                   if($tabel == "kuliah"){
                                $query = "INSERT INTO kuliah(nama,jenis_kelamin,uni_ver,jurusan,gambar) values ('$nama','$jenis_kelamin','$namauni','$jurusan','$gambar')";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil ditambah.");
                                }
                            }
                   if($tabel == "mencari_kerja"){
                                $query = "INSERT INTO mencari_kerja(nama,jenis_kelamin,alamat,kontak,alasan_cari_kerja,gambar) values ('$nama','$jenis_kelamin','$alamat','$kontak','$alasan','$gambar')";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil ditambah.");
                                }
                            }
                   if($tabel == "usaha"){
                                $query = "INSERT INTO usaha(nama,jenis_kelamin,jenis_usaha,alamat_usaha,tahun_usaha,gambar) values ('$nama','$jenis_kelamin','$jenisusaha','$alamatusaha','$tahun_usaha','$gambar')";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil ditambah.");
                                }
                            }
                   if($id == "1092472"){
                        $query = "DELETE FROM request";
                        $nameuser2 = $log['requested_by'];
                        mysqli_query($koneksi, "UPDATE users set permissions='0' where nama='$nameuser2'");
                   }else {
                        $query = "DELETE FROM request WHERE id='$id'";
                        $nameuser = $log['requested_by'];
                        mysqli_query($koneksi, "UPDATE users set permissions='0' where nama='$nameuser'");
                   };
                        $hasil_query = mysqli_query($koneksi, $query);
                        if(!$hasil_query) {
                        die ("Gagal menghapus data: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                        } else {
                        //echo "<script>alert('Data berhasil dihapus.');window.location='../index.php';</script>";
                        }
                    }
                    ?>