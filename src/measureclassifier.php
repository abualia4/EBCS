<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<form action="2.php" method="post" enctype="multipart/form-data">
		<table border=0 width=600 align=center>
			<tr>
				<td> Select dataset (CSV File) </td>
				<td><input type="file" name="file1"></td>
			</tr>

			<tr>
				<td> Input subset of features as (3,5,8,13) </td>
				<td><input type=text name=features size=50>
				</td>
			</tr>

			<tr>
				<td colspan=2 align=center>
					<input type="submit" value="Measure">
				</td></tr></table>
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