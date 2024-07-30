<?php

//indica onde o arquivo deve buscar informações
    require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/controller/pessoaController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

//cria o objeto pessoaControler de PessoaControler
                    $pessoaController = new PessoaController();

//pessoas é recebe a função listar
                    $pessoas = $pessoaController->listar();

//exibe as informações em uma tabela com foreach passando o vetor para todas as pessoas
                    foreach($pessoas as $pessoa) {
                        echo "<th>" . $pessoa['nome'] . "</th>";
                        echo "<th>" . $pessoa['telefone'] . "</th>";
                        echo "<th>" . $pessoa['celular'] . "</th>";
                    }
                ?>
                <th><a href="editar.php?id=<?php echo $pessoa['id']; ?>"></th>
                <th><a href="excluir.php?id=<?php echo $pessoa['$id']; ?>">excluir</a></th>
            </tbody>
        </table>
    </div>
</body>
</html>