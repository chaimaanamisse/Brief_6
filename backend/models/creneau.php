<?php
class Creneau {
private $conn ;
private $table = 'creneau';


public $id_creneau;
public $heur;


public function __construct($db){
    $this -> conn = $db ;
}

public function return_Creneau() {
    $query = 'SELECT * FROM ' . $this->table . '   WHERE  id_creneau = :id_creneau';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id_creneau", $this->id_creneau);
    $stmt->execute();
    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
 
  $count = $stmt->rowCount();        
  if($count == 1)
  {
    $this->id_creneau = $row['id_creneau'];
    return  $row['id_creneau'];
   

    } 
    else {
     return false;
  }  


}

public function read_Creneau() {
    $query = 'SELECT id_creneau ,heur FROM ' . $this->table . ' ';
    $stm = $this->conn->prepare($query);
    $stm -> execute();
    
    return $stm;
}
}
?>