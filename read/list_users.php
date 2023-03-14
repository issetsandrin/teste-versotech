<?php
    include '../includes/connection.php';
    include '../includes/navbar.php';

    // Preparar a consulta SQL
    $query = "select * from usuarios order by id asc";
    $result = mysqli_query($conn, $query);

    mysqli_close($conn);
    
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/liststyle.css">
    </head>
    <div class="container">
        <h2>Consulta de usuários</h2>
        <p>Cadastre seus novos usuários clicando no botão <span style="color: #007bff">Novo</span> logo abaixo!</p>
        <a href="../../teste-versotech/create/add_users.php"><button type="button"  class="btn btn-primary">Novo</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th colspan="2" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <th scope="row">'.$row['id'].'</th>
                                <td>'.$row['nome'].'</td>
                                <td>'.$row['email'].'</td>
                                <th><a style="color: #007bff" href="../../teste-versotech/update/edit_user.php?id='.$row['id'].'">Editar</a></th>
                                <th><a style="color: #007bff" href="../../teste-versotech/delete/delete_user.php?id='.$row['id'].'">Excluir</a></th>
                            </tr>';
                    }
                ?>  
            </tbody>
        </table>
    </div>
</html>