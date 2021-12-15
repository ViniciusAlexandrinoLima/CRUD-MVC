<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <h3><?php if(isset($_GET["msg"])) echo $_GET["msg"]; ?></h3>
    <table border="1">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Observações</th>
        <th>Ações</th>
    </tr>
    <?php
        if(is_array($ret))
        {
            foreach($ret as $dado)
            {
                echo "<tr>";
                echo "<td>{$dado->id}</td>";
                echo "<td>{$dado->name}</td>";
                echo "<td>{$dado->phone}</td>";
                echo "<td>{$dado->observations}</td>";
                echo "<td><a href='index.php?controle=contatoController&metodo=alterar&id={$dado->id}'>Alterar</a>";
                
                echo "&nbsp;&nbsp;<a href='index.php?controle=contatoController&metodo=excluir&id={$dado->id}'>Excluir</a></td>";
                echo "</tr>";
            }
        }
    ?>
    </table>
    <br><br>
    <a href="index.php?controle=contatoController&metodo=inserir">Novo Contato</a>
</body>
</html>