<?php
$conn = new COM("ADODB.Connection") or die("Cannot start ADO"); 

// Microsoft Access connection string.
$conn->Open("DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=C:\\ZKTeco\\ZKAccess3.5\\access.mdb");

// SQL statement to build recordset.
$rs = $conn->Execute("SELECT * FROM CHECKINOUT order by CHECKTIME desc");
echo "<p>Below is a list of values in the MYDB.MDB database, MYABLE table, MYFIELD field.</p>";

// Display all the values in the records set
$array = array();
$i = 0;
while (!$rs->EOF) { 
	//print_r($fv);
    //echo "User ID: ".$rs->Fields("user_id")->value."<br>\n";
	$time = $rs->Fields("CHECKTIME")->value."<br>\n";
	//$array[$i]['time'] = $a;
	$array[$i]['user_id'] = $rs->Fields("USERID")->value;
	$array[$i]['time'] = $time;
    $rs->MoveNext();
	$i++;
} 
$rs->Close(); 
?>

<?php

echo '<pre>';
print_r($array);
echo '</pre>';
exit();

?>