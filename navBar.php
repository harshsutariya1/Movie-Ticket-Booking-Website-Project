<nav class="navbar navbar-expand-lg fw-bold">
     <a class="navbar-brand mx-xxl-3" style="color: #ba0606;" href="index.php"><img style="margin-left: 1rem;" src="images\movie.png" alt="">BookIT</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
               <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
               </li>
               <li class="nav-item active">
                    <a class="nav-link" href="orders.php">My Bookings</a>
               </li>
               <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
               </li>
          </ul>
          <div class="navbar-collapse collapse d-flex justify-content-end">
               <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                         <a class="nav-link" style="color: #ba0606; margin-right: 1rem;" href="orders.php"> <img
                                   src="https://img.icons8.com/metro/26/000000/guest-male.png">
                              <?php echo $full_name?>
                         </a>
                    </li>
               </ul>
          </div>
     </div>
</nav>