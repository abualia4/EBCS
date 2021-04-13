<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<form action="bcsmewter.php" method="post" enctype="multipart/form-data">
		<table border=0 width=600 align=center>
			<tr>
				<td> Select dataset (CSV File) </td>
				<td><input type="file" name="file1"></td>
			</tr>
<!--
<tr>
<td> Select The Objective Function </td>
<td><select name=objective>
<option value="traditional"> Traditional Objective </option>
<option value="new"> New (Equation 3.1)</option>
</select>
</td>
</tr>
-->
<tr>
	<td colspan=2 align=center>
		<input type="submit" value="Find Best Solution">
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