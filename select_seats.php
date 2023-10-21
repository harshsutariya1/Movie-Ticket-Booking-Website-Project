<?php
require_once "config.php";
require_once "currentUserDetails.php";
?>

<!-- _____________________________________________________________________________________________________________ -->

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
          margin: 0rem 1rem;
          padding-bottom: 1rem;
          padding-left: 1rem;
          padding-right: 1rem;
     }
     .order-details{
          margin: 1rem;
     }

     .seats-section, .order-details {
          padding: 1rem;
          margin: 0 10rem;
     }
     .seats{
          margin: 0 3.5rem;
     }

     /* _____________ */
     span.seatBox {
          display: inline-block;
          position: relative;
          width: 50px;
          height: 50px;
          margin: 5px;
          /* float: left; */
          border: 2px solid #50bcf2;
          border-radius: 10px;
          box-sizing: border-box;
     }

     span.seatBox div {
          width: 100%;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          line-height: 25px;
          transition: 0.3s ease;
          border-radius: 10px;
     }

     span.seatBox input {
          position: absolute;
          top: 0;
          left: 0;
          width: 50px;
          height: 50px;
          opacity: 0;
          cursor: pointer;
     }

     input[type=checkbox]:checked~div {
          background-color: #50bcf2;
     }

     /* _______________ */
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- _________________________________________________________________________________________________________ -->
     <?php include "navBar.php";?>
     <!-- _________________________________________________________________________________________________________ -->

     <div class="main_container border">
          <div class="d-flex justify-content-center">
               <h4 style="margin-right: 1rem;">Movie Name:</h4>
               <h4 id="movie_name" style="color: #ba0606;"></h4>
          </div>
          <div class="order-details border" >
               <h6 id="theater_name"></h6>
               <h6 id="theater_address"></h6>
               <h6 id="show_date"></h6>
               <h6 id="show_time"></h6>
               <h6 id="price_per_seat"></h6>
          </div>
          <div class="seats-section">
               <h5>Select Seats:</h5>
               <form action="" method="post">
                    <div class="seats text-center row border">
                         <div class="col">
                              <?php 
                         for($charCode = ord("A"); $charCode<= ord("G"); $charCode++){
                              $char = chr($charCode);
                         ?>
                              <div class="seat-group">
                                   <?php for($i = 1; $i<=3; $i++){?>
                                   <span class="seatBox">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off">
                                        <div>
                                             <span><?php echo $char.$i?></span>
                                        </div>
                                   </span>
                                   <?php }?>
                              </div>
                              <!-- <br> -->

                              <?php 
                              }
                         ?>
                         </div>
                         <div class="col-5">
                              <?php 
                         for($charCode = ord("A"); $charCode<= ord("G"); $charCode++){
                              $char = chr($charCode);
                         ?>

                              <div class="seat-group">
                                   <?php for($i = 4; $i<=8; $i++){?>
                                   <span class="seatBox">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off">
                                        <div>
                                             <span><?php echo $char.$i?></span>
                                        </div>
                                   </span>
                                   <?php }?>
                              </div>

                              <?php 
                              }
                         ?>
                         </div>
                         <div class="col">
                              <?php 
                         for($charCode = ord("A"); $charCode<= ord("G"); $charCode++){
                              $char = chr($charCode);
                         ?>

                              <div class="seat-group">
                                   <?php for($i = 9; $i<=10; $i++){?>
                                   <span class="seatBox">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off">
                                        <div>
                                             <span><?php echo $char.$i?></span>
                                        </div>
                                   </span>

                                   <?php }?>
                              </div>

                              <?php 
                              }
                         ?>
                         </div>

                    </div>
               </form>

          </div>
     </div>

     <!-- __________________________________________________________________________________________________________ -->

     <!-- Bootstrap JS -->

     <script>
     var movie_details = localStorage.getItem("order_details");
     var movieDetails = movie_details.split("|");
     document.getElementById("movie_name").innerHTML = movieDetails[0];
     document.getElementById("theater_name").innerHTML = movieDetails[1];
     document.getElementById("theater_address").innerHTML = movieDetails[2];
     document.getElementById("show_date").innerHTML = movieDetails[3];
     document.getElementById("show_time").innerHTML = movieDetails[4];
     document.getElementById("price_per_seat").innerHTML = movieDetails[5];
     </script>
</body>

</html>