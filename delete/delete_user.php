<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Receber o ID do registro a ser excluído
    $id = $_GET["id"];

    $sql_select= "select * FROM usuario_cores where id_usuario='$id'";
    $result = mysqli_query($conn, $sql_select);
    while ($row = mysqli_fetch_assoc($result)) {
        $sql_delete = "delete from usuario_cores where id = '".$row['id']."'";
        mysqli_query($conn, $sql_delete);
    }

    // Excluir o registro do banco de dados
    $sql_delete = "delete FROM usuarios where id='$id'";
    mysqli_query($conn, $sql_delete);

    // Redirecionar de volta para a página principal
    header("Location: ../../teste-versotech/read/list_users.php");
    exit();

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
?>
