<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Lulusan Setiap Angkatan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
              	<thead class="bg-green">
              		<th width="5%">No</th>
              		<th width="20%">Angkatan</th>
              		<th>Jml Lulusan</th>
              		<th>Jml Lulusan Pria</th>
              		<th>Jml Lulusan Wanita</th>
              	</thead>
              	<?php $no=0; foreach($ang as $b): $no++ ;?>
              	<tr>
              		<td><?php echo $no;?></td>
              		<td><a href="<?php echo site_url('User/angkatan/'.$b->angkatan) ;?>"><?php echo $b->angkatan;?></a></td>
              		<td><?php echo jml_ang($b->angkatan) ;?></td>
              		<td><?php echo jml_jk($b->angkatan, 'L');?></td>
              		<td><?php echo jml_jk($b->angkatan, 'P');?></td>
              	</tr>
              <?php endforeach;?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <div class="col-md-12">
                <canvas id="lineChart" style="height:0px"></canvas>

          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Lulusan Setiap Angkatan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
         <div class="col-md-12">
          <!-- AREA CHART -->
          
                <canvas id="areaChart" style="height:0px"></canvas>
             

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pekerjaan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        
    </section>