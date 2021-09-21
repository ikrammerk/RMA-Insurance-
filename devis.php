<?php
require_once 'Database.php';

if (!empty($_POST)) {
               $statement = $db->prepare("INSERT INTO devis 
                  (genre , ville ,  naissance  , `permis de conduite` , `mise en circulation` ) VALUES
                  (:gr,:ville,:nc,:cdt,:cir) ");
                $statement->bindValue(":gr", $_POST['gender']);
                $statement->bindValue(":ville", $_POST['ville']);
                $statement->bindValue(":nc", $_POST['naissance']);
                $statement->bindValue(":cdt", $_POST['permis']);
                $statement->bindValue(":cir", $_POST['circulation']);
                $statement->execute();
                $id = $db->lastInsertId();
                header("Location: devis2.php?id=$id");
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
          <input type="radio" name="gender" value="feminin" id="dot-1">
          <input type="radio" name="gender" value="masculin" id="dot-2">
          <input type="radio" name="gender" value="person" id="dot-3">
          <span class="gender-title">Qualité de l'assuré</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Féminin</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Masculin</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Personne morale</span>
            </label>
          </div>
        </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Ville</span>
            <input type="text" name="ville" placeholder="votre ville" required>
          </div>
            <div class="input-box">
            <span class="details">Date de naissance</span>
            <input type="Date" name="naissance" placeholder="date" required>
          </div>
            <div class="input-box">
            <span class="details">Date de permis de conduite</span>
            <input type="Date" name="permis" placeholder="date de permis" required>
          </div>
            
          <div class="input-box">
            <span class="details">Date de mise en circulation</span>
            <input type="Date" name="circulation"  placeholder="date de circulation" required>
          </div>
        </div>
      
        <div class="button">
          <button type="submit">suivant</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
