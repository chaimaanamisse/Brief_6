<?php
class Controller{


    static public function creatToken(){
        $reference_user = bin2hex(random_bytes(16));
        return $reference_user;
    }
 
}
 
