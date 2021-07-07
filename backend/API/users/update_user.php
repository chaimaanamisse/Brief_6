<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/user.php';

  $database = new Database();
  $db = $database->connect();

  $users = new Users($db);

  $data = json_decode(file_get_contents("php://input"));

  $users->id_user = $data->id_user;
  $users->nom = $data->nom;
  $users->prenom = $data->prenom;
  $users->age = $data->age;
  $users->cin = $data->cin;
  $users->profession = $data->profession;


  if($users->update_users()) {
    echo json_encode(
      array('message' => 'user Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'user not updated')
    );
  }
