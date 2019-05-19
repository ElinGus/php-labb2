<?php
// Startar upp sessionen
session_start();
  
// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Hämtar användare och lösenord från formuläret
$checkUser = $_POST['txtUser'];
$checkPass = $_POST['txtPassword'];
?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8" />
  <title>checklogin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="backgroundPic">
    <img src="food-login.jpg">
  </div>
  <div class="checklogin">
  <?php
  $user = checklogin($connection,$checkUser,$checkPass);
    if(empty($user)){
    	
      echo "<p>Du har inte fyllt i rätt användare och lösenord!</p>";
    	echo '<p><a href="login.php">Försök igen</a></p>';  	
    } else{      
      $_SESSION['user'] = serialize($user);
      header("Location: index.php");
    }
?>
  </div>
</body>
</html>

<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>