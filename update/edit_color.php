<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Captura os dados do formulário
    $id = $_GET['id'];
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cor = $_POST['nomeCor'];
        $hex = $_POST['colorPicker'];

        $cor = mysqli_real_escape_string($conn, $cor);
        $hex = mysqli_real_escape_string($conn, $hex);

        // Atualizar os dados do registro no banco de dados
        $sql_update = "update cores SET nome='$cor', cor='$hex' where id='$id'";
        mysqli_query($conn, $sql_update);
        
        header("location: ../../teste-versotech/read/list_colors.php");
        exit();
    }

    // Selecionar o registro a ser editado
    $sql_select = "select * from cores where id='$id'";
    $result = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/newcolorstyle.css">
    </head>
    <div class="container">
        <h2>Editar registro</h2>
        <p>Faça a edição da cor atualizando os campos do formulário logo abaixo!</p>
        <form method="POST">
            <div class="form-group col-md-4">
                <label for="inputName">Nome da cor</label>
                <?php echo '<input type="text" name="nomeCor" value="'.$row['nome'].'" placeholder="Nome da cor..." class="form-control" id="inputName">'; ?>
            </div>
            <div class="form-group col-md-2">
                <label for="exampleColorInput" class="form-label">Selecione uma cor</label>
                <?php echo '<input type="color"name="colorPicker" value="'.$row['cor'].'" class="form-control form-control-color" id="exampleColorInput" title="Escolha sua cor">'; ?>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="../../teste-versotech/read/list_colors.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>