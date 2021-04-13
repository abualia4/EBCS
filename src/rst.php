<html>
<head>
	<title></title>
</head>
<body>
	<?php


	

	

// Find Rough Set Theory Dependency degree and the new Objective function

	unset($classes);
	unset($classes1);
	unset($selectClass);
	unset($selectClass1);
	unset($totalrow);
	unset($newarray);
	unset($newarray1);
	$colSelected=$accuracy;


///////////////
	$rows = count($csv);
	sort($csv);
	for ($row = 0; $row < $rows; $row++) {
		$cols = count($csv[$row]);
		$concatenationfeatures="";
		$conditionalFeatures="";
		foreach($colSelected as $col) 
		{ 
			$concatenationfeatures=$concatenationfeatures.$csv[$row][$col];
			

			
		}
		$concatenationfeatures=$concatenationfeatures."*".$csv[$row][$cols-1];
		$totalrow[$row]=$concatenationfeatures;
		$classes[$row]=$csv[$row][$cols-1];

		
	}


	sort($classes);
	sort($totalrow); 


	$classes1=array_count_values($classes);
	$newArray = array_count_values($totalrow);
	$count=0;


	foreach ($newArray as $key => $value) {
		$subset=explode("*",$key);
	//echo $key."---".$value."<br>";
		$newarray1[$count][0]=$subset[0];
		$newarray1[$count][1]=$value;
	//$newarray1[$count][2]=$subset[1]; 
		
		$count++; 
	}
	sort($newarray1);
/////////////

/////////////////////////
	$rows1=count($newarray1);
	$sum=0;

	$initial=$newarray1[0][0];
	$max=0;
	$counter=0;

	if($newarray1[0][0]!=$newarray1[1][0])
	{
		$sum+=$newarray1[0][1];
		

		$counter++;
	}

	for($r=1;$r<$rows1-1;$r++)
	{
		if($newarray1[$r][0]!=$newarray1[$r-1][0]&&
			$newarray1[$r][0]!=$newarray1[$r+1][0])
		{
			$sum+=$newarray1[$r][1];
			
			
			
			
		}
		
	}
	if($newarray1[$r][0]!=$newarray1[$r-1][0])
	{
		$sum+=$newarray1[$r][1];
		
	}

	
	$ind=0;
	$total_info=0;
	
	$info_features=array();
	$infocount=array();
	
	foreach($colSelected as $info)
	{
		$info_festures[$ind]=$out1[$info] ;
		$infocount[$ind]=$countout1[$info];
		$total_info+=$out1[$info];
		$ind++;
	}
	
	$total_info=$total_info/count($colSelected);
////////////////////////
	$result=$sum/$rows;
	$balancing=  $result-$total_info ;
	$balancing= $balancing *(($Features-count($accuracy))/$Features);


	?>
</body>
</html>