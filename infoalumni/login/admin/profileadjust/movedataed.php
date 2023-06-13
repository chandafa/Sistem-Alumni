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
                        $data = mysqli_query($koneksi,"SELECT * FROM requestedit");
                        $row = mysqli_fetch_array($data);
                        if(empty($row['nama'])){
                            header("location:approval.php?pesan=TIDAK ADA DATA. LIHAT?");
                        }else{
                            $data = mysqli_query($koneksi,"SELECT * FROM requestedit");
                        }
                    }else {
                    $data = mysqli_query($koneksi,"SELECT * FROM requestedit where id='$id'");
                    }
                    while($log = mysqli_fetch_array($data)) {
                    $id_req = $log['id_request'];
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
                       if($gambar != ""){
                        $query1 = "SELECT * FROM kerja where id='$id_req'";
                        $konquery = mysqli_query($koneksi,$query1);
                        $runhapus =  mysqli_fetch_array($konquery);
                        unlink("../crud/gambar/$runhapus[gambar]");
                            $query = "UPDATE kerja SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', nama_perusahaan = '$perusahaan', jabatan = '$jabatan', tahun_kerja = '$tahun', gambar = '$gambar'";
                            $query .= "WHERE id = '$id_req'";
                                $result = mysqli_query($koneksi, $query);
                                if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                        " - ".mysqli_error($koneksi));
                                } else {
                                    header("location:approval.php?pesan=Data berhasil diedit.");
                                }
                            } else{
                            $query = "UPDATE kerja SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', nama_perusahaan = '$perusahaan', jabatan = '$jabatan', tahun_kerja = '$tahun'";
                            $query .= "WHERE id ='$id_req'";
                            $result = mysqli_query($koneksi, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                            } else {
                                header("location:approval.php?pesan=Data berhasil diedit.");
                            }
                        
                        }
                    }
                   if($tabel == "kerjakuliah"){
                    if($gambar != ""){
                        $query1 = "SELECT * FROM kerjakuliah where id='$id_req'";
                        $konquery = mysqli_query($koneksi,$query1);
                        $runhapus =  mysqli_fetch_array($konquery);
                        unlink("../crudkerkul/gambar/$runhapus[gambar]");
                        $query = "UPDATE kerjakuliah SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',nama_perusahaan = '$perusahaan', jabatan = '$jabatan', tahun_kerja = '$tahun', uni_ver = '$namauni', jurusan = '$jurusan', gambar = '$gambar'";
                        $query .= "WHERE id = '$id_req'";
                            $result = mysqli_query($koneksi, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                            } else {
                                header("location:approval.php?pesan=Data berhasil diedit.");
                            }
                        } else{
                        $query = "UPDATE kerjakuliah SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',nama_perusahaan = '$perusahaan', jabatan = '$jabatan', tahun_kerja = '$tahun', uni_ver = '$namauni', jurusan = '$jurusan'";
                        $query .= "WHERE id = '$id_req'";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                " - ".mysqli_error($koneksi));
                        } else {
                            header("location:approval.php?pesan=Data berhasil diedit.");
                        }
                    
                    }
                            }
                   if($tabel == "kuliah"){
                    if($gambar != ""){
                        $query1 = "SELECT * FROM kuliah where id='$id_req'";
                        $konquery = mysqli_query($koneksi,$query1);
                        $runhapus =  mysqli_fetch_array($konquery);
                        unlink("../crudkul/gambar/$runhapus[gambar]");
                        $query = "UPDATE kuliah SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', uni_ver = '$namauni', jurusan = '$jurusan', gambar = '$gambar'";
                        $query .= "WHERE id = '$id_req'";
                            $result = mysqli_query($koneksi, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                            } else {
                                header("location:approval.php?pesan=Data berhasil diedit.");
                            }
                        } else{
                        $query = "UPDATE kuliah SET nama = '$nama', jenis_kelamin = '$jenis_kelamin', uni_ver = '$namauni', jurusan = '$jurusan'";
                        $query .= "WHERE id ='$id_req'";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                " - ".mysqli_error($koneksi));
                        } else {
                            header("location:approval.php?pesan=Data berhasil diedit.");
                        }
                    
                    }
                            }
                   if($tabel == "mencari_kerja"){
                    if($gambar != ""){
                        $query1 = "SELECT * FROM mencari_kerja where id='$id_req'";
                        $konquery = mysqli_query($koneksi,$query1);
                        $runhapus =  mysqli_fetch_array($konquery);
                        unlink("../crudmencrkrj/gambar/$runhapus[gambar]");
                        $query = "UPDATE mencari_kerja SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',alamat = '$alamat', kontak = '$kontak', alasan_cari_kerja = '$alasan', gambar = '$gambar'";
                        $query .= "WHERE id = '$id_req'";
                            $result = mysqli_query($koneksi, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                            } else {
                                header("location:approval.php?pesan=Data berhasil diedit.");
                            }
                        } else{
                        $query = "UPDATE mencari_kerja SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',alamat = '$alamat', kontak = '$kontak', alasan_cari_kerja = '$alasan'";
                        $query .= "WHERE id = '$id_req'";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                " - ".mysqli_error($koneksi));
                        } else {
                            header("location:approval.php?pesan=Data berhasil diedit.");
                        }
                    
                    }
                            }
                   if($tabel == "usaha"){
                    if($gambar != ""){
                        $query1 = "SELECT * FROM usaha where id='$id_req'";
                        $konquery = mysqli_query($koneksi,$query1);
                        $runhapus =  mysqli_fetch_array($konquery);
                        unlink("../crudusaha/gambar/$runhapus[gambar]");
                        $query = "UPDATE usaha SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',jenis_usaha = '$jenisusaha', alamat_usaha = '$alamatusaha', tahun_usaha = '$tahun_usaha', gambar = '$gambar'";
                        $query .= "WHERE id = '$id_req'";
                            $result = mysqli_query($koneksi, $query);
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                    " - ".mysqli_error($koneksi));
                            } else {
                                header("location:approval.php?pesan=Data berhasil diedit.");
                            }
                        } else{
                            $query = "UPDATE usaha SET nama = '$nama', jenis_kelamin = '$jenis_kelamin',jenis_usaha = '$jenisusaha', alamat_usaha = '$alamatusaha', tahun_usaha = '$tahun_usaha'";
                            $query .= "WHERE id = '$id_req'";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result){
                            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                " - ".mysqli_error($koneksi));
                        } else {
                            header("location:approval.php?pesan=Data berhasil diedit.");
                        }
                    
                            }
                        }
                   if($id == "1092472"){
                        $query = "DELETE FROM requestedit";
                        $nameuser2 = $log['request_by'];
                        mysqli_query($koneksi, "UPDATE users set permissions='0' where nama='$nameuser2'");
                   }else {
                        $query = "DELETE FROM requestedit WHERE id='$id'";
                        $nameuser = $log['request_by'];
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