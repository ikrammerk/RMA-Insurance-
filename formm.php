<?php
session_start();
require_once 'Database.php';

if (!empty($_POST)) {
    
    if(!empty($_FILES['img']['name'])){
    $name_file = $_FILES['img']['name'];
    $name_extension = strrchr($name_file, ".");
    $extensions_autorisation = array('.png', '.PNG', '.jpg', '.JPG','.jpeg', '.JPEG');
    $file_tmp_name = $_FILES['img']['tmp_name'];
    $file_dest = 'sinistreImg/' . $name_file;

        if (in_array($name_extension, $extensions_autorisation)) {
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                $statement = $db->prepare("INSERT INTO sinistre 
                  (`num police`,`date`,`produit`,`heure`,`tél`,`email`,`description`,`img`) VALUES (:num,:dt,:pr,:hr,:tl,:email,:des,:img) ");
                $statement->bindValue(":num", $_POST['num']);
                $statement->bindValue(":dt", $_POST['date']);
                $statement->bindValue(":pr", $_POST['auto']);
                $statement->bindValue(":hr", $_POST['hour']);
                $statement->bindValue(":tl", $_POST['tel']);
                $statement->bindValue(":email", $_POST['email']);
                $statement->bindValue(":des", $_POST['description']);
                $statement->bindValue(":img", $name_file);
                $statement->execute();
                $_SESSION["message"]['success'] = "Déclaration bien enregister !";
                header('Location: formm.php');
                exit;
            } 
        } else {
        $_SESSION["message"]['danger'] = "Pour l'image de projet seuls les extensions PNG , JPG ou JPEG sont autorisées";
        header('Location: formm.php');
        exit;
        }

      }
        else{
               $statement = $db->prepare("INSERT INTO sinistre 
                (`num police`,`date`,`produit`,`heure`,`tél`,`email`,`description`) VALUES
                (:num,:dt,:pr,:hr,:tl,:email,:des) ");
                $statement->bindValue(":num", $_POST['num']);
                $statement->bindValue(":dt", $_POST['date']);
                $statement->bindValue(":pr", $_POST['auto']);
                $statement->bindValue(":hr", $_POST['hour']);
                $statement->bindValue(":tl", $_POST['tel']);
                $statement->bindValue(":email", $_POST['email']);
                $statement->bindValue(":des", $_POST['description']);
                $statement->execute();
                $_SESSION["message"]['success'] = "Déclaration bien enregister !";
                header('Location: formm.php');
                exit;
            } 
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>form</title>
  <link rel="stylesheet" href="formm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
<div class="wrapper">
      <?php if (isset($_SESSION['message'])): ?>
     <?php foreach ($_SESSION['message'] as $type => $message): ?>
       <div class="<?=$type;?>">
          <div><?=$message;?></div>
       </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['message']);?>
    <div class="title">
      Déclaration de sinistre en ligne
    </div>
    <div class="form">
         <div class="inputfield">
          <label>Numero de police</label>
          <input type="text" name="num" class="input" required>
       </div> 
        
        <div class="inputfield">
          <label>Date du sinistre</label>
          <input type="Date" name="date" class="input" required>
       </div> 
        <div class="inputfield">
          <label>Produit</label>
          
            <input type="radio" id="auto" name="auto" value="auto">
          <label for="auto">auto</label><br>
            <input type="radio" id="accident individuel" name="auto" value="accident individuel">
          <label for="accident individuel">accident individuel</label><br>
              
       </div> 
        <div class="inputfield">
          <label>heure du sinistre</label>
          <input type="hour" minlength="5" maxlength="5"  name="hour" class="input" required>
       </div> 
        <div class="form">
         <div class="inputfield">
          <label>Numero de téléphone</label>
          <input type="text" minlength="10" maxlength="10" name="tel" class="input" required>
       </div>
        
        <div class="inputfield">
          <label>email</label>
          <input type="text" name="email" class="input" required>
       </div> 
      <div class="inputfield">
          <label>Description du sinistre</label>
          <textarea class="textarea" name="description" required></textarea>
       </div> 
       <div class="inputfield">
          <label>Image descriptive</label>
          <input type="file" id="img" name="img">
       </div>  
      <div class="inputfield">
        <button type="submit"  class="btn">Envoyer</button>
      </div>
    </div>
    </div>
  </form>
    <style>
      .danger{
        background: red;
        color : white;
      }
      .success{
        background: green;
        color : white;
      }
    </style>
    </body>
</html>
   