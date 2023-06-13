<h4>Data Alumni Berdasarkan Pekerjaan</h4>
<?php foreach($pk as $a) { ?>
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo jml_kerja($a->id_pk) ;?></h3>

              <p>Bekerja sebagai <?php echo $a->jenis_pk ;?></p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="<?php echo site_url('Admin/dataPekerjaan/'.$a->id_pk);?>" class="small-box-footer">
              selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
</div>
<?php };?>