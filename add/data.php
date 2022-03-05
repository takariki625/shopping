<?php 
define("db","mysql:dbname=shop;host=localhost;");
define("user","root");
define("pw","");

class getPdo
{
  public static function getPdo(){
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