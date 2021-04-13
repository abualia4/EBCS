<html dir=ltr>
<head>
	<title>Control Panel</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<?php
/////////////////////////////////Parameters //////////////////////////////
	$time_start = microtime(true);

	ini_set('memory_limit', '-1');

////////////////////////////// Read file/////////////////////////////////////////////



	/////////////////////////////////////////////////////////////////////////////////
	$csvFile=$_FILES['file1']['name'];
	$csvFile1="datasets/".$csvFile;

	include("readcsvbcs.php");


	$rows=count($csv);
	$Features=count($csv[0])-1;
	$numNests=20;
	$maximumIterations=20;
	$ulpha=0.1;
	$probability=0.25;
	for($i=0;$i<=$Features+2;$i++)
		$bestsolution[$i]=0;
	$itrationForBestSolution=0;

////////////////////////Initialization///////////////////// O(nN)
	ini_set('memory_limit', '-1');
	$time_start = microtime(true);

	for($nest=0;$nest<$numNests;$nest++)
	{   
		for($egg=0;$egg<$Features;$egg++)
		{
			$solution[$nest][$egg]=rand(0,1);

		}

	}


////////////////////////////////////Iterations//////////////////////////////O(NC)+O(N)

	for($itr=1;$itr<$maximumIterations;$itr++)
	{   

	// Evaluate the  solution
		for($nest=0;$nest<$numNests;$nest++)
		{   
			unset($accuracy);
			$accuracy=array();
			for($egg=0;$egg<$Features;$egg++)
			{
				if($solution[$nest][$egg]==1)
					array_push($accuracy,$egg);
			}
			include("rst0.php");
			$solution[$nest][$egg]=$result;
			$solution[$nest][$egg+1]=count($accuracy);
			$solution[$nest][$egg+2]=$balancing;


		}
	///////////////////////////////////////Sorting the population according quality
		for($row=0;$row<$numNests;$row++)
			for($col=$row+1;$col<$numNests;$col++)
				if($solution[$col][$Features+2]>$solution[$row][$Features+2])
					for($xx=0;$xx<=$Features+2;$xx++)
					{
						$swap=$solution[$row][$xx];
						$solution[$row][$xx]= $solution[$col][$xx];
						$solution[$col][$xx]=$swap;
					}
	/////////////////////Store the best solution
					if($bestsolution[$Features+2]<$solution[0][$Features+2])
					{

						$bestsolution=$solution[0];
						$itrationForBestSolution=$itr;
					}
	//////////////Print the solutions///
	/* echo "<table border=1>";
	
	for($nest=0;$nest<$numNests;$nest++)
	{echo "<tr>";
	
		for($egg=0;$egg<=$Features+2;$egg++)
		{
		echo "<td>";
		echo $solution[$nest][$egg]." ";
		echo "</td>";
		}
	echo "</tr>";
	}
	echo "</table> ";  */
	/////////////////////////Generate new candidate solution/////////////O(Nn)
	
	for($nest=0;$nest<$numNests;$nest++)
	{   
		////////////////////////Global search
		
		if($solution[$nest][$Features+2]<$probability)
			for($egg=0;$egg<$Features;$egg++)
				$solution[$nest][$egg]=rand(0,1);
			else
			{
			////////////////////////Local Search
				for($egg=0;$egg<$Features;$egg++)
				{    

					$lamda=rand(10,30)/10;
					$levy=pow(1,-1*$lamda);
					$newegg= $solution[$nest][$egg]+$ulpha * $levy;
					$gamma=rand(0,10)/10;
				///Convert to boolean
					$s=1/(1+exp(-1*$newegg));
					if($s>$gamma)
						$solution[$nest][$egg]=1;
					else
						$solution[$nest][$egg]=0;

				}
		}//else local search
	}
	
	
	
	////////////////////////////////
	
}// end of iterations
///////////////////////////////////Result
 


$time_end = microtime(true);
$time = $time_end - $time_start;

echo "<h2/>";
Echo "Results"."</h2>";
echo "<hr width='80%'>";

 
echo "Number of Selected Features:";
echo $bestsolution[$Features+1];
echo "<br>";


echo "Slected Features<br/>";
for ($f=0;$f<$Features;$f++)
{
	if($bestsolution[$f]==1)
		echo $f.",";
	//array_push($answer,$f);
} 
echo "<br/>";
echo "itr:".$itrationForBestSolution;
echo "<br/>";



echo "Time is $time seconds\n";


?>
</body>
</html>