<?php

namespace App\Repository\Task;

use App\Repository\Repository;

class Task
{

    use Repository;
   
    public function TaskDelete($id){
        
        $db = $this->connection;
        $db->where('id_task', $id);
        if($db->delete('tasks')) {

            echo'<h1> Deletado com sucesso!! </h1>';
        }
        }
           
    public function insertLog($data) {

        if(!empty($_POST)){
            $db = $this->connection;
            $db->insert('log', $data);
    }
    }

    public function getTasks(){
        $db = $this->connection;
        $db->orderBy("fk_id_prioridade_tasks_prioridade","Desc");
        return $db->get('tasks');
    }

    public function getTasksPrioridy(){
        $db = $this->connection;
        return $db->get('tasks_prioridade');
    }
  
}
