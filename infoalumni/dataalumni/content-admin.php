<?php 
if ($_GET[page] == 'edit'){ 
	if (isset($_POST[submit])){
		mysql_query("UPDATE tbl_page SET judul = '$_POST[a]', isi = '$_POST[b]' where id_page='$_GET[id]'");
		echo "<script>window.alert('Sukses Update Data.');
				window.location='index.php?page=edit&id=$_GET[id]'</script>";
	}

	$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='$_GET[id]'"));
	echo "<div class='artikel'>
		  <h1>Kelola data Halaman</h1>
		  <form action='' method='POST'>
			  <table width=100%>
				 <tr><td><input style='width:90%' type='text' name='a' value='$p[judul]'></td></tr>
				 <tr><td><textarea name='b' style='width:100%; height:350px'>$p[isi]</textarea></td></tr>
				 <tr><td><input type='submit' name='submit' value=' Update '></td></tr>
			  </table>
		  </form>
	 </div>";		
}

elseif ($_GET[page] == 'pendaftar'){
	if ($_GET[aksi] == ''){
		echo "<div class='artikel'>
			  <h1>Semua Data Pendaftar Baru $_GET[name]</h1>
				<table border='1' width=100%>
					<tr bgcolor=#c3c3c3>
						<th>No</th>
						<th>Nim</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Angkatan</th>
						<th>Pekerjaan</th>
						<th>Aksi</th>
					</tr>";
					
					$alumni = mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.status='0' AND a.id_pasca_sarjana='$_GET[id]' ORDER BY a.nim DESC");
					$no = 1;
					while ($r = mysql_fetch_array($alumni)){
						echo "<tr>
								  <td>$no</td>
								  <td>$r[nim]</td>
								  <td>$r[nm_mahasiswa]</td>
								  <td>$r[jk]</td>
								  <td align=center>$r[angkatan]</td>
								  <td>$r[pekerjaan]</td>
								  <td><a href='index.php?page=datasiswa&id=$r[nim]'>Detail</a> | 
								  	  <a href='index.php?page=pendaftar&id=$r[nim]&aksi=aktif'>Aktifkan</a></td>
							  </tr>";
						$no++;
					}
				echo "</table>
			  </div>";
	}elseif ($_GET[aksi] == 'aktif'){
		mysql_query("UPDATE tbl_alumni SET status='1' where nim='$_GET[id]'");
		echo "<script>window.alert('Sukses Aktifkan ALumni Terpilih.');
				window.location='index.php?page=pendaftar'</script>";
	}
}

elseif ($_GET[page] == 'kelolaalumni'){
	if ($_GET[aksi] == ''){
		echo "<div class='artikel'>
			  <h1>Semua Data Alumni $_GET[name]</h1>
			  <form style='float:left' action='' method='POST'>
			  		<input style='width:300px' type='search' name='cari' placeholder='Masukkan Nim atau Nama Alumni,..'>
			  		<input type='submit' value='cari'>
			  </form>
			  <a target='BLANK' style='float:right' href='alumni-print.php?id=$_GET[id]&name=$_GET[name]'>Cetak Laporan</a>
				<table border='1' width=100%>
					<tr bgcolor=#c3c3c3>
						<th>No</th>
						<th>Nim</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Angkatan</th>
						<th>Pekerjaan</th>
						<th>Aksi</th>
					</tr>";
					if (isset($_POST[cari])){
						$alumni = mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.status='1' AND a.id_pasca_sarjana='$_GET[id]' AND (a.nim LIKE '%$_POST[cari]%' OR a.nm_mahasiswa LIKE '%$_POST[cari]%') ORDER BY a.nim DESC");
					}else{
						$alumni = mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.status='1' AND a.id_pasca_sarjana='$_GET[id]' ORDER BY a.nim DESC");
					}
					$no = 1;
					while ($r = mysql_fetch_array($alumni)){
						echo "<tr>
								  <td>$no</td>
								  <td>$r[nim]</td>
								  <td>$r[nm_mahasiswa]</td>
								  <td>$r[jk]</td>
								  <td align=center>$r[angkatan]</td>
								  <td>$r[pekerjaan]</td>";
								  if ($_SESSION[level]=='admin'){
									  	echo "<td><a href='index.php?page=datasiswa&id=$r[nim]'>Detail</a> | 
									  	  	<a href='index.php?page=kelolaalumni&id=$r[nim]&aksi=aktif'>Non Aktifkan</a></td>";
								  }elseif($_SESSION[level]=='alumni'){
								  		echo "<td align=center><a href='index.php?page=detailalumni&id=$r[nim]'>Lihat Detail</a></td>";
								  }
							  echo "</tr>";
						$no++;
					}
				echo "</table>
			  </div>";
	}elseif ($_GET[aksi] == 'aktif'){
		mysql_query("UPDATE tbl_alumni SET status='0' where nim='$_GET[id]'");
		echo "<script>window.alert('Sukses Non Aktifkan ALumni Terpilih.');
				window.location='index.php?page=kelolaalumni'</script>";
	}
}

