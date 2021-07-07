<?php
class RDV {
private $conn ;
private $table = 'rdv';


public $id_RDV;
public $sujet;
public $date;
public $fk_creneau ;
public $fk_user;
public $id_user;
public $fk_reference_user;

public function __construct($db){
    $this -> conn = $db ;
}

public function read_RDV () {
    $query = 'SELECT  sujet,date,fk_creneau , fk_user FROM ' . $this->table . '  WHERE id_RDV = :id_RDV ';
    $stm = $this->conn->prepare($query);
    $stm -> execute();
    
    return $stm;
}
// Lie un paramètre à un nom de variable spécifique
// notation nominative

public function getSingleRDV()
{
    $query = "SELECT * FROM rdv r INNER JOIN creneau c ON c.id_creneau = r.fk_creneau INNER JOIN user u ON u.id_user = r.fk_user where u.id_user =:id_user";
    $stmt = $this->conn->prepare($query);
    $this->id_user=htmlspecialchars(strip_tags($this->id_user));
    $stmt->bindParam(":id_user", $this->id_user);
    $stmt -> execute();


    return $stmt;
}

public function getSpecifiqueRDV()
{
    $query = "SELECT * FROM rdv r INNER JOIN creneau c ON c.id_creneau = r.fk_creneau INNER JOIN user u ON u.id_user = r.fk_user where r.id_RDV =:id_RDV";
    $stmt = $this->conn->prepare($query);
    $this->id_RDV=htmlspecialchars(strip_tags($this->id_RDV));
    $stmt->bindParam(":id_RDV", $this->id_RDV);
    $stmt -> execute();


    return $stmt;
}



public function Insert_RDV () {
       
    $query = 'INSERT INTO ' . $this->table . ' SET  sujet = :sujet, date = :date ,fk_creneau = :fk_creneau , fk_user = :fk_user ';
    $stmt = $this->conn->prepare($query);

    $this->sujet=htmlspecialchars(strip_tags($this->sujet));
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->fk_creneau=htmlspecialchars(strip_tags($this->fk_creneau));
    $this->fk_user=htmlspecialchars(strip_tags($this->fk_user));

    $stmt->bindParam(":sujet", $this->sujet);
    $stmt->bindParam(":date", $this->date);
    $stmt->bindParam(":fk_creneau", $this->fk_creneau);
    $stmt->bindParam(":fk_user", $this->fk_user);




    if ($stmt -> execute()){
    return true;
    }
    
        return false;
    
}

public function delete_RDV() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE id_RDV = :id_RDV';

    $stmt = $this->conn->prepare($query);
    $this->id_RDV = htmlspecialchars(strip_tags($this->id_RDV));

    $stmt-> bindParam(':id_RDV', $this->id_RDV);

    if($stmt->execute()) {
      return true;
    }
}


public function UpdateRDV()
{
    $query = 'UPDATE rdv SET  sujet=:sujet, date=:date ,fk_creneau=:fk_creneau WHERE id_RDV=:id_RDV';
    $stmt = $this->conn->prepare($query);
    
    $this->id_RDV = htmlspecialchars(strip_tags($this->id_RDV));
    $this->sujet = htmlspecialchars(strip_tags($this->sujet));
    $this->date = htmlspecialchars(strip_tags($this->date));
    $this->fk_creneau = htmlspecialchars(strip_tags($this->fk_creneau));

    $stmt->bindParam(':id_RDV', $this->id_RDV);
    $stmt->bindParam(':sujet', $this->sujet);
    $stmt->bindParam(':date', $this->date);
    $stmt->bindParam(':fk_creneau', $this->fk_creneau);



    if ($stmt->execute()){
        return true;
        }
        
        return false;      
    }

    public function verificationCreneau() {

        $query = " SELECT *FROM creneau WHERE id_creneau NOT IN(SELECT fk_creneau FROM rdv WHERE date= ?)";

        $req = $this->conn->prepare($query);
        $req->execute([$this->date]);

        return  $req;
    }
}
?>