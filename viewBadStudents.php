<?php
    header('Content-Type: text/html; charset=utf-8');
    setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    //Подключаемся к базе данных.
    $dbcon = mysql_connect('127.0.0.1','root','Qwerty123'); 
    mysql_select_db("elec_diar", $dbcon);
    if (!$dbcon) {
        echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysql_error(); exit();
    } else {
        if (!mysql_select_db("elec_diar", $dbcon)) {
            echo("<p>Выбранной базы данных не существует!</p>");
        }
    }

    $asv = mysql_query("select student_name from main_table where mark = '2' group by student_name");
    echo "<table  width=8% cellpadding=0 cellspacing=0 border=1 bordercolor='silver'  valign=top>";
    echo "<tr><td>Name</td></tr>";
    while ($author = mysql_fetch_array($asv)) {
        echo "<tr><td>".$author['student_name']."&nbsp;</td></tr>";
    }
    echo "</table>";

    echo ("<body><div align='center'><br/><br/><br/>
       <h3>" . "<a href='newstudPage.php'> <b>come back</b> </a></h3></div></body>");