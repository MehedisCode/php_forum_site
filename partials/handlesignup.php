<?php 
    include "_dbconnect.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['susername'];
        $pass = $_POST['spassword'];
        $cpass = $_POST['scpassword'];
        $sql = "SELECT * FROM `users` WHERE user_name = '$username'";
        $result = mysqli_query($conn, $sql);
        $num_row = mysqli_num_rows($result);
        
        if($num_row > 0){
            $usrErr =  "username already exist";
            header("location: /php/forum/index.php?signupsuccess=false&error=$usrErr");

        }else{
            // password matching
            if($pass == $cpass){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO `users` (`user_id`, `user_name`, `password`, `time`) VALUES (NULL, '$username', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            // you may need to change it 
            header("location: /php/forum/index.php?signupsuccess=true");

        }else{
            $err = "password dose not matching";
            header("location: /php/forum/index.php?signupsuccess=false&error=$err");
        }    
    }
}

?>