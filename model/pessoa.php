<?php
//indica onde este arquivo irá buscar informações em outra pasta no arquivo conexao.php
require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/controller/conexao.php';

//cria as variáveis para receber informações do usuário do arquivo index.php que apresenta uma tela de cadastro
class Pessoa{
    private $id;
    private $nome;
    private $endereco;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $telefone;
    private $celular;
    private $conexao;

/*no geral eles todos os get e set servem para receber a informação correspondente 
ex: getCelular e setCelular respectivamente pegam a informação do celular e guardam na variável $celular*/

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }
    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }
    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getCep() {
        return $this->cep;
    }
    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function getCidade() {
        return $this->cidade;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getCelular() {
        return $this->celular;
    }
    public function setCelular($celular) {
        $this->celular = $celular;
    }

//instância a classe conexão
    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir() {

//utiliza o comando INSERT do sql para inserir dados no banco de dados, mas deixa os valores vazios
        $sql = "INSERT INTO pessoa (`nome`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `celular`) VALUES (?,?,?,?,?,?,?,?)";

//a partir de conexao que é um objeto de Conexao, ele usa a função getConexao e prepare para de fato inserir os dados
        $stmt = $this->conexao->getConexao()->prepare($sql);

//nesta linha os valores são de fato inseridos
        $stmt->bind_param('ssssssss', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);

//retorna a execução dos comandos
        return $stmt->execute();
    }

//utiliza o comando SELECT para exibir as informações
    public function listar() {
        $sql = "SELECT * FROM pessoa";

//a partir de conexao que é um objeto de Conexao, ele usa a função getConexao e prepare para de fato exibir os dados
        $stmt = $this->conexao->getConexao()->prepare($sql);

//executa os comandos
        $stmt->execute();

//recebe os resultados dos comandos, ou seja as informações do usuário
        $result = $stmt->get_result();

//repete esse processo para pessoas diferentes e armazena em um vetor
        $pessoas = [];
        while($pessoa = $result->fetch_assoc()) {
            $pessoas[] = $pessoa;
        }

//retorna as informações das pessoas cadastradas
        return $pessoas;
    }

//cria a função buscarporid
    public function buscarporid($id){

//chama a tabela
        $sql = "SELECT * FROM pessoa WHERE id = ?";

//preparando a conexão com o banco de dados para executar o comando acima
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->blind_param('i', $id);

//exucta o comando
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

//função para atualizar as informações do cadastro
    public function atualizar($id){
        $sql = "UPDATE pessoa SET nome = ?, endereco = ?, bairro = ?, cep = ?, cidade = ?, estado = ?, telefone = ?, celular = ? WHERE id = ?";

        // Aqui preparará a conexão com o banco de dados para executar o comando acima
        $stmt = $this->conexao->getConexao()->prepare($sql);

//preparando os tipos de dados que o banco irá receber    
        $stmt->bind_param('ssssssssi', $this->nome, $this->endereco, $this->bairro, $this->cep, $this->cidade, $this->estado, $this->telefone, $this->celular);
        return $stmt->execute();
    }
}

?>