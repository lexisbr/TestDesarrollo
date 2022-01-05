<?php 

include('../config/conexion.php');

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['name']) && !empty($_POST['name'])&& isset($_POST['lastname']) && !empty($_POST['lastname'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $date = getdate();
    $year = $date['year'];
    $month = $date['mon'];
    $day = $date['mday'];
    $query = "SELECT * FROM USER WHERE user_name = '$username'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        echo json_encode(array('success' => 0));
    }else{
        $query = "CALL insertUser(2,'$username','$name','$lastname','$password','activo',0,'ADMIN','$year-$month-$day')";
        if ($conn->query($query) === TRUE) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
        }
    }
}


?>
