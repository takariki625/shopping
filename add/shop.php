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
        case "toggle":
          $is_done=$this->toggle();
          echo json_encode($is_done);
          break;
        case "cart":
          $cartBool=$this->cart();
          echo json_encode($cartBool);
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
  public function toggle(){
    $id=filter_input(INPUT_POST,"id");
    $stmt=$this->pdo->prepare("UPDATE goods SET is_done=NOT is_done WHERE id=:id");
    $stmt->bindValue("id",$id,\PDO::PARAM_INT);
    $stmt->execute();
    $stmt=$this->pdo->prepare("SELECT is_done FROM goods WHERE id=:id");
    $stmt->bindValue("id",$id,\PDO::PARAM_INT);
    $stmt->execute();
    $is_done=$stmt->fetch();
    return $is_done;
  }
  public function cart(){
    $id=filter_input(INPUT_POST,"id");
    $stmt=$this->pdo->prepare("SELECT * FROM goods WHERE id=:id");
    $stmt->bindValue("id",$id,\PDO::PARAM_INT);
    $stmt->execute();
    $goods=$stmt->fetch();
    $stmt=$this->pdo->query("SELECT id FROM cart");
    $rows=$stmt->fetchAll();
    foreach($rows as $row){
      if($row["id"] === $id){
        return false;
      }
    }
    $stmt=$this->pdo->prepare("INSERT INTO cart VALUES(:id,:name,:price,:img,:is_done)");
    $stmt->bindValue("id",$goods["id"],\PDO::PARAM_INT);
    $stmt->bindValue("name",$goods["name"],\PDO::PARAM_STR);
    $stmt->bindValue("price",$goods["price"],\PDO::PARAM_INT);
    $stmt->bindValue("img",$goods["img"],\PDO::PARAM_STR);
    $stmt->bindValue("is_done",$goods["is_done"],\PDO::PARAM_INT);
    $stmt->execute();
    return true;
  }

  public function getList(){
    $stmt=$this->pdo->query("SELECT * FROM goods ORDER BY RAND() LIMIT 4");
    $goodsList=$stmt->fetchAll();
    return $goodsList;
  }
}
?>