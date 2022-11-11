<?php

namespace App\Repository\Cadastro;

use App\Repository\Repository;

class Cadastro
{

    use Repository;

    public function cadastrar($data){
        $db = $this->connection;

        if(isset($_POST['cadastrar'])){
            $dados = $db->insert ('tasks', $data);
            if($dados){
                echo '<p class="text-sucess"> Cadastro realizado com sucesso!</p>';
    
            } else{
                echo '<p class="text"> Erro no cadastro!</p>';
    
            }
        }
       
        // return $db->insert('tasks', $data);
    }

   
}
