<?php
session_start();

// unset($_SESSION['status']);
session_destroy();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8" />
  <title>Logga ut</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="backgroundPic">
    <img src="food-login.jpg">
  </div>
  <div class="outlogged">
    <h3>Du är nu utloggad!</h3>
    <p>Klicka här för att logga in igen:</p>
    <p><a href="login.php">Logga in</a></p>
  </div>
</body>
</html>