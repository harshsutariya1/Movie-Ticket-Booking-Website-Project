<?php
require_once "config.php";
require_once "currentUserDetails.php";

$order_details = $_COOKIE["order_details"];
$order_details_array = explode("|",$order_details);
$movie_name = $order_details_array[0];
$theater_name = $order_details_array[1];
$t_address = $order_details_array[2];
$screen_num = $order_details_array[3];
$show_date = $order_details_array[4];
$show_time = $order_details_array[5];
$show_price = $order_details_array[6];

$seats_details = $_COOKIE["seats_details"];
$seats_details_array = explode("|", $seats_details);
$no_of_seats = $seats_details_array[0];
$amount = $seats_details_array[1];
$seats_numbers = $seats_details_array[2];

$query = "SELECT poster_img FROM `movies` WHERE movie_name='$movie_name';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$movie_poster = $row["poster_img"];
if(!$row){
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql_for_geting_seatnumbers = "SELECT * FROM `$theater_name` WHERE movie_name='$movie_name' AND show_date='$show_date' AND show_time='$show_time';";
$result_of_seatnumbers = mysqli_query($conn2, $sql_for_geting_seatnumbers);
if($row = mysqli_fetch_assoc($result_of_seatnumbers)){
     if($row["already_booked_seats"]!=$seats_numbers.','){
          $new_seat_numbers = $row["already_booked_seats"] . $seats_numbers . ",";
          $sql_for_theater = "UPDATE `$theater_name` SET `already_booked_seats`='$new_seat_numbers' WHERE  movie_name='$movie_name' AND show_date='$show_date' AND show_time='$show_time';";
          if(mysqli_query($conn2, $sql_for_theater)){
               // echo "Data inserted successfully in theaters.";
          }else{
               echo "Error: " . $sql . "<br>" . mysqli_error($conn2);
          }

          $sql = "INSERT INTO `user_bookings`(`username`, `full_name`, `mobile_num`, `m_name`, `show_date`, `show_time`, `theater_name`, `t_address`, `screen_num`, `seat_num`, `no_of_seats`, `price_per_ticket`, `amount_paid`) VALUES ('$username','$full_name', $mobile_num,'$movie_name','$show_date','$show_time','$theater_name','$t_address','$screen_num','$seats_numbers','$no_of_seats','$show_price','$amount')";
          
          if(mysqli_query($conn, $sql)){
               // echo "Data inserted successfully in users.";
           }else{
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
           }
     }

     
}



?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     <style>
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
     .ticket_details{

     }
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- __________________________________________________________________________________________________ -->
     <?php include "navBar.php";?>
     <!-- __________________________________________________________________________________________________ -->


     <div class="main_container">
          <h4 class="text-center" style="color: #ba0606;">Ticket Booked!</h4>
          <?php include "movie_ticket_format.php" ?>
     </div>

     <!-- __________________________________________________________________________________________________ -->
     <script>
     </script>
</body>

</html>