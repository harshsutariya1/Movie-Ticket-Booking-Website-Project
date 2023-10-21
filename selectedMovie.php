<?php

$movie = $_GET['movie'];

require_once "config.php";
require_once "currentUserDetails.php";


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
     .m-card{
          background-color: #dedede;
          border-radius: 1rem;
     }
     </style>

     <title>BookIT</title>
</head>

<body>

     <!-- __________________________________________________________________________________________ -->
     <!-- App Bar -->

     <?php include "navBar.php";?>

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

               <div class="col-7 m-card border-opacity-75 details-part position-relative">
                    <div class="fw-medium fs-2 text-wrap" style="color: #ba0606;">
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