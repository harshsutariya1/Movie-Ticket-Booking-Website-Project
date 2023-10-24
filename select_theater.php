<?php

require_once "config.php";
require_once "currentUserDetails.php";

$movie = $_GET['movie'];
 
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

     .marginright {
          margin-right: 1rem;
     }

     .theaters {
          margin-right: 1rem;
          margin-bottom: 1rem;
          padding: 0.5rem 2rem;
          /* border: 1px solid red; */
     }

     .t-card {
          margin: 10px;
          background-color: #dedede;
     }
     </style>

     <title>BookIT</title>
</head>

<body>

     <!-- __________________________________________________________________________________________ -->
     <?php include "navBar.php";?>
     <!-- __________________________________________________________________________________________ -->


     <div class="main_container">
          <div class="d-flex justify-content-center">
               <h4 style="margin-right: 1rem;">Movie Name: </h4>
               <h4 id="movie_name" style="color: #ba0606;"></h4>
          </div>
          <script>
          var movieName = localStorage.getItem("movie_name");
          document.getElementById("movie_name").innerHTML = movieName;
          </script>

          <div class="theaters row">

               <?php
               $sql = "select * from all_theaters";
               // 
               $result = mysqli_query($conn2, $sql);
               while($row = mysqli_fetch_assoc($result)){
                    if(strstr($row["movies_showing"], $movie)){ 
                         // If True?                  
                         $theater_name = $row["theater_name"];

                         $theater_address = $row["address"];
               ?>

               <div class="card t-card">
                    <div class="card-body">
                         <h5 class="card-title mb-4" style="color: #ba0606;">
                              <?php echo $theater_name ?>
                         </h5>
                         <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $theater_address ?></h6>
                         <hr>

                         <form class="row" id="formid" action="select_seats.php" method="post" autocomplete="off">
                              <!-- ___________________________________________________________________________________ -->
                              <?php
                              $theater_name = mysqli_real_escape_string($conn2, $row["theater_name"]);
                              $lower_theater_name = strtolower($theater_name);
                              // $sql2 = "SELECT * FROM $theater_name"; //It occurs an error.
                              // $sql_for_movie_date_time = "SELECT * FROM `$theater_name` WHERE movie_name='$movie'";
                              // $movie_all_date_times = mysqli_query($conn2, $sql_for_movie_date_time);

                              $sql_for_movie_dates = "SELECT DISTINCT show_date FROM `$lower_theater_name` WHERE movie_name='$movie';";
                              $movie_dates = mysqli_query($conn2, $sql_for_movie_dates);

                              while($rows = mysqli_fetch_assoc($movie_dates)){
                                   $date = $rows["show_date"];
                                  
                                   $sql_for_time = "SELECT show_time, price_per_seat, screen_num FROM `$lower_theater_name` WHERE show_date = '$date' AND movie_name = '$movie';";
                                   $movie_times = mysqli_query($conn2, $sql_for_time);
                              ?>

                              <div class="input-group mb-3 col">
                                   <label class="input-group-text fw-medium"
                                        for="<?php echo $lower_theater_name . " " . $date ?>"><?php echo $date ?></label>
                                   <select class="form-select" id="<?php echo $lower_theater_name . " " . $date ?>"
                                        name="order_details">

                                        <option>Choose Time...</option>

                                        <?php 
                                        while($time = mysqli_fetch_assoc($movie_times)){
                                        ?>
                                        <option
                                             value="<?php echo $movie ."|". $theater_name ."|". $theater_address . "|" .$time["screen_num"]."|". $date ?>|<?php echo $time["show_time"]."|".$time["price_per_seat"] ?>">
                                             <?php echo $time["show_time"] ?></option>
                                        <?php
                                        }
                                        ?>

                                   </select>
                              </div>

                              <script>
                              document.getElementById("<?php echo $lower_theater_name . " " . $date ?>")
                                   .addEventListener(
                                        "change",
                                        function() {
                                             var selectedValue = this.value;
                                             if (selectedValue !== "Choose Time...") {
                                                  localStorage.setItem("order_details", `${selectedValue}`);
                                                  document.cookie = "order_details=" + selectedValue;
                                                  window.location.href = "select_seats.php";
                                             }
                                        });
                              </script>

                              <?php
                              
                              }
                              ?>
                              <!-- ___________________________________________________________________________________ -->
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
     </script>

</body>

</html>