<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Receber o ID do registro a ser excluído
    $id = $_GET["id"];

    // Excluir o registro do banco de dados
    $sql_delete = "delete FROM usuario_cores where id='$id'";
    mysqli_query($conn, $sql_delete);

    // Redirecionar de volta para a página principal
    header("Location: ../../teste-versotech/read/list_colors_users.php");
    exit();

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
?>
