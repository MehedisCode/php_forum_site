<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Ask.com - coding forum</title>
    <style>
        .search{min-height: 86vh;}
    </style>
</head>

<body>
    <?php 
    include "partials/_dbconnect.php";
    require "partials/_navbar.php";?>

    <div class="container search" style="">
            <h2 class="my-4">Search result for " <?php echo $_GET['search'] ?> "</h2>
        
        <?php
            $search = $_GET['search'];
            $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_description) against ('$search')";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            echo "<hr class='mt-2 mb-4'>";
            if($num_rows < 1){
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-3">No Result Found</h1>
                    <hr class="my-2">
                    <p class="lead">suggestion: 
                    <ul>
                        <li>Make sure all words are spelled correctly</li>
                        <li>Try defferent keywords</li>
                        <li>Try general keywords</li>
                    </ul>
                    </p>
                </div>
                 </div>';
            }else{
            while($row = mysqli_fetch_assoc($result)){
                $thread_id = $row['thread_id'];
                $url = 'threads.php?threadid='.$thread_id;
                echo '<div class="result">
                <h3><a class="text-dark" href="'.$url.'">'.$row['thread_title'].'</a></h3>
                <p>'.$row['thread_description'].'</p>
                </div><hr>';
            }
        }
           
            ?>
     
        <!-- <div class="result">
            <h3><a class="text-dark" href="">cannot install pyaudio</a></h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae voluptates fugiat reprehenderit minima laudantium labore optio autem incidunt aperiam commodi illum vero quis explicabo inventore exercitationem nesciunt soluta doloremque modi, cumque rem ea? Neque repellendus quidem fugit similique facilis voluptatibus, repellat illum deleniti a, reiciendis nemo quo distinctio unde eligendi?</p>
        </div>
        <div class="result">
            <h3><a class="text-dark" href="">cannot install pyaudio</a></h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae voluptates fugiat reprehenderit minima laudantium labore optio autem incidunt aperiam commodi illum vero quis explicabo inventore exercitationem nesciunt soluta doloremque modi, cumque rem ea? Neque repellendus quidem fugit similique facilis voluptatibus, repellat illum deleniti a, reiciendis nemo quo distinctio unde eligendi?</p>
        </div>
        <div class="result">
            <h3><a class="text-dark" href="">cannot install pyaudio</a></h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae voluptates fugiat reprehenderit minima laudantium labore optio autem incidunt aperiam commodi illum vero quis explicabo inventore exercitationem nesciunt soluta doloremque modi, cumque rem ea? Neque repellendus quidem fugit similique facilis voluptatibus, repellat illum deleniti a, reiciendis nemo quo distinctio unde eligendi?</p>
        </div> -->

    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <?php include "partials/_footer.php"; ?>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>