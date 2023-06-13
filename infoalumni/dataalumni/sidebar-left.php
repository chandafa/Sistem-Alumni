<br><div class='sidebar'>	
			<?php 
			 if ($_SESSION[level]=='admin'){ 
			 	$alumni = mysql_query("SELECT * FROM tbl_pasca");
			 	while ($a = mysql_fetch_array($alumni)){
			 		echo "<a href='index.php?page=kelolaalumni&id=$a[id_pasca_sarjana]&name=$a[nama_program_pasca]'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left; margin-top:3px' value='Alumni $a[nama_program_pasca]'></a>";
			 		
			 	}
					echo "<a href='index.php?page=kelolakategori'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Kategori Informasi'></a>
						  <a href='index.php?page=kelolakomentar'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Komentar'></a>
						  <a href='index.php?page=kelolajurusan'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kelola Jurusan'></a>
						  <a href='logout.php'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Logout'></a>";
			 }elseif($_SESSION[level]=='alumni'){ 
				$g = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.nim='$_SESSION[nim]'"));
				echo "<center>
							<div style='height:230px; overflow:hidden;'><img style=' border-radius:5px; border:2px solid #cecece; width:200px;' src='foto_alumni/$g[foto]'></div>
							Selamat Datang !<br> <b style='color:red; margin-bottom:10px'>$g[nm_mahasiswa]</b> </center>
						  <br>
						  <a href='index.php?page=datasiswa'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Data Profile'></a>
						  <a href='index.php?page=kelolaalumni&id=$g[id_pasca_sarjana]&name=$g[nama_program_pasca]'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Data Alumni'></a>
						  <a href='index.php?page=kirimberita'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Kirimkan Informasi'></a>
						  <a href='logout.php'><input type='button' style='width:100%; padding:5px 5px 5px 20px; text-align:left;  margin-top:3px' value='Logout'></a>";
			 }
			
			if($_SESSION[level]==''){ 
				include "login.php";
				echo "<br><div style='clear:both'></div><h2>Informasi Terbaru</h2>
					<ul>";
						$terbaru = mysql_query("SELECT * FROM tbl_berita ORDER BY hits DESC LIMIT 5");
						while ($r = mysql_fetch_array($terbaru)){
							echo "<li><a href='index.php?page=beritadetail&id=$r[id_berita]'>$r[judul]</a></li>";
						}
					echo "</ul>";
			}	
			?>
		</div>