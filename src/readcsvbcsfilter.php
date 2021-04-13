<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php

	unset($csv);
	unset($out1);
	unset($countout1);

	$csv = array();

	$lines = file($csvFile1, FILE_IGNORE_NEW_LINES);

	foreach ($lines as $key => $value)
	{
		$csv[$key] = str_getcsv($value);
	}



/////////////////////////////time///////////

	$out=array();
	$rows = count($csv);

	$cols = count($csv[0]);

	$out = array();
	foreach ($csv as $key => $subarr) {
		foreach ($subarr as $subkey => $subvalue) {
			$out[$subkey][$key] = $subvalue;
		//echo $out[$subkey][$key]." ";
		}
		
	} 
	$out1=array();
	$countout1=array();
	for($evaluate=0;$evaluate<$cols-1;$evaluate++)
	{
		$count_values= count(array_unique($out[$evaluate]));
		$goodfeature=$count_values/$rows;
	//echo $count_values."====".$goodfeature."<br>";
		
		array_push($out1,$goodfeature);
		array_push($countout1,$count_values);
		
		
	}


	unset($out);






	?>

</body>
</html>