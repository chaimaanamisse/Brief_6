<?php 
  //L'entête Access-Control-Allow-Origin renvoie une réponse indiquant si les ressources peuvent être partagées avec une origine donnée. 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/RDV.php';

  $database = new Database ;
  $db = $database ->connect();

  $rdv = new RDV($db) ;

  $resultat = $rdv-> read_RDV();
  $num = $resultat -> rowCount();
  if($num > 0){
  $rdv_arr = array();
  $rdv_arr['data'] = array();

  while($row = $resultat ->fetch(PDO::FETCH_ASSOC)) 
  {
    //   Importe les variables dans la table
      extract ($row);
     
      $rdv_ithem = array(
          'id_RDV'=>$id_RDV,
          'date' => $date,
          'fk_creneau' => $fk_creneau,
          'fk_user' => $fk_user ,
      );

      array_push($rdv_arr['data'],$rdv_ithem);
      
  }

echo json_encode($rdv_arr);

}
  else {
      echo json_encode( array('message' => 'Not Found'));
  }

?>