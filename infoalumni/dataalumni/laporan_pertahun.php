<?php 
$bln_ini=date("Y");
	?>

<p> Laporan Angkatan</p>

						<form name="f1" method=post action="cetakpertahun.php" target="_blank">
						<input type="year" name="bulan" class="form-control" value="<?php echo $bln_ini;?>" >
						<select name='bb' >
												  <option value='0'>- Pilih Jurusan -</option>
												  <?php 
									$pasca = mysql_query("SELECT * FROM tbl_pasca");
									while ($p = mysql_fetch_array($pasca)){
										if ($r[id_pasca_sarjana]==$p[id_pasca_sarjana]){
											echo "<option value='$p[id_pasca_sarjana]' selected>$p[nama_program_pasca]</option>";
										}else{
											echo "<option value='$p[id_pasca_sarjana]'>$p[nama_program_pasca]</option>";
										}
									}
									?>
									</select>
<br><br>
<input type="submit" name="simpan" value="Print" class="btn btn-success">
</form>
						