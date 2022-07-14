<?php
session_start();
require("../models/User.php");
Class AjaxController{
    public $data;
    public function saveUser(){
        $userAuth = $_POST;
        $db = new UserModel();
        $data["email"] = $userAuth["email"];
        $data["password"] =  $userAuth["password"];
        $data["name"] =  $userAuth["name"];
        $data["nick"] =  $userAuth["nick"];
        $result = $db->login($data);
        $json["error"]="";
        $json["result"]="";
        if($result != false){
            if(empty($result['role'])){
                if($result['role'] == true){
                    $json["error"]= "No se pudo registrar el usuario.";
                    $json["result"] = false;
                    echo json_encode($json);
                }else{
                    $json["error"]= $result;
                    
                    $result = $db->getNick($data);
                    if($result != false){
                        if(empty($result['role'])){
                            $result = $db->saveData($data);
                            if($result != false){
                                $json["result"] = true;
                                echo json_encode($json);
                            }else{
                                $json["error"]= "No se pudo registrar el usuario.";
                                $json["result"] = false;
                                echo json_encode($json);
                            }
                        }else{
                            $json["error"]= "No se pudo registrar el usuario. El nick ingresado ya existe.";
                            $json["result"] = false;
                            echo json_encode($json);
                        }
                    }else{
                        $json["error"]= "No se pudo registrar el usuario.";
                        $json["result"] = false;
                        echo json_encode($json);
                    }
                   
                }
                
            }else{
                $json["result"] = false;
                $json["error"]= "El usuario ya esta registrado en el sistema.";
                echo json_encode($json);
            }
        }else{
            $json["result"] = false;
            $json["error"]= "No se pudo registrar el usuario.";
            echo json_encode($json);
        }
        
    }
    public function savePoints(){
        $userAuth = $_POST;
        $db = new UserModel();
        $data["score"] = $userAuth["score"];
        $data["idUser"] =   $_SESSION['id'];
        $res =$db->getPoints($data);
        if($res!=false){
            if(empty($res['value'])){
                $result = $db->savePoints($data);
                $json["error"]="";
                $json["result"]="";
                if($result != false){
                    if(empty($result['role'])){
                        $json["result"]=true;
                        echo json_encode($json);
                        
                    }else{
                        $json["result"] = false;
                        $json["error"]= "Hubo un problema. Lo sentimos.";
                        echo json_encode($json);
                    }
                }else{
                    $json["result"] = false;
                    $json["error"]= "Hubo un problema. Lo sentimos.";
                    echo json_encode($json);
                }
            }else{
                if($userAuth["score"]>$res['value']){

                    $result = $db->updatePoints($data);
                    $json["error"]="";
                    $json["result"]="";
                    if($result != false){
                        if(empty($result['role'])){
                            $json["result"]=true;
                            echo json_encode($json);
                            
                        }else{
                            $json["result"] = false;
                            $json["error"]= "Hubo un problema. Lo sentimos.";
                            echo json_encode($json);
                        }
                    }else{
                        $json["result"] = false;
                        $json["error"]= "Hubo un problema. Lo sentimos.";
                        echo json_encode($json);
                    }
                }else{
                    $json["result"]=true;
                    echo json_encode($json);
                }
                
            }
        }else{
            $json["result"] = false;
                    $json["error"]= "Hubo un problema. Lo sentimos.";
                    echo json_encode($json);
        }
        
    }
    public function saveNewDate(){
        $d = $_POST;
        $db = new UserModel();
        $data["date"] = $d["date"];
        $result = $db->saveNewDate($data);
        $json["error"]="";
        $json["result"]="";
        if($result != false){
            if(empty($result['role'])){
                $json["result"]=true;
                echo json_encode($json);
                
            }else{
                $json["result"] = false;
                $json["error"]= "Hubo un problema. Lo sentimos.";
                echo json_encode($json);
            }
        }else{
            $json["result"] = false;
            $json["error"]= "Hubo un problema. Lo sentimos.";
            echo json_encode($json);
        }
    }
    public function deleteAll(){
        $db = new UserModel();
        $result = $db->deleteAll();
        $json["error"]="";
        $json["result"]="";
        if($result != false){
            $json["result"]=true;
            echo json_encode($json);
        }else{
            $json["result"] = false;
            $json["error"]= "Hubo un problema. Lo sentimos.";
            echo json_encode($json);
        }
    }
    public function updateCredentials(){
        $d = $_POST;
        $data["email"] = $d["email"];
        $data["password"] = $d["password"];
        $db = new UserModel();
        $result = $db->updateCredentials($data);
        $json["error"]="";
        $json["result"]="";
        if($result != false){
            $json["result"]=true;
            echo json_encode($json);
        }else{
            $json["result"] = false;
            $json["error"]= "Hubo un problema. Lo sentimos.";
            echo json_encode($json);
        }
    }
}
$obj = new AjaxController();
 if(!isset($_REQUEST['action']) ){
    echo json_encode(false);
 }

 switch($_REQUEST['action']) {
    case 'saveUser' :
        $obj->saveUser();
        break;
    case 'savePoints' :
            $obj->savePoints();
            break;
    case 'saveNewDate' :
            $obj->saveNewDate();
            break;
    case 'deleteAll' :
            $obj->deleteAll();
            break;
    case 'updateCredentials' :
            $obj->updateCredentials();
            break;
 }
?>