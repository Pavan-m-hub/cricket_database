// create.php
<?php

    //session_start();

    $con = mysqli_connect("localhost", "root", "", "cricket") or die(mysqli_error($con));

    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $rp = $_POST['conpsw'];

    if ($password == $rp) {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            $check_u = "insert into login values('$username','$password')";
            if (mysqli_query($con, $check_u)) {
                echo "<script type='text/javascript'>alert('ACCOUNT CREATED!!');</script>";
                header("refresh: 0.01; url=login.html");
            } else {
                echo "<script type='text/javascript'>alert('ACCOUNT NOT CREATED!!');</script>";
                header("refresh: 0.01; url=create.html");
            }
        } else {
            echo "<script type='text/javascript'>alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.');</script>";
            header("refresh: 0.01; url=create.html");
        }
    } else {
        echo "<script type='text/javascript'>alert('PASSWORDS DIDN\'T MATCH!!');</script>";
        header("refresh: 0.01; url=create.html");
    }
?>
