<?php
    include('../config/conexion.php');

    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM USER WHERE (user_name = '$username' && password = '$password') limit 1";
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result) > 0){
            while($row = $result -> fetch_assoc()){
                if($row['status'] == 'bloqueado'){
                    echo json_encode(array('success' => 1, 'attempts' => 3));
                }else{
                    $queryUpdate = "UPDATE USER SET attempts = 0 WHERE user_name = '$username'";
                    mysqli_query($conn,$queryUpdate);
                    $_SESSION["user"] = $row['userId'];
                    $role = $row['roleId'];
                    if($role == 1){
                        echo json_encode(array('success' => 1, 'attempts' => 0, 'admin' => 1));
                    }else{
                        echo json_encode(array('success' => 1, 'attempts' => 0, 'admin' => 0));
                    }
                }
            }
        }else{
            $query = "SELECT * FROM USER WHERE (user_name = '$username')";
            $result = mysqli_query($conn,$query);
            $attempts = 0;
            if(mysqli_num_rows($result) > 0){
                while($row = $result -> fetch_assoc()){
                    $attempts = $row['attempts'];
                }
                $attempts++;
                if($attempts < 3){
                    $queryUpdate = "UPDATE USER SET attempts = '$attempts' WHERE user_name = '$username'";
                }else{
                    $queryUpdate = "UPDATE USER SET status = 'bloqueado', attempts = '$attempts' WHERE user_name = '$username'";
                }
                mysqli_query($conn,$queryUpdate);
            }
            echo json_encode(array('success' => 0,'attempts' => $attempts, 'admin' => 0));
        }
        
    }


?>