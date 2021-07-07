<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/creneau.php';

  $database = new Database ;
  $db = $database ->connect();

  $creneau = new Creneau($db) ;

  $resultat = $creneau-> read_Creneau();
  $num = $resultat -> rowCount();
  if($num > 0){
  $creneau_arr = array();
  $creneau_arr['data'] = array();

  while($row = $resultat ->fetch(PDO::FETCH_ASSOC)) 
  {
    //   Importe les variables dans la table
      extract ($row);
     
      $creneau_ithem = array(
          'id_creneau'=>$id_creneau,
          'heur' => $heur
      );

      array_push($creneau_arr['data'],$creneau_ithem);
      
  }

echo json_encode($creneau_arr);

}
  else {
      echo json_encode( array('message' => 'Not Found'));
  }

?>