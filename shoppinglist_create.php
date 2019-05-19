<?php
session_start();
 // Lägger till varor till lista:

// Inkluderar filerna för databaskopplingen och funktioner
require("conn_mysql.php");
require("functions_shoplist.php");

// Skapar databaskopplingen
$connection = dbConnect();
$user = unserialize($_SESSION['user']);

// Hämtar specfik lista (listid) 
if(isset($_GET['listid']) && $_GET['listid'] > 0 ){
  $listId = $_GET['listid'];
  // $ProductsData = getProductsData($connection,$_GET['listid']);
}

if(isset($_POST['listid']) && $_POST['listid'] > 0){
  $listId = $_POST['listid'];
	createShoplist($connection);

	header("Location: shoppinglist_create.php?listid=".$listId);
}

// Visar alla inköpslistor
$allShoplists = getAllShoplists($connection,$listId);

$getShoplistTitle = getShoplistName($connection,$listId);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Labb 2 - E-handel</title>
    <link rel="stylesheet" href="style.css">
  </head>
  
  <body style="background-color: <?php echo $user->getColor(); ?>;">
    <div class="create">
    
    <h1>Mina inköpslistor</h1> 
    <p><a href="index.php"><input type="button" value="Mina sidor"></a></p>
    <p><a href="shoppinglist_read.php"><input type="button" value="Sparade inköpslistor"></a></p>
    
    <h2>Skapa inköpslista</h2>        
      <form class="addProdForm" action="shoppinglist_create.php" method="post">
        <input type="hidden" name="listid" value="<?php echo $listId; ?>">
        
        <label><p>Ange vara:</p></label>
        <p><input type="text" name="prodName" placeholder="Varor"></p>
        <p><input type="submit" value="Lägg till"></p>
        </form>
          
        <h3>Listnamn:
        <?php echo $getShoplistTitle; ?>
        </h3>
        
        <div class="container">
          <ul>
          <?php 
          	// Loopar genom arrayen som innehåller alla varor i tabellen
              while($row = mysqli_fetch_array($allShoplists)){
          ?>
           <li><p><?php echo $row['ProductsName'];?></p></li>
          <?php 
          	}
          ?>
          </ul>    
        </div>     
        <br> 
    </div>   
  </body>
  
  <?php
  // Stänger databaskopplingen
  dbDisconnect($connection);
  ?>
  
</html>