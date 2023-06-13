<?php 
if ($_GET[page] == 'home' OR $_GET[page] == ''){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='1'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			
			}elseif ($_GET[page] == 'profile'){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='2'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			}elseif ($_GET[page] == 'visimisi'){ 
						$p = mysql_fetch_array(mysql_query("SELECT * FROM tbl_page where id_page='3'"));
						$isi = nl2br($p[isi]);
						echo "<div class='artikel'>
									<h1>$p[judul]</h1>
									$isi
							  </div><br><br>";
			}elseif ($_GET[page] == 'pendaftaran'){ 
					if (isset($_POST[simpan])){
						$c = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni where nim='$_POST[a]'"));

						if ($_POST[a]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Nim Tidak Boleh kosong..</i></center><br>";
						}elseif ($_POST[bb]=='0'){
							echo "<center><i align=center style='color:red'>Maaf, Anda Belum Memilh Jurusan.</i></center><br>";
						}elseif ($_POST[ang]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Angkatan Tidak Boleh kosong..</i></center><br>";
						}elseif ($_POST[c]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Nama Lengkap Tidak Boleh Kosong..</i></center><br>";
						}elseif ($_POST[d]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Alamat Lengkap Tidak Boleh Kosong..</i></center><br>";
						}elseif ($_POST[g]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Harus Dipilih..</i></center><br>";
						}elseif ($_POST[h]=='0'){
							echo "<center><i align=center style='color:red'>Maaf, Anda Belum Memilih Agama.</i></center><br>";
						}elseif ($_POST[k]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan Pekerjaan Tidak Boleh kosong..</i></center><br>";
						}elseif ($_POST[no]==''){
							echo "<center><i align=center style='color:red'>Maaf, Inputan No Telpon Tidak Boleh kosong..</i></center><br>";
						}else{
						$dir_gambar = 'foto_alumni/';
							$filename = basename($_FILES['m']['name']);
							$uploadfile = $dir_gambar . $filename;
							if ($c[password] != ''){
								echo "<script>window.alert('Maaf, Akun Tersebut Sudah Didaftarkan Sebelumnya.');
												window.location='index.php?page=pendaftaran'</script>";
							}else{
								if ($filename != ''){
									if (move_uploaded_file($_FILES['m']['tmp_name'], $uploadfile)) {	
										$pass = md5($_POST[b]);		
										mysql_query("insert into tbl_alumni (nim, id_pasca_sarjana , password , nm_mahasiswa,alamat, tempat_lahir,  tanggal_lahir ,  jk,  agama, foto, pekerjaan, no_telpon,angkatan,level,status ) value(  '$_POST[a]','$_POST[bb]','$pass','$_POST[c]', '$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$filename','$_POST[k]','$_POST[no]','$_POST[ang]','alumni','1')");
																		   		
										echo "<script>window.alert('Sukses Melakukan Pendaftaran, Silahkan Login.');
												window.location='index.php?page=home'</script>";
									}else{
										echo "<script>window.alert('Gagal Melakukan Pendaftaran.');
												window.location='index.php?page=pendaftaran'</script>";
									}
								}else{
									$pass = md5($_POST[b]);		
										mysql_query("insert into tbl_alumni (nim, id_pasca_sarjana , password , nm_mahasiswa,alamat, tempat_lahir,  tanggal_lahir ,  jk,  agama, pekerjaan, no_telpon,angkatan,level,status ) value(  '$_POST[a]','$_POST[bb]','$pass','$_POST[c]', '$_POST[d]','$_POST[e]','$_POST[f]','$_POST[g]','$_POST[h]','$_POST[k]','$_POST[no]','$_POST[ang]','alumni','1')");
										echo "<script>window.alert('Sukses Melakukan Pendaftaran, Silahkan Login.');
												window.location='index.php?page=home'</script>";
								}
							}
						}

					}

					if (isset($_POST[cek])){
						$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni where nim='$_POST[a]'"));
						$total = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni where nim='$_POST[a]'"));
						if ($total <= 0){
							$disable = 'disabled';
						}else{
							$disablec = 'disabled';
						}
					}else{
						$disable = 'disabled';
					}
				echo "<div class='artikel'>
					  <h1>Pendaftaran Alumni</h1>
						  <form action='' method='POST' enctype='multipart/form-data'>
								<table width=100%>
									<tr><td width=120>Nim</td><td><input type='text' name='a' > </td></tr>
									<tr><td width=120>Nama Lengkap</td><td><input style='width:60%' type='text' name='c' ></td></tr>
									<tr><td width=120>Jurusan</td><td><select name='bb' >
												  <option value='0'>- Pilih Jurusan -</option>"; 
									$pasca = mysql_query("SELECT * FROM tbl_pasca");
									while ($p = mysql_fetch_array($pasca)){
										if ($r[id_pasca_sarjana]==$p[id_pasca_sarjana]){
											echo "<option value='$p[id_pasca_sarjana]' selected>$p[nama_program_pasca]</option>";
										}else{
											echo "<option value='$p[id_pasca_sarjana]'>$p[nama_program_pasca]</option>";
										}
									}
									echo "</select></td></tr>
									<tr><td width=120>Tahun Angkatan</td><td><input type='text' name='ang' style='width:10%' value='$r[angkatan]' </td></tr>
									<tr><td width=120>Password</td><td><input type='password' name='b' ></td></tr>
									
									
									<tr><td width=120>Tempat Lahir</td><td><input style='width:50%' type='text' name='e'  value='$r[tempat_lahir]'></td></tr>
									<tr><td width=120>Tanggal Lahir</td><td><input type='text' name='f'  value='$r[tanggal_lahir]'></td></tr>
									<tr><td width=120>Jenis Kelamin</td><td>";
																		if ($r[jk]=='Laki-laki'){
																			echo "<input type='radio' name='g' value='Laki-laki' checked> Laki-laki
																			<input type='radio' name='g' value='Perempaun' > Perempaun </td></tr>";
																		}else{
																			echo "<input type='radio' name='g' value='Laki-laki'  > Laki-laki
																			<input type='radio' name='g' value='Perempaun' checked> Perempaun </td></tr>";
																		}
									echo "<tr><td width=120>Agama</td><td><select name='h' >
																		<option value='$r[agama]'>$r[agama]</option>
																		<option value='Islam'>Islam</option>
																		<option value='Kristen'>Kristen</option>
																		<option value='Hindu'>Hindu</option>
																		<option value='Budha'>Budha</option>
																		<option value='Dll'>Dll</option>
																    </select></td></tr>
									<tr><td width=120 valign=top>Alamat</td><td><textarea style='width:90%; height:60px' name='d' >$r[alamat]</textarea></td></tr>
									<tr><td width=120>Pekerjaan</td><td><input  style='width:80%' type='text' name='k' value='$r[pekerjaan]' ></td></tr>
									<tr><td width=120>No Telpon</td><td><input  style='width:40%' type='text' name='no' value='$r[no_telpon]' ></td></tr>
									<tr><td width=120>Foto</td><td><input type='file' name='m' ></td></tr>	
									<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='simpan' value='Simpan' ></td></tr>
								</table>
						  </form>
					  </div>";
			}elseif ($_GET[page] == 'berita'){ 
						$BatasAwal = 5;
						if (!empty($_GET['halaman'])) {
						$hal = $_GET['halaman'] - 1;
						$MulaiAwal = $BatasAwal * $hal;
						} else if (!empty($_GET['halaman']) and $_GET['halaman'] == 1) {
						$MulaiAwal = 0;
						} else if (empty($_GET['halaman'])) {
						$MulaiAwal = 0;
						}//tampil data

						$query = mysql_query("SELECT * FROM tbl_berita a JOIN tbl_kategori b ON a.id_kategori=b.id_kategori 
													LEFT JOIN tbl_alumni c ON a.nim=c.nim where a.status='berita' ORDER BY a.id_berita DESC LIMIT $MulaiAwal , $BatasAwal");
						while ($r = mysql_fetch_array($query)){
						$hitung = mysql_num_rows(mysql_query("SELECT * FROM tbl_komentar where id_berita='$r[id_berita]'"));
						$isi_berita  = substr($r['isi'],0,440);
						$isi = $isi_berita;
						echo "<div class='artikel'>
									<h1>$r[nama_kategori] - $r[judul]</h1>";
									if ($r[nim]==''){
										echo "<i style='color:Red'>Dikirimkan oleh : Administrator</i>";
									}else{
										if ($_SESSION[level] == ''){
											echo "<i style='color:Red'>Dikirimkan oleh : $r[nm_mahasiswa] (Nim : $r[nim])</i>";
										}else{
											echo "<i style='color:Red'>Dikirimkan oleh : <a style='text-decoration:none' href='index.php?page=detailalumni&id=$r[nim]'>$r[nm_mahasiswa] (Nim : $r[nim])</a></i>";
										}
									}
									echo "<i style='color:green; float:right'>Pada : $r[tanggal] WIB, Dilihat : $r[hits] Kali</i>
									<br>
									$isi,.. <a href='index.php?page=beritadetail&id=$r[id_berita]'>Baca Selengkapnya</a> <i style='color:red'>(Ada $hitung Komentar)</i>
							  </div><br>";
						}

						$cekQuery = mysql_query("SELECT * FROM tbl_berita where status='berita'");
						$jumlahData = mysql_num_rows($cekQuery);
						if ($jumlahData > $BatasAwal) {
							echo '<br/><center><div style="font-size:12pt; font-weight:bold">Halaman : ';
							$a = explode(".", $jumlahData / $BatasAwal);
							$b = $a[0];
							$c = $b + 1;
								for ($i = 1; $i <= $c; $i++) {
								echo '<a style="text-decoration:none;';
									if ($_GET['halaman'] == $i) {
										echo 'color:red';
									}
								echo '" href="?page=berita&halaman=' . $i . '">' . $i . '</a>, ';
								}
							echo '</div></center>';
						}

			}elseif ($_GET[page] == 'beritadetail'){ 
				include "detailberita.php";
				mysql_query("UPDATE tbl_berita SET hits=hits+1 where id_berita='$_GET[id]'");

			}elseif ($_GET[page] == 'kirimberita'){ 
					if (isset($_POST[submit])){
						$tgll = date("Y-m-d H:i:s");
						mysql_query("INSERT INTO tbl_berita (id_kategori, nim, judul, isi, tanggal) VALUES('$_POST[c]','$_SESSION[nim]','$_POST[a]','$_POST[b]','$tgll')");
						echo "<script>window.alert('Sukses Terbitkan Berita.');
												window.location='index.php?page=kirimberita'</script>";
					}
						echo "<div class='artikel'>
						  <h1>Tambah Daftar Tulisan Baru - $_SESSION[nm_mahasiswa]</h1>
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
										<tr><td>Isi Tulisan</td> <td><textarea style='width:100%; height:250px' name='b'></textarea></td></tr>
										<tr><td></td> <td><input type='submit' name='submit' value='Terbitkan'></td></tr>
									</table>
								</form>
						  </div>";

			}elseif ($_GET[page] == 'gallery'){ 
				echo "<div class='artikel'>
						<h1>Semua Koleksi Foto</h1>";
				$col = 4;
				$album = mysql_query("SELECT * FROM tbl_gallery order by id_gallery DESC");
				echo "<table width=100%><tr>";
				$hitung = 0;
				while($a = mysql_fetch_array($album)){
					if ($hitung >= $col) {
						 echo "</tr><tr>";
						$hitung = 0;
					}
					$hitung++;
					
				echo "<td><center>
					<div><a href='index.php?page=detailgallery&id=$a[id_gallery]'>$a[judul_foto]</a></div>
						<img width=120px style='background:#fff; padding:7px;' src='foto_gallery/$a[foto]'>
					<br><br>
						 </center></td>";
					}
					echo "</tr></table>";
				echo "</div>";
				
			}elseif ($_GET[page] == 'detailgallery'){ 
				$album = mysql_query("SELECT * FROM tbl_gallery where id_gallery='$_GET[id]'");
				echo "<table width=100%>";
				while($a = mysql_fetch_array($album)){
				$keterangan = nl2br($a['keterangan']);
				echo "<div class='artikel'>
						<h1>$a[judul_foto]</h1>";	
					echo "<tr><td><center>
								<img style='width:500px; background:#fff; padding:7px;' src='foto_gallery/$a[foto]'>
							 </center>
						  </td></tr>
						  <tr><td> $keterangan</td></tr>
					  </div>";
					  
					}
					echo "</tr></table>";

			}elseif ($_GET[page]=='community'){
				include "community.php";
				
			}elseif ($_GET[page]=='datasiswa'){
				include "datasiswa.php";
			}elseif ($_GET[page]=='gantipasswordadmin'){
				include "gantipasswordadmin.php";
			}
?>