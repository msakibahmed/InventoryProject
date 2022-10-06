<?php
session_start();
$_SESSION['user']   = '';
$_SESSION['userid'] = '';
include 'auth/connection.php';

$conn = connect();
$m = null;


if (isset($_POST['submit'])) {

    $uname      = $_POST['uname'];
    $password   = $_POST['password'];

    $sql = "SELECT * FROM users_info WHERE uname= '$uname' AND u_password= '$password'";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) === 1){

        $user =  mysqli_fetch_assoc($result);
        $_SESSION['user']   = $user['uname'];
        $_SESSION['userid'] = $user['id'];

        //Redirect
        header('Location: dashboard.php');
    }else{
        $m = "Credentials not match";
    }
        
}

?>
<html>
    <head>
        <title>Login</title>

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"  />

        <!-- Custom Style -->
        <!-- <link type="text/css" rel="stylesheet" href="css/style.css"> -->
        <link type="text/css" rel="stylesheet" href="css/login.css">
    </head>

    <body>

  

    <section class="login-page">
        <div class="container">

            <span style="color:red;"><?php if($m!= '') echo $m; ?></span>

            <form action="login.php" method="POST" enctypr="multipart/form-data" >

        
                <h1>Login Form</h1>

                <div class="form-group">
                    <label for="uname">User name</label>
                    <input name="uname" type="text" class="form-control" id="uname" placeholder="Enter your user name" required >
                </div>

                <div class="form-group password-field">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control"  placeholder="Enter your password" required >
                    <!-- <span class="eye" onclick="myFunction()">
                        <i id="hide-1" class="fa-sharp fa-solid fa-eye"></i>
                        <i id="hide-2" class="fa-sharp fa-solid fa-eye-slash"></i>
                    </span> -->
                </div>
                
                <div class="form-group">
                    <input name="submit" type="submit" value="submit">
                </div>

                <div class="already-account">
                    <p class="new-account" >Not a user <a href="register.php">Sign up now!</a></p>
                </div>

                <p class="f-pass">
                    <a href="#">forgot password</a>
                </p>

            </form>
        </div>
    </section>
        


    </body>

    <script>
        /* function myFunction(){
            var x = document.getElementById("my-password");
            var y = document.getElementById("hide-1");
            var z = document.getElementById("hide-2");

            if(x.type === "password"){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        } */
    </script>

</html>