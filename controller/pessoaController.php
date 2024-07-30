<?php

//indica onde este arquivo irá buscar as informações em outra pasta no arquivo pessoa.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/model/pessoa.php';

//cria a var pessoa
class PessoaController {
    private $pessoa;

//var pessoa se torna um objeto de Pessoa
    public function __construct() {
        $this->pessoa = new Pessoa();
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            /*instância a classe pessoa e chama sua função inserir para adicionar dados ao banco
            os dados só serão inseridos se a var acao possuir um valor igual a inserir, ela deve 
            ser declarada na url para executar esta ação"*/
        }
        else if ($_GET['acao'] == 'atualizar') {
            $this->atualizar($_GET['id']);
        }
        else if ($_GET['acao'] == 'excluir') {
            $this->excluir($_GET['id']);
        }

        
    }
    

/*seta as informações com o que foi escrito no index.php ou seja a var pessoa recebe todas essas 
informações, importante lembrar que está função é diferente da função inserir da classe Pessoa
apenas possume o mesmo nome mas tem lógicas diferentes*/
    public function inserir() {
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);

/*passa as informações para a função inserir da classe Pessoa a função inserir da classe Pesoa
é que de fato irá colocar as informações dentro do banco com sql*/
        $this->pessoa->inserir();
    }

    public function listar(){

//chama a função listar para que as informações apareçam em consultar.php
        return $this->pessoa->listar();
    }

    public function atualizar($id) {
        $this->pessoa->setId($id);
        $this->pessoa->setNome($_POST['nome']);
        $this->pessoa->setEndereco($_POST['endereco']);
        $this->pessoa->setBairro($_POST['bairro']);
        $this->pessoa->setCep($_POST['Cep']);
        $this->pessoa->setCidade($_POST['cidade']);
        $this->pessoa->setEstado($_POST['estado']);
        $this->pessoa->setTelefone($_POST['telefone']);
        $this->pessoa->setCelular($_POST['celular']);

        $this->pessoa->atualizar($id);
    }

    public function excluir($id) {
        $this->pessoa->excluir($id);
    }
    
    public function buscarPorId($id) {
        return $this->pessoa->buscarPorId($id);
    }    
}

new PessoaController();
//instancia a classe PessoaController

?>