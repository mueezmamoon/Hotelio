<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  color: white;
}

.gfg {
        position: relative;
        padding-top: 10px;
        filter: blur(5px);
        width: 100%;
        height: 100%;
    }
</style>
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
<div class="hero-image">
  <img class="gfg" src="recep.jpg">
  <div class="hero-text">
    <h1>Hotel Bookings</h1>
    <button type="button" onclick="window.location.href='bookings.html';">Go to bookings</button>
  </div>
</div>
</body>
</html>