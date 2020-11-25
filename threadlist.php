<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>iDiscuss -coding forum</title>
    <style>
        #uname {
            display: block;
            width: 100%;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
<?php 
        $showAlert = false;
         $id = $_GET['catno'];
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $showAlert = true;
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $sno = $_POST['sno'];
            include "partials/_dbconnect.php";
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `time`) VALUES ('$title', '$desc', '$id', '$sno', current_timestamp());";
            $conn = mysqli_query($conn, $sql);
         }
    ?> 
    <?php 
  require "partials/_navbar.php";
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Successful!</strong> Your comment submitted successfully.
        </div>';
    }
  ?>
    <?php 
    include "partials/_dbconnect.php";
    $cat = $_GET['catno'];
    $sql = 'SELECT * FROM `categories` WHERE category_no='. $cat;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['category_name'];
        $description = $row['category_description'];

        echo '<div class="container mt-3">
        <div class="jumbotron">
            <h1 class="display-3">Welcome to ' . $name .' Forum </h1>
            <p class="lead"> '. $description .'</p>
            <hr class="my-2">
            <p>No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    }
  ?>
  <?php 
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        echo '<div class="container">
        <h2 class= "my-4">Start a Discussions</h2>
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="form-group">
            <label for="">Problem Title</label>
            <input type="text" class="form-control" name="title" id="" aria-describedby="emailHelpId" placeholder="">
            </div>
            <div class="form-group">
            <label for="">Elaborate your concern</label>
            <textarea class="form-control" name="desc" id="" rows="3"></textarea>
             <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
                <button class="btn btn-success mt-3" type="submit">Submit</button>
            </form>
        </div>';
    }else{
        echo '<div class="container">
            <p>Your are not logged in. Please log in to start discussion</p>
        </div>'; 
    }
?>
    <hr>
    
    <div class="container" style="min-height:300px">
        <h2 class="my-4">Browse Question</h2>

            <!-- php start for threads  -->
            <?php 
                include "partials/_dbconnect.php";
                $cat = $_GET['catno'];
                $sql = 'SELECT * FROM `threads` WHERE thread_cat_id='. $cat;
                $result = mysqli_query($conn, $sql);
                $noresult = true;
                while($row = mysqli_fetch_assoc($result)){
                // thread database 
                $noresult = false;
                $name = $row['thread_title'];
                $description = $row['thread_description'];
                $no = $row['thread_id'];
                $sno = $row['thread_user_id'];
                // users database info 
                $sql2 = "SELECT * FROM `users` WHERE user_id='$sno'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '<div class="media my-3">
                <a class="d-flex mt-2 mr-3" href="#">
                    <img src="idiscuss img/user.png" width="65px" alt="">
                </a>
                <div class="media-body">
                    <b id="uname"> '. $row2['user_name'] .'</b>
                    <h5><a class="text-dark" href="threads.php?threadid='. $no .'">' . $name . '</a></h5>
                    ' . $description . '
                </div>
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