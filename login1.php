<?php
    // Database connection
    session_start(); 
    
    
    $Name = $_POST['name'];
    $Password = $_POST['password'];
    $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
    $result = mysqli_query($con,"SELECT * FROM `tbluser` WHERE Username='$Name' AND Password='$Password'");
    if (mysqli_num_rows($result)) {
        $_SESSION['user']=$Name;
        echo "<script>
                alert('Successfully Logged In');
                window.location.href='../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Login Failed: Invalid Username or Password');
                window.location.href='login.php';
              </script>";
    }

?>
