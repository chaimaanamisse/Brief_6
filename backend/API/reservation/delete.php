<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/RDV.php';

  $database = new Database();
  $db = $database->connect();

  $rdv = new RDV($db);

  $data = json_decode(file_get_contents("php://input"));

  $rdv-> id_RDV = $data-> id_RDV;

  if($rdv->delete_RDV()) {
    echo json_encode(
      array('message' => 'rdv deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'rdv not deleted')
    );
  }
