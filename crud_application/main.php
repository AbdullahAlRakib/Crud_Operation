<?php


namespace App\classes;


class main
{
    public function saveStudentInfo(){
        extract($_POST);
        $link=mysqli_connect('localhost','root','','user');
        $sql="INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
        if(mysqli_query($link,$sql)){
            return"Successfully";
        }
        else{
            die("PROBLEM".mysqli_error($link));
        }
    }

    public function getAllStudentInfo(){
        $link=mysqli_connect('localhost','root','','user');
        $sql="SELECT * FROM users";
        if($queryResult=mysqli_query($link,$sql)){
            return $queryResult;

        }
        else{
            die("PROBLEM".mysqli_error($link));
        }

    }

    public function getAllStudentInfoById($id){
        $link=mysqli_connect('localhost','root','','user');
        $sql="SELECt * FROM users WHERE id='$id'";
        if($queryResult=mysqli_query($link,$sql)){
            return $queryResult;

        }
        else{
            die("PROBLEM".mysqli_error($link));
        }

    }

    public function updateStudentInfo($id){
        extract($_POST);
        $link=mysqli_connect('localhost','root','','user');
        $sql="UPDATE users SET name='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";
        if(mysqli_query($link,$sql)){
            header('Location:view-student.php');
        }
        else{
            die("PROBLEM".mysqli_error($link));
        }
    }

    public function deleteStudentInfo($id){
        $link=mysqli_connect('localhost','root','','user');
        $sql="DELETE  FROM users WHERE id='$id'";
        if(mysqli_query($link,$sql)){
            header('Location:view-student.php');
        }
        else{
            die("PROBLEM".mysqli_error($link));
        }
    }

    public function searchStudentInfoBySearchText(){
        extract($_POST);
        $link=mysqli_connect('localhost','root','','user');
        // $sql="SELECT * FROM students WHERE name ='$search_text'";
        $sql="SELECT * FROM users WHERE name LIKE'%$search_text%' || email LIKE'%$search_text%' || phone LIKE'%$search_text%' || password LIKE '%search_text%'";

        if($queryResult=mysqli_query($link,$sql)){
            return $queryResult;
        }
        else{
            die("Problem".mysqli_error($link));
        }
    }

    public function adminLoginCheck(){

        extract($_POST);
        $md5Password=md5($password);
        $link=mysqli_connect('localhost','root','','user');
        $sql="SELECT * FROM students WHERE email='$email' && password='$md5Password'";
        if($queryResult=mysqli_query($link,$sql)){
            $user=mysqli_fetch_assoc($queryResult);
            if($user){
                session_start();
                $_SESSION['id']=$user['id'];
                $_SESSION['name']=$user['name'];

                header('Location:view-student.php');
            }
            else{
                header('Location:index.php');
            }

        }
        else{
            die("Problem".mysqli_error($link));
        }
    }

    public function logOut(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);

        header('Location:index.php');
    }





}