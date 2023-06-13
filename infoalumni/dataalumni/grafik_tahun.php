
<html>
	<head>
	<script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	var chart1;
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
            	renderTo: 'container',
	            type: 'column'
    	    },   
        	title: {
            	text: 'Grafik Data Alumni '
	        },
    	    xAxis: {
        	    categories: ['Jurusan']
	        },
    	    yAxis: {
        	    title: {
            	text: 'Jumlah Alumni'
            }
        },
		series:             
            
			[
				<?php 
				include "koneksi.php";	//memanggil koneksi
				$sql = mysql_query("SELECT tbl_pasca.nama_program_pasca, COUNT(tbl_alumni.id_pasca_sarjana) as JML_ANGKATAN FROM tbl_alumni, tbl_pasca where tbl_pasca.id_pasca_sarjana=tbl_alumni.id_pasca_sarjana GROUP BY tbl_pasca.nama_program_pasca") or die (mysql_error());
				while ($data = mysql_fetch_array($sql)) {
					$namakelas = $data['nama_program_pasca'];
					$sqljumlahkelas = mysql_query("SELECT tbl_pasca.nama_program_pasca, COUNT(tbl_alumni.id_pasca_sarjana) as JML_ANGKATAN FROM tbl_alumni, tbl_pasca where tbl_pasca.id_pasca_sarjana=tbl_alumni.id_pasca_sarjana and tbl_pasca.nama_program_pasca='$namakelas'  GROUP BY tbl_pasca.nama_program_pasca   ")
						or die (mysql_error());
					while ($datajumlah = mysql_fetch_array($sqljumlahkelas)) {
						$jumlah = $datajumlah['JML_ANGKATAN'];
					}
				?>
					{
						name: '<?php echo $namakelas; ?>',
						data: [<?php echo $jumlah; ?>]
					},
				<?php 
				} 
				
				?>
				
            ]
		});
	});	
</script>

	</head>
	<body>
		<div id='container'> </div>		
		
	</body>
</html>
