<?php

namespace App\Business\Cadastro;

use App\Business\Business;

class Cadastro
{
    use Business;

    public function cadastrar($post){
        if(!empty($post)){
            $titulo = $post['titulo'];
            $prioridade = $post['prioridade'];
            $tarefa = $post['tarefa'];
            }

        $data = Array(
            'title_task' => $titulo,
            'fk_id_prioridade_tasks_prioridade' => $prioridade,
            'description_task' => $tarefa
        );
         

        
        return $this->repository->cadastrar($data);
    }

   
}