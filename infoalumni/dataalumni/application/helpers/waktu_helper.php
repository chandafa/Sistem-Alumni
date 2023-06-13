<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : BismaLabs Official Site
 * @author   : Bisma Labs - Developer <developer@bismalabs.co.id-->
 * @since    : 2017
 * @license  : https://bismalabs.co.id/
 */
    function time_ago($datetime, $full = false)
    {
     $today = time();
        $createdday = strtotime($datetime);
        $datediff = abs($today - $createdday);
        $difftext = "";
        $years = floor($datediff / (365 * 60 * 60 * 24));
        $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor($datediff / 3600);
        $minutes = floor($datediff / 60);
        $seconds = floor($datediff);
        //year checker
        if ($difftext == "") {
            if ($years > 1)
                $difftext = $years . " tahun yang lalu";
            elseif ($years == 1)
                $difftext = $years . " tahun yang lalu";
        }
        //month checker
        if ($difftext == "") {
            if ($months > 1)
                $difftext = $months . " bulan yang lalu";
            elseif ($months == 1)
                $difftext = $months . " bulan yang lalu";
        }
        //month checker
        if ($difftext == "") {
            if ($days > 1)
                $difftext = $days . " hari yang lalu";
            elseif ($days == 1)
                $difftext = $days . " hari yang lalu";
        }
        //hour checker
        if ($difftext == "") {
            if ($hours > 1)
                $difftext = $hours . " jam yang lalu";
            elseif ($hours == 1)
                $difftext = $hours . " jam yang lalu";
        }
        //minutes checker
        if ($difftext == "") {
            if ($minutes > 1)
                $difftext = $minutes . " menit yang lalu";
            elseif ($minutes == 1)
                $difftext = $minutes . " menit yang lalu";
        }
        //seconds checker
        if ($difftext == "") {
            if ($seconds > 1)
                $difftext = $seconds . " detik yang lalu";
            elseif ($seconds == 1)
                $difftext = $seconds . " detik yang lalu";
        }
        return $difftext;
    }
 
?>