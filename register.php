<?php
include 'auth/connection.php';

$conn = connect();
$m = null;


//$sql = "INSERT INTO users_info `u_name` VALUES `SAKIB`";

//$sql = "INSERT INTO users_info(fname,uname,u_email,u_password) VALUES('Sakib','sakib1','sakib@yahoo.com','123')";

//$insert_query = mysqli_query($conn, $sql);

//$result = $conn->query($sql);
// if(!$result) {
//     die("ERROR: Could not connect. " . mysqli_connect_error());
//     throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
// }



//$sql = "INSERT INTO user_info (name, u_name, email, password) VALUES ('value1', 'value2', 'value3', 'test')";

/* if($conn->query($sql)===true){

} */

//die();

if (isset($_POST['submit'])) {

    $name       = $_POST['name'];
    $uname      = $_POST['uname'];
    $email      = $_POST['email'] ? $_POST['email']:'';
    $password   = $_POST['password'];
    $rpt_password = $_POST['rpt_password'];

    var_dump($name );
    var_dump($uname );
    var_dump($email );
    var_dump($password );
    var_dump($rpt_password );

 



    if ($password === $rpt_password) {

        //$user_qry = "INSERT INTO users_info(fname, u_name) VALUES('$name', '$uname')";
        $user_qry = "INSERT INTO users_info(fname,uname,u_email,u_password) VALUES('$name', '$uname','$email','$password')";


        //$sql = "INSERT INTO user_info (name, u_name, email, password) VALUES ('value1', 'value2', 'value3', 'test')";

        //$insert_query = mysqli_query($conn, $user_qry);

        /* $result = $conn->query($user_qry);
        if(!$result) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
            throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
        } */

        if($conn->query($user_qry)===true){
            header('Location: login.php');
        }else{
            $m = "Connection not established!";
        }
        
    }else{
        $m = "Password not matched";
    }
}

?>
<html>
    <head>
        <title>Registration Form</title>

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Custom Style -->
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>

    <body>

  

    <section class="register-page">
        <div class="container">

            <?php
                if ($m != '') {
                    echo $m;
                }
            ?>

            <form action="register.php" method="POST" enctypr="multipart/form-data" >

        
                <h1>Registration Form</h1>

                <div class="form-group">
                    <label for="name">Your name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name" required >
                </div>

                <div class="form-group">
                    <label for="uname">User name</label>
                    <input name="uname" type="text" class="form-control" id="uname" placeholder="Enter your user name" required >
                </div>


                <div class="form-group">
                    <label for="email">Your email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" required >
                </div>
                

                <div class="form-group">
                    <label for="rpt_password">Password</label>
                    <input name="rpt_password" type="password" class="form-control" id="rpt_password" placeholder="Confirm your password" required >
                </div>


                <div>
                    <p>By creating an account you agree to our Terms & Privacy</p>
                </div>


                <div class="form-group">
                    <input name="submit" type="submit" value="submit">
                </div>

                <div class="already-account">
                    <p>Already have an account <a href="login.php">Login</a></p>
                </div>

            </form>
        </div>
    </section>
        


    </body>

</html>