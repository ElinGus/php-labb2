<?php
session_start();
 // Visar alla inköpslistor

// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();
$user = unserialize($_SESSION['user']);

// Skall listan redigeras?
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$listData = getListData($connection,$_GET['editid']);
}

// Skall listan uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateShoplist($connection);

	header("Location: shoppinglist_update.php?editid=".$_POST['updateid']);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Uppdatera inköpslista</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: <?php echo $user->getColor(); ?>;">
		<div class="update">
    <h1>Uppdatera <?php echo $listData['ShoppinglistTitle']; ?></h1>
    
    <p><a href="shoppinglist_read.php">Tillbaka</a></p>

    <form action="shoppinglist_update.php" method="post">
       	<input type="hidden" name="updateid" value="<?php echo $listData['ShoppinglistID']; ?>">

        <label>Listnamn:</label>
        <p><input type="text" name="title" value="<?php echo $listData['ShoppinglistTitle']; ?>"></p>
         
        <p><input type="submit" value="Uppdatera"></p>
    </form>
		</div>
    <?php
    // Stänger databaskopplingen
    dbDisconnect($connection);
    ?>
  </body>
</html>

