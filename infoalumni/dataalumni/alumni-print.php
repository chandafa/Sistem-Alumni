<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
?>
<table class="basic"  border="0" align="center" cellpadding="0" cellspacing="0">
    
  <tr>
      <td align="center"><strong>DATA ALUMNI </strong></td>
  </tr>
  <tr>
      <td align="center"><p>Jl.Lubuk Begalung, Padang, Sumatera Barat<br />Telp.(0752) 123452 Kode Pos 26451</p></td>
  </tr>   
</table>
<hr><table class="basic" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <h2>Jurusan <?php echo $_GET[name]; ?></h2></td>
  </tr>
</table><br>
<?php													
	  echo "<table border='1' width=100%>
          <tr bgcolor=#c3c3c3>
            <th>No</th>
            <th>Nim</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Angkatan</th>
            <th>Alamat Lengkap</th>
          </tr>";
          
          $alumni = mysql_query("SELECT * FROM tbl_alumni a JOIN tbl_pasca b ON a.id_pasca_sarjana=b.id_pasca_sarjana where a.status='1' AND a.id_pasca_sarjana='$_GET[id]' ORDER BY a.nim DESC");
          $no = 1;
          while ($r = mysql_fetch_array($alumni)){
            echo "<tr>
                  <td>$no</td>
                  <td>$r[nim]</td>
                  <td>$r[nm_mahasiswa]</td>
                  <td>$r[jk]</td>
                  <td>$r[agama]</td>
                  <td>$r[pekerjaan]</td>
                  <td align=center>$r[angkatan]</td>
                  <td>$r[alamat]</td>
            </tr>";
            $no++;
          }
        echo "</table><br/><hr>";
?>
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"></td>
    <td width="530"></td>
    <td align="center"><?php $tgl = date('d M Y');
echo "......, $tgl";?> <br>Mengetahui, </td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................................... )<br />
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>