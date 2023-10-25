<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $fullname = $_POST["fullname"];
    $mobilenum = $_POST["phonenum"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`(`username`, `full_name`, `mobile_num`, `password`) VALUES ('$username','$fullname',$mobilenum,'$password')";

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;
        
        header("Location: index.php");
        echo "Data inserted successfully.";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>

<!-- _______________________________________________________________________________________________________ -->


<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <title>BookIT</title>
</head>

<body>
     <!-- _______________________________________________________________________________________________________ -->

     <nav class="navbar navbar-expand-lg fw-bold">
          <a class="navbar-brand mx-xxl-3" href="index.php">BookIT</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
               aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link" href="login.php">Login</a>
                    </li>
               </ul>
          </div>
     </nav>
     <!-- _______________________________________________________________________________________________________ -->

     <div class="container mb-4">
          <h3>Please Register Here:</h3>
          <hr>
          <form action="" method="post">
               <div class="form-row">
                    <div class="form-group col-md-6 mb-2">
                         <label for="inputfullname" class="fw-medium">Full Name:</label>
                         <input type="text" class="form-control" name="fullname" id="inputfullname"
                              placeholder="Full name" required>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                         <label for="phonenum" class="fw-medium">Mobile Number:</label>
                         <input type="text" class="form-control" name="phonenum" id="phonenum"
                              placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                         <label for="inputEmail4" class="fw-medium">Username:</label>
                         <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username" minlength="3" maxlength="15"
                              required>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                         <label for="inputPassword4" class="fw-medium">Password:</label>
                         <input type="password" class="form-control" name="password" id="inputPassword4"
                              placeholder="Password" minlength="3" maxlength="10" required>
                    </div>
               </div>
               <div class="form-group col-md-6">
                    <label for="inputPassword4" class="fw-medium">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password" id="inputPassword"
                         placeholder="Confirm Password" required>
               </div>
               <br>
               <button type="submit" class="btn btn-primary fw-bold">Sign in</button>
          </form>
     </div>

     <!-- _______________________________________________________________________________________________________ -->

     <!-- Optional JavaScript -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
</body>

</html>