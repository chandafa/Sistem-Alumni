<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_alumni where nim='$_SESSION[nim]'"));
	if (isset($_POST[update])){
		$passl = md5($_POST[a]);
		if ($passl == $r[password]){
				$passn = md5($_POST[b]);
				mysql_query("UPDATE tbl_alumni SET password		=	'$passn' where nim = '$_POST[id]'");												
						echo "<script>window.alert('Sukses Update Password .');
								window.location='index.php?page=datasiswa'</script>";
		}else{
			echo "<script>window.alert('Password Lama anda Salah .');
								window.location='index.php?page=gantipassword'</script>";
		}
	}
echo "<div class='artikel'>
	  <h1>Ganti Password Anda - $r[nm_mahasiswa]</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<br><table width=100%>
				<input type='hidden' value='$r[nim]' name='id'>
					<tr><td width=120>Password lama</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password Baru</td><td><input type='text' name='b'></td></tr>
			
					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Ganti Password'></td></tr>
				</table>
		  </form>
	  </div>";
?>