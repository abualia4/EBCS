<html dir=ltr>
<head>
	<title>Feature Selection</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<form action="index.php?page=selectfeatureexe" method="post" enctype="multipart/form-data">
		<table border=0 width=600 align=center>
			<tr>
				<td> Select dataset (CSV File) </td>
				<td><input type="file" name="file1"></td>
			</tr>

			<tr>
				<td> Input subset of features as (3,5,8,13), and notice The index of first feature is 1 </td>
				<td><input type=text name=features size=50>
				</td>
			</tr>

			<tr>
				<td colspan=2 align=center>
					<input type="submit" value="Reduce">
				</td></tr></table>
			</form>








		</body>
		</html>