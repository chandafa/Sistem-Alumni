<?php 
if ($_SESSION[level]=='admin'){
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.nim='$_GET[id]'"));
}else{
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.nim='$_SESSION[nim]'"));
}
	if (isset($_POST[update])){
		$dir_gambar = 'foto_alumni/';
			$filename = basename($_FILES['m']['name']);
			$uploadfile = $dir_gambar . $filename;
				if ($filename != '' & $_POST[aa] != ''){
					if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {
					$passworda = md5($_POST[aa]);			
						mysql_query("UPDATE tbl_alumni SET nim 				=	'$_POST[a]',
															id_pasca_sarjana = '$_POST[b]',
															password 		=   '$passworda',
															nm_mahasiswa	=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															foto			=	'$filename',
															pekerjaan		=	'$_POST[k]',
															no_telpon 		=   '$_POST[no]',
															angkatan 		= 	'$_POST[ang]' where nim = '$_POST[id]'");
						if ($_SESSION[level]=='admin'){
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=kelolaalumni'</script>";
						}else{
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=datasiswa'</script>";
						}
					}else{
						if ($_SESSION[level]=='admin'){
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=kelolaalumni'</script>";
						}else{
							echo "<script>window.alert('Gagal Edit Data.');
									window.location='index.php?page=datasiswa'</script>";
						}
					}
				}elseif($filename != ''){
						mysql_query("UPDATE tbl_alumni SET nim 				=	'$_POST[a]',
															id_pasca_sarjana =  '$_POST[b]',
															nm_mahasiswa	=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															foto			=	'$filename',
															pekerjaan		=	'$_POST[k]',
															no_telpon 		=   '$_POST[no]',
															angkatan 		= 	'$_POST[ang]' where nim = '$_POST[id]'");
														
						if ($_SESSION[level]=='admin'){
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=kelolaalumni'</script>";
						}else{
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=datasiswa'</script>";
						}
				}elseif ($_POST[aa] != ''){
					$passworda = md5($_POST[aa]);			
						mysql_query("UPDATE tbl_alumni SET nim 				=	'$_POST[a]',
															id_pasca_sarjana = '$_POST[b]',
															password 		=   '$passworda',
															nm_mahasiswa	=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															pekerjaan		=	'$_POST[k]',
															no_telpon 		=   '$_POST[no]',
															angkatan 		= 	'$_POST[ang]' where nim = '$_POST[id]'");
						if ($_SESSION[level]=='admin'){
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=kelolaalumni'</script>";
						}else{
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=datasiswa'</script>";
						}
				}else{
						mysql_query("UPDATE tbl_alumni SET  nim 			=	'$_POST[a]',
															id_pasca_sarjana = '$_POST[b]',
															nm_mahasiswa	=	'$_POST[c]',
															alamat			=	'$_POST[d]',
															tempat_lahir	=	'$_POST[e]',
															tanggal_lahir	=	'$_POST[f]',
															jk 				=	'$_POST[g]',
															agama			=	'$_POST[h]',
															pekerjaan		=	'$_POST[k]',
															no_telpon 		=   '$_POST[no]',
															angkatan 		= 	'$_POST[ang]' where nim = '$_POST[id]'");
														
						if ($_SESSION[level]=='admin'){
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=kelolaalumni'</script>";
						}else{
							echo "<script>window.alert('Sukses Edit Data.');
									window.location='index.php?page=datasiswa'</script>";
						}
				}
	}
if ($_GET[aksi]=='edit'){
echo "<div class='artikel'>
	  <h1>Edit data Anda - $r[nm_mahasiswa]</h1>
	  	<center><i align=center style='color:red'><b>Penting!</b> - Pastikan Semua data yang anda isikan adalah data yang sebenarnya...</i></center><br><br>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<table width=100%>
				<input type='hidden' value='$r[nim]' name='id'>
					<tr><td width=120>Nobp</td><td><input type='text' name='a' value='$r[nim]'></td></tr>
					<tr><td width=120>Edit Password</td><td><input type='text' name='aa'> -- <i>Kosongkan Jika Tidak Diganti</i></td></tr>
					<tr><td width=120>Jurusan</td><td><select name='b'>"; 
									$pasca = mysql_query("SELECT * FROM tbl_pasca");
									while ($p = mysql_fetch_array($pasca)){
										if ($p[id_pasca_sarjana] == $r[id_pasca_sarjana]){
											echo "<option value='$p[id_pasca_sarjana]' selected>$p[nama_program_pasca]</option>";
										}else{
											echo "<option value='$p[id_pasca_sarjana]'>$p[nama_program_pasca]</option>";
										}
									}
					echo "</select></td></tr>
					<tr><td width=120>Tahun Angkatan</td><td><input style='width:60%' type='text' name='ang' value='$r[angkatan]'></td></tr>
					<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' value='$r[nm_mahasiswa]'></td></tr>
					<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d'>$r[alamat]</textarea></td></tr>
					<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e' value='$r[tempat_lahir]'></td></tr>
					<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f' value='$r[tanggal_lahir]'></td></tr>
					<tr><td width=120>Jenis Kelamin</td><td>";
														if ($r[jk]=='Laki-laki'){
															echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
															<input type='radio' name='g' value='Perempuan'> Perempuan";
														}else{
															echo "<input type='radio' name='g' value='Laki-laki'> Laki-laki
															<input type='radio' name='g' value='Perempuan' checked> Perempuan";
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
					<tr><td width=120>Pekerjaan</td><td><input  style='width:80%' type='text' name='k' value='$r[pekerjaan]'></td></tr>
					<tr><td width=120>No Telpon</td><td><input  style='width:20%' type='text' name='no' value='$r[no_telpon]'></td></tr>
					<tr><td width=120>Ganti Foto</td><td><input type='file' name='m'></td></tr>	
					<tr><td width=120>Foto</td><td><img width='110px' src='foto_alumni/$r[foto]'</td></tr>	

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Update Data'></td></tr>
				</table>
		  </form>
	  </div>";
}else{
echo "<div class='artikel'>";
	if ($_SESSION[level]=='admin'){
	  	echo "<h1>Berikut Detail data Anda - $r[nm_mahasiswa] <a style='float:right' href='index.php?page=datasiswa&aksi=edit&id=$_GET[id]'><input type='button' value='Edit Data'></a></h1>";
	}else{
		echo "<h1>Berikut Detail data Anda - $r[nm_mahasiswa] <a style='float:right' href='index.php?page=datasiswa&aksi=edit'><input type='button' value='Edit Data'></a></h1>";
	}

	echo "<center><i align=center style='color:red'><b>Penting!</b> - Pastikan Semua data yang anda isikan adalah data yang sebenarnya...</i></center><br>";
				echo "<table width=100%>
					<tr><td width=120>No Induk</td>				<td> : $r[nim]</td></tr>
					<tr><td width=120>Jurusan</td>		<td> : $r[nama_program_pasca]</td></tr>
					<tr><td width=120>Tahun Angkatan</td>				<td> : $r[angkatan]</td></tr>
					<tr><td width=120>Nama Lengkap</td>			<td> : $r[nm_mahasiswa]</td></tr>
					<tr><td width=120 valign=top>Alamat</td>	<td> : $r[alamat]</td></tr>
					<tr><td width=120>Tempat Lahir</td>			<td> : $r[tempat_lahir]</td></tr>
					<tr><td width=120>Tanggal Lahir</td>		<td> : $r[tanggal_lahir]</td></tr>
					<tr><td width=120>Jenis Kelamin</td>		<td> : $r[jk]</td></tr>
					<tr><td width=120>Agama</td>				<td> : $r[agama]</td></tr>
					<tr><td width=120>Pekerjaan</td>			<td> : $r[pekerjaan]</td></tr>
					<tr><td width=120>No Telpon</td>			<td> : $r[no_telpon]</td></tr>
					<tr><td width=120 valign=top>Foto</td><td valign=top> : <img width='110px' src='foto_alumni/$r[foto]'</td></tr>	

				</table>
	  </div>";	
}
?>