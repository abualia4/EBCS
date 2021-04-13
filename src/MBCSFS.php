<html dir=ltr>
<head>
	<title>MBCSFS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<form action="index.php?page=MBCSFSexe" method="post" enctype="multipart/form-data">
		<table border=0 width=600 align=center>
			<tr>
				<td> Select dataset (CSV File) </td>
				<td><input type="file" name="file1"></td>
			</tr>


			<tr>
				<td colspan=2 align=center>
					<input type="submit" value="Find  the Best Solution">
				</td></tr>
			</table>
		</form>

		<?php
		echo "<hr width=600 align=center>";
		if(isset($_GET["flag"])&&isset($_GET["t"]))
			{$flag1=$_GET["flag"];
		$time1=$_GET["t"];
		echo "Accuracy:".$flag1."<br>";
		echo "Time(Seconds):".$time1 ;
	}
	?>





</body>
</html>