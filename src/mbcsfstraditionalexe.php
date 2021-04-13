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
	$csvFile=basename( $_FILES["file1"]["name"]);
////////////////////////////// Read file/////////////////////////////////////////////

	$csvFile1="datasets/".$csvFile;
	include("readcsvbcsfilter.php");
///////

///////////
	$Features=count($csv[0])-1;
	$numNests=20;
	$maximumIterations=20;
	$ulpha=0.1;
	$border=floor($Features*0.5);

	for($i=0;$i<=$Features+2;$i++)
		$bestsolution[$i]=0;
	$itrationForBestSolution=0;





//////////////////////////Initialization/////////////////
//Small Area
	for($nest=0;$nest<8;$nest++)
		{   $small=rand(2,$border);
			for($initialSmall=0;$initialSmall<$Features;$initialSmall++)
				$solution[$nest][$initialSmall]=0;

			for($egg=0;$egg<$small;$egg++)
			{
				$solution[$nest][rand(0,$Features)]=1;
			}

		}

//Medium area
		for($nest=8;$nest<16;$nest++)
		{   
			for($initialMedium=0;$initialMedium<$Features;$initialMedium++)
				$solution[$nest][$initialMedium]=0;
			for($egg=0;$egg<$Features;$egg++)
			{
				$solution[$nest][$egg]=rand(0,1);
			}
		}
//Large Area
		for($nest=16;$nest<20;$nest++)
			{   $large=rand(1,$border);
				for($initialLarge=0;$initialLarge<$Features;$initialLarge++)
					$solution[$nest][$initialLarge]=1;
				for($egg=0;$egg<$large;$egg++)
				{
					$solution[$nest][rand(0,$Features)]=0;
				}
			}
////////////////////////////////////Iterations//////////////////////////////
			$itr=1;
			$flag=0;
			while($itr<$maximumIterations && $flag<3)
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
								$flag=0;
								$bestsolution=$solution[0];
								$itrationForBestSolution=$itr;
							}
							else
								$flag++;
	//////////////Print the solutions///
	  /*echo "<table border=1>";
	
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
	echo "</table> ";*/  

	/////////////////////////Generate new candidate solution/////////////
	
	////////////////////////Local Search
	for($nest=0;$nest<$numNests/2;$nest++)
		{   unset($accuracy);
			$accuracy=array();	
			for($egg=0;$egg<$Features;$egg++)
			{    
				$ulpha=1/(2*$itr);
				$lamda=rand(10,30)/10;
				$levy=pow($ulpha,-1*$lamda);
				$newegg= $solution[$nest][$egg]+$ulpha * $levy;
				$gamma=rand(0,10)/10;
			///Convert to boolean
				$s=1/(1+exp(-1*$newegg));
				if($s>$gamma){
					$solution[$nest][$egg]=1;
			//$newone[$egg]=1;

				}
				else
			//$newone[$egg]=0;
					$solution[$nest][$egg]=0;

			}
		 
		}


	/////////////Global///////////////////
	///////////////Small Area
		for($nest=10;$nest<14;$nest++)
		{   	
			$small=rand(2,$border);
			for($initialSmall=0;$initialSmall<$Features;$initialSmall++)
				$solution[$nest][$initialSmall]=0;

			for($egg=0;$egg<$small;$egg++)
			{
				$solution[$nest][rand(0,$Features)]=1;
			}
		}
	//Medium area
		for($nest=14;$nest<18;$nest++)
		{   
			for($initialMedium=0;$initialMedium<$Features;$initialMedium++)
				$solution[$nest][$initialMedium]=0;
			for($egg=0;$egg<$Features;$egg++)
			{
				$solution[$nest][$egg]=rand(0,1);
			}
		}
	//Large Area
		for($nest=18;$nest<20;$nest++)
			{   $large=rand(1,$border);
				for($initialLarge=0;$initialLarge<$Features;$initialLarge++)
					$solution[$nest][$initialLarge]=1;
				for($egg=0;$egg<$large;$egg++)
				{
					$solution[$nest][rand(0,$Features)]=0;
				}
			}

			$itr++;	
}// end of iterations
///////////////////////////////////Result

echo "<h2/>";
Echo "Results"."</h2>";
echo "<hr width='80%'>";

echo "Number of Selected Features:";
echo $bestsolution[$Features+1];
echo "<br>";

echo "Slected Features <br/>";
for ($f=0;$f<$Features;$f++)
{
	if($bestsolution[$f]==1)
		echo $f.",";
	//array_push($answer,$f);
} 
 
echo "<br/>"."itr:".$itrationForBestSolution;
 echo "<br/>";
//usleep(100);
$time_end = microtime(true);
$time = $time_end - $time_start;

echo "Time:  $time seconds\n";


?>
</body>
</html>