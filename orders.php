<?php

require_once "config.php";
require_once "currentUserDetails.php";

$sql = "SELECT COUNT(*) FROM user_bookings WHERE username='$username' and full_name = '$full_name'";
$sql_result = mysqli_query($conn, $sql);
$count = mysqli_fetch_row($sql_result)[0];

$query = "select * from user_bookings where username = '$username' and full_name = '$full_name'";
$result = mysqli_query($conn,$query);

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
     .no_bookings_container {
          display: flex;
          justify-content: center;
          /* Centers horizontally */
          align-items: center;
          /* Centers vertically */
          height: 80vh;
     }

     .main_container {
          height: 80vh;
          /* border: 1px solid black; */
          margin: 1rem;
     }

     .c-red {
          color: #ba0606;
     }

     .backcolor_black {
          background-color: #dedede;
     }

     .ticket {
          margin: 1rem 10rem;
          padding: 0.5rem 1rem;
          border-radius: 1rem;
     }
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- __________________________________________________________________________________________ -->

     <?php include "navBar.php";?>

     <!-- __________________________________________________________________________________________ -->

     <?php 
     if($count){
          while($row = mysqli_fetch_assoc($result)){
               $movie_name = $row['m_name'];
               $query2 = "SELECT poster_img FROM `movies` WHERE movie_name='$movie_name';";
               $result2 = mysqli_query($conn,$query2);
               $row2 = mysqli_fetch_assoc($result2);
               $movie_poster = $row2["poster_img"];
               $theater_name = $row['theater_name'];
               $t_address = $row['t_address'];
               $show_time = $row['show_time'];
               $show_date = $row['show_date'];
               $screen_num = $row['screen_num'];
               $no_of_seats = $row['no_of_seats'];
               $seats_numbers = $row['seat_num'];
               $show_price = $row['price_per_ticket'];
               $amount = $row['amount_paid'];
               ?>
               <?php include "movie_ticket_format.php" ?>

               <?php
          }
     }else{ 
          mysqli_close($conn);
     ?>

     <div class="no_bookings_container">
          <div class="opacity-25">
               <h4>You have no Bookings...</h4>
          </div>
     </div>

     <?php 
     }
     ?>



     <!-- __________________________________________________________________________________________ -->

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
</body>

</html>