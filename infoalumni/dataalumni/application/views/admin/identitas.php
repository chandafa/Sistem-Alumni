<form action="<?php echo site_url('Admin/update');?>" method="post">
	<div class="form-group">
		<input type="text" name="nama_web" placeholder="Judul Web" class="form-control" value="<?php echo $a['nama_web'] ;?>"><br>
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
</form>