<div class="ticket backcolor_black row">
               <div class="ticket_poster col-3 border m-1">
                    <img src="<?php echo $movie_poster ?>" class="rounded" alt="movie poster" style="height:50vh;">
               </div>
               <div class="ticket_details col border m-1">
                    <h5><span class="c-red">Movie name: </span><span><?php echo $movie_name?></span></h5>
                    <hr>
                    <div>
                         <span class="fw-medium c-red">Theater: </span>
                         <span class="fw-normal" style="color:#444445;"><?php echo $theater_name ?></span>
                    </div>
                    <div>
                         <span class="fw-medium c-red">Address: </span>
                         <span class="fw-normal" style="color:#444445;"><?php echo $t_address ?></span>
                    </div>
                    <div>
                         <span class="fw-medium c-red">Date, Time: </span>
                         <span class="fw-normal"
                              style="color:#444445;"><?php echo $show_date  ?></span> | <span class="fw-normal"
                              style="color:#444445;"><?php echo $show_time ?></span>
                    </div>
                    <div>
                         <span class="fw-medium c-red">Screen: </span>
                         <span class="fw-normal" style="color:#444445;"><?php echo $screen_num?></span>
                         <span style="margin-left:1rem;" class="fw-medium c-red">Quantity: </span>
                         <span class="fw-normal" style="color:#444445;"><?php echo $no_of_seats ?></span>
                    </div>
                    <div>
                         <?php 
                         $seats = explode(",", $seats_numbers);
                         $seats = implode(", ",$seats);
                         ?>
                         <span class="fw-medium c-red">Seat numbers: </span>
                         <span class="fw-normal" style="color:#444445;"><?php echo $seats ?></span>
                    </div>
                    <hr>
                    <div class="fw-medium" style="color:#444445;">
                         <span>Ticket price: </span>
                         <span style="margin-left: 1.7rem;">&#8377;<?php echo $show_price?></span>
                    </div>
                    <div class="fw-medium" style="color:#444445;">
                         <span>Amount paid: </span><span style="margin-left: 1rem;">&#8377; <?php echo $amount?></span>
                    </div>

               </div>
          </div>