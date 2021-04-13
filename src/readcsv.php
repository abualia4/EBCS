<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php
	unset($csv);
	$csv = array();
	$time_start = microtime(true);
	$lines = file($csvFile1, FILE_IGNORE_NEW_LINES);
	
	foreach ($lines as $key => $value)
	{
		$csv[$key] = str_getcsv($value);
	}

	

//////////////////////////////////////////////////time///////////

// Sleep for a while


	
	
	?>
	
</body>
</html>