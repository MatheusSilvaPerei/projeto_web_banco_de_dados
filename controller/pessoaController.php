<?php

// Verifica se os arquivos estão incluidos na pasta
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_web_banco_de_dados/model/pessoa.php';

// Criação da classe PessoaControler
class PessoaController {

// Criação da variável privada pessoa
    private $pessoa;
// Criação do metodo construtor
    public function __construct() {
        $this->pessoa = new Pessoa();
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
        }
    }

    public function inserir() {
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);

        $this->pessoa->inserir();
    }

    public function listar(){
        return $this->pessoa->listar();
    }
}

new PessoaController();

?>