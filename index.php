<?php
// Startar upp sessionen
session_start();
require("functions_shoplist.php");
if (!isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8" />
  <title>Hackningsförsök</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="outlogged">
    <h3>Hurru du din lilla hacker, logga in som vanligt folk! </h3>
    <p><a href="login.php">Logga in</a></p>
  </div>
</body>
</html>


<?php 
}
else {
  $user = unserialize($_SESSION['user']);
  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Labb 2 - E-handel</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: <?php echo $user->getColor(); ?>;">
    <div class="welcome">
      <h1>Välkommen <?php echo $user->getName(); ?>!</h1>
    
    <img src="icons8-circled-user-female-skin-type-4-100.png">
    <div class="shoppinglistButton">
      <button type="button" name="shoppinglistButton">
        <a href="shoppinglist_createTitle.php">Mina inköpslistor</a>
      </button>
    </div>
    <!-- <input type="button" name="myOrders" value="Mina beställningar">
    <input type="button" name="order" value="Beställa"> -->
    <div class="logoutButton">
      <button type="button" name="logoutButton">
        <a href="logout.php">Logga ut</a>
      </button>
    </div>
    </div>
  </body>
</html>

  
<?php 
}
?>