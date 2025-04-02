<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Get user input and sanitize
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Number = $_POST['number'];
    $Password = $_POST['password']; // Encrypt password

    // Check for duplicate Email or Username
    $Dup_Check = mysqli_query($con, "SELECT * FROM `tbluser` WHERE Email = '$Email' OR Username = '$Name'");
    
    if (mysqli_num_rows($Dup_Check) > 0) {
        echo "<script>
                alert('Email or Username Already Taken...');
                window.location.href='register.php';
              </script>";
    } else {
        $query = "INSERT INTO `tbluser`(`Username`, `Email`, `Contact`, `Password`) VALUES ('$Name','$Email','$Number','$Password')";
        
        if (mysqli_query($con, $query)) {
            echo "<script>
                    alert('Registration Successful!');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Close connection
mysqli_close($con);
?>
