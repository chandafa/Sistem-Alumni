<h4>Data Alumni Berdasarkan Pekerjaan "<?php echo $pk['jenis_pk'] ;?>"</h4>
<div class="box box-success">
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<th width="5%">No</th>
				<th width="35%">Nama Lengkap</th>
				<th>Instansi</th>
				<th>Posisi</th>
			</thead>
			<?php $no=0; foreach($upk as $k): $no++ ; ?>
			<tr>
				<td><?php echo $no;?></td>
				<td><a href="<?php echo site_url('User/profile/'.$k->id_profil);?>"><?php echo $k->fullname;?></a></td>
				<td><?php echo $k->instansi;?></td>
				<td><?php echo $k->posisi;?></td>
			</tr>
			<?php endforeach ;?>
		</table>
	</div>
</div>