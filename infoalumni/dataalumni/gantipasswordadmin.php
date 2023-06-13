<?php 
	$r = mysql_fetch_array(mysql_query("SELECT * FROM tbl_admin"));
	if (isset($_POST[update])){
		$pass = md5($_POST[a]);
		$pass_baru = md5($_POST[b]);
		if ($pass == $r[password]){
						   mysql_query("UPDATE tbl_admin SET password		=	'$pass_baru' where id_admin = '1'");												
						echo "<script>window.alert('Sukses Update Password .');
								window.location='index.php?page=gantipasswordadmin'</script>";
		}else{
			echo "<script>window.alert('Password Lama anda Salah .');
								window.location='index.php?page=gantipasswordadmin'</script>";
		}
	}
echo "<div class='artikel'>
	  <h1>Ganti Password Anda - $r[nama_lengkap]</h1>
		  <form action='' method='POST' enctype='multipart/form-data'>
				<br><table width=100%>
					<tr><td width=120>Password lama</td><td><input type='text' name='a'></td></tr>
					<tr><td width=120>Password Baru</td><td><input type='text' name='b'></td></tr>
			

					<tr><td width=120></td><td><hr style='color:#fff'><input type='submit' name='update' value='Ganti Password'></td></tr>
				</table>
		  </form>
	  </div>";
?>