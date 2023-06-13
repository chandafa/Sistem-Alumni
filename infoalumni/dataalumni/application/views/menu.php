<?php if (!$this->session->userdata('email')) { ?>
<li><a href="<?php echo site_url('login');?>">Login</a></li>
<li><a href="<?php echo site_url('User/registrasi');?>">Registrasi</a></li>
<?php } else { ?>
<li><a href="<?php echo site_url('login/logout');?>" class="btn btn-danger">LogOut</a></li>

<?php };?>
<?php if($this->session->userdata('role')==='Admin'){ ?>
<li><a href="<?php echo site_url('Admin/dashboard');?>">Dashboard</a></li>
 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Alumni <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('Admin/angkatan');?>">Per Angkatan</a></li>
                <li><a href="<?php echo site_url('Admin/pekerjaan');?>">Pemetaan Pekerjaan</a></li>
                <li><a href="<?php echo site_url('Admin/statistik');?>">Statistik</a></li>
               
              </ul>
            </li>
   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('User/manage');?>">Manage User</a></li>
                <li><a href="<?php echo site_url('User/pekerjaan');?>">Manage Jenis Pekerjaan</a></li>
                <li><a href="<?php echo site_url('Admin/informasi');?>">Web Info</a></li>
               
              </ul>
            </li>
     <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('Berita');?>">Post Berita</a></li>
                
               
               
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">User Admin<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('User/editProfil');?>">Edit Profil</a></li>
                <li><a href="<?php echo site_url('User/uploadFoto');?>">Upload Foto</a></li>
                <li><a href="<?php echo site_url('User/editPassword');?>">Edit Password</a></li>
              </ul>
            </li>

 
<?php } else if ($this->session->userdata('role')==='Member') { ?>
<li><a href="<?php echo site_url('User/dashboard');?>">Dashboard</a></li>
<li><a href="<?php echo site_url('User/teman');?>">Angkatan</a></li>
<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('User/editProfil');?>">Edit Profil</a></li>
                <li><a href="<?php echo site_url('User/uploadFoto');?>">Upload Foto</a></li>
                <li><a href="<?php echo site_url('User/editPassword');?>">Edit Password</a></li>
              </ul>
            </li>

<?php };?>