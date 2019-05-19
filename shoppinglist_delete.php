<?php
session_start();
 // Radera inköpslista //

// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();
$user = unserialize($_SESSION['user']);

// Kontrollera om listan ska raderas
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Skall listan raderas?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteShopliConn($connection,$_POST['isdeleteid']);
    deleteShoplist($connection,$_POST['isdeleteid']);
    

    // Skickar tillbaka till sidan som visar alla listor
    header("Location: shoppinglist_read.php");
}
?>

<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Radera inköpslista</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: <?php echo $user->getColor(); ?>;">
    <div class="delete">
    <h1>Ta bort inköpslista</h1>

    <form action="shoppinglist_delete.php" method="post">
      <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

      <label>Vill du verkligen radera listan?</label>
      <p><input type="submit" value="Ja, jag vill radera"></p>  
    </form>
    
    <p><a href="shoppinglist_read.php">Tillbaka</a></p>
    </div>
    
    <?php
    // Stänger databaskopplingen
    dbDisconnect($connection);
    ?>
  </body>
</html>
