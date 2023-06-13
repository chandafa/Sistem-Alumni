<?php
function buatkalender($tanggal,$bulan,$tahun) {      
  $bulanan=array(1=>"Januari","Februari","Maret","April",
                    "Mei","Juni","Juli","Agustus","September", 
                    "Oktober","November","Desember");
					
date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];
					
  $tgl=date("d");
  $bln=date("n");
  $thn=date("Y");
  $jmlhari = date("t",mktime(0,0,0,$bulan,1,$tahun));
  $haritglsatu = date("w",mktime(0,0,0,$bulan,1,$tahun));

  $kalender = "<table style='background:#e3e3e3; padding:10px' cellspacing=1 cellpadding=3 
               border=0 class=tabel_data width=100%>\n";
  $kalender .= "<tr class=tr_terang>
               <td colspan=7 ><font face=tahoma size=2 color=#49a0fa> Hari ini : $hari_ini $tgl $bulanan[$bln] $thn
               </td></tr>\n";

  $kalender .= "<tr class=tr_judul>
                <td align='center'>M</td><td align='center'>S</td><td align='center'>S</td><td align='center'>R</td>
                <td align='center'>K</td><td align='center'>J</td><td align='center'>S</td></tr>\n";
  $a 	  = 1;
  $adabaris   = TRUE;
  $mulaicetak = 0;
  while ($adabaris) {
    $kalender .= "<tr align=center class=tr_terang>";
    for ($i = 0; $i < 7; $i++ ) {
      if ($mulaicetak < $haritglsatu) {
        $kalender .= "<td style='background:#e3e3e3; border:1px solid #8a8a8a;'>&nbsp;</td>";
        $mulaicetak++;
      } 
      elseif ($a <= $jmlhari) {
        $tt = $a;
        if ($a == $tanggal) { 
          $tt = "<span  style='color: white; font-weight: bold; 
                 font-size: larger; text-decoration: blink;'>
                 $tt</span>"; 
        }
        if ($i == 0) { 
          $tt = "<font color=\"#FF0000\">$tt</font>"; 
        }
        $kalender .= "<td style='background:#cecece; border:1px solid #8a8a8a;'>$tt</td>";
        $a++;
      } 
      else {
        $kalender .= "<td style='background:#e3e3e3; border:1px solid #8a8a8a;'>&nbsp;</td>";
      }
    }
    $kalender .= "</tr>\n";
    if ($a <= $jmlhari) { 
      $adabaris = TRUE; 
    } 
    else { 
      $adabaris = FALSE; 
    }
  }
  $kalender .= "</table>\n";
  return $kalender;
}
?>
