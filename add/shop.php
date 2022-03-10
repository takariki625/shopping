<?php 
require("data.php");
class Shop extends getPdo
{
  private $pdo;
  function __construct(){
    $this->pdo=parent::Pdo();
  }
  public function start(){
    if($_SERVER["REQUEST_METHOD"] === "POST"){
      $action=filter_input(INPUT_GET,"action");
      switch($action){
        case "serch":
          $result=$this->serch();
          echo json_encode($result);
          break;
        case "cart":
          $cartBool=$this->cart();
          echo json_encode($cartBool);
          break;
        case "delete":
          $this->delete();
          break;
        case "toggle":
          $this->toggle();
          break;
        case "purchase":
          $purchaseBool=$this->purchase();
          echo json_encode($purchaseBool);
          break;
      }
      exit;
    }
  }
  public function purchase(){
    $st=$this->pdo->query("SELECT * FROM cart");
    while($list=$st->fetch()){
      try{
      $stmt=$this->pdo->prepare("INSERT INTO purchase VALUES
      (:dt,:id,:name,:price,:img,:comment,:quantity,:total)");
      $stmt->bindValue("dt",date("Ymd"),\PDO::PARAM_STR);
      $stmt->bindValue("id",$list["id"],\PDO::PARAM_INT);
      $stmt->bindValue("name",$list["name"],\PDO::PARAM_STR);
      $stmt->bindValue("price",$list["price"],\PDO::PARAM_INT);
      $stmt->bindValue("img",$list["img"],\PDO::PARAM_STR);
      $stmt->bindValue("comment",$list["comment"],\PDO::PARAM_STR);
      $stmt->bindValue("quantity",$list["quantity"],\PDO::PARAM_INT);
      $stmt->bindValue("total",$list["price"]*$list["quantity"],\PDO::PARAM_INT);
      $stmt->execute();
      }catch(Exception $e){
        echo '補足した例外:'.$e->getMessage();
        return;
      }
    }
    $this->pdo->query("DELETE FROM cart");
    return true;
  }
  public function toggle(){
    $id=filter_input(INPUT_POST,"id");
    $value=filter_input(INPUT_POST,"value");
    $stmt=$this->pdo->prepare("UPDATE cart SET quantity=:value WHERE id=:id");
    $stmt->bindValue("value",$value,\PDO::PARAM_INT);
    $stmt->bindValue("id",$id,\PDO::PARAM_INT);
    $stmt->execute();
  }
  public function serch(){
    $text=filter_input(INPUT_POST,"text");
    $stmt=$this->pdo->prepare("SELECT * FROM goods WHERE name=:name");
    $stmt->bindValue("name",h::s($text),\PDO::PARAM_STR);
    $stmt->execute();
    $goods=$stmt->fetch();
    return $goods;
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
    $stmt=$this->pdo->prepare("INSERT INTO cart(id,name,price,img,is_done) VALUES(:id,:name,:price,:img,:is_done)");
    $stmt->bindValue("id",$goods["id"],\PDO::PARAM_INT);
    $stmt->bindValue("name",$goods["name"],\PDO::PARAM_STR);
    $stmt->bindValue("price",$goods["price"],\PDO::PARAM_INT);
    $stmt->bindValue("img",$goods["img"],\PDO::PARAM_STR);
    $stmt->bindValue("is_done",$goods["is_done"],\PDO::PARAM_INT);
    $stmt->execute();
    return true;
  }
  public function delete(){
    $id=filter_input(INPUT_POST,"id");
    $stmt=$this->pdo->prepare("DELETE FROM cart WHERE id=:id");
    $stmt->bindValue("id",$id,\PDO::PARAM_INT);
    $stmt->execute();
  }

  public function getList(){
    $stmt=$this->pdo->query("SELECT * FROM goods ORDER BY RAND() LIMIT 10");
    $goodsList=$stmt->fetchAll();
    return $goodsList;
  }
  public function cartList(){
    $stmt=$this->pdo->query("SELECT * FROM cart");
    $cartList=$stmt->fetchAll();
    return $cartList;
  }
  public function purchaseList(){
    $stmt=$this->pdo->query("SELECT * FROM purchase");
    $purchaseList=$stmt->fetchAll();
    return $purchaseList;
  }
}
?>