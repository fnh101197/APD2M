<?php
function TanggalIndo($date){
	$BulanIndo = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . "/" . $BulanIndo[(int)$bulan-1] . "/". $tahun;		
	return($result);
}
?>