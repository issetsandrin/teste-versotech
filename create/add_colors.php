<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    if(isset($_POST['nomeCor']) || isset($_POST['colorPicker'])){

        // Captura os dados do formulário
        $nome = $_POST["nomeCor"];
        $hex = $_POST["colorPicker"];
        
        $nome = mysqli_real_escape_string($conn, $nome);
        $hex = mysqli_real_escape_string($conn, $hex);

        $sql = "insert into cores (nome, cor) values ('$nome', '$hex')";
        if (mysqli_query($conn, $sql)) {
            header('location: ../../teste-versotech/read/list_colors.php');
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
        <h2>Cadastro de cores</h2>
        <p>Faça o cadastro da cor preenchendo os campos do formulário logo abaixo!</p>
        <form method="POST">
            <div class="form-group col-md-4">
                <label for="inputName">Nome da cor</label>
                <input type="text" name="nomeCor" placeholder="Nome da cor..." class="form-control" id="inputName">
            </div>
            <div class="form-group col-md-2">
                <label for="exampleColorInput" class="form-label">Selecione uma cor</label>
                <input type="color"name="colorPicker" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Escolha sua cor">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="../../teste-versotech/read/list_colors.php" class="btn btn-secondary" style="margin-top: 2%;width: 100px;">Voltar</a>
        </form>
    </div>
</html>



