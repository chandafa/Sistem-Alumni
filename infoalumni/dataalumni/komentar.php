<?php
if ($_SESSION[nim]!=''){
			echo "<div id='hide$r[id_berita]' class='sembunyikan'>";
				$komentar = mysql_query("SELECT * FROM tbl_komentar a JOIN tbl_alumni b ON a.nama_lengkap=b.nim where a.id_berita='$r[id_berita]' AND a.reply='0' ORDER BY a.id_komentar ASC");
				while ($k = mysql_fetch_array($komentar)){
					echo "<div style='background:#fff'>
							<h4 style='color:#fff; background:#8a8a8a; margin-bottom:5px; padding:4px'>
								Oleh : $k[nm_mahasiswa], Pada : $k[tanggal]</h4>";
							if ($k[foto]==''){
											echo "<div style='height:60px; overflow:hidden; float:left; margin-right:7px'><img style=' border-radius:5px; border:2px solid #cecece; width:50px;' src='foto_alumni/no-profile-img.gif'></div>";
										}else{
											echo "<div style='height:60px; overflow:hidden; float:left; margin-right:7px'><img style=' border-radius:5px; border:2px solid #cecece; width:50px;' src='foto_alumni/$k[foto]'></div>";
										}
							echo "$k[isi_pesan]
						  <div style='clear:both'></div></div>";
				}
			
			echo "<form id='form1' action='index.php?page=community' method='POST'>
				<table id='form' width='100%'>
						<input type='hidden' name='nama_lengkap' value='$_SESSION[nim]' readonly='on'>
						<input type='hidden' name='alamat_email' value='community@gmail.com'>
						<input type='hidden' name='id' value='$r[id_berita]'>
					<tr>
						<td><textarea name='isi_pesan' style='background:#f4f4f4; width:70%; height:40px; float:right'></textarea></td>
						<td style='width:70px'><input type='submit' name='submit1e' value='Kirimkan' style='height:40px; float:right;'></td>
					</tr>
				</table>
			</form>
			</div>	";
		}else{
			echo "<center style='color:red; font-weight:bold; margin-top:40px; margin-bottom:20px'>Untuk Melihat dan Memberikan Komentar anda Harus Login...</center>";
		}
