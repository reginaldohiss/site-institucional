<?php
class contatoController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array(
            'aviso' => ''
        );
        
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $msg = addslashes($_POST['mensagem']);
            
            $para = "suporte@b7web.com.br";
            $assunto = "Dúvida do site";
            $mensagem = "Nome: ".$nome."<br/>E-mail: ".$email."<br/>Mensagem: ".$msg;
            
            $cabecalho = 'From: suporte@b7web.com.br'. "\r\n".
                    'Reply-To: '.$email. "\r\n".
                    'X-Mailer: PHP/'.phpversion();
                        
            mail($para, $assunto, $mensagem, $cabecalho);
            
            $dados['aviso'] = "E-mail enviado com sucesso!";
        }
        
        $this->loadTemplate('contato', $dados);
    }

}