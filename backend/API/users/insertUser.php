
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/Database.php';
    include_once '../../models/user.php';
    include_once '../../controllers/Controller.php';

    $database = new Database();
    $db = $database->connect();

    $users = new Users($db);


    // utiliser le "php://input" avec la fonction file_get_contents() qui nous aide à recevoir les données JSON sous forme de fichier et à les lire dans une chaîne.
    // Plus tard, nous pouvons utiliser la fonction json_decode() pour décoder la chaîne JSON.
    
    $data = json_decode(file_get_contents("php://input"));
  
    $users->reference_user = $data->cin.'/'.Controller::creatToken();
    // $users->reference_user = $data->reference_user;
    $users->nom = $data->nom;
    $users->prenom = $data->prenom;
    $users->age = $data->age;
    $users->cin = $data->cin;
    $users->profession = $data->profession;

    
    if($users->Insert_users()){
        echo json_encode(
            array(
                'ref' => $users->reference_user,
                'msg' => 'Users created successfully.'
            )
        );
    } else{
        echo json_encode(
            array(
                'msg' => 'Users could not be created.'
            )
        );
    }
?>












