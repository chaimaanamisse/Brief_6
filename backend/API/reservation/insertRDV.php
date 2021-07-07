



<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/Database.php';
    include_once '../../models/RDV.php';
    include_once '../../models/user.php';
    include_once '../../models/creneau.php';



    $database = new Database();
    $db = $database->connect();

    $rdv = new RDV($db);
    $users = new Users($db);
    $creneau = new Creneau($db);


    $data = json_decode(file_get_contents("php://input"));
    // $users->reference_user = $data->reference_user;
    
    $rdv->fk_user = $users->Connect_users();
    $rdv->fk_creneau = $creneau->return_Creneau();

    $rdv->sujet = $data->sujet;
    $rdv->date = $data->date;
    $rdv->fk_user = $data->fk_user;
    $rdv->fk_creneau = $data->fk_creneau;


     

    if($rdv->Insert_RDV()){
        echo 'RDV created successfully.';
    } else{
        echo 'RDV could not be created.';
    }
?>












