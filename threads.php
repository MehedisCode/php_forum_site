<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Ask.com -coding forum</title>
</head>

<body>
    <?php 
include "partials/_dbconnect.php";
require "partials/_navbar.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_GET['threadid'];
        $comment = $_POST['comment'];
        $sno = $_POST['sno'];

        include "partials/_dbconnect.php";
        $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES (NULL, '$comment', '$id', current_timestamp(), '$sno');";
        $result = mysqli_query($conn, $sql);
    }
  ?>
    <?php 
    include "partials/_dbconnect.php";
    $cat = $_GET['threadid'];
    $sql = 'SELECT * FROM `threads` WHERE thread_id='. $cat;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['thread_title'];
        $description = $row['thread_description'];
        $thread_user_id = $row['thread_user_id'];
        
        $sql2 = "SELECT * FROM `users` WHERE user_id='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        echo '<div class="container mt-3">
        <div class="jumbotron">
            <h1 class="display-3">' . $name .'</h1>
            <p class="lead"> '. $description .'</p>
            <hr class="my-2">
            
            <p class="">
                Posted by:<b> '.$row2['user_name'].'</b>
            </p>
        </div>
    </div>';
}
  ?>
<?php 
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container">
        <h2 class="my-4">Post a comment</h2>
        <form action="'. $_SERVER['REQUEST_URI'] .'" method="post">
            <div class="form-group">
                <label for="">Type your comment</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <button type="submit" class="btn btn-success">Post comment</button>
        </form>
    </div>';
}else{
    echo '<div class="container">
        <p>You are not logged in. Please log in to comment</p>
    </div>';
}
?>
    <div class="container" style="min-height:300px">
    <hr>
        <h2 class="my-4">Discusstion</h2>
        
    <!-- fetch from comments  -->
          <?php 
                include "partials/_dbconnect.php";

                $cat = $_GET['threadid'];
                $sql = 'SELECT * FROM `comments` WHERE thread_id='. $cat;
                $result = mysqli_query($conn, $sql);
                $noresult = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noresult = false;
                $name = $row['comment_id'];
                $description = $row['comment_content'];
                $description = str_replace(">", "&gt", $description);
                $description = str_replace("<", "&lt", $description);
                $no = $row['thread_id'];
                $comment_time = $row['comment_time'];
                $comment_by = $row['comment_by'];
                      // user table 
                $sql2 = "SELECT * FROM `users` WHERE user_id='$comment_by'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="media my-3">
                <a class="d-flex mr-3" href="#">
                    <img src="idiscuss img/user.png" width="50px" alt="">
                </a>
                <div class="media-body">
                <p class="font-weight-bold mb-0">'. $row2['user_name'] .' </p>
                    ' . $description . '
                </div>
                <p>at '. $comment_time .'</p>
                </div><hr>';
                };

                if($noresult){
                   echo  '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-3">No Result Found</h1>
                            <p class="lead">Be the first persion to comment</p>
                        </div>
                    </div>';
                }
            ?>
    </div>

    <!-- Optional php; choose one of the two! -->
    <?php include "partials/_footer.php"; ?>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>