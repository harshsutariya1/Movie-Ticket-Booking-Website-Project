<?php

require_once "config.php";
require_once "currentUserDetails.php";

$query2 = "select * from user_bookings";
$result2 = mysqli_query($conn,$query2);

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
     .container {
          display: flex;
          justify-content: center;
          /* Centers horizontally */
          align-items: center;
          /* Centers vertically */
          height: 100vh;
          /* Optional: Sets the container's height to the full viewport height */
     }

     .centered-div {
          text-align: center;
          /* Optional: To center text within the div */
     }
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- __________________________________________________________________________________________ -->

     <?php include "navBar.php";?>

     <!-- __________________________________________________________________________________________ -->

     <div class="container opacity-25">
          <div class="centered-div">
               <h4>You have no Bookings...</h4>
          </div>
     </div>


     <!-- __________________________________________________________________________________________ -->

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
</body>

</html>