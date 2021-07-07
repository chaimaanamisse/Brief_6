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
    // $creneau = new Creneau($db);

    $data = json_decode(file_get_contents("php://input"));

    $rdv->date = $data->date;

    $result = $rdv->verificationCreneau();

    $num = $result->rowCount();

    if($num > 0) {

        $creneau_slot = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $cren = array (
                'id_creneau' => $id_creneau,
                'heur' => $heur
            );

            array_push($creneau_slot, $cren);
        }
        echo json_encode($creneau_slot);
    } else {
        echo json_decode(array('message' => 'Nothing!'));
    }

?>