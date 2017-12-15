<?php

include_once("dbconnection.php");



class InventoryQuery
{

   public $conn;
    function __construct($con)
    {
        $this->conn = $con;
    }
    function updateWarehouse($table,$newQuantity,$id,$db)
    {
        $this->conn->select_db($db);
        $stmt = $this->conn->prepare("UPDATE $table SET quantity=?,updated_at=NOW() where id=?");
        $stmt->bind_param('ii',$newQuantity,$id);
        $stmt->execute();
        $this->conn->select_db("ims");
    }

     function insertIntoWarehouse($table,$quantity,$id)
     {
        $stmt = $this->conn->prepare("INSERT Into $table (id,quantity,created_at,updated_at) VALUES (?,?,NOW(),NOW())");
        $stmt->bind_param('ii',$id,$quantity);
        $stmt->execute();
     }

     function insertIntoInventory($name,$price,$status){
       $stmt = $this->conn->prepare("INSERT Into inventory(name,price,status,created_at,updated_at) VALUES(?,?,?,NOW(),NOW())");
       $stmt->bind_param('sii',$name,$price,$status);
       $stmt->execute();
     }

     function updateInventory($id,$name,$price,$status){

         //mysqli_select_db($this->conn,$db);
         $stmt = $this->conn->prepare("UPDATE inventory SET name=?,price=?,status=?,updated_at=NOW() WHERE id=?");

       $stmt->bind_param('siii',$name,$price,$status,$id);
       $stmt->execute();
       //  mysqli_select_db($this->conn,"ims");

     }
     function getFromWarehouse($table)
     {
        $stmt = $this->conn->prepare("SELECT w.id,(SELECT name from inventory WHERE id=w.id),w.quantity from $table w");
        $stmt->execute();
        $stmt->store_result();

        return $stmt;

     }

     function getFromCompany()
     {
        $stmt = $this->conn->prepare("SELECT * from company");
        $stmt->execute();
        $stmt->store_result();

        return $stmt;

     }

     function getFromInventory()
     {
        $stmt = $this->conn->prepare("SELECT * from inventory");
        $stmt->execute();
        $stmt->store_result();

        return $stmt;

     }
     /*@suyog
        method to fetch specific Item from warehouse
     */
     function getItemFromWarehouse($table,$id)
     {
        $stmt = $this->conn->prepare("SELECT w.id,i.name,w.quantity from inventory i inner join $table w on i.id=w.id WHERE w.id=?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->store_result();
        return $stmt;

     }

     function getInventoryStatitics($table,$product){

      $stmt = $this->conn->prepare("SELECT sum(quantity),month(updated_at),inventory_id,ordered_by from orders where ordered_by = ? and inventory_id= ?;");
      $stmt->bind_param("si",$table,$product);
      $stmt->execute();
      $stmt->store_result();
      return $stmt;



     }


     function getSummary($table){
       $stmt = $this->conn->prepare("select sum(quantity),month(updated_at),ordered_by from ims.orders group by month(updated_at) having ordered_by=?;");
       $stmt->bind_param("s",$table);
       $stmt->execute();
       $stmt->store_result();
       return $stmt;
     }

     function getTransportDetails(){
       $stmt = $this->conn->prepare("SELECT t.id,(select w.name from warehouse_names w where w.id=t.source) as s,(select w.name from warehouse_names w where w.id=t.destination) as d,t.created_at,t.updated_at from transport t;");
       $stmt->execute();
       $stmt->store_result();
       return $stmt;
     }

     function getWarehouseNames()
     {
        $stmt = $this->conn->prepare("SELECT id,name from warehouse_names;");
        $stmt->execute();
        $stmt->store_result();

        return $stmt;

     }

     function getWarehouse($warehousename){
       $stmt = $this->conn->prepare("SELECT id from warehouse_names WHERE name=?;");
       $stmt->bind_param("s",$warehousename);
       $stmt->execute();
       $stmt->store_result();
       return $stmt;
     }

     function updateTransport($id,$source,$dest,$cost){
       $stmt= $this->conn->prepare("UPDATE transport SET source=?,destination=?,cost=?,updated_at=NOW() WHERE id=?;");
       $stmt->bind_param("iiii",$source,$dest,$cost,$id);
       $stmt->execute();
       $stmt->store_result();
       return $stmt;
     }

     function addTransport($source,$dest,$cost){
       $stmt= $this->conn->prepare("INSERT INTO transport (source,destination,cost,created_at,updated_at) values(?,?,?,NOW(),NOW());");
       $stmt->bind_param("iii",$source,$dest,$cost);
       $stmt->execute();
       $stmt->store_result();
       return $stmt;
     }

     function deleteTransport($id){
       $stmt= $this->conn->prepare("DELETE from transport where id=?;");
       $stmt->bind_param("i",$id);
       $stmt->execute();
     }

     function getCompany(){
      $stmt = $this->conn->prepare("select id,(select name from inventory i where i.id=w.id) pname,sum(quantity) total  from ( select id,quantity from awarehouse UNION ALL SELECT id,quantity  FROM bwarehouse UNION ALL SELECT id,quantity  from cwarehouse UNION ALL SELECT id,quantity  from warehouse) w GROUP BY id;");
      $stmt->execute();
      $stmt->store_result();
      return $stmt;
     }

     function addWarehouse($name,$uname,$pass,$table){
        $stmt=$this->conn->prepare("INSERT INTO warehouse_names(name,tablename,table_last_update,username,password,created_at,updated_at) values(?,?,NOW(),?,?,NOW(),NOW())");
        $stmt->bind_param("ssss",$name,$table,$uname,$pass);
        $stmt->execute();

     }

}

class User
{
    private $username;
    private $tablename;
    private $conn;

    function __construct($con)
    {
        $this->conn = $con;
    }

    function authorizeUser($username,$password)
    {
        $stmt = $this->conn->prepare("SELECT tablename,password from warehouse_names where username=?");

        $stmt->bind_param('s',$username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($tblname,$actualHash);
        $stmt->fetch();
        if(!password_verify($password,$actualHash))
        {

            return false;
        }
        else
        {
            $this->username = $username;
            $this->tablename = $tblname;
            return true;
        }

    }

    function getTableName()
    {
        return $this->tablename;

    }

    function getUserName()
    {
        return $this->username;

    }
}





?>
