<?php 
	$p = mysql_fetch_array(mysql_query("SELECT * FROM tb_page where id_halaman='3'"));
	$isi = nl2br($p[isi]);
?>
			<div class='artikel'>
				<h1><?php echo "$p[judul]"; ?></h1>
				<?php echo "$isi"; ?>
			</div>