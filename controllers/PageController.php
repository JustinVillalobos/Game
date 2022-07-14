<?php
session_start();

require("./BaseController.php");
require("../models/User.php");
Class PageController Extends BaseController {
    public $data;
    public function index()
    {
        $_SESSION['errorBD']=""; 
        $_SESSION['id'] ="";
        $_SESSION['role'] ="";
        $db = new UserModel();
        $result = $db->parameter();
        if($result !=false){
            $dateValid=date_format(date_create($result["value"]),"H:i d/m/Y");
        }else{
            $dateValid= "ERROR";
        }
        
        $this->data["dateValid"] = $dateValid;
        $this->render('home');
    }
    public function login()
    {
        $db = new UserModel();
        $result = $db->parameter();
        if($result !=false){
            $dateValid=date_format(date_create($result["value"]),"H:i d/m/Y");
        }else{
            $dateValid= "ERROR";
        }
        $this->data["dateValid"] = $dateValid;
        $this->render('home');
    }
    public function getGame()
    {
        $db = new UserModel();
        $result = $db->parameter();
        if( new DateTime("now") <= new DateTime($result["value"])){
            if(!empty( $_SESSION['id'])){
                if($_SESSION['role'] == 2){
                    $this->render('tetris');
                }else{
                    header("Location:PageController.php?action=index");
                    die();
                }
            }else{
                header("Location:PageController.php?action=index");
                    die();
            }
           
        }else{
            header("Location:PageController.php?action=eventoToClose");
        }
        
    }
    public function getHelp()
    {
        $db = new UserModel();
        $result = $db->parameter();
        if( new DateTime("now") <= new DateTime($result["value"])){
            if(!empty( $_SESSION['id'])){
                if($_SESSION['role'] == 2){
                    $this->render('help');
                }else{
                    header("Location:PageController.php?action=index");
                    die();
                }
            }else{
                header("Location:PageController.php?action=index");
                    die();
            }
            
        }else{
            header("Location:PageController.php?action=eventoToClose");
        }
        
    }
    public function getRanking()
    {
        $db = new UserModel();
        $result = $db->parameter();
        if( new DateTime("now") <= new DateTime($result["value"])){
            if(!empty( $_SESSION['id'])){
                if($_SESSION['role'] == 2){
                    $result =$db ->getTop10();
                    $this->data["ranking"] = $result;
                    $this->render('ranking');
                }else{
                    header("Location:PageController.php?action=index");
                    die();
                }
            }else{
                header("Location:PageController.php?action=index");
                die();
            }
           
        }else{
            header("Location:PageController.php?action=eventoToClose");
        }
        
    }
    public function getDashboard()
    {
        if(!empty( $_SESSION['id'])){
            if($_SESSION['role'] == 1){
                $db = new UserModel();
                $result =$db ->getRanking();
                $this->data["ranking"] = $result;
                $result = $db->parameter();
                $dateValid=date_format(date_create($result["value"]),"Y-m-d H:i");
                $this->data["date"] = $dateValid;
                $result = $db->getUserAdmin();
                $this->data["email"] = $result['email'];
                $this->data["password"] = $result['password'];
                $this->render('dashboard');
            }else{
                header("Location:PageController.php?action=index");
                die();
            }
        }else{
            header("Location:PageController.php?action=index");
            die();
        }
        
    }
    public function geteventoToClose(){
        $db = new UserModel();
        $result = $db->parameter();
        if( new DateTime("now") <= new DateTime($result["value"])){
            if(!empty( $_SESSION['id'])){
                if($_SESSION['role'] == 2){
                    $dateValid=date_format(date_create($result["value"]),"H:i d/m/Y");
                    $this->data["dateValid"] = $dateValid;
                    $this->render('eventoToClose');
                }else{
                    header("Location:PageController.php?action=index");
                    die();
                }
            }else{
                header("Location:PageController.php?action=index");
                die();
            }
           
        }else{
            $dateValid=date_format(date_create($result["value"]),"H:i d/m/Y");
            $this->data["dateValid"] = $dateValid;
            $this->render('eventoToClose');
            die();
        }
        
        
    }
}
$obj = new PageController();
 if(!isset($_REQUEST['action']) ){
    header("Location:PageController.php?action=index");
    die();
 }
switch($_REQUEST['action']) {
    case 'home' :
        $obj->index();
        break;
    case 'login' :
        $obj->login();
         break;
    case 'game' :
         $obj->getGame();
        break;
    case 'dashboard' :
            $obj->getDashboard();
           break;
    case 'eventoToClose' :
            $obj->geteventoToClose();
           break;
    case 'help' :
            $obj->getHelp();
           break;
    case 'ranking' :
            $obj->getRanking();
           break;
    default:
        $obj->index();
        break;
}
$_SESSION['start'] = array(0=> 'active', 'registered' => time());
if ((time() - $_SESSION['start']['registered']) > (60 * 15)) {
    unset($_SESSION['start']);
    $obj->index();
}
$_SESSION['start'] = time();
?>