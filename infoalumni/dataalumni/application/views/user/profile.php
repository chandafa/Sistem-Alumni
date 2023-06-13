 <?php if(get_angkatan($this->session->userdata('email'))===$user['angkatan'] or $this->session->userdata('role')==='Admin'){ ?>
 <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-square" src="<?php echo base_url();?>uploads/<?php echo $user['foto'];?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $user['fullname'];?></h3>
              <h5 class="widget-user-desc">Angkatan <?php echo $user['angkatan'];?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Email <span class="pull-right badge bg-blue"><?php echo $user['email'];?></span></a></li>
                <?php if($this->session->userdata('role')==='Admin'){ ?>
                <li><a href="#">Kontak <span class="pull-right badge bg-aqua"><?php echo $user['kontak'];?></span></a></li>
                <li><a href="#">Alamat <span class="pull-right badge bg-aqua"><?php echo $user['alamat'];?></span></a></li>
                <?php } else {};?>
                <li><a href="#">Pekerjaan <span class="pull-right badge bg-blue"><?php echo $user['jenis_pk'];?></span></a></li>
                <li><a href="#">Instansi <span class="pull-right badge bg-blue"><?php echo $user['instansi'];?></span></a></li>
                <li><a href="#">Posisi <span class="pull-right badge bg-blue"><?php echo $user['posisi'];?></span></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i> <span class="pull-right badge bg-blue"><?php echo $user['twitter'];?></span></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i> <span class="pull-right badge bg-blue"><?php echo $user['instagram'];?></span></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i> <span class="pull-right badge bg-blue"><?php echo $user['facebook'];?></span></a></li>
                
              </ul>
            </div>
          </div>
<?php } else {echo "User ini bukan angkatan anda";} ;?>