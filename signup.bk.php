<?php
if (isset($_POST['submit-signup'])) {
    require 'config.php';
    $emailID = $_POST['emailID'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    if (empty($emailID) || empty($password) || empty($confirmPassword)) {
        header("Location: signup.php?error=emptyfields");
        exit();
    }
    else if ($password !== $confirmPassword) {
        header("Location: signup.php?error=invalidconfirmpassword");
        exit();
    } else {
        $sql = "SELECT emailID FROM users WHERE emailID=?";
        $stmt = mysqli_stmt_init($conn); 
        if (!mysqli_stmt_prepare($stmt, $sql)) { 
            header("Location: signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $emailID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt); 
            if ($resultCheck > 0) {
                header("Location: signup.php?error=emailIDtaken");
                exit();
            } else{
                $sql = "INSERT INTO users (emailID, password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss", $emailID, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    session_start();
                    $_SESSION['userType'] = 'student';
                    $_SESSION['userEmailID'] = $emailID;
                    header("Location: signin.php?registration=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
else {
    header("Location: signup.php");
    exit();
}