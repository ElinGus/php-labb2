<?php 

// Startar upp sessionen
session_start();
// Visar alla listor

// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla listor
$user = unserialize($_SESSION['user']);

$allLists = getAllLists($connection,$user->getId());
 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mina inköpslistor</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body style="background-color: <?php echo $user->getColor(); ?>;">
    <div class="read">
    <button type="button" name="myListsButton">
      <a href="index.php">Mina sidor</a>
    </button>
    
    <button type="button" name="newListButton">
      <a href="shoppinglist_createTitle.php">Skapa ny inköpslista</a>
    </button>
        
    <h1>Mina inköpslistor</h1>
    
    <ul>
    <?php 
    	// Loopar genom arrayen som innehåller alla listor i tabellen
        while($row = mysqli_fetch_array($allLists)){
    ?>
     <li><?php echo $row['ShoppinglistTitle'];?> 
       
       <a href="shoppinglist_update.php?editid=<?php 
       echo $row['ShoppinglistID'];?>">Uppdatera</a> 
       
       <a href="shoppinglist_delete.php?deleteid=<?php 
       echo $row['ShoppinglistID'];?>">Ta bort</a></li>
    <?php 
    	}
    ?>
    </ul> 
  </div>
    <?php
    // Stänger databaskopplingen
    dbDisconnect($connection);
    ?>     
  </body>
</html>


