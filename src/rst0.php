<html>
<head>
	<title></title>
</head>
<body>
	<?php

 /////////////////////////////////////////////////////////
	unset($classes);
	unset($classes1);
	unset($selectClass);
	unset($selectClass1);
	unset($totalrow);
	unset($newarray);
	unset($newarray1);
	$colSelected=$accuracy;
	
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
	
/////////////////////////
	$rows1=count($newarray1);
	$sum=0;
//echo "rows:".$rows1;
	$initial=$newarray1[0][0];
	$max=0;
	$counter=0;

	if($newarray1[0][0]!=$newarray1[1][0])
	{
		$sum+=$newarray1[0][1];
	//array_push($selectClass,$newarray1[0][2]);

		$counter++;
	}

	for($r=1;$r<$rows1-1;$r++)
	{
		if($newarray1[$r][0]!=$newarray1[$r-1][0]&&
			$newarray1[$r][0]!=$newarray1[$r+1][0])
		{
			$sum+=$newarray1[$r][1];
		//for($t=0;$t<$newarray1[$r][1];$t++)
		//array_push($selectClass,$newarray1[$r][2]);
			
			
			
			
		}
		
	}
	if($newarray1[$r][0]!=$newarray1[$r-1][0])
	{
		$sum+=$newarray1[$r][1];
	//array_push($selectClass,$newarray1[$r][2]); 


	}

	
	
	
	
	
	
	
	
	
	



	
	







////////////////////////
	$result=$sum/$rows;
	$balancing= $result *($Features-count($accuracy))/$Features;
	



	

	








	

//echo "<meta http-equiv='refresh' content='0;url=index.php?page=measureclassifier&flag=$result&t=$time'>";

	?>
</body>
</html>