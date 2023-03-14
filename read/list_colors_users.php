<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Preparar a consulta SQL
    $sql_cor = "select usuario_cores.id, cores.nome as cornome, usuarios.nome, cores.cor from usuario_cores 
    left join cores ON cores.id = usuario_cores.id_cor
    left join usuarios ON usuarios.id = usuario_cores.id_usuario order by usuario_cores.id asc";
    $result = mysqli_query($conn, $sql_cor);
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/liststyle.css">
    </head>
    <div class="container">
        <h2>Consulta de cores dos usuários</h2>
        <p>Associe novas cores aos usuários clicando no botão <span style="color: #007bff">Novo</span> logo abaixo!</p>
        <a href="../../teste-versotech/create/add_color_user.php"><button type="button" class="btn btn-primary">Novo</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Nome da cor</th>
                    <th scope="col">Cor</th>
                    <th colspan="2" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <th scope="row">'.$row['id'].'</th>
                                <td><span>'.$row['nome'].'</span></td>
                                <td><span>'.$row['cornome'].'</span></td>
                                <td>
                                    <div title="'.$row['cor'].'" style="cursor: pointer;border-radius: 30px;height: 25px;width: 25px;background-color:'.$row['cor'].'"></div>
                                </td>
                                <th><a style="color: #007bff" href="../../teste-versotech/update/edit_color_user.php?id='.$row['id'].'">Editar</a></th>
                                <th><a style="color: #007bff" href="../../teste-versotech/delete/delete_color_user.php?id='.$row['id'].'">Excluir</a></th>
                            </tr>';
                    }
                ?>  
            </tbody>
        </table>
    </div>
</html>