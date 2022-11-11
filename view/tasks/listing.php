
<?php
session_start();
if(($_SESSION['login'] == false)){
  header("Location: login");
  die();
}
?>


<section class="section-listing-taks">
    <div class="container mt-3">
        <h2>Tarefas</h2>
        <p>As tarefas são ordenadas pela sua ordem de prioridade: </p>
        <a class="btn btn-success" href="cadastrar-tarefas">Cadastrar</a>
        <table class="table table-striped mt-3">
        <thead>
                <tr>             
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Prioridade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($tasks as $task): ?>
          
                <tr  id="<?=$task["id_task"] ?>" class="
                <?= 
                ($task["fk_id_prioridade_tasks_prioridade"] == 2) ? 
                'media'
                :
                (($task["fk_id_prioridade_tasks_prioridade"] == 3) ?
                'alta'
                :
                'baixa')
                ?>">
                    <td><?=$task["title_task"] ?></td>

                    <td><?=$task["description_task"] ?></td>
                    <td><?=$task["fk_id_prioridade_tasks_prioridade"] ?></td>
                    <td>                                      
                        <button value="<?=$task["id_task"] ?>" data-title="<?= $task['title_task']?>" data-tarefa="<?= $task['description_task']?>"name="exclude" class="btn btn-danger excludeTask" >
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
               
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</section>