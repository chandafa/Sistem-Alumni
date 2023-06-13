<div class="box box-primary">
	<div class="box-header">
		<div class="box-title"><h4>Post Berita Terbaru</h4></div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Berita/post');?>" method="post">
			<div class="form-group">
				<input type="text" name="judul" class="form-control" placeholder="Judul Postingan"><br>
				<textarea class="form-control" id="editor1" name="isi_berita" rows="10" cols="80">
					Isi Berita
				</textarea><br>
				<button class="btn btn-primary" type="submit">Posting</button>
			</div>

		</form>
	</div>
</div>

<div class="box box-danger">
	<div class="box-header">
		<div class="box-title">Daftar Berita</div>
	</div>
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
			<th width="5%">No</th>
			<th width="60%">Judul Berita</th>
			<th width="15%">Tgl Terbit</th>
			<th width="20%">Aksi</th>
		</thead>
		<?php $no=0; foreach($berita as $b): $no++ ;?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $b->judul;?></td>
			<td><?php echo $b->tgl_berita;?></td>
			<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $b->id_berita;?>"><i class="fa fa-edit"></i></button>
			<a href="<?php echo site_url('Berita/delete/'.$b->id_berita);?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
	<?php endforeach;?>
		</table>
	</div>
</div>
<?php foreach ($berita as $c) { ?>
<div class="modal fade modal-warning " id="edit<?php echo $c->id_berita;?>"  role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Post Berita</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo site_url('Berita/updateBerita');?>" method="post">
                <div class="form-group">
                <input type="hidden" name="id_berita" value="<?php echo $c->id_berita;?>">
                	<input type="text" required name="judul" class="form-control" value="<?php echo $c->judul;?>"><br><textarea class="form-control" id="editor<?php echo $c->slug;?>" name="isi_berita" rows="10" cols="80">
					<?php echo $c->isi_berita ;?>
				</textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-outline">Simpan</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php } ;?>