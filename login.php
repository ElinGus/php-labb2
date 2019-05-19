

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8" />
  <title>Logga in</title>
  <link rel="stylesheet" href="style.css">
</head> 
<body>
  <div class="backgroundPic">
    <img src="food-login.jpg">
  </div>
  <div class="login">
    <form class="loginform" action="checklogin.php" method="post"> 
      <h1>Logga in</h1> 
      <label><p>Användare:</p></label>
        <p><input type="text" name="txtUser"></p>
      <label><p>Lösenord:</p></label>
        <p><input type="password" name="txtPassword"></p>
        <p><input type="submit" name="submit" value="Logga in"></p>
    </form>
  </div>

</body>
</html>

