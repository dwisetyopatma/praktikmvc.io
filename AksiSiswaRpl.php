<?php
require('SiswaRPL.php');
$Siswa3 = new SiswaRPL();
$Siswa3->IsiData("K4161","Mereka","2006","Jakarta");
$Siswa3->CetakData();
$Siswa3->JudulLaporan("Laporan PKL Bonet");
$Siswa3->CetakData();
?>