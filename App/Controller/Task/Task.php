<?php

namespace App\Controller\Task;

use App\Controller\Controller;

class Task extends Controller
{

    public function index()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        $id = $_POST['id'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $user = $_SESSION['user'];
        $tarefa = $_POST['tarefa'];
        $titulo = $_POST['titulo'];

        $data = Array(
            'tarefa_task' => $tarefa,
            'title_task' => $titulo,
            'user_name' => $user,
            'date' => $date,
            'ip_user' => $ip,
        );
        
        $tasks = $this->business->getTasks();
        $tasksPrioridade = $this->business->getTasksPrioridy();

        $this->data['tasks'] = $tasks;
        $this->data['tasksPrioridade'] = $tasksPrioridade;
        $this->business->TaskDelete($id);
        $this->business->insertLog($data);
        $this->appendCss('tasks/style');
        $this->appendJs('tasks/taskDelete');
        $this->nameTemplate = 'tasks/listing';
        $this->render();
    }



}
