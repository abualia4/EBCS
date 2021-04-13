<html dir=ltr>
<head>
	<title>Control Panel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php



	ini_set('memory_limit', '-1');

	$csvFile=basename( $_FILES["file1"]["name"]);
////////////////////////////// Read file/////////////////////////////////////////////

	$csvFile1="datasets/".$csvFile;

	include("readcsv.php");

	$training=array();
	$test=array();

	$pct=$_POST["pct"];//percentage of test set from all test set
	$rows = count($csv);
	$numRowsTest=floor($pct*$rows);
	$rowsTest=array();

	$i=0;
	while($i<$numRowsTest)
	{
		$rowNumber=rand(1,$rows-1);
		if(!array_Search($rowNumber, $rowsTest, true))
		{
			$rowsTest[$i]=$rowNumber;
			$i++;
		}

	} 
	//Split Training array to two Arrays one for test and another for training
	$rTest=0;
	$rTraining=0;
	for($row=0;$row<$rows;$row++)  {
		$cols = count($csv[$row]);
		
		if(in_array($row,$rowsTest)){
			for($col = 0; $col < $cols; $col++ )
				$test[$rTest][$col]=$csv[$row][$col];
			$rTest++;

		}
		else
		{
			for($col = 0; $col < $cols; $col++ )
				$training[$rTraining][$col]=$csv[$row][$col];
			$rTraining++;

		}
		
	}

	//write arrays to Testset CSV files
	date_default_timezone_set('Asia/Jerusalem');
	$datetime=date("Y-m-d h i s");
	$list = $test;
	$testFile="datasets/"."Testset".$pct.$csvFile ;
	$fp = fopen($testFile, 'w');

	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}

	fclose($fp);

	//write arrays to Trainingset CSV files

	$list = $training;
	$pctTraining=1-$pct;
	$trainingFile="datasets/"."Trainingset".$pctTraining.$csvFile ;
	
	
	
	

	$fp = fopen($trainingFile, 'w');

	foreach ($list as $fields) {
		fputcsv($fp, $fields);
	}

	fclose($fp);




	
	?>
		Please see the datasets directory 

</body>
</html>