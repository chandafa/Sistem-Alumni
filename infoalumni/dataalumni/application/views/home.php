<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Informasi Alumni</a></li>
              <li><a href="#tab_2" data-toggle="tab">Formulir Registrasi Alumni</a></li>

             

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                <?php foreach($berita as $b){ ?>
                <div class="col-md-4">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <div class="box-title"><?php echo $b->judul ;?><br><span class="label bg-gray"><?php echo $b->tgl_berita ;?></span></div>
                  </div>
                  <div class="box-body">
                    <?php echo limit_kata($b->isi_berita) ;?>
                  </div>
                  <div class="box-footer with-border">
                    <center><a href="<?php echo site_url('User/iqra/'.$b->slug);?>">Selengkapnya >></a></center>
                  </div>
                </div>
                </div>
                <?php };?>
                </div>
              </div>
              <div class="tab-pane" id="tab_2">
              	<center>
	<div class="form-group">
	<form method="post" action="<?php echo site_url('User/daftar');?>">
	
		<input type="text" name="fullname" required placeholder="Nama Lengkap dengan gelar" class="form-control"><br>

		<input type="text" name="email" required placeholder="Alamat Email" class="form-control"><br>
		<select class="form-control select2" name="jk" required>
		<option selected="selected" disabled="disabled">Pilih Jenis Kelamin</option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
		</select><br>
		<select class="form-control select2" name="angkatan">
			<option selected="selected" disabled="disabled">Pilih Angkatan Masuk</option>
			<?php for($i=date('Y'); $i>=date('Y')-60; $i-=1){
			echo"<option value='$i'> $i </option>";
			}
			?>
		</select><br>
		<input type="password" required name="password" class="form-control" placeholder="Password (min. 8 karakter)">
		<input type="password" required name="re-password" class="form-control" placeholder="Ketik Ulang Password"><br>
		<input type="text" name="kontak" class="form-control" placeholder="Nomor Kontak yang bisa dihubungi"><br>
		<textarea name="alamat" class="form-control" colspan="3" placeholder="Alamat Rumah"></textarea><br>
		<select class="select2 form-control" required name="pekerjaan">
			<option selected="selected" disabled="disabled">Pilih Pekerjaan</option>
			<?php foreach($pk as $a){ ?>
				<option value="<?php echo $a->id_pk ;?>"><?php echo $a->jenis_pk;?></option>
			<?php };?>
		</select><br>
		<input type="text" name="instansi" class="form-control" placeholder="instansi anda"><br>
		<input type="text" name="posisi" class="form-control" placeholder="Posisi Anda di Instansi"><br>
		<input type="text" name="twitter" class="form-control" placeholder="Link Twitter Anda"><br>
		<input type="text" name="instagram" class="form-control" placeholder="Link instagram Anda"><br>
		<input type="text" name="facebook" class="form-control" placeholder="Link Facebook Anda"><br>
		<button class="btn btn-primary form-control" type="submit">DAFTAR</button>
		</form>
	</div>
</center>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->

