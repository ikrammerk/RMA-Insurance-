<?php
require_once 'Database.php';

$id = $_GET['id'];
if (!empty($_POST)) {
               $statement = $db->prepare("UPDATE  devis SET
                  usagee=:use , carburant=:car ,  marque=:mar , `valeur neuf`=:neuf  , `valeur actuelle`=:now  , puissance =:pui WHERE id=:id ");
                $statement->bindValue(":use", $_POST['genderuse']);
                $statement->bindValue(":car", $_POST['gendercar']);
                $statement->bindValue(":mar", $_POST['marque']);
                $statement->bindValue(":neuf", $_POST['neuf']);
                $statement->bindValue(":now", $_POST['actuelle']);
                $statement->bindValue(":pui", $_POST['puissance']);
                $statement->bindValue(":id", $id);
                $statement->execute();
                header("Location: devis3.php?id=$id");
                exit;
          
}
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="devis.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Devis en ligne</div>
    <div class="content">
      <form method="POST">
            <div class="gender-details">
          <input type="radio" name="genderuse" value="commerce" id="dot-1" required>
          <input type="radio" name="genderuse" value="tourisme" id="dot-2" required>
          <span class="gender-title">Usage</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">commerce</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">tourisme</span>
          </label>
          
          </div>
        </div>
            <div class="gender-details">
          <span class="gender-title">Usage</span>
          <div class="category" id="gender-carburant">
            <span>Dissel</span>
            <input type="radio" name="gendercar" value="commerce" required>
            <span>Dissel</span>
          <input type="radio" name="gendercar" value="tourisme" required >
          </div>
        </div>
 
        <div class="user-details">
          <div class="input-box">
            <span class="details">Marque</span>
            <input type="text" name="marque" placeholder="votre marque" required>
          </div>
          
            <div class="input-box">
            <span class="details">Valeur à neuf</span>
            <input type="text" name="neuf" placeholder="valeur" required>
          </div>
            <div class="input-box">
            <span class="details">Valeur actuelle</span>
            <input type="text" name="actuelle" placeholder="valeur" required>
          </div>
            <div class="input-box">
            <span class="details">Puissance fiscale</span>
            <input type="text" name= "puissance" placeholder="valeur" required>
          </div>
          </div>
          
          
      
        <div class="button">
          <button type="submit">suivant</button>
        </div>
      </form>
    </div>
  </div>
<style>
  #gender-carburant input{
    display: block;
  }
</style>
</body>
</html>
