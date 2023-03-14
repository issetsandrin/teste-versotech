<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';
    
    // Captura os dados do formulário
    $id = $_GET['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cor = $_POST['color'];
        $usuario = $_POST['user'];

        $cor = mysqli_real_escape_string($conn, $cor);
        $usuario = mysqli_real_escape_string($conn, $usuario);
        
        // Atualizar os dados do registro no banco de dados
        $sql_update = "update usuario_cores SET id_usuario='$usuario', id_cor='$cor' where id='$id'";
        mysqli_query($conn, $sql_update);
        
        header("location: ../../teste-versotech/read/list_colors_users.php");
        exit();
    }

    // Selecionar os dados da tabela cores
    $sql_colors = "select * from cores";
    $result_colors = mysqli_query($conn, $sql_colors);

    // Selecionar os dados da tabela usuarios
    $sql_users = "select * from usuarios";
    $result_users = mysqli_query($conn, $sql_users);

    // Selecionar os dados da tabela usuarios_cores
    $sql_colorsUsers = "select * from usuario_cores where id = '$id'";
    $result = mysqli_query($conn, $sql_colorsUsers);
    $registro = mysqli_fetch_assoc($result);

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
                   
                     if($rowUser['id'] == $registro['id_usuario']){
                        echo '<option value="'.$rowUser['id'].'" selected>'.$rowUser['nome'].'</option>';
                     }
                }?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleColorInput" class="form-label">Selecione uma cor</label>
                <select name="color" class="custom-select">
                <?php while ($rowColor = mysqli_fetch_array($result_colors)) {
                     echo '<option value="'.$rowColor['id'].'">'.$rowColor['nome'].'</option>';

                     if($rowColor['id'] == $registro['id_cor']){
                        echo '<option value="'.$rowColor['id'].'" selected>'.$rowColor['nome'].'</option>';
                     }
                }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="../../teste-versotech/read/list_colors_users.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>



