<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-title">Teman Satu Angkatan</div>
	</div>
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
	<thead>
		<th width="5%">No</th>
		<th>Nama Lengkap</th>
	</thead>
	<?php $no=0; foreach($bff as $t): $no++ ; ?>
	
	<tr>
		<td><?php echo $no;?></td>
		<td><a href="<?php echo site_url('User/profile/'.$t->id_user);?>"><?php echo $t->fullname;?></a></td>
	</tr>
	
	<?php endforeach ;?>
	</table>
	</div>
</div>
