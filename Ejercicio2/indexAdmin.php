<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Home</title>
</head>
<?php include("config/conexion.php") ?>

<body>
    <h1>Ingreso Admin con exito!</h1>
    <h3>Usuarios Bloqueados</h3>
    <?php
    if (isset($_SESSION['message'])) { ?>
        <div class="alert-<?= $_SESSION['message_type'] ?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?= $_SESSION['message'] ?>
        </div>
    <?php session_unset();
    } ?>
    <div class="box3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Codigo de Usuario</th>
                    <th>Username</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM USER WHERE status='bloqueado'";
                $result  = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['userId']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td>
                            <a href="database/desbloquearUsuario.php?userId=<?php echo $row['userId'] ?>" class="btn btn-primary">
                                Desbloquear
                            </a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <a href="login.php">Logout</a>
</body>

</html>