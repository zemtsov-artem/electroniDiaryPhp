<?php
    header('Content-Type: text/html; charset=utf-8');
    setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!

    //заносим введенный пользователем данные в переменные, если они пустые, то уничтожаем их
    if (isset($_POST['name'])) { $name = $_POST['name'];              if ($name == '') { unset($name);} } 
    if (isset($_POST['subj_name'])) { $subj_name=$_POST['subj_name']; if ($subj_name =='') { unset($subj_name);} }
    if (empty($name) or
        empty($subj_name)
       ) { //если пользователь не ввел данные, то выдаем ошибку и останавливаем скрипт
       exit ("<body> <div align='center'>
                         <br/><br/><br/>
                         <h3>Вы ввели не всю информацию, вернитесь назад и заполните все поля!" . "<br/> <a href='newstudPage.php'><b>Назад</b> </a></h3>
                     </div>
            </body>");
    }
    //если данные введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $subj_name = stripslashes($subj_name);
    $subj_name = htmlspecialchars($subj_name);
    //удаляем лишние пробелы
    $name = trim($name);
    $subj_name = trim($subj_name);
    
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

    $asv = mysql_query("select mark from main_table where project = '$subj_name' and student_name = '$name'");
    echo "<table  width=8% cellpadding=0 cellspacing=0 border=1 bordercolor='silver'  valign=top>";
    echo "<tr><td>mark</td></tr>";
    while ($author = mysql_fetch_array($asv)) {
        echo "<tr><td>".$author['mark']."&nbsp;</td></tr>";
    }
    echo "</table>";

    echo ("<body><div align='center'><br/><br/><br/>
       <h3>" . "<a href='newstudPage.php'> <b>come back</b> </a></h3></div></body>");