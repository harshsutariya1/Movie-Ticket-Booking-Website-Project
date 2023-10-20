<?php

require_once "config.php";
require_once "currentUserDetails.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
     header("location: login.php");
}

$movie = $_GET['movie'];
$query = "select * from all_theaters";
$result = mysqli_query($conn2, $query);

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
          margin-top: 10px;
          margin-bottom: 10px;
          /* color: red; */
          /* border: 1px solid black; */
     }

     .theaters {
          margin-right: 1rem;
          margin-bottom: 1rem;
          padding: 0.5rem 2rem;
          /* border: 1px solid red; */
     }

     .t-card {
          margin: 10px;
     }
     </style>

     <title>BookIT</title>
</head>

<body>

     <!-- __________________________________________________________________________________________ -->

     <nav class="navbar navbar-expand-lg fw-bold">
          <a class="navbar-brand mx-xxl-3 text-danger" href="index.php">BookIT</a>
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
                              <a class="nav-link text-danger" href="#"> <img
                                        src="https://img.icons8.com/metro/26/000000/guest-male.png">
                                   <?php echo $full_name?>
                              </a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <!-- __________________________________________________________________________________________ -->


     <div class="main_container">
          <div class="main_heading d-flex justify-content-center">
               <h4 id="movie_name"></h4>
          </div>
          <script>
          var movieName = localStorage.getItem("movie_name");
          document.getElementById("movie_name").innerHTML = movieName;
          </script>

          <div class="theaters row">

               <?php
               while($row = mysqli_fetch_assoc($result)){
                    if(strstr($row["movies_showing"], $movie)){ 
                         // If True?                    
               ?>

               <div class="card t-card">
                    <div class="card-body">
                         <h5 class="card-title mb-4 text-danger"><?php echo $row["theater_name"]?></h5>
                         <hr>

                         <form class="row" action="select_seats.php" method="post">
                              <!-- <?php
                              // $theater_name = $row["theater_name"];
                              // $query2 = "select * from". $theater_name ;
                              // $result2 = mysqli_query($conn2, $query2);
                              // while($row2 = mysqli_fetch_assoc($result2)){
                              //      echo $row2["movie_name"];
                              ?> -->


                              <div class="input-group mb-3 col">
                                   <label class="input-group-text" for="inputGroupSelect">Date1</label>
                                   <select class="form-select" id="inputGroupSelect" name="date1">

                                        <option selected>Choose...</option>
                                        <option value="date1:time1">Time 1</option>
                                        <option value="date1:time2">Time 2</option>
                                        <option value="date1:time3">Time 3</option>

                                   </select>
                              </div>

                              <?php
                              // }
                              ?>

                         </form>

                    </div>
               </div>
               <?php
                    }
               }
               ?>
          </div>

     </div>

     <!-- __________________________________________________________________________________________ -->

     <!-- Bootstrap JS -->
     <script>
     function resetDropdown() {
          document.getElementById("inputGroupSelect").value = "Choose...";
     }

     document.getElementById("inputGroupSelect").addEventListener("change", function() {
          var selectedValue = this.value;
          if (selectedValue !== "Choose...") {
               localStorage.setItem("Date:Time", `${selectedValue}`);
               window.location.href = "select_seats.php";
          }
     });

     window.onbeforeunload = resetDropdown;
     </script>

</body>

</html>