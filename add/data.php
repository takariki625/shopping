<?php 
/*
define("db","mysql:dbname=shop;host=localhost;");
define("user","root");
define("pw","");
*/
define("db","mysql:dbname=makun6250_shop;host=mysql1.php.xdomain.ne.jp;");
define("user","makun6250_php");
define("pw","Riki6250");

class getPdo
{
  public static function Pdo(){
    return new PDO(
      db,
      user,
      pw
    );
  }
}
class h
{
  public static function s($text){
    return htmlspecialchars($text,ENT_QUOTES,"UTF-8");
  }
}
?>