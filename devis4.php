<?php
session_start();
require_once 'Database.php';

$id = $_GET['id'];
if (!empty($_POST)) {
    
                $statement = $db->prepare("UPDATE  devis SET
                  tél=:tl , email=:email WHERE id=:id ");
                $statement->bindValue(":tl", $_POST['tel']);
                $statement->bindValue(":email", $_POST['email']);
                $statement->bindValue(":id", $id);
                $statement->execute();
                $_SESSION["message"]['success'] = "Devis bien envoyer!";
                header("Location: devis4.php?id=$id");
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
     <?php if (isset($_SESSION['message'])): ?>
     <?php foreach ($_SESSION['message'] as $type => $message): ?>
       <div class="<?=$type;?>">
          <div><?=$message;?></div>
       </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['message']);?>
    <div class="title">Devis en ligne</div>
    <div class="content">
      <form method="POST">
          <div class="user-details">
        <div class="input-box">
            <span class="details">Numéro de téléphone</span>
            <input type="text" name="tel" placeholder="numero" required>
          </div>
          </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Email" required>
          </div>
          </div>
        <div class="button">
          <button type="submit">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
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
