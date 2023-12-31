<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: index.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is correct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: index.php");
                            
                        }
                    }

                }

    }
}    


}


?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


     <title>BookIT</title>
</head>

<body>
     <!-- _______________________________________________________________________________________________________________ -->

     <nav class="navbar navbar-expand-lg fw-bold">
          <a class="navbar-brand mx-xxl-3" href="index.php">BookIT</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
               aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="register.php">Register</a>
                    </li>
               </ul>
          </div>
     </nav>
     <!-- _______________________________________________________________________________________________________________ -->

     <div class="container mt-4">
          <h3>Please Login Here:</h3>
          <hr>

          <form action="" method="post">
               <div class="form-group col-md-6">
                    <label for="exampleInputEmail1" class="fw-medium">Username:</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                         aria-describedby="emailHelp" placeholder="Enter Username" minlength="3" maxlength="15">
               </div>
               <div class="mt-3 form-group col-md-6">
                    <label for="exampleInputPassword1" class="fw-medium">Password:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                         placeholder="Enter Password" minlength="3" maxlength="10">
               </div>
               <br>
               <button type="submit" class="btn btn-primary">Submit</button>
          </form>
     </div>

     <!-- Optional JavaScript -->


</body>

</html>