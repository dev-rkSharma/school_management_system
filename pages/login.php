 <?php
    session_start();
    require "../backend/config.php";

    // if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    //     $path = "../pages/index.php";
    //     header("location:" . $path);
    // }


    // session_start();

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {

        header("location:../pages/index.php");
    }

    if (isset($_POST['submit_btn'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "select * from user_master where (email = '$uname') and password = '$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) > 0) {

            if ($result) {

                $row = mysqli_fetch_assoc($result);

                $_SESSION['loggedIn'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row["username"];


                header("location: ../pages/index.php");
            } else {
                echo "<script>alert('log in failed')</script>";
                $_POST["password"] = '';
                $_POST["username"] = '';
            }
        } else {
            echo "<script>alert('log in failed')</script>";
            $_POST["password"] = '';
            $_POST["username"] = '';
        }
        mysqli_close($conn);
    } else {
        $_POST["password"] = '';
        $_POST["username"] = '';
    }


    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../sass/login/login.css">
     <title>login pannel</title>
 </head>

 <body>
     <div class="login-box">
         <div class="head">
             <h1>Login</h1>
         </div>
         <div class="form-container">
             <form name="loginform" id="login" class="form" method="post" action="">
                 <section class="row">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="username" placeholder="Enter Username or email ">
                 </section>

                 <section class="passbox">
                     <div class="row">
                         <label for="password">Password</label>
                         <input type="password" name="password" placeholder="* * * * * * ">
                     </div>
                     <a href="#">Forgot Password?</a>
                 </section>
                 <section class="row">
                     <button type="submit" name="submit_btn" id="submit_btn">Submit</button>
                 </section>
             </form>
         </div>
         <div class="extra-form-container">
             <a href="#">Create an account</a>
         </div>
     </div>
 </body>


 </html>