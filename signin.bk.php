<?php
if (isset($_POST['submit-signin'])) {
    require 'config.php';
    $emailID = $_POST['emailID'];
    $password = $_POST['password'];
    if (empty($emailID) || empty($password)) {
        header("Location: signin.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE emailID=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: signin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $emailID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['password']);
                if ($passwordCheck == false) {
                    header("Location: signin.php?error=incorrectpassword&emailID");
                    exit();
                } else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userType'] = 'student';
                    $_SESSION['userEmailID'] = $emailID;
                    $_SESSION['userID'] = $row['user_id'];
                    $_SESSION['signedIn'] = true;
                    header("Location: home.php?signin=success");
                    exit();
                } else {
                    header("Location: ../auth/signInStudent.php?error=sqlerror");
                    exit();
                }
            } else {
                header("Location: ../auth/signInStudent.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: home.php");
    exit();
}
