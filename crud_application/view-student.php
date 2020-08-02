<?php
session_start();
if($_SESSION['id']==null){
    header('Location:index.php');
}
require_once './main.php';
use App\classes\main;
$student=new main();
$queryResult=$student->getAllStudentInfo();
if(isset($_GET['status'])){
    $student->deleteStudentInfo($_GET['id']);
}
if(isset($_POST['btn'])){
    $queryResult=$student->searchStudentInfoBySearchText();
}
if(isset($_GET['logout'])){
    $login=new main();
    $login->logout();
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="search.css">
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#">W3CODE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="register.php">Add User</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href=""><?php echo $_SESSION['name'] ; ?></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="?logout=true">Log Out</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <div class="search-form">
                <form action="" method="post">
                    <table>

                            <div class="form-group">
                            <input type="text" class="form-control mt-5 " name="search_text" name="btn" placeholder="Search Here. . . . "/>
                            </div>
                        <input type="submit" name="btn" value="Search " class="mb-5 btn btn-success">



                    </table>
                </form>
            </div>

        </div>
    </div>

    <div class="table-section">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php while ($user=mysqli_fetch_assoc($queryResult)){?>
        <tbody>
<tr>
    <td><?php echo $user['id'];?></td>
    <td><?php echo $user['name'];?></td>
    <td><?php echo $user['email'];?></td>
    <td><?php echo $user['phone'];?></td>
    <td><?php echo $user['password'];?></td>
    <td>
        <a href="update-student.php?id=<?php echo $user['id'];?>"><button type="button" class="btn btn-info">Update</button>
        </a>
        <a href="?status=delete&id=<?php echo $user['id'];?>"><button type="button" class="btn btn-danger">Delete</button>
        </a>

    </td>

</tr>
        </tbody>
    <?php } ?>
    </table>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
