<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
    if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) {
        header('Location: home.php');
    } else {
    ?>
    <nav>
        <a href="landing.php" class="brand-logo">                                                     
            <img class="logo-resize" src="" alt="">
            <div class="brand-logo-name">LEAF NOW</div>
        </a>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <ul class="nav-links">
            <li><a class="link" href="signup.php">Sign Up</a></li>
            <li><a class="link" href="signin.php">Sign In</a></li>
            <li><a class="link" href="contact_us.php">Contact Us</a></li>
        </ul>
    </nav>
        <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                <h1 class="text-center text-9xl font-black">Sign Up</h1>
                <form class="submit-signup mt-6" action="signup.bk.php" method="POST">
                    <label for="emailID" class="block mt-2 text-xs font-semibold text-gray-600 uppercase" required>E-mail</label>
                    <input id="emailID" type="email" name="emailID" placeholder="mail@some-domain.com" autocomplete="email" class="text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                    <input id="password" type="password" name="password" placeholder="********" autocomplete="new-password" class="block text-center w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    <label for="confirmpassword" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Confirm password</label>
                    <input id="confirmpassword" type="password" name="confirmpassword" placeholder="********" autocomplete="new-password" class="block text-center w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    <button type="submit" name="submit-signup" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Sign Up
                    </button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
</body>
<style>
    html { 
    background: url(s1.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
</style>
</html>