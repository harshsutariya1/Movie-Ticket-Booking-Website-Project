<?php

$movie = $_GET['movie'];

require_once "config.php";
require_once "currentUserDetails.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

$query = "SELECT * FROM `movies` WHERE movie_name='$movie';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="/resources/demos/style.css">
     <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
     <!-- css -->
     <style>
     #body {
          margin: 1rem;
          /* border: 2px solid black; */
          height: 80vh;
     }

     .poster-part {
          margin: 1rem;
          margin-left: 2rem;
          /* border: 2px solid black; */
          height: 27rem;

          display: flex;
          justify-content: center;
          /* Centers horizontally */
          align-items: center;
          /* Centers vertically */
     }

     .poster {
          height: 26rem;
     }

     .details-part {
          margin: 1rem;
          /* border: 2px solid black; */
          margin-right: 2rem;
          padding-top: 0.5rem;
     }

     /* .description-para {
          max-height: 3em;
          Adjust to the number of lines you want
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
     } 
     */

     .btnn {
          text-decoration: none;
          /* width: 50px; */
          border: 1px solid;
          padding: 12px 100px;
          background-color: red;
          color: white;
          font-size: 1.2rem;
     }
     </style>

     <title>BookIT</title>
</head>

<body>

     <!-- __________________________________________________________________________________________ -->
     <!-- App Bar -->

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
                              <a class="nav-link" href="orders.php">
                                   <img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                                   <?php echo $full_name?>
                              </a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <!-- __________________________________________________________________________________________ -->
     <!-- Body -->
     <script>
          
          localStorage.setItem("m_id", " <?php echo $row['m_id']; ?>");
          localStorage.setItem("movie_poster", " <?php echo $row['poster_img']; ?>");
          localStorage.setItem("movie_name", " <?php echo $row['movie_name']; ?>");
          localStorage.setItem("description", " <?php echo $row['description']; ?>");
          localStorage.setItem("imdb_ratings", " <?php echo $row['imdb_ratings']; ?>");
          localStorage.setItem("release_date", " <?php echo $row['release_date']; ?>");
          localStorage.setItem("genre", " <?php echo $row['genre']; ?>");
          localStorage.setItem("duration", " <?php echo $row['duration']; ?>");
          localStorage.setItem("language", " <?php echo $row['language']; ?>");
     </script>

     <section id="body" class=" border-opacity-75">
          <div class="row">
               <div class="col-3  border-opacity-75 poster-part">
                    <img class="rounded poster" src="<?php echo $row["poster_img"]; ?>" alt="Movie Poster">
               </div>

               <div class="col-7  border-opacity-75 details-part position-relative">
                    <div class="fw-medium fs-2 text-wrap">
                         <?php echo $row['movie_name']; ?>
                    </div>
                    <hr>
                    <div class="fw-normal text-wrap">
                         <p><?php echo $row['description']?></p>
                    </div>
                    <hr>
                    <div class="fw-bold">
                         <img src="images/imdb.png" alt="IMDb">
                         <?php echo $row['imdb_ratings']?> / 10
                    </div>
                    <hr>
                    <div class="fw-normal">
                         <?php echo $row['release_date']?> • <?php echo $row['genre']?> • <?php echo $row['duration']?>
                    </div>
                    <hr>
                    <div class="fw-normal">
                         <?php echo $row['language']?>
                    </div>
                    <div class="fw-medium mb-4 position-absolute bottom-0 start-50 translate-middle-x">
                         <a class="btnn rounded" href="select_theater.php?movie=<?php echo $movie; ?>">Book Tickets</a>
                    </div>
               </div>
          </div>
     </section>

     <!-- __________________________________________________________________________________________ -->
     <!-- Bootstrap JS -->
     <!-- <script>
          localStorage.setItem("movie_name", <?php // echo $row['movie_name']; ?>);
     </script> -->
</body>

</html>