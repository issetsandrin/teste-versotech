<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Captura os dados do formulário
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $nome = mysqli_real_escape_string($conn, $nome);
        $email = mysqli_real_escape_string($conn, $email);
        
        // Atualizar os dados do registro no banco de dados
        $sql_update = "update usuarios SET nome='$nome', email='$email' where id='$id'";
        mysqli_query($conn, $sql_update);
        
        header("location: ../../teste-versotech/read/list_users.php");
        exit();
    }

    // Selecionar o registro a ser editado
    $sql_select = "select * from usuarios where id='$id'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/newuserstyle.css">
    </head>
    <div class="container">
        <h2>Edição de registros</h2>
        <p>Faça a atualização preenchendo os campos do formulário logo abaixo!</p>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome</label>
                    <?php echo '<input type="text" name="nome" value="'.$row['nome'].'" class="form-control" id="inputName">'; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <?php echo '<input type="email" name="email" value="'.$row['email'].'" class="form-control" id="inputEmail">'; ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="../../teste-versotech/read/list_users.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>
