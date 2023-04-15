<?php

  
        
    $hotelName = $_POST["hotelName"];
    $hotelCountry = $_POST["country"];
    $hotelState = $_POST["state"];
    $hotelAddr = $_POST["hotelAddress"];
    $hotelZip = $_POST["hotelZip"];
    $hotelPhNo = $_POST["hotelPhNo"];
    $hotelEmail = $_POST["hotelEmail"];
    $password_user = $_POST["pass"];
    
    $confirm_pass = $_POST["confirm_pass"];

        require_once "db_connect.php";
        // require_once "functions.inc.php";
    
    
    // if(empty($hotelName) || empty($hotelCountry) || empty($hotelState) || empty($hotelAddr) || empty($hotelZip) || empty($hotelPhNo) || empty($hotelEmail))
    // {
    //     header("location: ../manager_hotel_info.php?error=emptyinput");
    //     exit();
    // }
 
    // if(filter_var($hotelEmail, FILTER_VALIDATE_EMAIL))
    
    // {
    //     header("location: ../manager_hotel_info.php?error=invalidemail");
    //     exit();
    // }


    // hotel_regd($connection, $hotelName, $hotelCountry, $hotelState, $hotelAddr, $hotelZip, $hotelPhNo, $hotelEmail);
    $lwr_hotel_name = strtolower($hotelName);
    $hotelCountry = strtolower($hotelCountry);

    $new_hotel_name = str_replace(' ', '', $lwr_hotel_name)."_".str_replace(' ', '', $hotelCountry)."_".$hotelZip;
        
    $new_hotel_db = "create database"." ".$new_hotel_name;
    echo $new_hotel_db;
    echo $password_user;
    $create_users_table = "CREATE TABLE ".$new_hotel_name."."."users (`username` VARCHAR(100) NOT NULL , `userPass` VARCHAR(10) NOT NULL , `typeOfUser` VARCHAR(30) NOT NULL , PRIMARY KEY (`username`));";
    $create_guest_table = "CREATE TABLE ".$new_hotel_name."."."guests (`guest_id` INT NOT NULL AUTO_INCREMENT , `guest_name` VARCHAR(70) NOT NULL , `guest_nationality` VARCHAR(50) NOT NULL , `guest_phno` VARCHAR(15) NOT NULL , `guest_email` VARCHAR(60) NOT NULL , `guest_gender` VARCHAR(8) NOT NULL , `guest_address` MEDIUMTEXT NOT NULL , `check_in_date_time` TIMESTAMP NOT NULL, `guest_room` VARCHAR(10) NOT NULL, `guestid_proof` BLOB NOT NULL , PRIMARY KEY (`guest_id`));";
    $create_employee_table = "CREATE TABLE ".$new_hotel_name."."."employee (`emp_id` INT NOT NULL AUTO_INCREMENT , `emp_name` VARCHAR(60) NOT NULL , `emp_dept` VARCHAR(30) NOT NULL , `emp_phno` INT(15) NOT NULL , `emp_email` VARCHAR(40) NOT NULL , `emp_basicpay` INT NOT NULL , `emp_att` INT NOT NULL , PRIMARY KEY (`emp_id`));";
    $create_rooms_table = "CREATE TABLE ".$new_hotel_name."."."rooms (`room_id` INT NOT NULL AUTO_INCREMENT , `room_no` VARCHAR(10) NOT NULL , `room_floor` INT NOT NULL , `room_type` VARCHAR(25) NOT NULL , `room_price` DECIMAL NOT NULL , `max_guests` INT NOT NULL , `room_booked` VARCHAR(3) NOT NULL DEFAULT 'No', `room_desc` VARCHAR(200) NOT NULL, `room_img` VARCHAR(400) NOT NULL , PRIMARY KEY (`room_id`));";
    
    
    $create_bookings_table = 
    "CREATE TABLE ".$new_hotel_name."."."bookings (`booking_id` INT NOT NULL AUTO_INCREMENT , `booking_date` DATE NOT NULL , `check_in_date` DATE NOT NULL , `check_out_date` DATE NOT NULL , `total_rooms_booked` INT NOT NULL , `total_amount` FLOAT NOT NULL , `duration_of_stay` INT NOT NULL , `g_id` INT NOT NULL , PRIMARY KEY (`booking_id`));";
    $add_foreignkey_bookings = "ALTER TABLE ".$new_hotel_name."."."bookings ADD CONSTRAINT `guest_FK` FOREIGN KEY (`g_id`) REFERENCES `guests`(`guest_id`) ON DELETE CASCADE ON UPDATE CASCADE;";
    $create_recr_table = "CREATE TABLE ".$new_hotel_name."."."recreation (`recr_id` INT NOT NULL AUTO_INCREMENT , `recr_name` VARCHAR(20) NOT NULL , `recr_info` MEDIUMTEXT NOT NULL , `recr_price` FLOAT NOT NULL , PRIMARY KEY (`recr_id`));";
    $create_hotel_info_table = "CREATE TABLE ".$new_hotel_name."."."hotel_info (`hotel_name` VARCHAR(90) NOT NULL , `hotel_country` VARCHAR(30) NOT NULL , `hotel_city` VARCHAR(30) NOT NULL , `hotelAddr` MEDIUMTEXT NOT NULL);";
    $create_eventhalldetails_table = "CREATE TABLE ".$new_hotel_name."."."event_hall_info (`event_hall_id` INT NOT NULL AUTO_INCREMENT , `event_hall_name` VARCHAR(50) NOT NULL , `event_hall_capacity` INT NOT NULL , `event_hall_floor` INT NOT NULL , `event_hall_price` FLOAT NOT NULL , `event_hall_desc` MEDIUMTEXT NOT NULL , `event_hall_img` VARCHAR(400) NOT NULL, PRIMARY KEY (`event_hall_id`));" ;
    $create_dishes_table = "CREATE TABLE ".$new_hotel_name."."."dishes (`dish_id` INT NOT NULL AUTO_INCREMENT , `dish_name` VARCHAR(40) NOT NULL , `dish_price` FLOAT NOT NULL , `dish_type` varchar(50) NOT NULL ,`dish_serves` INT NOT NULL , `dish_pref` VARCHAR(10) NOT NULL DEFAULT 'veg', `dish_preptime` INT NOT NULL , `dish_info` MEDIUMTEXT NOT NULL, `dish_img` VARCHAR(100) NOT NULL , PRIMARY KEY (`dish_id`));";
    // $create_billing_table = ;
    // $create_salaries_table = ;
    
    // $res = "INSERT INTO `hotels` (`hotelName`, `hotelCountry`, `hotelState`, `hotelAddr`, `hotelZip` ,`hotelPhNo`, `hotelEmail`)
    // values('$hotelName', '$hotelCountry', '$hotelState', '$hotelAddr', '$hotelZip', '$hotelPhNo', '$hotelEmail')";


