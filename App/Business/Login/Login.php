<?php

namespace App\Business\Login;

use App\Business\Business;

class Login
{
    use Business;

    // public function getTasksPrioridy(){
         
    //     return $this->repository->getTasksPrioridy();
    // }

    public function getUsers(){
       
        return $this->repository->getUsers();
    }

    public function insertFalha($falha2){

        $data = Array (
            'qt_falha' => $falha2,

        );
      

        return $this->repository->insertFalha($data);
    }
}
