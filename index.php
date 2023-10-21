<?php
require_once "config.php";
require_once "currentUserDetails.php";

$query2 = "select * from movies";
$result2 = mysqli_query($conn,$query2);

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
     <style>
     .movie-card {
          text-decoration: none;
          width: 13rem;
     }

     .m-name {
          /* Adjust to the number of lines you want  */
          /* overflow: hidden;
          text-overflow: ellipsis;
          white-space: wrap; */
          height: 4rem;
          background-color: #dedede;
          color: #ba0606;
     }
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- __________________________________________________________________________________________ -->

     <?php include "navBar.php";?>

     <!-- __________________________________________________________________________________________ -->

     <div class="container mt-4">
          <div class="row">

               <?php
               while($row = mysqli_fetch_assoc($result2)){
               ?>

               <a class='m-3 movie-card' href="selectedMovie.php?movie=<?php echo $row['movie_name']; ?>">
                    <div class="card">
                         <img src="<?php echo $row['poster_img']; ?>" class="card-img-top"
                              alt="<?php echo $row['movie_name']; ?>">
                         <div class="card-body m-name">
                              <h6 class="card-title text-center"><?php echo $row['movie_name']; ?></h6>
                         </div>
                    </div>
               </a>

               <?php
               }
               ?>

          </div>

     </div>

<!-- <?php //mysqli_close($conn)?> -->
     <!-- __________________________________________________________________________________________ -->
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
     </script>
</body>

</html>