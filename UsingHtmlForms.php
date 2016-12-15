<?php
    //$dbh = new PDO('mysql:host=localhost:3306;dbname=electric_diary', root, Qwerty123);
    #it is a way to fix os.x bug then we try to connect to localhost
    $link = mysql_connect('127.0.0.1','root','Qwerty123');
    if (!$link) {
      die('Ошибка соединения: ' . mysql_error());
    }
    mysql_select_db('elec_diar');
    $ath = mysql_query("select login from login_base;");
    if($ath){
      $passes = mysql_fetch_row($ath);
      echo "<br>имя = ".$passes[1]."<br>";
      echo "<br>имя = ".$passes[2]."<br>";
    }

  

// Выполняем SQL-запрос



?>

<html>
 <head>
  <meta http-equiv="Content-Type"  content="text/html; charset=utf-8">
  <title>Страница регистрации</title>
 </head>
 <body align="center">
  <h1>Электронный дневник</h1>
  <!-- Комментарий -->
  <p>Добро пожаловать.</p>
  <form action="action.php"  method="post" enctype="multipart/form-data">
	Ваш логин  : <input type="text" name=$value /><br />
	Ваш пароль: <input type="text" name="password" /><br />
	<input type="submit" value="Отправить форму" />
   </form>
 </body>
</html>