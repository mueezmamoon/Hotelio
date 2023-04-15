      <!---- PHP starts here -->

      
      <?php
    session_start();
    echo "Welcome ".$_SESSION['hotel_name'];

    require "db_connect.php";

    
    $user_profile = $_SESSION['hotel_name'];

    if($user_profile == true)
    {

    }

    else
    {
        header("location: ./sign_in.php");
    }


  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="hotelio_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Junge' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    
    <title>Hotelio</title>
</head>
<style>
    .navbar {
  overflow: hidden;
  background-color: #780a0ac0;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));

  /* Set a specific height */
  height: 50%;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Place text in the middle of the image */
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: rgb(255, 255, 255);
  font-family: junge;
  font-size:x-large;
}

.button-78 {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 24px;
  margin: 0;
  min-height: 64px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-78 {
    padding: 19px 32px;
  }
}

.button-78:before,
.button-78:after {
  border-radius: 80px;
}

.button-78:before {
  background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.button-78:after {
  background-color: initial;
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.button-78:hover:not(:disabled):before {
  background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
}

.button-78:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
  opacity: 0;
}

.button-78:active:not(:disabled) {
  color: #ccc;
}

.button-78:active:not(:disabled):before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
}

.button-78:active:not(:disabled):after {
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.button-78:disabled {
  cursor: default;
  opacity: .24;
}

.select-box {
  cursor: pointer;
  position : relative;
  max-width:  20em;
  margin: 25px auto;
  padding-left: 150px;
  width: 50%;
}

.select,
.label {
  color: #414141;
  display: block;
  font: 400 17px/2em junge;
}

.select {
  width: 100%;
  position: absolute;
  top: 0;
  padding: 5px 0;
  height: 50px;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  background: none transparent;
  border: 0 none;
}

#select-box1:disabled
{
  color: #ffffff;
  background-color: #414141;
}

.select-box1 {
  background: #ffffff;
}

.label {
  position: relative;
  padding: 5px 10px;
  cursor: pointer;
}
.open .label::after {
   content: "▲";
}
.label::after {
  content: "▼";
  font-size: 12px;
  position: absolute;
  right: 0;
  top: 0;
  padding: 5px 15px;
  border-left: 5px solid #fff;
}

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->




<body bgcolor="bisque">
    <a href="index.html"><img src="Hotelio_transparent_logo.svg" height="100" width="350"></a>
    <h3 style="text-align: right; padding-right: 25px; color: #e21313c0;">Welcome [user] </h3>
<div class="navbar">
  <a href="receptionist.html">Home</a>
  <a href="news.html">News</a>
  <div class="dropdown">
    <button class="dropbtn">Services
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="bookings.html">Bookings</a>
      <a href="checkout.html">Check-Out</a>
    </div>
  </div>
</div>



  <div class = "container py-5">
    <div class="row mt-4">

    <?php
              $get_rooms_query = "SELECT * FROM ".$user_profile.".rooms";
              $room_query_send = mysqli_query ($connection, $get_rooms_query);
              $check_status = "SELECT room_booked FROM ".$user_profile.".rooms";
              $send_check_query = mysqli_query ($connection, $check_status);

              while ($row = mysqli_fetch_array($send_check_query)) {
                
                $row['room_booked'];
                
                }

              if(mysqli_num_rows($room_query_send)!=0)
              {
                while($row = mysqli_fetch_assoc($room_query_send))
                {
                    ?>
                      
                        <div class="col md-3 mt-3">
                          <div class="card">
                            <div class="card-body">
                              <img src="<?php echo $row['room_img']?>"  alt="room-image" width= "255px" height="200px">
                                <h3 class ="card-title"><i class="fa-solid fa-bed"></i>Room No: <?php echo $row['room_no'] ?></h3>
                                <h4 class ="card-title"><i class="fa-sharp fa-solid fa-elevator"></i>Room Floor: <?php echo $row['room_floor'] ?></h3>
                                <h5 class ="card-title"><i class="fa-solid fa-bed-pulse"></i>Room Type: <?php echo $row['room_type'] ?></h3>
                                <h5 class ="card-title"><i class="fa-sharp fa-solid fa-indian-rupee-sign"></i>Room Price: <?php echo $row['room_price'] ?></h3>
                                <h5 class ="card-title"><i class="fa-solid fa-people-group"></i>Max Guests: <?php echo $row['max_guests'] ?></h3>
                                <h5 class ="card-title"><i class="fa-sharp fa-solid fa-circle-info"></i>Room Description: <?php echo $row['room_desc'] ?></h3>

                                <?php $stat = $row['room_booked']; ?>
                                <h5 class ="card-title"><i class="fa-sharp fa-solid fa-circle-info"></i>Occupied?: <?php echo $row['room_booked'] ?></h3>



                               <?php if($stat != 'Yes')
                                {
                                  ?>
                                <a href="check_in.php?room_no=<?php echo $row['room_no']?>"><button type="button" class="btn btn-primary">Check In</button></a>
                              <?php  
                              }
                              ?>
                               <a href="check_out.php?room_no=<?php echo $row['room_no']?>"><button type="button" class="btn btn-danger">Check Out</button></a>
                              
                              </div>
    </div>
</div>
        
                    <?php
                  
                }
              }

              else {
                echo "<center><p style='color:red;'>No rooms found in the database! Contact Hotel Manager!</p></center>";
              }
    ?>
          
          


  
</body>
</html>
