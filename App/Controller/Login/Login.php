<?php

namespace App\Controller\Login;

use App\Controller\Controller;

class Login extends Controller
{

    public function index(){
      $this->appendCss('login/style');

      $status = false;
      $userBd = $this->business->getUsers()['0']['user_login'];
      $id  = $this->business->getUsers()['0']['id_login'];
      $passwordBd = $this->business->getUsers()['0']['password_login'];
      $userForm = $_POST['username'];
      $passwordForm = $_POST['password'];
      $falha2 =  $this->business->getUsers()['0']['qt_falha'];
      if(!empty($_POST)){
         if ($userForm === $userBd && $passwordForm === $passwordBd ){

            $_SESSION['login'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['user'] = $userBd;
            
            header("Location: listagem-tarefas");
         }elseif($passwordBd != $passwordForm) {    
   
            if ($falha2 < 3) {
               $falha2 += 1;     
               $this->business->insertFalha($falha2);
               
            }
            if($falha2 == 1 ){
               echo '<h3 class="text-error"> Usuario ou senha incorreto. 2 tentavias e seu usuário será bloqueado por 50 minutos!!</h3>';

            }elseif($falha2 == 2){
               echo '<h3 class="text-error"> Usuario ou senha incorreto. 1 tentativa restante.!</h3>';

            }elseif($falha2 == 3){
               echo '<h3 class="text-error"> Usuario bloqueado, aguarde n minutos!</h3>';

            } 
       
         
         
         if($falha2 == 3 ){
            $status = true;
            
         }
      }


  

    } 
    $this->nameTemplate = 'login/index';
    $this->data['status'] = $status;
    $this->render();
      }}