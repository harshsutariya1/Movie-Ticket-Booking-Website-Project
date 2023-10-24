<?php
require_once "config.php";
require_once "currentUserDetails.php";

$order_details = $_COOKIE["order_details"];
$order_details_array = explode("|",$order_details);
$movie = $order_details_array[0];
$theater_name = $order_details_array[1];
$date = $order_details_array[4];
$movie_time = $order_details_array[5];

$sql = "SELECT already_booked_seats FROM `$theater_name` WHERE show_date = '$date' AND movie_name = '$movie' AND show_time = '$movie_time';";
$result = mysqli_query($conn2, $sql);
$row = mysqli_fetch_assoc($result);
$bookedSeats = $row["already_booked_seats"];
$bookedSeatsArray = explode(',', $bookedSeats);
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
          margin: 1rem 1rem;
          padding-bottom: 1rem;
          padding-left: 1rem;
          padding-right: 1rem;
     }

     .order-details {
          margin: 1rem 9rem;
          padding: 1rem 1rem;
          border-radius: 1rem;
          background-color: #dedede;
     }

     .bc-black {
          background-color: #dedede;
     }

     .c-red {
          color: #ba0606;
          /* color: #a83131 ; */
     }

     .seats-section {
          border-radius: 1rem;
          padding: 1rem;
          margin: 0 3rem;
     }

     .screendiv {
          margin: 1rem 0rem;
          height: 1.5rem;
          border: 5px solid grey;
          border-radius: 50%;
          border-bottom: none;
          border-left: none;
          border-right: none;
     }

     .seats {
          margin: 0 3.5rem;
     }

     .group-of-three {
          /* border: 1px solid black; */
          margin: 1rem;
     }

     .one,
     .two,
     .three {
          display: inline-block;
          border: 2px solid black;
          margin: 0 1rem;
          width: 1.5rem;
          height: 1.5rem;
          border-radius: 10px;
     }

     .one {
          /* Available */
          border-color: #54bf56;
          background-color: white;
     }

     .two {
          /* Selected */
          border-color: #54bf56;
          background-color: #54bf56;
     }

     .three {
          /* Sold */
          background-color: #dedede;
          border-color: #ab8484;
          color: #8a8888;
     }

     .book-t-btn {
          text-align: center;
          font-size: 22px;
          height: 3rem;
          width: 12rem;
          border: 1px solid #ba0606;
          background-color: #ba3030;
          color: white;
          border-radius: 1rem;
     }

     /* ____________________________________ */

     span.seatBox {
          display: inline-block;
          position: relative;
          width: 50px;
          height: 50px;
          margin: 5px;
          border-radius: 13px;
          box-sizing: border-box;
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

     span.seatBox div {
          width: 100%;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          line-height: 25px;
          transition: 0.5s ease;
          border-radius: 10px;
          /* border: 2px solid #50bcf2; */
          border: 2px solid #54bf56;
          background-color: white;

     }

     /* Style for booked seats */
     .booked-seat input[type=checkbox]~div {
          background-color: #dedede;
          border-color: #ab8484;
          color: #8a8888;
     }

     input[type=checkbox]:checked~div {
          background-color: #54bf56;
     }

     /* ______________________________________________ */
     </style>

     <title>BookIT</title>
</head>

<body>
     <!-- _________________________________________________________________________________________________________ -->
     <?php include "navBar.php";?>
     <!-- _________________________________________________________________________________________________________ -->

     <div class="main_container">

          <div class="d-flex justify-content-center">
               <h4 style="margin-right: 1rem;">Movie Name:</h4>
               <h4 id="movie_name" style="color: #ba0606;"></h4>
          </div>

          <div class="order-details row">
               <div class="row ">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3 ">Theater name:</span>
                    <span id="theater_name" class="fw-medium col "></span><br>
               </div>
               <div class="row">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3">Theater address:</span>
                    <span id="theater_address" class="fw-medium col"></span><br>
               </div>
               <div class="row">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3">Screen:</span>
                    <span id="screen" class="fw-medium col"></span><br>
               </div>
               <div class="row">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3">Show date:</span>
                    <span id="show_date" class="fw-medium col"></span><br>
               </div>
               <div class="row">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3">Show time:</span>
                    <span id="show_time" class="fw-medium col"></span><br>
               </div>
               <div class="row">
                    <span style="font-size: 21px;" class="c-red fw-medium col-3">Price per seat:</span>
                    <div class="col">
                         <span class="fw-medium">&#8377;</span>
                         <span id="price_per_seat" class="fw-medium"></span>
                    </div>
               </div>
          </div>

          <div class="seats-section border bc-black">
               <h5>Select Seats:</h5>
               <div>
                    <p class="text-center c-red">All eyes this way please!</p>
                    <div class="screendiv"></div>
               </div>
               <form action="" id="formid" method="post">
                    <div class="seats text-center row ">
                         <div class="col">
                              <?php 
                         for($charCode = ord("A"); $charCode<= ord("G"); $charCode++){
                              $char = chr($charCode);
                         ?>
                              <div class="seat-group">
                                   <?php for($i = 1; $i<=3; $i++){
                                        $seatName = $char . $i;
                                        $isBooked = in_array($seatName, $bookedSeatsArray);
                                        ?>
                                   <span class="seatBox <?php echo $isBooked?"booked-seat":""; ?>">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off"
                                             <?php echo $isBooked?"disabled":""; ?>>
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
                         <div class="col-5">
                              <?php 
                         for($charCode = ord("A"); $charCode<= ord("G"); $charCode++){
                              $char = chr($charCode);
                         ?>

                              <div class="seat-group">
                                   <?php for($i = 4; $i<=8; $i++){
                                        $seatName = $char . $i;
                                        $isBooked = in_array($seatName, $bookedSeatsArray);
                                        ?>
                                   <span class="seatBox <?php echo $isBooked?"booked-seat":""; ?>">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off"
                                             <?php echo $isBooked?"disabled":""; ?>>
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
                                   <?php for($i = 9; $i<=10; $i++){
                                        $seatName = $char . $i;
                                        $isBooked = in_array($seatName, $bookedSeatsArray);
                                        ?>
                                   <span class="seatBox <?php echo $isBooked?"booked-seat":""; ?>">
                                        <input type="checkbox" class="checkbox" name="<?php echo $char.$i?>"
                                             id="<?php echo $char.$i?>" autocomplete="off"
                                             <?php echo $isBooked?"disabled":""; ?>>
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
               <div class="d-flex justify-content-between">
                    <p class="fs-5" style="margin:1rem;">You have selected <span class="fw-medium c-red"
                              id="selected-seats">0</span> seats.</p>
                    <div class="group-of-three align-middle">
                         <div class="one align-middle"></div><span>Available</span>
                         <div class="two align-middle"></div><span>Selected</span>
                         <div class="three align-middle"></div><span>Sold</span>
                    </div>
               </div>

               <p class="fs-5" style="margin-left:1rem;">Selected seats: <span class="fw-medium c-red"
                         id="seats_name">0</span></p>
               <div class="d-flex justify-content-center">
                    <button onclick="book_ticket_button()" class="book-t-btn">
                         <p class="fw-medium m-0 fw-medium">Pay &#8377; <span id="amount">0</span></p>
                    </button>
               </div>
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
     document.getElementById("screen").innerHTML = movieDetails[3];
     document.getElementById("show_date").innerHTML = movieDetails[4];
     document.getElementById("show_time").innerHTML = movieDetails[5];
     document.getElementById("price_per_seat").innerHTML = movieDetails[6];
     // document.cookie = "order_details" + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

     // JavaScript code for handling selected seats
     var checkboxes = document.querySelectorAll('.checkbox');
     var selectedSeatsCount = 0;
     var selectedSeatNames = [];
     var amount = 0;

     function updateSelectedSeats() {
          selectedSeatsCount = 0;
          selectedSeatNames = [];
          amount = 0;

          checkboxes.forEach(function(checkbox) {
               var seatName = checkbox.getAttribute('name');
               var isChecked = checkbox.checked;

               if (isChecked) {
                    selectedSeatsCount++;
                    selectedSeatNames.push(seatName);
                    amount = selectedSeatsCount * movieDetails[6];
               }
          });

          document.getElementById('selected-seats').textContent = selectedSeatsCount;
          document.getElementById('amount').textContent = amount;
          document.getElementById('seats_name').textContent = selectedSeatNames.join(', ') == "" ? 0 : selectedSeatNames
               .join(', ');
     }

     checkboxes.forEach(function(checkbox) {
          checkbox.addEventListener('change', updateSelectedSeats);
     });

     function book_ticket_button() {
          if (amount != 0 && selectedSeatsCount != 0) {
               document.cookie = "seats_details=" + selectedSeatsCount + "|" + amount + "|" + selectedSeatNames;
               window.location.href = "booked_ticket.php";
          }

     }
     </script>
</body>

</html>