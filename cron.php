<?php
$conn = new COM("ADODB.Connection") or die("Cannot start ADO"); 

// Microsoft Access connection string.
$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=C:\\ZKTeco\\ZKAccess3.5\\access.mdb");

$current_date = date('m/j/Y');
// SQL statement to build recordset.
$rs = $conn->Execute("SELECT DISTINCT USERID FROM CHECKINOUT WHERE [CHECKTIME] LIKE '$current_date%'");
//echo "<p>Below is a list of values in the MYDB.MDB database, MYABLE table, MYFIELD field.</p>";

// Display all the values in the records set
$ids = '';
$i = 0;
while (!$rs->EOF) { 
	//print_r($fv);
    //echo "User ID: ".$rs->Fields("USERID")->value."<br>\n";
	//echo $time = $rs->Fields("CHECKTIME")->value."<br>\n";
	//$array[$i]['time'] = $a;
	$ids .= $rs->Fields("USERID")->value.',';
        $rs->MoveNext();
	$i++;
} 
$rs->Close(); 
$ids = substr($ids, 0, -1);

$url = "http://softwareshade.com/sms-v2/send-sms-api/?token=test&ids=".$ids;
$ch = curl_init();                       
curl_setopt($ch, CURLOPT_POST, false);   
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch); 
?>