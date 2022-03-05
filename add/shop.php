<?php 
require("data.php");
class Shop extends getPdo
{
  private $pdo;
  function __construct(){
    $this->pdo=parent::getPdo();
  }
  public function start(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      $action=filter_input(INPUT_GET,"action");
      switch($action){
        case "serch":
          $result=$this->serch();
          echo json_encode($result);
          break;
      }
      exit;
    }
  }
  public function serch(){
    $text=filter_input(INPUT_POST,"text");
    $stmt=$this->pdo->prepare("SELECT * FROM goods WHERE name=:name");
    $stmt->bindValue("name",h::s($text),\PDO::PARAM_STR);
    $stmt->execute();
    $goods=$stmt->fetch();
    return $goods;
  }

  public function getList(){
    $stmt=$this->pdo->query("SELECT * FROM goods ORDER BY RAND() LIMIT 4");
    $goodsList=$stmt->fetchAll();
    return $goodsList;
  }
}
?>