<?php

//  edit action handle 
include('database.php');
if (isset($_POST["edit"])) {

    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
  
    $sqlUpdate = "UPDATE users SET full_name='$name' , email='$email' WHERE id=$id " ;

    if(mysqli_query($conn, $sqlUpdate)){
        session_start();
        $_SESSION["update"] = "user Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>