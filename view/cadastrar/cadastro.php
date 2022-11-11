
   <?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: login");
  die();
}
?> 
    <?php if($msg) { ?>

<h1 class="aviso">Só é possível cadastrar em dias úteis</h1>
<?php } else { ?>
<div class="center-content">

<section>
<div class="container h-custom">
 <div class="row d-flex justify-content-center align-items-center h-100">
     <div class="col-md-12  ">
         <a href="listagem-tarefas"><button class="btn btn-primary btn-lg" style="width:20%;  background-color:darkcyan">Voltar</button></a>
         <form method="post" id="form_cadastrar">
             <div class="form-outline mb-4">
                 <label class="form-label" required for="titulo"><b>Título</b></label>
                 <input type="text" id="titulo" name="titulo" class="form-control form-control-lg" />
             </div>
             <div class="form-outline mb-4">
             <b>Prioridade</b>
                 <select name="prioridade" id="prioridade" required>
                 <option value="3">Alta</option>
                 <option value="2">Média</option>
                 <option value="1">Baixa</option>
                 </select>
             </div>
             <div class="form-outline mb-3">
                <p><b>Tarefa</b></p> 
                <textarea id="tarefa"  name="tarefa" cols="40" rows="10" required></textarea>
             </div>
             <div class="text-center text-lg-start mt-4 pt-2">
                 <input id="input_cadastrar" name="cadastrar" value="Cadastrar" type="submit" class="btn btn-primary btn-lg" style="width:100%;  background-color:darkcyan">
             </div>
         </form>
     </div>
 </div>
</div>
</section>
</div>

<?php } ?>
