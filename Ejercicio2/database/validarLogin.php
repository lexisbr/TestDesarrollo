<?php
    include('../config/conexion.php');

    if(isset($_POST['username']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM USER WHERE (user_name = '$username' && password = '$password')";
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result) > 0){
            echo json_encode(array('success' => 1, 'attempts' => 0));
        }else{
            $query = "SELECT * FROM USER WHERE (user_name = '$username')";
            $result = mysqli_query($conn,$query);
            $attempts = 0;
            if(mysqli_num_rows($result) > 0){
                while($row = $result -> fetch_assoc()){
                    $attempts = $row['attempts'];
                }
                $attempts++;
                $queryUpdate = "UPDATE USER SET attempts = '$attempts', status = 'bloqueado' WHERE user_name = '$username'";
                mysqli_query($conn,$queryUpdate);
            }
            echo json_encode(array('success' => 0,'attempts' => $attempts));
        }
        
    }


?>