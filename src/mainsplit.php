<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<form action="index.php?page=split" method="post" enctype="multipart/form-data">
		<table border=0 width=600 align=center>
			<tr>
				<td> Select dataset (CSV File) </td>
				<td><input type="file" name="file1"></td>
			</tr>

			<tr>
				<td> Percentage for Testset </td>
				<td><select name="pct">
					<option value=0.1>10%</option>
					<option value=0.2>20%</option>
					<option value=0.3>30%</option>
					<option value=0.33 selected>33%</option>
					<option value=0.4>40%</option>
					<option value=0.5>50%</option>
				</select>
			</td>
		</tr>

		<tr>
			<td colspan=2 align=center>
				<input type="submit" value="Split">
			</td></tr></table>
		</form>
		<?php

		echo "<hr width=600 align=center>";
		if(isset($_GET["flag"]))
			{$flag1=$_GET["flag"];
		echo $flag1;
	}
	?>






</body>
</html>