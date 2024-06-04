<?php
include('db.php');
include('usuario.php');

$conn = new Conexao();
$usuario = new Usuario($conn->getConn());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario->adicionarUsuario($_POST['nome'], $_POST['email']);
}

$usuarios = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Cadastro Simples</title>
</head>
<body>
<h1>Cadastro de Usuários</h1>
<form action="" method="post">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Cadastrar">
</form>

<h2>Usuários Cadastrados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php
    if ($usuarios->num_rows > 0) {
        while($row = $usuarios->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>
                            <a href='deletar.php?id=" . $row["id"] . "'>Deletar</a>
                        </td>
                      </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum usuário cadastrado</td></tr>";
    }
    ?>
</table>
</body>
</html>
