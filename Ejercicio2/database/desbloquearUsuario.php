<?php
include("../config/conexion.php");

if (isset($_GET['userId'])) {
    $id = $_GET['userId'];

    $query = "UPDATE USER set status = 'activo' WHERE userId = '$id' ";

    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario desbloqueado exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: ../indexAdmin.php");
}
?>