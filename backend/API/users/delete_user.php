<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $data = json_decode(file_get_contents("php://input"));

  $users-> id_user = $data-> id_user;

  if($users->delete_users()) {
    echo json_encode(
      array('message' => 'user deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'user not deleted')
    );
  }