if (mysqli_query($connection, $new_hotel_db)) 
{
  echo "Database Created succesful!";
}

$manager_create_query =  "INSERT INTO ".$new_hotel_name."."."users (`username`, `userPass`, `typeOfUser`)
values('$new_hotel_name', '$password_user', 'manager')";

$hotel_details = "INSERT INTO ".$new_hotel_name."."."hotel_info (`hotel_name`, `hotel_country`, `hotelAddr`)
values('$hotelName', '$hotelCountry', '$hotelAddr')";

if (mysqli_query($connection, $create_users_table)) 
{
  echo "Table creation  succesful!";
}

if (mysqli_query($connection, $create_guest_table)) 
{
  echo "\n\nGuest Table creation  succesful!";
}

if (mysqli_query($connection, $create_employee_table)) 
{
  echo "\n\n Employee Table creation  succesful!";
}
if (mysqli_query($connection, $create_bookings_table)) 
{
  echo "\n\nBookings Table creation  succesful!";
}
if (mysqli_query($connection,  $create_rooms_table)) 
{
  echo "\n\nRoom table creation  succesful!";
}
if (mysqli_query($connection,  $add_foreignkey_bookings)) 
{
  echo "\n\nFK Bookings creation  succesful!";
}

if (mysqli_query($connection,  $manager_create_query)) 
{
  echo "\n\nManager Successfully  created!";
}

if (mysqli_query($connection,  $create_hotel_info_table)) 
{
  echo "\n\nHotel Info Table Successfully  created!";
}

if (mysqli_query($connection,  $hotel_details)) 
{
  echo "\n\nHotel Details Successfully  entered!";
}

if (mysqli_query($connection,  $create_eventhalldetails_table)) 
{
    echo "\n\nEvent Hall Table creation  succesful!";
}

if (mysqli_query($connection,  $create_dishes_table)) 
{
    echo "\n\n Dishes Table creation  succesful!";
}

mkdir($new_hotel_name , 0777, true);
mkdir($new_hotel_name."/room_images", 0777);
mkdir($new_hotel_name."/dish_images", 0777);
mkdir($new_hotel_name."/idproof_images", 0777);

?>