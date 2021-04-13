<!--
EBCS Implementation
Developed By Ahmed Alia and Adel taweel
for Enhanced Binary Cuckoo Search with Frequent Values and Rough Set Theory for Feature Selection 
-->
<html >
<head>
	<title>EBCS</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
</head>
<body >
	<!-- Save for Web Slices (lib) -->
	<center>
		<table  width="960" height="500" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td bgcolor="#326698" width="960" height="112" align=center>
					<font color=white size=5>
						Enhanced Binary Cuckoo Search with Frequent Values and Rough Set Theory <br/>
						for Feature Selection (EBCS)
						<br/><br/>
					</font><font color=white size=4>
						EBCS Implementation
						<br/>
					</td>
				</tr>
				<tr>
					<td bgcolor="ec801d" width="960" height="46" align=center>
						<!--menu   -->
						<table border=0 width="100%">
							<tr>
								<td align=center width="80"><a href='index.php?page=mainsplit'><font color=white face=tahoma> Splitting </a></font></td>

								<td align=center width=100><a href='index.php?page=selectfeature'><font color=white face=tahoma>  Reduction</a></font></td>
								<td align=center width=100><a href='index.php?page=mainbcs'><font color=white face=tahoma> FS-BCS</a></font></td>

								
								<td align=center width=150><a href='index.php?page=MBCSFStraditional'><font color=white face=tahoma>EBCS-Eq.(2)</a></font></td>
								<td align=center width=100><a href='index.php?page=MBCSFS'><font color=white face=tahoma>EBCS</a></font></td></tr>
							</table>
							<!-- end of menu -->
						</td>
					</tr>
					<tr >
						<td background="images/a.gif" height=20>
						</td></tr>
						<tr>
							<td background="images/b.gif" align=center valign=top>
								<!-- content -->
								<?php
								if(!empty($_GET["page"]))
								{
									$page=$_GET["page"];
									$page1=$page.".php";
									if(is_file($page1))
										include($page1);
									else
										include("main.php");
								}
								else
									include("main.php");
								?>
								<!-- end of content -->
							</td>
						</tr>
						<tr >
							<td background="images/c.gif" height=27>
							</td></tr>
							<tr>
								<td bgcolor=326698 height="20" align=center>
									<font color="white">
									Ahmed Alia and Adel Taweel &copy 2018
								</font>
								</td>
							</tr>
						</table>
						<!-- End Save for Web Slices -->
					</body>
					</html>