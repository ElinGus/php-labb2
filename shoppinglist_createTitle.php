<?php
// Startar upp sessionen
session_start();
 // Lägger till ny inköpslista:

// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();
$user = unserialize($_SESSION['user']);

// Lägga till ny lista
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveListName = saveListName($connection,$user->getId());
	header("Location: shoppinglist_create.php?listid=".$saveListName);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Labb 2 - E-handel</title>
    <link rel="stylesheet" href="style.css">
  </head>
	<div class="createTitle">
  <body style="background-color: <?php echo $user->getColor(); ?>;">
    
    
    <h1>Mina inköpslistor</h1> 
    <br>
		<button type="button" name="profileButton">
      <a href="index.php">Mina sidor</a>
    </button>
    <button type="button" name="savedButton">
      <a href="shoppinglist_read.php">Sparade inköpslistor</a>
    </button>
    <br>  
    <br>
		
			<h2>Skapa inköpslista</h2>  
	     
	      <form class="newListForm" action="shoppinglist_createTitle.php" method="post">
	        <input type="hidden" name="isnew" id="isnew" value="1">
	        
	        <label><p>Listnamn:</p></label>  
	        <p><input type="text" name="title" placeholder="Titel"></p>
	        <p><input type="submit" value="Skapa ny lista"></p>
	        
	      </form>
		</div>
		
    <!-- <h2>Skapa inköpslista</h2>   -->
     
      <!-- <form class="newListForm" action="shoppinglist_createTitle.php" method="post">
        <input type="hidden" name="isnew" id="isnew" value="1">
        
        <label><p>Listnamn:</p></label>  
        <p><input type="text" name="title" placeholder="Titel"></p>
        <p><input type="submit" value="Skapa ny lista"></p>
        
      </form> -->
  </body>
  
  <?php
  // Stänger databaskopplingen
  dbDisconnect($connection);
  ?>
  
</html>