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
        
    </style>
</head>

<body>
    <?php 
  require "partials/_navbar.php";?>

    <div class="d-flex justify-content-center">
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="idiscuss img/photo-1542903660-eedba2cda473.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="idiscuss img/photo-1483817101829-339b08e8d83f.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="idiscuss img/photo-1589149098258-3e9102cd63d3.jpeg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container">
    <h2 class="my-3 text-center">iDiscuss - Browse Categories</h2>
    <div class="row">
  <?php 
    include "partials/_dbconnect.php";

    $sql = 'SELECT * FROM `categories`';
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
      echo '
      <div class="col-md-4 my-2">
          <div class="card">
              <img class="card-img-top" src="idiscuss img/photo-1514428631868-a400b561ff44.jpeg" alt="">
              <div class="card-body">
                  <h4 class="card-title"><a href="threadlist.php?catno=' . $row['category_no'] . '">' . $row['category_name'] . '</a></h4>
                    <p>' . substr($row['category_description'],0,140) . ' ....</p> 
                  <a name="" id="" class="btn btn-primary" href="threadlist.php?catno=' . $row['category_no'] . '" role="button">View Threads</a>
              </div>
          </div>
      </div>
  ';

    }
  ?>
  </div>
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