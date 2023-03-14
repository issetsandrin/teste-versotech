<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Selecionar os dados da tabela cores
    $sql_colors = "select * from cores";
    $result_colors = mysqli_query($conn, $sql_colors);

    // Selecionar os dados da tabela usuarios
    $sql_users = "select * from usuarios";
    $result_users = mysqli_query($conn, $sql_users);

    if(isset($_POST['user']) || isset($_POST['color'])){

        // Captura os dados do formulário
        $id_usuario = $_POST["user"];
        $id_cor = $_POST["color"];
        
        $id_usuario = mysqli_real_escape_string($conn, $id_usuario);
        $id_cor = mysqli_real_escape_string($conn, $id_cor);

        $sql_insert = "insert into usuario_cores (id_usuario, id_cor) values ('$id_usuario', '$id_cor')";
        if (mysqli_query($conn, $sql_insert)) {
            header('location: ../../teste-versotech/read/list_colors_users.php');
        } else {
            echo "Erro ao inserir registro: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/newcolorstyle.css">
    </head>
    <div class="container">
        <h2>Associação de cores</h2>
        <p>Faça a associação das cores aos usuários preenchendo os campos do formulário logo abaixo!</p>
        <form method="POST">
            <div class="form-group col-md-4">
                <label for="inputName">Selecione um usuário</label>
                <select class="custom-select" name="user" aria-label="Default select example">
                <?php while ($rowUser = mysqli_fetch_array($result_users)) {
                     echo '<option value="'.$rowUser['id'].'">'.$rowUser['nome'].'</option>';
                }?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleColorInput" class="form-label">Selecione uma cor</label>
                <select name="color" class="custom-select">
                <?php while ($rowColor = mysqli_fetch_array($result_colors)) {
                     echo '<option value="'.$rowColor['id'].'">'.$rowColor['nome'].'</option>';
                }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="../../teste-versotech/read/list_colors.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>



