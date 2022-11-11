<?php

namespace App\Repository\Login;

use App\Repository\Repository;

class Login
{

    use Repository;

    // public function getTasksPrioridy(){
    //     $db = $this->connection;
    //     return $db->get('tasks_prioridade');
    // }

    public function getUsers(){
        $db = $this->connection;
        return $db->get('login');
    }

    // public function insertErr($qt_falha){
    //     $db = $this->connection;
    //     return $db->get('login', $qt_falha);
    // }

    public function insertFalha($data){
        $db = $this->connection;
        $id  =  $_SESSION['id'];

        $db->where ('id_login', $id);
        $db->update ('login', $data);

    }
}
