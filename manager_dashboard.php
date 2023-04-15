
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="managerDash.css">
        <title>Manager Dashboard</title>
    </head>

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

    <body>
        <div id="pageBox">
            <div id="dashboard_topBox">
                <div class="welcome_msg">
                    <center>
                        <h1>
                            Welcome To
                            <?php
                                $query = "select hotel_name from ".$user_profile.".hotel_info;";
                                $res = mysqli_query($connection, $query);
                                $res2 =  mysqli_fetch_assoc($res);
                                
                                echo $res2['hotel_name'];

                            ?>
                        </h1>
                    </center>
                </div>


                <div id="date-today" class="datee">
                    27/03/2003
                </div>
                <div id="clock" class="time">
                    8:10:45
                </div>

                
                <div class="navigation_bar">
                    <button onclick="window.location.href='manager_dashboard.html';" class="navigation_buttonStyle">
                        DASHBOARD
                    </button>
                    <button onclick="window.location.href='operations.html';" class="navigation_buttonStyle">
                    <div class="dropdown">    
                    OPERATIONS
                    <div class="dropdown-content">
                        <a href="rooms_add.php">Add Rooms</a>
                        <a href="event_hall_add.php">Add Event Hall Information</a>
                        <a href="recreational_add.php">Add Recreational Details</a>
                        </div>
                    </button>
                    <div class="dropdown">
                        <button class="dropbtn">BOOKINGS</button>
                        <div class="dropdown-content">
                        <a href="#">Event Hall</a>
                        <a href="#">Rooms</a>
                        </div>
                    </div>
                    <button onclick="window.location.href='analysis.html';" class="navigation_buttonStyle">
                        ANALYSIS
                    </button>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn dropbtnRgt">PROFILE</button>
                        <div class="dropdown-content dropdown-content-rgt">
                        <a href="#">Your Profile</a>
                        <a href="add_profiles.php">Add Profiles</a>
                        <a href="settings_manager.php">Settings</a>
                        <a href="logout.php" style="color: blue;">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="containerBox">
                <div class="profitAnalytics">
                    <div class="profit_box">
                        <h2>
                            <center>
                                PROFIT TODAY
                            </center>
                        </h2>
                    </div>
                    <div class="content_room_analytics">
                        <div style="border: 2px solid transparent; margin-left: 5px; margin-top: 5px; margin-right: 5px; color: #000000; text-shadow: 0 0 5px #FFFFFF, 0 0 5px #FFFFFF;">
                            <center>
                                <h3>
                                    ROOMS BOOKED : 60
                                </h3>
                                PROFIT: RS.200000
                            </center>
                        </div>
                        <div style="margin-left: 5px; margin-top: 5px; margin-right: 5px; padding-left: 10px;">
                            <table class="hotelio_abt_table">
                                <tr>
                                    <th class="tbl_header">ROOM TYPE</th>
                                    <th class="tbl_header">BOOKED</th>
                                    <th class="tbl_header">TOTAL PRICE</th>
                                </tr>
                        
                                
                                <tr>
                                    <th class="tbl_header">Single Room</th>
                                    <td class="tbl_header">10 <span id="single-free"></span></td>
                                    <td class="tbl_header">30000 <span id="single-free"></span></td>
                                </tr>
                                
                                <tr>
                                    <th class="tbl_header">Double Room</th>
                                    <td class="tbl_header">10 <span id="double-free"></span></td>
                                    <td class="tbl_header">30000 <span id="double-free"></span></td>
                                </tr>
                        
                        
                                <tr>
                                    <th class="tbl_header">Executive Suite</th>
                                    <td class="tbl_header">10 <span id="exec-free"></span></td>
                                    <td class="tbl_header">30000 <span id="exec-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Connecting Room</th>
                                    <td class="tbl_header">10 <span id="conn-free"></span></td>
                                    <td class="tbl_header">30000 <span id="conn-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Murphy Room</th>
                                    <td class="tbl_header">10 <span id="murphy-free"></span></td>
                                    <td class="tbl_header">30000 <span id="murphy-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Cabana Suite</th>
                                    <td class="tbl_header">10 <span id="cabana-free"></span> </td>
                                    <td class="tbl_header">30000 <span id="cabana-free"></span> </td>
                                </tr>
                            </table>
                        
                        </div>
                        <br>
                        <div style="border: 2px solid transparent; margin-left: 5px; margin-top: 5px; margin-right: 5px; color: #000000; text-shadow: 0 0 5px #FFFFFF, 0 0 5px #FFFFFF;">
                            <center>
                                <h3>
                                    SIGHT SEEINGS BOOKED : 60
                                </h3>
                                PROFIT: RS.96000
                            </center>
                        </div>
                        <div style="margin-left: 5px; margin-top: 5px; margin-right: 5px; padding-left: 10px;">
                            <table class="hotelio_abt_table">
                                <tr>
                                    <th class="tbl_header">Place</th>
                                    <th class="tbl_header">No. of People</th>
                                    <th class="tbl_header">Total Price</th>
                                </tr>
                        
                                
                                <tr>
                                    <th class="tbl_header">Mysore</th>
                                    <td class="tbl_header">10 <span id="single-free"></span></td>
                                    <td class="tbl_header">30000 <span id="single-free"></span></td>
                                </tr>
                                
                                <tr>
                                    <th class="tbl_header">Bangalore Palace</th>
                                    <td class="tbl_header">10 <span id="double-free"></span></td>
                                    <td class="tbl_header">30000 <span id="double-free"></span></td>
                                </tr>
                        
                        
                                <tr>
                                    <th class="tbl_header">Executive Suite</th>
                                    <td class="tbl_header">10 <span id="exec-free"></span></td>
                                    <td class="tbl_header">30000 <span id="exec-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Connecting Room</th>
                                    <td class="tbl_header">10 <span id="conn-free"></span></td>
                                    <td class="tbl_header">30000 <span id="conn-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Murphy Room</th>
                                    <td class="tbl_header">10 <span id="murphy-free"></span></td>
                                    <td class="tbl_header">30000 <span id="murphy-free"></span></td>
                                </tr>
                        
                                <tr>
                                    <th class="tbl_header">Cabana Suite</th>
                                    <td class="tbl_header">10 <span id="cabana-free"></span> </td>
                                    <td class="tbl_header">30000 <span id="cabana-free"></span> </td>
                                </tr>
                            </table>
                        
                        </div>
                        <br>

                    </div>
                </div>



                <div class="roomAnalytics">
                    <div class="room_box">
                        <h2>
                            <center>
                                6786 ROOMS
                            </center>
                        </h2>
                    </div>
                    <div class="content_box_one">
                        <div class="head_room_analytics">
                            <h1>
                                <center>
                                    ROOMS AVAILABLE
        
                                    <!--
                                    single room, double room, executive suite, connecting room, murphy room, cabana suite
                                    -->
                                </center>
                            </h1>
                        </div>
                        <div class="content_room_analytics">
                            <div style="border: 2px solid transparent; margin-left: 5px; margin-top: 5px; margin-right: 5px; color: #000000; text-shadow: 0 0 5px #FFFFFF, 0 0 5px #FFFFFF;">
                                <center>
                                    ROOMS/SUITES FREE
                                    <h2>
                                        2000
                                    </h2>
                                </center>
    
                            </div>
    
                            <div style="margin-left: 5px; margin-top: 5px; margin-right: 5px; padding-left: 10px;">
                                <table class="hotelio_abt_table">
                                    <tr>
                                        <th class="tbl_header">ROOM TYPE</th>
                                        <th class="tbl_header">AVAILABILITY</th>
                                    </tr>
                            
                                    
                                    <tr>
                                        <th class="tbl_header">Single Room</th>
                                        <td class="tbl_header">433 Rooms <span id="single-free"></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="tbl_header">Double Room</th>
                                        <td class="tbl_header">233 Rooms <span id="double-free"></span></td>
                                    </tr>
                            
                            
                                    <tr>
                                        <th class="tbl_header">Executive Suite</th>
                                        <td class="tbl_header">176 Rooms <span id="exec-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Connecting Room</th>
                                        <td class="tbl_header">300 Rooms <span id="conn-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Murphy Room</th>
                                        <td class="tbl_header">88 Rooms <span id="murphy-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Cabana Suite</th>
                                        <td class="tbl_header">199 Rooms <span id="cabana-free"></span> </td>
                                    </tr>
                                </table>
                            
                            </div>
                            <br>
    
                        </div>
                    </div>

                    <div class="content_box_two">
                        <div class="head_room_analytics">
                            <h1>
                                <center>
                                    ROOMS RESERVED
        
                                    <!--
                                    single room, double room, executive suite, connecting room, murphy room, cabana suite
                                    -->
                                </center>
                            </h1>
                        </div>
                        <div class="content_room_analytics">
                            <div style="border: 2px solid transparent; margin-left: 5px; margin-top: 5px; margin-right: 5px; color: #000000; text-shadow: 0 0 5px #FFFFFF, 0 0 5px #FFFFFF;">
                                <center>
                                    ROOMS/SUITES BOOKED
                                    <h2>
                                        4786
                                    </h2>
                                </center>
    
                            </div>
    
                            <div style="margin-left: 5px; margin-top: 5px; margin-right: 5px; padding-left: 10px;">
                                <table class="hotelio_abt_table">
                                    <tr>
                                        <th class="tbl_header">ROOM TYPE</th>
                                        <th class="tbl_header">ON RESERVATION</th>
                                    </tr>
                            
                                    
                                    <tr>
                                        <th class="tbl_header">Single Room</th>
                                        <td class="tbl_header">433 Rooms <span id="single-free"></span></td>
                                    </tr>
                                    
                                    <tr>
                                        <th class="tbl_header">Double Room</th>
                                        <td class="tbl_header">233 Rooms <span id="double-free"></span></td>
                                    </tr>
                            
                            
                                    <tr>
                                        <th class="tbl_header">Executive Suite</th>
                                        <td class="tbl_header">176 Rooms <span id="exec-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Connecting Room</th>
                                        <td class="tbl_header">300 Rooms <span id="conn-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Murphy Room</th>
                                        <td class="tbl_header">88 Rooms <span id="murphy-free"></span></td>
                                    </tr>
                            
                                    <tr>
                                        <th class="tbl_header">Cabana Suite</th>
                                        <td class="tbl_header">199 Rooms <span id="cabana-free"></span> </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>


                    
                    
                    

                </div>
            </div>
        </div>

    </body>

    <script>

        const date = new Date();
        
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();

        let currentDate = `${day}-${month}-${year}`;
        document.getElementById('date-today').textContent = currentDate;

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
    </script>



</html>