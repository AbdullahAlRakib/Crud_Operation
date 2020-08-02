<?php
require_once './main.php';
use App\classes\main;
$student=new main();
$queryResult=$student->getAllStudentInfoById($_GET['id']);
$data=mysqli_fetch_assoc($queryResult);
if(isset($_POST['btn'])){
    $student->updateStudentInfo($data['id']);
}


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link href="images/fav.jpg" rel="icon">
    <title>Hello</title>
</head>

<body>

<div class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mt-5">
                <div class="reg-banner">
                    <img src="images/1.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-danger  " style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title"> Update From Here</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="name"  name="name" value="<?php echo $data['name']; ?>" class="form-control " id="validationTooltip02" required >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  name="email" value="<?php echo $data['email']; ?>" class="form-control"id="validationTooltip02" required >
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="phone"  name="phone" value="<?php echo $data['phone']; ?>" class="form-control"id="validationTooltip02" required >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"  name="password"  value="<?php echo $data['password']; ?>" class="form-control"id="validationTooltip02" required >
                            </div>

                            <button type="submit"  name="btn"class="btn btn-warning " > Update </button>
                            <a href="View-student.php"><button type="button" class="btn btn-light" >View</button></a>


                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
