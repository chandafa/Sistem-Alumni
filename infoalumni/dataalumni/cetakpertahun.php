<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
<body onLoad="javascript:print()">   
<?php
include('koneksi.php');

//query
$sql=mysql_query("select * from tbl_alumni, tbl_pasca
where tbl_pasca.id_pasca_sarjana=tbl_alumni.id_pasca_sarjana and tbl_alumni.angkatan like '$_POST[bulan]%' and tbl_alumni.id_pasca_sarjana like '$_POST[bb]%' ") or die
(mysql_error());
$nomor = 0; 
?>
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style2 {
	font-size: 22px;
	font-weight: bold;
}
-->
</style>

<table width="100%" border="1" align="center" class="tbls">
<tr>
<td colspan="11">
						<p align="center" class="style4 style1">Laporan Data Alumni  </p>
<hr>
     <p align="center"> Tahun Angkatan: <?php echo $_POST[bulan];?></p></td>
   
  </tr>
  <tr>
   <th width="3%" bgcolor="#CCCCCC"><span class="style3">No</span></th>
<th width="8%" bgcolor="#CCCCCC"><div align="center"><span class="style3">Nim</span></div></th>

<th bgcolor="#CCCCCC"><span class="style3">Jurusan</span></th>
<th bgcolor="#CCCCCC"><span class="style3">Nama Lengkap</span></th>
<th width="10%" bgcolor="#CCCCCC"><span class="style3">Jenis Kelamin</span></th>
<th width="14%" bgcolor="#CCCCCC"><span class="style3">Agama</span></th>
<th width="9%" bgcolor="#CCCCCC"><span class="style3">Pekerjaan</span></th>
<th width="12%" bgcolor="#CCCCCC"><span class="style3">Angkatan</span></th>

<th width="16%" bgcolor="#CCCCCC"><span class="style3">Alamat Lengkap</span></th>
  </tr><?php
  $no=1;
  while($r = mysql_fetch_array($sql)){?>
  <tr align="left" valign="top">
  <td class='td' width='3%' ><div align="center"><span class="style3"><?echo"$no";?></span></div></td>
<td class='td' width='8%' ><div align="center"><span class="style3"><?echo"$r[nim]";?></span></div></td>

<td class='td' width='8%' ><div align="center"><span class="style3"><?echo"$r[nama_program_pasca]";?></span></div></td>
<td class='td' width='15%' ><span class="style3"><?echo"$r[nm_mahasiswa]";?></span></td>
<td class='td'><span class="style3"><?echo$r[jk];?></span></td>
<td class='td'><span class="style3"><?echo$r[agama];?></span></td>
<td class='td'><span class="style3"><?echo$r[pekerjaan];?></span></td>
<td class='td'><span class="style3"><?echo$r[angkatan];?></span></td>

<td class='td'><span class="style3"><?echo$r[alamat];?></span></td>
  </tr>
 
 <?
$no++;
}
?>
</table>
<br><br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="66%" bgcolor="#FFFFFF">&nbsp;	</td><td width="34%" bgcolor="#FFFFFF"><div align="center">Dibuat, 
  <?php $tgl = date('d M Y');
echo "Kab. Lima Puluh Kota, $tgl";?>
  <br/>
  Diketahui,
  <br/>
  <br/>
  <br/>
  <br/>
  Pimpinan
  
</div></td>
</tr></table>
</div>
</html>