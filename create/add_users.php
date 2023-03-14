<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    if(isset($_POST['nome'])  || isset($_POST['email'])){

        // Captura os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        $nome = mysqli_real_escape_string($conn, $nome);
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "insert into usuarios (nome, email) values ('$nome', '$email')";
        if (mysqli_query($conn, $sql)) {
            header("location: ../../teste-versotech/read/list_users.php");
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/newuserstyle.css">
    </head>
    <div class="container">
        <h2>Cadastro de usuários</h2>
        <p>Faça o cadastro do usuário preenchendo os campos do formulário logo abaixo!</p>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputName" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="../../teste-versotech/read/list_users.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>