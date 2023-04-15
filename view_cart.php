<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>View</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center bg-light mb-5 rounded">
                <h1 class="text-warning">Added Items</h1>
                <a href='order_dishes.php'>Order more?</a>  
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center">
                    <thead class="bg-success text-white fs-5">
                        <th>Index</th>
                        <th>Dish Name</th>
                        <th>Dish Quantity</th>
                        <th>Dish Price</th>
                        <th>Total</th>
                        <th>Update</th>
                        <th>Delete</th>


                    </thead>

                    <tbody>
                        <?php
                            session_start();
                            $ptotal = 0;
                            $total = 0;

                            error_reporting(0);
                            
                            if(isset($_SESSION['cart6']))
                            {
                                foreach($_SESSION['cart6'] as $key => $value)
                                {
                                    $ptotal = $value['dishPrice'] * $value['dishQty'];
                                    $total += $value['dishPrice'] * $value['dishQty'];$ptotal = $value['dishPrice'] * $value['dishQty'];
                                    echo "
                                        <form action='add_to_cart.php' method='post'>
                                        <tr>
                                        <td>$key</td>
                                        <td>".$value['dishName']."</td>
                                        <td><input type='number' min='0' max='4' placeholder='Change qty here'>".$value['dishQty']."</td>
                                        <td>".$value['dishPrice']."</td>
                                        <td>$ptotal</td>
                                        <a href='order_dishes.php'><td><button name='update' class='btn-warning'>Update</button></td></a>
                                        <td><button name='remove' class='btn-danger'>Delete</button></td>
                                        <td><input type='text' name='item' value='$value[dishName]'</td>
                                    </tr>
                                    </form>
                                    ";
                                }
                            }
                               
                        ?>
                    </tbody>
                </table>

            </div>

                            <div class="col-lg-3 text-center">
                                <h3>Total</h3>
                                  
                               <h2 class="bg-success text-white"> <?php echo $total;?></h2>
                            
                        </div>
        </div>
    </div>
    <?php
    // print_r($_SESSION['cart6']);
               include 'db_connect.php';         
    foreach($_SESSION['cart6'] as $key => $v1)
    {
        // echo "<br>". $key;
        foreach($v1 as $v2)
        {
            $str .= $v2."<br>";
            
        }
    }
    echo $str;

   ?>
   <form action="" method="POST">
    <center><input type="submit" value='Place Order!' class="btn btn-danger btn-lg" name='place_order'></center>
</form>
    <?php
    if(isset($_POST["place_order"]))
    {
        echo $str;
    $send_items = "INSERT INTO signed_up_users.sent_orders(`from_room`, `order_desc`, `order_time`)
    VALUES(101, '$str', CURRENT_TIME())";

     if(mysqli_query($connection, $send_items))
     {
        ?>
            <script>swal("Order Placed!", "Food reaching your room in some time!", "success");</script>
        <?php   
     }

     else
     echo "error";
    }
    ?>
</body>
</html>