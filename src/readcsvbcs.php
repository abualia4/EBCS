<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php
	ini_set('memory_limit', '-1');
	unset($csv);
	$csv = array();

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