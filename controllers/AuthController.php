<?php
session_start();
require("../models/User.php");
Class AuthController{
    public function login(){
        $userAuth = $_POST;
        $db = new UserModel();
        $data["email"] = $userAuth["user"];
        $data["password"] =  $userAuth["pass"];
        $result = $db->login($data);
        if($result != false){
            if(!empty($result['role'])){
                if($result['role'] == 1){
                    $_SESSION["errorBD"] = "";
                    $_SESSION['id'] = $result['idUser'];
                    $_SESSION['role'] = $result['role'];
                   
                    header("Location:PageController.php?action=dashboard");
                    die();
                }else{
                    $_SESSION["errorBD"] = "";
                    $_SESSION['id'] = $result['idUser'];
                    $_SESSION['role'] = $result['role'];
                    $result = $db->parameter();
                    
                    if( new DateTime("now") <= new DateTime($result["value"])){
                       
                        header("Location:PageController.php?action=game");
                    }else{
                        header("Location:PageController.php?action=eventoToClose");
                    }
                   
                    die();
                }
            }else{
                $_SESSION["errorBD"] = "Usuario no encontrado.";
                header("Location:PageController.php?action=login");
                die();
            }
        }else{
            $_SESSION["errorBD"] = "Error ocurrido en servidor.";
            header("Location:PageController.php?action=index");
            die();
        }
    }

}
$obj = new AuthController();
 
switch($_REQUEST['action']) {
    case 'login' :
        $obj->login();
        break;
    default:
        $obj->login();
        break;
}
?>