<?php 
    // you may need to change 
    include "_dbconnect.php";
    $username = $_POST['lusername'];
    $password = $_POST['lpassword'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "SELECT * FROM `users` WHERE user_name = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        
        if($num == 1){
            $row = mysqli_fetch_assoc($result); 
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['sno'] = $row['user_id'];
                $_SESSION['username'] = $username;
                echo "Your are logged in $username";
                header("location: /index.php");
                exit();
            }else{
                    // password not matching
            }
        // }
        
        }else{
            echo "username not find";
            header("location: /index.php");
        }

    }

?>