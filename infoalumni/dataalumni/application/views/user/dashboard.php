<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Informasi Alumni</a></li>

             

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
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->