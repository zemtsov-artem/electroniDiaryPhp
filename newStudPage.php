<?php

header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
session_start();
$dbcon = mysql_connect('127.0.0.1','root','Qwerty123'); 
mysql_select_db("elec_diar", $dbcon);
$ath = mysql_query("select * from stud_names;");
$ath2 = mysql_query("select * from subj_names;");

echo "<table  width=8% cellpadding=0 cellspacing=0 border=1 bordercolor='silver'  valign=top>";
echo "<tr><td colspan=2 align=center >student names</td></tr>";
echo "<tr><td>ID</td><td>Name</td></tr>";
while ($author = mysql_fetch_array($ath)) {
	echo "<tr><td>".$author['id']."&nbsp;</td><td>".$author['stud_name']."&nbsp </td><td></tr>";
}
echo "</table>";

echo "<table  width=8% cellpadding=0 cellspacing=0 border=1 bordercolor='silver'  valign=top>";
echo "<tr><td colspan=2 align=center >student names</td></tr>";
echo "<tr><td>ID</td><td>Name</td></tr>";
while ($author2 = mysql_fetch_array($ath2)) {
	echo "<tr><td>".$author2['id']."&nbsp;</td><td>".$author2['name']."&nbsp </td><td></tr>";
}
echo "</table>";




?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Электронный дневник</title>
</head>
<body>
<h1>Add new mark</h1>
<form action="addNewValueToBase.php"  method="post" enctype="multipart/form-data">
	Student sec name : <input type="text" name="name" /><br />
	Project name     : <input type="text" name="subj_name" /><br />
	Mark             : <input type="text" name="mark" /><br />
	Date             :  <input type="text" name="date" /><br />
	<input type="submit" value="Add mark" />
 </form>
 <br />
 <h1>Show student marks</h1>
<form action="viewMarks.php"  method="post" enctype="multipart/form-data">
	Student sec name : <input type="text" name="name" /><br />
	Project name     : <input type="text" name="subj_name" /><br />
	<input type="submit" value="Show" />
 </form>
<br />
<h1>Show middle mark</h1>
 <form action="viewMiddleMark.php"  method="post" enctype="multipart/form-data">
	Student sec name : <input type="text" name="name" /><br />
	Project name     : <input type="text" name="subj_name" /><br />
	<input type="submit" value="Show" />
 </form>
<br />
<h1>Show bad students </h1>
 <form action="viewBadStudents.php"  method="post" enctype="multipart/form-data">
	<input type="submit" value="Show" />
 </form>



</body>
</html>