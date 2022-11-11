<?php

namespace App\Controller\Cadastro;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Controller\Controller;

class Cadastro extends Controller
{

    public function cadastroPorData()
    {
        $dia = date('D');
        if($dia == 'Sun' || $dia == 'Sat'){
             $status = true;
             $this->data['msg'] = $status;
        }
    }


    public function sendEmail($assunto, $content)
    {
       
        if ($_POST['prioridade'] == 3){

            $mail = new PHPMailer(true);

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'mail.enviarformularios.com.br';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Username = 'noreply@enviarformularios.com.br';
            $mail->Password = 'nd73n7329dn';
            $mail->Port = 587;
            // $mail->Port = 587; se der errado tentar  a 465
            $mail->setFrom('noreply@enviarformularios.com.br');
            $mail->addReplyTo('noreply@enviarformularios.com.br');
            $mail->addAddress('leonardo.oliveira@construsitebrasil.com.br', 'Leo');
            $mail->isHTML(true);
            $mail->Subject = "Tarefa $assunto adicionada";
            $mail->Body    = "Foi cadastrado a tarefa '$content' de alta prioridade, por favor a veja assim que possível";
    
            if(!$mail->send()) {
                echo '<p class="text-error"> Não foi possível enviar a mensagem.<p>';
                echo 'Erro: ' . $mail->ErrorInfo;
            } else {
                echo '<p class="text-sucess"> Mensagem enviada. <p/>';
            }
        }
        
    }
  
    public function index()
    {
        $assunto = $_POST['titulo'];
        $content = $_POST['tarefa'];
        $this->appendCss('cadastrar/style');
        $this->business->cadastrar($_POST);
        $this->cadastroPorData();
        $this->sendEmail($assunto, $content);
        $this->nameTemplate = 'cadastrar/cadastro';
        $this->render();
    }
}
