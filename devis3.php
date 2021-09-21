<?php
require_once 'Database.php';

$id = $_GET['id'];
if (!empty($_POST)) {

               $statement = $db->prepare("UPDATE  devis SET
                  sub=:sub WHERE id=:id ");
                $statement->bindValue(":sub", $_POST['sub']);
                $statement->bindValue(":id", $id);
                $statement->execute();
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
    <link rel="stylesheet" href="devis3.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<section id="pricing" class="pricing offset">

            <h3>Our Pricing</h3>
            <h6>Stop wasting time and money designing<br> and managinga website that doesn’t get results. Happiness guaranteed!</h6>

            <div class="table">

                <div class="basic">

                    <div class="b-head">
                        <h3>BASIC</h3>
                    </div>

                    <span class="price">
                        <span class="sign">$</span>
                    <span class="currency">99</span>
                    <span class="cent">.99</span>
                    <span class="month">/MON</span>
                    </span>
                    <ul>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Carefully crafted components</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Amazing page examples</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Super friendly support team</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Awesome Support</li>
                    </ul>
                    <ul class="header-btn">
                           <form method="post">
                            <input type="text" name="sub" value="basic" hidden>
                            <button type="submit" class="main-btn btn-two">Choisir</button>
                        </form>
                    </ul>

                </div>

                <div class="basic standard">

                    <div class="b-head">
                        <h3>STANDARD</h3>
                    </div>

                    <span class="price">
                        <span class="sign">$</span>
                    <span class="currency">199</span>
                    <span class="cent">.99</span>
                    <span class="month">/MON</span>
                    </span>
                    <ul>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Carefully crafted components</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Amazing page examples</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Super friendly support team</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Awesome Support</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Amazing page examples</li>
                    </ul>
                    <ul class="header-btn">
                        <form method="post">
                            <input type="text" name="sub" value="standard" hidden>
                            <button type="submit" class="main-btn btn-two">Choisir</button>
                        </form>
                    </ul>

                </div>

                <div class="basic">

                    <div class="b-head">
                        <h3>UNLIMITED</h3>
                    </div>

                    <span class="price">
                        <span class="sign">$</span>
                    <span class="currency">299</span>
                    <span class="cent">.99</span>
                    <span class="month">/MON</span>
                    </span>
                    <ul>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Carefully crafted components</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Amazing page examples</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Super friendly support team</li>
                        <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Awesome Support</li>
                    </ul>
                    <ul class="header-btn">
                        <form method="post">
                            <input type="text" name="sub" value="ulimited" hidden>
                            <button type="submit" class="main-btn btn-two">Choisir</button>
                        </form>
                    </ul>

                </div>

            </div>

        </section>
    </body>
</html>
