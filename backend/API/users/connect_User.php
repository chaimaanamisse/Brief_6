
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/Database.php';
    include_once '../../models/user.php';

    $database = new Database();
    $db = $database->connect();

    $users = new Users($db);

    $data = json_decode(file_get_contents("php://input"));
    $users->reference_user = $data->reference_user;
    $count=$users->Connect_users();
    
    
    $id = $users->Connect_users();
    
    if($users->Connect_users()){
        $arr = array('id' => $id, 'existe'=> true);
        echo json_encode($arr);
    }
    else
    {
        $arr = array('id' => null, 'existe'=> false);
        echo json_encode($arr);
    }

   ?>
















