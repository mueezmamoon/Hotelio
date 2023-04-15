<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="10" > 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kitchen Dash</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center bg-light mb-5 rounded">
                <h1 class="text-warning">Kitchen Dashboard</h1>
                <h5 class="text-danger">Dear Chefs!<br>page reloads itself automatically after a minute! Watch out for incoming orders!</h1>

                <h1><div id="clock">8:10:45</div>
                  
            </div>
        </div>
    </div>
    
    <div class = "container py-5">
    <div class="row mt-4">
      
    <?php   
                require "db_connect.php";
              $get_orders_query = "SELECT * FROM signed_up_users.sent_orders";
              $send_orders_query = mysqli_query ($connection, $get_orders_query);
           


              if(mysqli_num_rows($send_orders_query)!=0)
              {
                while($row = mysqli_fetch_assoc($send_orders_query))
                {
                    ?>
                      
                        <div class="col md-3 mt-3">
                          <div class="card">
                            <div class="card-body">
                              
                                <h3 class ="card-title"><i class="fa-solid fa-bowl-rice"></i> Order ID: <?php echo $row['order_id'] ?></h3>
                                <h4 class ="card-title"><i class="fa-sharp fa-solid fa-bed"></i> Order From Room: <?php echo $row['from_room'] ?></h3>
                                <h5 class ="card-title"><i class="fa-sharp fa-regular fa-clock"></i> Order Time: <?php echo $row['order_time'] ?></h3> <br><br>
                                <h5 class ="card-title"><i class="fa-solid fa-utensils"></i> Order: <?php echo $row['order_desc'] ?></h3>
                             
                            
                                <a href='del_order.php?order_id=<?php echo $row['order_id'] ?>'><input type="submit" name='rem_order' value='Delivered!' class="btn btn-danger"  onclick = 'return onDelete()'></a>
                            
                              

                              
                              
                              
                                
                              
                              </div>
    </div>
</div>
        
                    <?php
                  
                }
              }

              else {
                echo "<center><p style='color:red;'>No dishes found in the database! Contact Hotel Manager!</p></center>";
              }

    ?>
          
          

</body>
<script>
  setInterval(showTime, 1000);
function showTime() {
    let time = new Date();
    let hour = time.getHours();
    let min = time.getMinutes();
    let sec = time.getSeconds();
    am_pm = "AM";
  
    if (hour > 12) {
        hour -= 12;
        am_pm = "PM";
    }
    if (hour == 0) {
        hr = 12;
        am_pm = "AM";
    }
  
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
  
    let currentTime = hour + ":" 
            + min + ":" + sec + am_pm;
  
    document.getElementById("clock")
            .innerHTML = currentTime;
}
showTime();
    function onDelete()
{
  alert("Confirm that the order is delivered?");
}
  </script>
</html>