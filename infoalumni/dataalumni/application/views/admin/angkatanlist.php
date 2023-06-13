<h4>Data Alumni Berdasarkan Angkatan</h4>
<?php foreach($angkatan as $a) { ?>
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo jml_ang($a->angkatan) ;?></h3>

              <p>Lulusan Angkatan <?php echo $a->angkatan ;?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo site_url('User/angkatan/'.$a->angkatan);?>" class="small-box-footer">
              selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
</div>
<?php };?>