elseif ($_GET[page] == 'detailalumni'){
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.nim='$_GET[id]'"));
echo "<div class='artikel'>
		<h1>Detail Data Alumni</h1>";
				echo "<table width=100%>
					<tr><td width=120>No Induk</td>				<td> : $r[nim]</td></tr>
					<tr><td width=120>Pasca Sarjana</td>		<td> : $r[nama_program_pasca]</td></tr>
					<tr><td width=120>Angkatan</td>				<td> : $r[angkatan]</td></tr>
					<tr><td width=120>Nama Lengkap</td>			<td> : $r[nm_mahasiswa]</td></tr>
					<tr><td width=120 valign=top>Alamat</td>	<td> : $r[alamat]</td></tr>
					<tr><td width=120>Tempat Lahir</td>			<td> : $r[tempat_lahir]</td></tr>
					<tr><td width=120>Tanggal Lahir</td>		<td> : $r[tanggal_lahir]</td></tr>
					<tr><td width=120>Jenis Kelamin</td>		<td> : $r[jk]</td></tr>
					<tr><td width=120>Agama</td>				<td> : $r[agama]</td></tr>
					<tr><td width=120>Pekerjaan</td>			<td> : $r[pekerjaan]</td></tr>
					<tr><td width=120>No Telpon</td>			<td> : $r[no_telpon]</td></tr>
					<tr><td width=120 valign=top>Foto</td><td valign=top> : ";
									if ($r[foto]==''){
										echo "<img width='110px' src='foto_alumni/no-image.jpg'>";
									}else{
										echo "<img width='110px' src='foto_alumni/$r[foto]'>";
									}
									echo "</td></tr>	

				</table>
	  </div>";	
}

