<?php
$movie = $_GET['movie'];
require_once "config.php";
require_once "currentUserDetails.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
     header("location: login.php");
}



?>

<!-- ____________________________________________________________________________________________________ -->

<!doctype html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <style>
     .main_container {
          /* display: flex;
          justify-content: center; */
          /* Centers horizontally */
          /* align-items: center; */
          /* Centers vertically */
     }

     .main_heading {
          margin-top: 20px;
          margin-bottom: 10px;
          border: 1px solid black;
     }

     .theaters {
          /* margin: 1rem; */
          padding: 0.5rem 2rem;
          border: 1px solid red;
     }

     .t-card {
          margin: 10px;
     }

     .submit-btn {
          text-decoration: none;
          color: white;
          background-color: darkblue;
          font-weight: bold;
          /* text-align: center; */
          border-radius: 10px;
          padding: 10px 30px;
     }
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- __________________________________________________________________________________________ -->

     <nav class="navbar navbar-expand-lg fw-bold">
          <a class="navbar-brand mx-xxl-3" href="index.php">BookIT</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
               aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                    <li class="nav-item active">
                         <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="orders.php">My Bookings</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="logout.php">Logout</a>
                    </li>
               </ul>
               <div class="navbar-collapse collapse d-flex justify-content-end">
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item active">
                              <a class="nav-link" href="#"> <img
                                        src="https://img.icons8.com/metro/26/000000/guest-male.png">
                                   <?php echo $full_name?></a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <!-- __________________________________________________________________________________________ -->

     <div class="main_container">
          <div class="main_heading d-flex justify-content-center">
               <h4>You are booking for, <?php echo $movie?></h4>
          </div>

          <div class="theaters row">
               <div class="card t-card" style="width: 18rem;">
                    <div class="card-body">
                         <h5 class="card-title mb-4">Theater Name</h5>
                         <form action="select_seats.php" method="post">
                              <div class="input-group mb-3">
                              <!-- give multiple dropdowns but user can only select one of them. -->
                                   <label class="input-group-text" for="inputGroupSelect01">Date 1</label>
                                   <select class="form-select" id="inputGroupSelect01" name="date">
                                        <option selected>Choose...</option>
                                        <option value="1">Time 1</option>
                                        <option value="2">Time 2</option>
                                        <option value="3">Time 3</option>
                                   </select>
                              </div>
                              <div class="input-group mb-3">
                                   <label class="input-group-text" for="inputGroupSelect02">Date 2</label>
                                   <select class="form-select" id="inputGroupSelect02" name="date">
                                        <option selected>Choose...</option>
                                        <option value="1">Time 1</option>
                                        <option value="2">Time 2</option>
                                        <option value="3">Time 3</option>
                                   </select>
                              </div>
                              <div>
                                   <input type="submit" value="submit">
                              </div>
                         </form>
                    </div>
               </div>
          </div>

     </div>

     <!-- __________________________________________________________________________________________ -->

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
</body>

</html>