<?php


class Users {
    private $conn ;
    private $table = 'user';
    
    public $nom ;
    public $prenom;
    public $age;
    public $cin;
    public $profession;
    public $id_user;
    public $reference_user;


    
    public function __construct($db){
        $this -> conn = $db ;
    }




 
    public function read_users () {
        $query = 'SELECT id_user , reference_user , nom ,prenom,age,cin,profession FROM ' . $this->table . ' ';
        $stm = $this->conn->prepare($query);
        $stm -> execute();
        
        return $stm;
    }
    









    public function Insert_users () {
       
        $query = 'INSERT INTO ' . $this->table . ' SET  reference_user = :reference_user , nom= :nom , prenom = :prenom , age = :age , cin = :cin , profession = :profession  ';
        $stmt = $this->conn->prepare($query);
    
        $this->reference_user=htmlspecialchars(strip_tags($this->reference_user));
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->prenom=htmlspecialchars(strip_tags($this->prenom));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->cin=htmlspecialchars(strip_tags($this->cin));
        $this->profession=htmlspecialchars(strip_tags($this->profession));
    

        $stmt->bindParam(":reference_user", $this->reference_user);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":cin", $this->cin);
        $stmt->bindParam(":profession", $this->profession);
    
    
    
    
        if ($stmt -> execute()){
        return true;
        }
        
            return false;
        
    }
    
    


    public function delete_RDV() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_user = :id_user';
    
        $stmt = $this->conn->prepare($query);
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
    
        $stmt-> bindParam(':id_user', $this->id_user);
    
        if($stmt->execute()) {
          return true;
        }
    }
    
     
       






    public function update_users() {  
        $query = 'UPDATE ' . $this->table . ' SET      nom= :nom , prenom = :prenom , age = :age , cin = :cin , profession = :profession     WHERE  id_user = :id_user';
        $stmt = $this->conn->prepare($query);
      
        $this->id_user=htmlspecialchars(strip_tags($this->id_user));    
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->prenom=htmlspecialchars(strip_tags($this->prenom));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->cin=htmlspecialchars(strip_tags($this->cin));
        $this->profession=htmlspecialchars(strip_tags($this->profession));
    

        $stmt->bindParam(":id_user", $this->id_user);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":cin", $this->cin);
        $stmt->bindParam(":profession", $this->profession);
    
    
    
        if ($stmt -> execute()){
            return true;
            }

                return false;
            
        }
    


       
     
        public function UserExist(){

            $query = 'SELECT * FROM ' . $this->table . '   WHERE  cin = :cin';
            $stmt = $this->conn->prepare($query);
          
            $this->cin=htmlspecialchars(strip_tags($this->cin));
    
            $stmt->bindParam(":cin", $this->cin);

            $stmt->execute();
             $count = $stmt->rowCount();
             return $count;
        }


        public function Connect_users()
        {
            $query = 'SELECT * FROM ' . $this->table . '   WHERE  reference_user = :reference_user';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":reference_user", $this->reference_user);
            $stmt->execute();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
         
          $count = $stmt->rowCount();        

          if($count == 1)
          {
            $this->id_user = $row['id_user'];
            return  $row['id_user'];
            } 
            else {
             return false;
          }  


        }
        







          
        







}



?>




