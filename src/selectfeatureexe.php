<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php


	ini_set('memory_limit', '-1');

	$csvFile=basename( $_FILES["file1"]["name"]);
	$csvFile1="datasets/".$csvFile;
/////////////////////////////////////////////////////////
	

// Read from CSV, and store it to 2D array
	include("readcsv.php");
	$features1=$_POST["features"];


	$features2=explode(",",$features1);
	
	$colSelected=$features2;
	
	$rows = count($csv);
	unset($reduction);
	$reduction=array();
	
	for ($row = 0; $row < $rows; $row++) {
		$c=0;
		$cols = count($csv[$row]);
		
		foreach($colSelected as $col) 
		{     
			$reduction[$row][$c]=$csv[$row][$col];
			
			$c++;
		}
		
		$reduction[$row][$c]=$csv[$row][$cols-1];
	}
	
	
	$list = $reduction;
	$csvname="datasets/"."Reduction-".$csvFile;
	

	$fp = fopen($csvname, 'w');

	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}

	fclose($fp); 
	
	?>
	<meta http-equiv='refresh' content='2;url=index.php?page=selectfeature'>
	Please see the datasets directory 
</body>
</html>