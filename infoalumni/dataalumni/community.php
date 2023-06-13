<?php
if (isset($_POST['submit1e'])){
					$tanggal = date("Y-m-d");
												mysql_query("INSERT INTO tbl_komentar (id_berita,
														   reply, 
														   nama_lengkap, 
														   alamat_email,
														   isi_pesan,
														   tanggal)
												   VALUES ('$_POST[id]',
														   '0',
														   '$_POST[nama_lengkap]',
														   '$_POST[alamat_email]',
														   '$_POST[isi_pesan]',
														   '$tanggal')");	

						echo "<script>window.alert('Sukses Kirimkan Komentar Status.');
								window.location='index.php?page=community'</script>";

				}

				echo "<div class='artikel'>
						<h1>Semua Status Teman-teman anda</h1>
					  </div>";

					  if (isset($_POST[submitbe])){
						$tgll = date("Y-m-d H:i:s");
						mysql_query("INSERT INTO tbl_berita (id_kategori, nim, judul, isi, tanggal, status) VALUES('$_POST[c]','$_SESSION[nim]','$_POST[a]','$_POST[b]','$tgll','community')");
						echo "<script>window.alert('Sukses Terbitkan Berita.');
												window.location='index.php?page=community'</script>";
					}
						echo "<div class='artikel'>
								<form action='' method='POST'>
									<table width=100%>
										<input type='hidden' name='a' value='$_SESSION[nm_mahasiswa]'>
										<input type='hidden' name='c' value='0'>
										<tr><td width=100px>Isi Status</td> <td><textarea style='background:#e3e3e3; width:100%; height:80px' name='b'></textarea></td>
										<td width=80px><input style='height:60px' type='submit' name='submitbe' value='Kirimkan'></td></tr>
									</table>
								</form>
						  </div>";

						$BatasAwal = 5;
						if (!empty($_GET['halaman'])) {
						$hal = $_GET['halaman'] - 1;
						$MulaiAwal = $BatasAwal * $hal;
						} else if (!empty($_GET['halaman']) and $_GET['halaman'] == 1) {
						$MulaiAwal = 0;
						} else if (empty($_GET['halaman'])) {
						$MulaiAwal = 0;
						}//tampil data

						$query = mysql_query("SELECT a.*, c.nim as nimm, c.nm_mahasiswa as nama, c.foto FROM tbl_berita a LEFT JOIN tbl_alumni c ON a.nim=c.nim where a.status='community' ORDER BY a.id_berita DESC LIMIT $MulaiAwal , $BatasAwal");
						while ($r = mysql_fetch_array($query)){

						$hitung = mysql_num_rows(mysql_query("SELECT * FROM tbl_komentar where id_berita='$r[id_berita]'"));
						$isi_berita  = substr($r['isi'],0,440);
						$isi = $isi_berita;
						echo "<div style='background:#e3e3e3; border:1px solid #8a8a8a; margin-bottom:10px; padding:10px; border-bottom:3px solid #000' class='artikel'>";
									echo "<div style='background:#fff; padding:6px; border:1px solid #8a8a8a'>";
									if ($r[nim]=='0'){
										echo "<b style='color:Red'>Administrator, Pada : $r[tanggal] WIB</b>";
									}else{
										if ($_SESSION[level] == ''){
											echo "<b style='color:Red'>$r[nama] (Nim : $r[nim]), Pada : $r[tanggal] WIB</b>";
										}else{
											echo "<b style='color:Red'><a style='text-decoration:none' href='index.php?page=detailalumni&id=$r[nim]'>$r[nama] (Nim : $r[nim])</a>, Pada : $r[tanggal] WIB</b>";
										}
									}
									echo "</div>";

										if ($r[foto]==''){
											echo "<div style='height:110px; overflow:hidden; float:left; margin-right:7px'><img style=' border-radius:5px; border:2px solid #cecece; width:100px;' src='foto_alumni/no-profile-img.gif'></div>";
										}else{
											echo "<div style='height:110px; overflow:hidden; float:left; margin-right:7px'><img style=' border-radius:5px; border:2px solid #cecece; width:100px;' src='foto_alumni/$r[foto]'></div>";
										}
										?>
										<script>
										$(document).ready(function(){
										    $(".button<?php echo $r[id_berita]; ?>").click(function(){
										        $("#hide<?php echo $r[id_berita]; ?>").toggle(1000);
										    });
										});
										</script>
										<?php 
											echo "$r[isi] <div style='clear:both'></div>
												  <span style='float:right'><i style='color:red'>Ada $hitung Komentar</i> -- <button class='button$r[id_berita]'>View/Hide</button></span><br>";
										include "komentar.php";
							echo "</div>";
						}

						$cekQuery = mysql_query("SELECT * FROM tbl_berita where status='community'");
						$jumlahData = mysql_num_rows($cekQuery);
						if ($jumlahData > $BatasAwal) {
							echo '<br/><center><div style="font-size:12pt; font-weight:bold">Halaman : ';
							$a = explode(".", $jumlahData / $BatasAwal);
							$b = $a[0];
							$c = $b;
								for ($i = 1; $i <= $c; $i++) {
								echo '<a style="text-decoration:none;';
									if ($_GET['halaman'] == $i) {
										echo 'color:red';
									}
								echo '" href="?page=community&halaman=' . $i . '">' . $i . '</a>, ';
								}
							echo '</div></center>';
						}