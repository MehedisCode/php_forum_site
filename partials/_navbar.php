<?php 
session_start();
include "_dbconnect.php";
include "modal.php";
echo '
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Ask.com</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/php/forum/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">';
                $sql ='SELECT * FROM `categories`';
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<a class="dropdown-item" href="http://localhost/php/forum/threadlist.php?catno='.$row['category_no'].'">'.$row['category_name'].'</a>';
                }

                    echo '</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <h4 class="mb-0 mx-3"><span class="badge badge-danger">'. $_SESSION['username'] .'</span></h4>
                <a name="" id="" class="btn btn-success mr-3" href="/php/forum/logout.php" role="button">Log out</a>
                </form>';
            }else{
                echo '<form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="form-inline">
                    <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#modelId">Log in</button>
                    <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#modelId1">Sign up</button>
                </div>';
            }
    echo' </div>
    </nav>
';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true'){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Successful!</strong> Your account created successful.
        </div>';
    }
    if(isset($_GET['error'])){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Error!</strong> '. $_GET['error'] .'
        </div>';
    }
    if(isset($_GET['usrErr'])){
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Error!</strong> '. $_GET['usrErr'] .'
        </div>';
    }


?>