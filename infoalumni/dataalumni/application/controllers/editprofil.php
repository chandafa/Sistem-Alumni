<h3>Edit Profil</h3>
<?php echo getuserid($this->session->userdata('id_user')) ;?>
<form action="<?php echo site_url('User/updateProfil');?>" method="post">
	<input type="text" name="fullname" class="form-control" value="<?php echo $user['fullname'];?>" placeholder="Nama Lengkap dengan gelar"><br>
	<input placeholder="Alamat Email" type="text" name="email" class="form-control" value="<?php echo $user['email'];?>"><br>
	<input placeholder="Nomor Kontak yang bisa dihubungi" type="text" name="kontak" class="form-control" value="<?php echo $user['kontak'];?>"><br>
	<select class="form-control select2" name="angkatan">
			<option selected="selected" value="<?php echo $user['angkatan'];?>">Angkatan <?php echo $user['angkatan'] ;?></option>
			<?php for($i=date('Y'); $i>=date('Y')-60; $i-=1){
			echo"<option value='$i'> $i </option>";
			}
			?>
		</select><br>
	<textarea colspan="5"  class="form-control" name="alamat"><?php echo $user['alamat'];?></textarea><br>
	<select class="select2 form-control" required name="pekerjaan">
			<option selected="selected" value="<?php echo $user['id_pk'];?>"><?php echo $user['jenis_pk'];?></option>
			<?php foreach($pk as $a){ ?>
				<option value="<?php echo $a->id_pk ;?>"><?php echo $a->jenis_pk;?></option>
			<?php };?>
		</select><br>
	<input placeholder="Instansi" type="text" name="instansi" class="form-control" value="<?php echo $user['instansi'];?>"><br>
	<input placeholder="Posisi di instansi" type="text" name="posisi" class="form-control" value="<?php echo $user['posisi'];?>"><br>
	<input placeholder="twitter" type="text" name="twitter" class="form-control" value="<?php echo $user['twitter'];?>"><br>
	<input placeholder="Instagram" type="text" name="instagram" class="form-control" value="<?php echo $user['instagram'];?>"><br>
	<input placeholder="Facebook" type="text" name="facebook" class="form-control" value="<?php echo $user['facebook'];?>"><br>
	<button class="btn btn-primary" class="form-control" type="submit">Update</button>
</form>