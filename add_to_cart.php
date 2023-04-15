<?php

    session_start();
// session_destroy();
   
       

    if(isset($_POST["add_to_cart"]))
    {
        
        $dish_name = $_POST['dish_name'];
        $dish_price = $_POST['dish_price'];
        $dish_qty = $_POST['dish_qty']; 
        //  $check_product = array_column($_SESSION['cart6'], 'dishName');

        //  if(in_array($dish_name, $check_product))
        //  {
        //      echo "<script>alert('Dish added already');
        //         window.location.href = 'order_dishes.php';
             
        //      </script>
             
             
        //      ";
        //  }
        //  else
        //  {
        $_SESSION['cart6'][] = array('dishName' => $dish_name, 
                                    'dishPrice' => $dish_price,
                                    'dishQty' => $dish_qty);
                                    
                                    // print_r($_SESSION['cart6']);
                                    
        //  }
        } 
     
    
        
        //remove a product
        if(isset($_POST['remove']))
        {
            foreach($_SESSION['cart6'] as $key => $value)
            {
                if($value['dishName'] === $_POST['item'])
                {
                    unset($_SESSION['cart6'][$key]);
                    $_SESSION['cart6'] = array_values($_SESSION['cart6']);
                    header('location: view_cart.php');
                }
            }
        }

                // update a product
                if(isset($_POST['update']))
                {
                    foreach($_SESSION['cart6'] as $key => $value)
                    {
                        if($value['dishName'] === $_POST['item'])
                        {
                            $_SESSION['cart6'][$key] = array('dishName' => $dish_name, 
                                                    'dishPrice' => $dish_price,
                                                    'dishQty' => $dish_qty);
                                                    header('location:view_cart.php');
                        }
                    }
                }
?> 

