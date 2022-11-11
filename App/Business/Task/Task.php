<?php

namespace App\Business\Task;

use App\Business\Business;

class Task
{
    use Business;

    public function getTasksPrioridy(){
         
        return $this->repository->getTasksPrioridy();
    }

    public function getTasks(){
       
        return $this->repository->getTasks();

    }

    public function TaskDelete($id){

        return $this->repository->TaskDelete($id);
        
    }
    public function insertLog($data){
      
        return $this->repository->insertLog($data);

       
    }

}