elseif ($_GET[page] == 'kelolaberita'){
if ($_GET[aksi] == ''){
	echo "<div class='artikel'>
		  <h1>Kelola Daftar Berita</h1>
			<a href='index.php?page=kelolaberita&aksi=tambah'><input type='button' value='Tambahkan Berita'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th>No</th>
					<th>Judul</th>
					<th>Tanggal Terbit</th>
					<th>Aksi</th>
				</tr>";
				
				$berita = mysql_query("SELECT * FROM tbl_berita where status='berita' ORDER BY id_berita DESC");
				$no = 1;
				while ($r = mysql_fetch_array($berita)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[judul]</td>
							  <td>$r[tanggal]</td>
							  <td><a href='index.php?page=kelolaberita&aksi=edit&id=$r[id_berita]'>Edit</a> | <a href='index.php?page=kelolaberita&aksi=hapus&id=$r[id_berita]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>
		  </div>";
}elseif ($_GET[aksi] == 'hapus'){
	mysql_query("DELETE FROM tbl_berita where id_berita='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Berita.');
								window.location='index.php?page=kelolaberita'</script>";
	
}elseif ($_GET[aksi] == 'tambah'){
	if (isset($_POST[submit])){
		$tgll = date("Y-m-d H:i:s");
						mysql_query("INSERT INTO tbl_berita (id_kategori, nim, judul, isi, tanggal) VALUES('$_POST[c]','','$_POST[a]','$_POST[b]','$tgll')");
		echo "<script>window.alert('Sukses Terbitkan Berita.');
								window.location='index.php?page=kelolaberita'</script>";
	}
		echo "<div class='artikel'>
		  <h1>Tambah Daftar Berita</h1>
				<form action='' method='POST'>
					<table width=100%>
						<tr><td width=120px>Judul</td> <td><input style='width:70%' type='text' name='a'></td></tr>
						<tr><td width=120px>Kat. Tulisan</td> <td><select name='c'>
																				<option value='0'>- Pilih Kategori Tulisan -</option>";
																				$kategori = mysql_query("SELECT * FROM tbl_kategori");
																				while ($k = mysql_fetch_array($kategori)){
																					echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
																				}
																			  echo "</select></td></tr>
						<tr><td>Isi berita</td> <td><textarea style='width:100%; height:250px' name='b'></textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='submit' value='Simpan'></td></tr>
					</table>
				</form>
		  </div>";
}elseif ($_GET[aksi] == 'edit'){
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_berita where id_berita='$_GET[id]'"));
	
	if (isset($_POST[update])){
		mysql_query("UPDATE tbl_berita SET judul  	= '$_POST[a]',
										   isi 		= '$_POST[b]' where id_berita='$_GET[id]'");
		echo "<script>window.alert('Sukses Update Berita.');
								window.location='index.php?page=kelolaberita'</script>";
	}
		echo "<div class='artikel'>
		  <h1>Edit Daftar Berita</h1>
				<form action='' method='POST'>
					<table width=100%>
						<tr><td width=120px>Judul</td> <td><input style='width:70%' type='text' name='a' value='$r[judul]'></td></tr>
						<tr><td>Isi berita</td> <td><textarea style='width:100%; height:250px' name='b'>$r[isi]</textarea></td></tr>
						<tr><td></td> <td><input type='submit' name='update' value='Update'></td></tr>
					</table>
				</form>
		  </div>";
}
}

elseif ($_GET[page] == 'kelolagaleri'){
	if ($_GET[aksi] == ''){
	echo "<div class='artikel'>
		  <h1>Kelola Daftar Gallery Foto</h1>
			<a href='index.php?page=kelolagaleri&aksi=tambah'><input type='button' value='Tambahkan Foto'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th>No</th>
					<th>Judul Foto</th>
					<th>Foto</th>
					<th>Tanggal Terbit</th>
					<th>Aksi</th>
				</tr>";
				
				$gallery = mysql_query("SELECT * FROM tbl_gallery ORDER BY id_gallery DESC");
				$no = 1;
				while ($r = mysql_fetch_array($gallery)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[judul_foto]</td>
							  <td><a target='_BLANK' href='foto_gallery/$r[foto]'>$r[foto]</a></td>
							  <td>$r[tanggal] WIB</td>
							  <td><a href='index.php?page=kelolagaleri&aksi=hapus&id=$r[id_gallery]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>
		  </div>";
}elseif($_GET[aksi] == 'hapus'){
	mysql_query("DELETE FROM tbl_gallery where id_gallery='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Foto.');
								window.location='index.php?page=kelolagaleri'</script>";
								
}elseif($_GET[aksi] == 'tambah'){
	if (isset($_POST[submit])){
		$tgll = date("Y-m-d");
		$dir_gambar = 'foto_gallery/';
			$filename = basename($_FILES['c']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['c']['tmp_name'], $uploadfile)) {
						mysql_query("INSERT INTO tbl_gallery (judul_foto, foto, keterangan, tanggal) VALUES('$_POST[a]','$filename','$_POST[b]','$tgll')");
						echo "<script>window.alert('Sukses Tambahkan Foto.');
												window.location='index.php?page=kelolagaleri'</script>";
					}else{
										echo "<script>window.alert('Gagal Tambahkan Data Pegawai.');
												window.location='index.php?page=kelolagaleri'</script>";
					}
				}else{
					mysql_query("INSERT INTO tbl_gallery (judul_foto, keterangan, tanggal) VALUES('$_POST[a]','$_POST[b]','$tgll')");
						echo "<script>window.alert('Sukses Tambahkan Foto.');
												window.location='index.php?page=kelolagaleri'</script>";
				}
					
	}
		echo "<div class='artikel'>
		  <h1>Tambah Daftar Foto di Gallery</h1>
				<form action='' method='POST' enctype='multipart/form-data'>
					<table width=100%>
						<tr><td width=120px>Judul</td> <td><input style='width:70%' type='text' name='a'></td></tr>
						<tr><td>Keterangan</td> <td><textarea style='width:100%; height:100px' name='b'></textarea></td></tr>
						<tr><td width=120px>Foto</td> <td><input type='file' name='c'></td></tr>
						<tr><td></td> <td><input type='submit' name='submit' value='Simpan'></td></tr>
					</table>
				</form>
		  </div>";
		  
}

}
elseif ($_GET[page] == 'kelolasiswa'){
	if ($_GET[aksi] == ''){
	echo "<div class='artikel'>
		  <h1>Semua Data Siswa</h1>
			<a href='index.php?page=kelolasiswa&aksi=tambah'><input type='button' value='Tambahkan Siswa'></a>";
			if ($_GET[kelas]==''){
				echo "<a target='BLANK' style='float:right' href='print-siswa-all.php'><input type='button' value='Print Laporan'></a> ";
			}else{
				echo "<a target='BLANK' style='float:right' href='print-siswa.php?kelas=$_GET[kelas]'><input type='button' value='Print Laporan'></a> ";
			}
			echo "<form style='float:right' action='index.php?page=kelolasiswa' method='GET'>
			<input type='hidden' name='page' value='kelolasiswa'>
Cari <select name='kelas'><option value='0' selected>- Pilih Kelas -</option>";
	$kelas = mysql_query("SELECT * FROM tbl_kelas");
		while ($k = mysql_fetch_array($kelas)){
			if ($_GET[kelas]==$k[kd_kelas]){
				echo "<option value='$k[kd_kelas]' selected>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";										
			}else{
				echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
			}
		}
echo "</select>
<input type='Submit' name='cari' value='Cari'> &nbsp;
</form>


			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th>No</th>
					<th>No Induk</th>
					<th>Password</th>
					<th>Nama Siswa</th>
					<th>Jenis Kelamin</th>
					<th>Agama</th>
					<th>Kelas</th>
					<th>Aksi</th>
				</tr>";
				if (isset($_GET[cari])){
					$siswa = mysql_query("SELECT * FROM tbl_siswa a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas where a.kd_kelas='$_GET[kelas]'");
				}else{
					$siswa = mysql_query("SELECT * FROM tbl_siswa a JOIN tbl_kelas b ON a.kd_kelas=b.kd_kelas");
				}
				$no = 1;
				while ($r = mysql_fetch_array($siswa)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[no_induk]</td>
							  <td>$r[password]</td>
							  <td>$r[nm_siswa]</td>
							  <td>$r[jk]</td>
							  <td>$r[agama]</td>
							  <td>Kelas $r[nm_kelas]</td>
							  <td><a href='index.php?page=kelolasiswa&aksi=edit&id=$r[no_induk]'>Edit</a> | <a href='index.php?page=kelolasiswa&aksi=hapus&id=$r[no_induk]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>
		  </div>";
	}elseif ($_GET[aksi] == 'hapus'){
		mysql_query("DELETE FROM tbl_siswa where no_induk='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus data Siswa.');
				window.location='index.php?page=kelolasiswa'</script>";
	}elseif ($_GET[aksi] == 'tambah'){
		if (isset($_POST[simpan])){
		$dir_gambar = 'foto_siswa/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {			
						mysql_query("INSERT INTO tbl_siswa (no_induk, password, nm_siswa, alamat, tempat_lahir, tanggal_lahir, jk, agama, foto, sekolah_asal, nm_ortu, pekerjaan, kd_kelas) 			
										VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$filename','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
						
						echo "<script>window.alert('Sukses Tambah Data Siswa.');
								window.location='index.php?page=kelolasiswa'</script>";
					}else{
						echo "<script>window.alert('Gagal Tambah Data Siswa.');
								window.location='index.php?page=kelolasiswa'</script>";
					}
				}else{
						mysql_query("INSERT INTO tbl_siswa (no_induk, password, nm_siswa, alamat, tempat_lahir, tanggal_lahir, jk, agama, sekolah_asal, nm_ortu, pekerjaan, kd_kelas) 			
										VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
													
						echo "<script>window.alert('Sukses Tambah Data Siswa .');
								window.location='index.php?page=kelolasiswa'</script>";
				}
	}
echo "<div class='artikel'>
	  <h1>Tambah Data Siswa</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
					<tr><td width=120>No Induk</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password</td><td><input type='text' name='b'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'></textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td><input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempaun'> Perempaun </td></tr>
					<tr><td width=120>Agama</td><td><select name='h'>
														<option value='0'>- Pilih -</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
														<option value='Dll'>Dll</option>
												    </select></td></tr>
					<tr><td width=120>Asal Sekolah</td><td><input type='text' name='i'></td></tr>
					<tr><td width=120>Nama Ortu</td><td><input style='width:40%' type='text' name='j'></td></tr>
					<tr><td width=120>Pekerjaan</td><td><input  style='width:10%' type='text' name='k'></td></tr>
					<tr><td width=120>Kelas</td><td><select name='l'><option value='0' selected>- Pilih -</option>";
												$kelas = mysql_query("SELECT * FROM tbl_kelas");
												while ($k = mysql_fetch_array($kelas)){
														echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
												}
										echo "</select></td></tr>
					
					<tr><td width=120>Ganti Foto</td><td><input type='file' name='m'></td></tr>	
					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='simpan' value='Simpan'></td></tr>
				</table>
		  </form>
	  </div>";
	}elseif ($_GET[aksi] == 'edit'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_siswa where no_induk='$_GET[id]'"));

	if (isset($_POST[update])){
		$dir_gambar = 'foto_siswa/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {			
						mysql_query("UPDATE tbl_siswa SET no_induk 			=	'$_POST[a]',
															password		=	'$_POST[b]',
															nm_siswa		=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															foto			=	'$filename',
															sekolah_asal	=	'$_POST[i]',
															nm_ortu			=	'$_POST[j]',
															pekerjaan		=	'$_POST[k]',
															kd_kelas 		= 	'$_POST[l]' where no_induk = '$_POST[id]'");
						
						echo "<script>window.alert('Sukses Edit Data Siswa.');
								window.location='index.php?page=kelolasiswa'</script>";
					}else{
						echo "<script>window.alert('Gagal Edit Data Siswa.');
								window.location='index.php?page=kelolasiswa'</script>";
					}
				}else{
						   mysql_query("UPDATE tbl_siswa SET no_induk 			=	'$_POST[a]',
															password		=	'$_POST[b]',
															nm_siswa		=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															sekolah_asal	=	'$_POST[i]',
															nm_ortu			=	'$_POST[j]',
															pekerjaan		=	'$_POST[k]',
															kd_kelas 		= 	'$_POST[l]' where no_induk = '$_POST[id]'");
														
						echo "<script>window.alert('Sukses Edit Data Siswa .');
								window.location='index.php?page=kelolasiswa'</script>";
				}
	}
echo "<div class='artikel'>
	  <h1>Edit Data Siswa</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
				<input type='hidden' value='$r[no_induk]' name='id'>
					<tr><td width=120>No Induk</td><td><input type='text' name='a' value='$r[no_induk]'></td></tr>
					<tr><td width=120>Password</td><td><input type='text' name='b' value='$r[password]'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' value='$r[nm_siswa]'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'>$r[alamat]</textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e' value='$r[tempat_lahir]'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f' value='$r[tanggal_lahir]'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td>";
														if ($r[jk]=='Laki-laki'){
															echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
															<input type='radio' name='g' value='Perempaun'> Perempaun";
														}else{
															echo "<input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempaun' checked> Perempaun";
														}
														echo "</td></tr>
					<tr><td width=120>Agama</td><td><select name='h'>
														<option value='$r[agama]'>$r[agama]</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
														<option value='Dll'>Dll</option>
												    </select></td></tr>
					<tr><td width=120>Asal Sekolah</td><td><input type='text' name='i' value='$r[sekolah_asal]'></td></tr>
					<tr><td width=120>Nama Ortu</td><td><input style='width:40%' type='text' name='j' value='$r[nm_ortu]'></td></tr>
					<tr><td width=120>Pekerjaan</td><td><input  style='width:10%' type='text' name='k' value='$r[pekerjaan]'></td></tr>
					<tr><td width=120>Kelas</td><td><select name='l'><option value='0' selected>- Pilih -</option>";
												$kelas = mysql_query("SELECT * FROM tbl_kelas");
												while ($k = mysql_fetch_array($kelas)){
													if ($k[kd_kelas] == $r[kd_kelas]){
														echo "<option value='$k[kd_kelas]' selected>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
													}else{
														echo "<option value='$k[kd_kelas]'>$k[kd_kelas] - Kelas $k[nm_kelas]</option>";
													}
													
												}
										echo "</select></td></tr>
					
					<tr><td width=120>Ganti Foto</td><td><input type='file' name='m'></td></tr>	
					<tr><td width=120>Foto</td><td><img width='110px' src='foto_siswa/$r[foto]'</td></tr>	

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Update'></td></tr>
				</table>
		  </form>
	  </div>";
	}
	
}

elseif ($_GET[page] == 'kelolaguru'){
	if ($_GET[aksi]==''){
	echo "<div class='artikel'>
		  <h1>Semua Data Guru</h1>
			<a href='index.php?page=kelolaguru&aksi=tambah'><input type='button' value='Tambahkan Guru'></a>
			<a style='float:right' target='BLANK' href='print-guru.php'><input type='button' value='Print Laporan'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th>No</th>
					<th>Nip</th>
					<th>Password</th>
					<th>Nama Guru</th>
					<th>Jenis Kelamin</th>
					<th>jabatan</th>
					<th>Golongan</th>
					<th>Aksi</th>
				</tr>";
				
				$guru = mysql_query("SELECT * FROM tbl_guru");
				$no = 1;
				while ($r = mysql_fetch_array($guru)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[nip]</td>
							  <td>$r[password]</td>
							  <td>$r[nm_guru]</td>
							  <td>$r[jenis_kelamin]</td>
							  <td>$r[jabatan]</td>
							  <td>$r[gol]</td>
							  <td><a href='index.php?page=kelolaguru&aksi=edit&id=$r[nip]'>Edit</a> | <a href='index.php?page=kelolaguru&aksi=hapus&id=$r[nip]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>
		  </div>";
	}elseif ($_GET[aksi]=='hapus'){
			mysql_query("DELETE FROM tbl_guru where nip='$_GET[id]'");
	echo "<script>window.alert('Sukses Hapus data Guru.');
				window.location='index.php?page=kelolaguru'</script>";
				
	}elseif ($_GET[aksi]=='tambah'){
			if (isset($_POST[submit])){
		$dir_gambar = 'foto_guru/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {
						mysql_query("INSERT INTO tbl_guru (nip, password, nm_guru, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, foto, telpon, agama, jabatan, gol, tamatan) 
						VALUES ('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$filename','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
						
						echo "<script>window.alert('Sukses Tambahkan Guru Baru.');
								window.location='index.php?page=kelolaguru'</script>";
					}else{
						echo "<script>window.alert('Gagal Tambahkan Data Pegawai.');
								window.location='index.php?page=kelolaguru'</script>";
					}
				}else{
						mysql_query("INSERT INTO tbl_guru (nip, password, nm_guru, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, telpon, agama, jabatan, gol, tamatan) 
						VALUES ('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[i]','$_POST[j]','$_POST[k]','$_POST[l]')");
						echo "<script>window.alert('Sukses Tambahkan Guru Baru.');
								window.location='index.php?page=kelolaguru'</script>";
				}
	}
echo "<div class='artikel'>
	  <h1>Tambahkan Data Guru baru</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
					<tr><td width=120>Nip</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password</td><td><input type='text' name='b'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'></textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td><input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempaun'> Perempaun</td></tr>
					<tr><td width=120>No Telpon</td><td><input type='text' name='h'></td></tr>
					<tr><td width=120>Agama</td><td><select name='i'>
														<option value='0'>- Pilih -</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
														<option value='Dll'>Dll</option>
												    </select></td></tr>
					<tr><td width=120>Jabatan</td><td><input style='width:40%' type='text' name='j'></td></tr>
					<tr><td width=120>Golongan</td><td><input  style='width:10%' type='text' name='k'></td></tr>
					<tr><td width=120>Tamatan</td><td><input style='width:60%' type='text' name='l'></td></tr>
					<tr><td width=120>Foto</td><td><input type='file' name='m'></td></tr>	

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='submit' value='Simpan'></td></tr>
				</table>
		  </form>
	  </div>";
	}elseif ($_GET[aksi]=='edit'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_guru where nip='$_GET[id]'"));

	if (isset($_POST[update])){
		$dir_gambar = 'foto_guru/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {
						
						mysql_query("UPDATE tbl_guru SET nip 			=	'$_POST[a]',
														password		=	'$_POST[b]',
														nm_guru			=	'$_POST[c]',
														alamat			=	'$_POST[d]',
														tempat_lahir	=	'$_POST[e]',
														tanggal_lahir	=	'$_POST[f]',
														jenis_kelamin 	=	'$_POST[g]',
														foto			=	'$filename',
														telpon			=	'$_POST[h]',
														agama			=	'$_POST[i]',
														jabatan			=	'$_POST[j]',
														gol				=	'$_POST[k]',
														tamatan 		= 	'$_POST[l]' where nip = '$_POST[id]'");
						
						echo "<script>window.alert('Sukses Edit Data Guru.');
								window.location='index.php?page=kelolaguru'</script>";
					}else{
						echo "<script>window.alert('Gagal Edit Data Guru.');
								window.location='index.php?page=kelolaguru'</script>";
					}
				}else{
						mysql_query("UPDATE tbl_guru SET nip 			=	'$_POST[a]',
														password		=	'$_POST[b]',
														nm_guru			=	'$_POST[c]',
														alamat			=	'$_POST[d]',
														tempat_lahir	=	'$_POST[e]',
														tanggal_lahir	=	'$_POST[f]',
														jenis_kelamin 	=	'$_POST[g]',
														telpon			=	'$_POST[h]',
														agama			=	'$_POST[i]',
														jabatan			=	'$_POST[j]',
														gol				=	'$_POST[k]',
														tamatan 		= 	'$_POST[l]' where nip = '$_POST[id]'");
														
						echo "<script>window.alert('Sukses Edit Data Guru.');
								window.location='index.php?page=kelolaguru'</script>";
				}
	}
echo "<div class='artikel'>
	  <h1>Edit Data Guru</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
				<input type='hidden' value='$r[nip]' name='id'>
					<tr><td width=120>Nip</td><td><input type='text' name='a' value='$r[nip]'></td></tr>
					<tr><td width=120>Password</td><td><input type='text' name='b' value='$r[password]'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' value='$r[nm_guru]'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'>$r[alamat]</textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e' value='$r[tempat_lahir]'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f' value='$r[tanggal_lahir]'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td>";
														if ($r[jenis_kelamin]=='Laki-laki'){
															echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
															<input type='radio' name='g' value='Perempaun'> Perempaun";
														}else{
															echo "<input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempaun' checked> Perempaun";
														}
														echo "</td></tr>
					<tr><td width=120>No Telpon</td><td><input type='text' name='h' value='$r[telpon]'></td></tr>
					<tr><td width=120>Agama</td><td><select name='i'>
														<option value='$r[agama]'>$r[agama]</option>
														<option value='Islam'>Islam</option>
														<option value='Kristen'>Kristen</option>
														<option value='Hindu'>Hindu</option>
														<option value='Budha'>Budha</option>
														<option value='Dll'>Dll</option>
												    </select></td></tr>
					<tr><td width=120>Jabatan</td><td><input style='width:40%' type='text' name='j' value='$r[jabatan]'></td></tr>
					<tr><td width=120>Golongan</td><td><input  style='width:10%' type='text' name='k' value='$r[gol]'></td></tr>
					<tr><td width=120>Tamatan</td><td><input style='width:60%' type='text' name='l' value='$r[tamatan]'></td></tr>
					<tr><td width=120>Foto</td><td><input type='file' name='m'></td></tr>	
					<tr><td width=120>Ganti Foto</td><td><img width='110px' src='foto_guru/$r[foto]'</td></tr>	

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Update'></td></tr>
				</table>
		  </form>
	  </div>";
	}
}

elseif ($_GET[page] == 'kelolakomentar'){
	if ($_GET[aksi]==''){
	echo "<div class='artikel'>
		  <h1>Semua Data Komentar</h1>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th width=40px>No</th>
					<th>Berita</th>
					<th width=130px>Pengirim</th>
					<th>Isi Komentar</th>
					<th width=60px>Aksi</th>
				</tr>";
				
				$kategori = mysql_query("SELECT * FROM tbl_komentar");
				$no = 1;
				while ($r = mysql_fetch_array($kategori)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[id_berita]</td>
							  <td>$r[nama_lengkap]</td>
							  <td>$r[isi_pesan]</td>
							  <td align=center><a href='index.php?page=kelolakomentar&aksi=hapus&id=$r[id_komentar]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>";
		echo "</div>";	  
		  
	}elseif ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM tbl_komentar where id_komentar='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Kategori.');
							window.location='index.php?page=kelolakomentar'</script>";
	}
}

elseif ($_GET[page] == 'kelolakategori'){
	if ($_GET[aksi]==''){
	echo "<div class='artikel'>
		  <h1>Semua Data Kategori</h1>
			<a href='index.php?page=kelolakategori&aksi=tambah'><input type='button' value='Tambahkan Kategori'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th width=40px>No</th>
					<th>Nama Kategori</th>
					<th width=150px>Aksi</th>
				</tr>";
				
				$kategori = mysql_query("SELECT * FROM tbl_kategori");
				$no = 1;
				while ($r = mysql_fetch_array($kategori)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[nama_kategori]</td>
							  <td><a href='index.php?page=kelolakategori&aksi=edit&id=$r[id_kategori]'>Edit</a> | <a href='index.php?page=kelolakategori&aksi=hapus&id=$r[id_kategori]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>";
		echo "</div>";	  
		  
	}elseif ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM tbl_kategori where id_kategori='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Kategori.');
							window.location='index.php?page=kelolakategori'</script>";
	}elseif ($_GET[aksi]=='tambah'){
				if (isset($_POST[submit])){
					mysql_query("INSERT INTO tbl_kategori (nama_kategori) VALUES ('$_POST[a]')");
					echo "<script>window.alert('Sukses Tambahkan Kategori.');
							window.location='index.php?page=kelolakategori'</script>";
				}
			echo "<div class='artikel'>
				  <h1>Tambahkan Data Kategori</h1>
					  <form action='' method='POST'>
							<table width=100%>
								<tr><td width=120>Nama Kategori</td><td><input type='text' name='a'></td></tr>

								<tr><td width=120></td><td><input type='submit' name='submit' value='Simpan'></td></tr>
							</table>
					  </form>
				  </div>";
	}elseif ($_GET[aksi]=='edit'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kategori where id_kategori='$_GET[id]'"));
		
				if (isset($_POST[update])){
					mysql_query("UPDATE tbl_kategori SET nama_kategori	= '$_POST[a]' where id_kategori='$_GET[id]'");
					echo "<script>window.alert('Sukses Update kategori.');
							window.location='index.php?page=kelolakategori'</script>";
				}
			echo "<div class='artikel'>
				  <h1>Edit Data Kategori</h1>
					  <form action='' method='POST'>
							<table width=100%>
							<input type='hidden' name='id' value='$r[id_kategori]'>
								<tr><td width=120>Nama Kategori</td><td><input type='text' name='a' value='$r[nama_kategori]'></td></tr>
								<tr><td width=120></td><td><input type='submit' name='update' value='Update'></td></tr>
							</table>
					  </form>
				  </div>";
	}
	

}


elseif ($_GET[page] == 'kelolajurusan'){
	if ($_GET[aksi]==''){
	echo "<div class='artikel'>
		  <h1>Semua Data Jurusan</h1>
			<a href='index.php?page=kelolapasca&aksi=tambah'><input type='button' value='Tambahkan Jurusan'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th width=40px>No</th>
					<th>Nama Jurusan</th>

					<th width=150px>Aksi</th>
				</tr>";
				
				$pasca = mysql_query("SELECT * FROM tbl_pasca");
				$no = 1;
				while ($r = mysql_fetch_array($pasca)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[nama_program_pasca]</td>
							  <td><a href='index.php?page=kelolajurusan&aksi=edit&id=$r[id_pasca_sarjana]'>Edit</a> | <a href='index.php?page=kelolajurusan&aksi=hapus&id=$r[id_pasca_sarjana]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>";
		echo "</div>";	  
		  
	}elseif ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM tbl_pasca where id_pasca_sarjana='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Program Pasca Sarjana.');
							window.location='index.php?page=kelolajurusan'</script>";
	}elseif ($_GET[aksi]=='tambah'){
				if (isset($_POST[submit])){
					mysql_query("INSERT INTO tbl_pasca (nama_program_pasca) VALUES ('$_POST[a]')");
					echo "<script>window.alert('Sukses Tambahkan Jurusan.');
							window.location='index.php?page=kelolajurusan'</script>";
				}
			echo "<div class='artikel'>
				  <h1>Tambahkan Data Jurusan</h1>
					  <form action='' method='POST'>
							<table width=100%>
								<tr><td width=120>Nama Jurusan</td><td><input type='text' name='a'></td></tr>
								<tr><td width=120></td><td><input type='submit' name='submit' value='Simpan'></td></tr>
							</table>
					  </form>
				  </div>";
	}elseif ($_GET[aksi]=='edit'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_pasca where id_pasca_sarjana='$_GET[id]'"));
		
				if (isset($_POST[update])){
					mysql_query("UPDATE tbl_pasca SET nama_program_pasca	= '$_POST[a]' where id_pasca_sarjana='$_GET[id]'");
					echo "<script>window.alert('Sukses Update Program Pasca Sarjana.');
							window.location='index.php?page=kelolajurusan'</script>";
				}
			echo "<div class='artikel'>
				  <h1>Edit Data Jurusan</h1>
					  <form action='' method='POST'>
							<table width=100%>
							<input type='hidden' name='id' value='$r[id_pasca_sarjana]'>
								<tr><td width=120>Nama Program</td><td><input type='text' name='a' value='$r[nama_program_pasca]'></td></tr>
								<tr><td width=120></td><td><input type='submit' name='update' value='Update'></td></tr>
							</table>
					  </form>
				  </div>";
	}
	

}

elseif ($_GET[page]=='grafik'){
				include "grafik_tahun.php";
				
				}
				
				elseif ($_GET[page]=='laporan'){
				include "laporan_pertahun.php";
				
				}
elseif ($_GET[page] == 'kelolamapel'){
	if ($_GET[aksi]==''){
	echo "<div class='artikel'>
		  <h1>Semua Data Mata Pelajaran</h1>
			<a href='index.php?page=kelolamapel&aksi=tambah'><input type='button' value='Tambahkan Mata Pelajaran'></a>
			<a style='float:right' target='BLANK' href='print-mapel.php'><input type='button' value='Print Laporan'></a>
			<table border='1' width=100%>
				<tr bgcolor=#c3c3c3>
					<th>No</th>
					<th>Kode Pelajaran</th>
					<th>Nama Mata Pelajaran</th>
					<th>Aksi</th>
				</tr>";
				
				$mapel = mysql_query("SELECT * FROM tbl_mata_pelajaran");
				$no = 1;
				while ($r = mysql_fetch_array($mapel)){
					echo "<tr>
							  <td>$no</td>
							  <td>$r[kd_pelajaran]</td>
							  <td>$r[nm_mapel]</td>
							  <td><a href='index.php?page=kelolamapel&aksi=edit&id=$r[kd_pelajaran]'>Edit</a> | <a href='index.php?page=kelolamapel&aksi=hapus&id=$r[kd_pelajaran]'>Delete</a></td>
						  </tr>";
					$no++;
				}
			echo "</table>
		  </div>";
	}elseif ($_GET[aksi]=='hapus'){
		mysql_query("DELETE FROM tbl_mata_pelajaran where kd_pelajaran='$_GET[id]'");
		echo "<script>window.alert('Sukses Hapus Mata Pelajaran.');
							window.location='index.php?page=kelolamapel'</script>";
	}elseif ($_GET[aksi]=='edit'){
				if (isset($_POST[update])){
					mysql_query("UPDATE tbl_mata_pelajaran SET kd_pelajaran 	= '$_POST[a]',
															   nm_mapel 		= '$_POST[b]' where kd_pelajaran='$_POST[id]'");
															   
					echo "<script>window.alert('Sukses Update Mata Pelajaran.');
							window.location='index.php?page=kelolamapel'</script>";
				}
				$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_mata_pelajaran a where a.kd_pelajaran='$_GET[id]'"));
			echo "<div class='artikel'>
				  <h1>Edit Data Mata Pelajaran</h1>
					  <form action='' method='POST'>
							<table width=100%>
								<input type='hidden' name='id' value='$r[kd_pelajaran]'>
								<tr><td width=120>Kode Pelajaran</td><td><input type='text' name='a' value='$r[kd_pelajaran]'></td></tr>
								<tr><td width=120>Nama Pelajaran</td><td><input style='width:50%' type='text' name='b' value='$r[nm_mapel]'></td></tr>
								<tr><td width=120></td><td><input type='submit' name='update' value='Update'></td></tr>
							</table>
					  </form>
				  </div>";		
	}elseif ($_GET[aksi]=='tambah'){
				if (isset($_POST[submit])){
					mysql_query("INSERT INTO tbl_mata_pelajaran (kd_pelajaran, nm_mapel, nip) VALUES ('$_POST[a]','$_POST[b]','$_POST[c]')");
					echo "<script>window.alert('Sukses Tambahkan Mata Pelajaran.');
							window.location='index.php?page=kelolamapel'</script>";
				}
			echo "<div class='artikel'>
				  <h1>Tambahkan Data Mata Pelajaran</h1>
					  <form action='' method='POST'>
							<table width=100%>
								<tr><td width=120>Kode Pelajaran</td><td><input type='text' name='a'></td></tr>
								<tr><td width=120>Nama Pelajaran</td><td><input style='width:50%' type='text' name='b'></td></tr>
								<tr><td width=120></td><td><input type='submit' name='submit' value='Simpan'></td></tr>
							</table>
					  </form>
				  </div>";
	}
	
}
			
?>