<?php
// Criação da classe "Conexao"
    class Conexao {

// Criação das variáveis privadas host, usuario, senha, banco e conexao
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $banco = "exemplo_aula_pw";
        private $conexao;

// Criação do metodo construtor
        public function __construct() {

// Passagem dos parametros host, usuario, senha e banco para o objeto conexao
            $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

// Caso ocorra um erro no obejto conexão, o php finalizará a interpretação do script
            if ($this->conexao->connect_error) {
                die("Falha na conexão: " . $this->conexao->connect_error);
            }
        }

        public function getConexao() {
            return $this->conexao;
        }

    }
?>