<h3>Upload Foto</h3>
<?php echo form_open_multipart('User/upload'); ?>
<input type="file" name="gambar" accept="image/jpeg"><br>
<button class="btn btn-primary" type="submit" >Upload</button>
<?php form_close();?>
<br>
<br>
<?php if($profil['foto']===''){ ;?>
Belum ada foto profil
<?php } else { ?>
<img src="<?php echo base_url();?>uploads/<?php echo $profil['foto'];?>" class="profile-user-img img-square" style="width:300px">
<?php };?>