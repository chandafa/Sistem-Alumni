<?php
						$query = mysql_query("SELECT * FROM tbl_berita a JOIN tbl_kategori b ON a.id_kategori=b.id_kategori 
													LEFT JOIN tbl_alumni c ON a.nim=c.nim where a.id_berita='$_GET[id]'");
						while ($r = mysql_fetch_array($query)){
						$hitung = mysql_num_rows(mysql_query("SELECT * FROM tbl_komentar where id_berita='$_GET[id]'"));
						$isi = nl2br($r['isi']);
						echo "<div class='artikel'>
									<h1>$r[nama_kategori] - $r[judul]</h1>";
									if ($r[nim]==''){
										echo "<i style='color:Red'>Dikirimkan oleh : Administrator</i>";
									}else{
										echo "<i style='color:Red'>Dikirimkan oleh : $r[nm_mahasiswa] (Nim : $r[nim])</i>";
									}
									echo "<i style='color:green; float:right'>Pada : $r[tanggal] WIB, Dilihat : $r[hits] Kali</i>
									<br><br>
									$isi,.. 
							  </div><br>";
						}

		if ($_SESSION[nim]!=''){
			echo "<div class='artikel'>";
					if ($hitung > 0){
						echo "<h1 style='background:#e3e3e3; padding:7px'>Ada $hitung Komentar </h1>";
					}

				$komentar = mysql_query("SELECT * FROM tbl_komentar where id_berita='$_GET[id]' AND reply='0' ORDER BY id_komentar DESC");
				while ($k = mysql_fetch_array($komentar)){
					echo "<div style='background:#fff'>
							<h4 style='color:#fff; background:#810b01; margin-bottom:5px; padding:4px'>
								Oleh : $k[nama_lengkap], Pada : $k[tanggal] - 
								<a style='color:#fff' href='index.php?page=beritadetail&id=$_GET[id]&reply=$k[id_komentar]#form'>Reply</a>
							</h4>
							<i style='color:red'>$k[alamat_email]</i> - $k[isi_pesan]
						  </div>";
						  
						  $reply = mysql_query("SELECT * FROM tbl_komentar where reply='$k[id_komentar]'");
						  while ($r = mysql_fetch_array($reply)){
							echo "<div style='background:#fff; margin-top:-17px; margin-left:40px;'>
									<h4 style='background:#ff9085; color:#fff; margin-bottom:5px; padding:4px'>
										Oleh : $r[nama_lengkap], Pada : $r[tanggal] 
									</h4>
									<i style='color:red'>$r[alamat_email]</i> - 
									$r[isi_pesan]
								  </div>";
						  }
				}

			
			echo "<h1 style='background:#e3e3e3; padding:7px'>Berikan Komentar Anda : </h1>
			<form action='' method='POST'>
				<table id='form' width='100%'>
					<tr>
						<td width=150px>Nama Lengkap</td>
						<td><input type='text' name='nama_lengkap' value='$_SESSION[nm_mahasiswa]' readonly='on'></td>
					</tr>
					<tr>
						<td>Alamat Email</td>
						<td><input type='text' name='alamat_email'></td>
					</tr>
					<tr>
						<td>Isi Pesan</td>
						<td><textarea name='isi_pesan' style='width:100%; height:90px'></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='submit' value='Kirimkan Komentar'></td>
					</tr>
				</table>
			</form>
			</div>	";
		}else{
			echo "<center style='color:red; font-weight:bold; margin-top:40px; margin-bottom:20px'>Untuk Melihat dan Memberikan Komentar anda Harus Login...</center>";
		}
				if (isset($_POST['submit'])){
				$tanggal = date("Y-m-d");
				
					if ($_GET['reply'] != ''){
						$reply = $_GET['reply'];
					}else{
						$reply = 0;
					}
					
					mysql_query("INSERT INTO tbl_komentar (id_berita,
														   reply, 
														   nama_lengkap, 
														   alamat_email,
														   isi_pesan,
														   tanggal)
												   VALUES ('$_GET[id]',
														   '$reply',
														   '$_POST[nama_lengkap]',
														   '$_POST[alamat_email]',
														   '$_POST[isi_pesan]',
														   '$tanggal')");
														   
						echo "<script>window.alert('Sukses Kirimkan Komentar.');
								window.location='index.php?page=beritadetail&id=$_GET[id]'</script>";
				}