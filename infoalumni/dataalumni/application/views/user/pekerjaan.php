<h4>Data Lulusan Berdasarkan Pekerjaan</h4>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-warning"><i class="fa fa-plus"></i> Tambah Jenis Pekerjaan</button><br>

<div class="modal fade modal-warning " tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jenis Pekerjaan</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo site_url('User/addPekerjaan');?>" method="post">
                <div class="form-group">
                	<input type="text" required name="jenis_pekerjaan" class="form-control" placeholder="Ketik Jenis Pekerjaan">
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
        <!-- /.modal --><br>
<div class="box box-warning">
	<div class="box-body">
	<h4>Daftar Jenis Pekerjaan</h4><br>
		 <table id="example1" class="table table-bordered table-striped">
              <thead>
              	<th width="5%">No</th>
              	<th width="50%">Jenis Pekerjaan</th>
              	<th>Aksi</th>
              
              </thead>
              <?php $no=0; foreach ($pk as $r): $no++ ;?>
              <tr>
              	<td><?php echo $no;?></td>
              	<td><?php echo $r->jenis_pk ;?></td>
              	<td><a href="<?php echo site_url('User/hapusPk/'.$r->id_pk);?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><i class="fa fa-trash"></i></a>
              	<a type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal-edit<?php echo $r->id_pk;?>"><i class="fa fa-edit"></i></a></td>
              </tr>

              
          	<?php endforeach ;?>
</table>
	</div>
</div>
<?php foreach($pk as $k){ ?>
<div class="modal fade modal-edit<?php echo $k->id_pk;?> modal-success" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jenis Pekerjaan</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo site_url('User/editPekerjaan');?>" method="post">
                <div class="form-group">
                	<input type="hidden" name="id" value="<?php echo $k->id_pk;?>">
                	<input type="text" required name="jenis_pekerjaan" class="form-control" placeholder="Ketik Jenis Pekerjaan" value="<?php echo $k->jenis_pk;?>">
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