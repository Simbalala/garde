<?php

  $bdd = new PDO('mysql:host=mattufrnryadmin.mysql.db;dbname=mattufrnryadmin;charset=utf8', 'mattufrnryadmin','f5Te7FDtl57');

      if((!isset($_GET['page'])) || ($_GET['page'] == "")) {
        $affiche = "presentation.php";
        $titre = "Presentation de la Caserne";
        $acceuil ="";
      }
        elseif($_GET['page'] == "presentation") {
            $affiche = "presentation.php";
            $titre = "Presentation de la Caserne";
            $acceuil ="";
          }
              elseif(($_GET['page'] == "devenirsp") || ($_GET['page'] == "spv")){
                $affiche = "spv.php";
                $titre = "Sapeur-pompier Volontaire";
                $acceuil ="hidden";
              }
                  elseif($_GET['page'] == "spp"){
                    $affiche = "spp.php";
                    $titre = "Sapeur-pompier professionel";
                    $acceuil ="hidden";
                  }
                      elseif($_GET['page'] == "jsp"){
                        $affiche = "jsp.php";
                        $titre = "Jeune sapeur-pompier";
                        $acceuil ="hidden";
                      }
                          elseif($_GET['page'] == "organisation"){
                            $affiche = "organisation.php";
                            $titre = "Oragnisation";
                            $acceuil ="hidden";
                          }
                              elseif($_GET['page'] == "vehicule"){
                                $affiche = "vehicule.php";
                                $titre = "Vehicule de la Caserne";
                                $acceuil ="hidden";
                              }

      if ((!isset($_POST['email'])))
      {
        $message_newsletter = "";
      }

      else
      {
          $email = htmlspecialchars($_POST['email']);

          if ($email == "")
          {
            $message_newsletter = "<p class='message_red'>L'adresse mail est invalide</p>";
          }

          else {

            $recuperation_email = $bdd->query("SELECT COUNT(mail) as mail_exists FROM `mail` WHERE mail = '$email';");
            $recuperation_email = $recuperation_email->fetch();

                if($recuperation_email['mail_exists'] == 0)
                {
                  $bdd->query("INSERT INTO `mail`(`id`, `mail`) VALUES (null, '$email');");
                  $message_newsletter = "<p class='message_green'>Vous avez bien été inscrit à la newsletter</p>";
                }

                else
                {
                  $message_newsletter = "<p class='message_red'>Vous êtes déjà inscrit à la newsletter</p>";
                }
          }

      }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <?php require"head.php"; ?>
  </head>
  <body>

    <div class="site_content">

            <div class="<?php echo $acceuil; ?> headerV2">
                <?php require "headerV2.php";?>
            </div>

                <header>
                  <?php require "header.php"; ?>
                </header>

                    <div class="menuV2">
                      <?php require 'navV2.php'; ?>
                    </div>

                          <div class="content">

                                  <section class="text">

                                      <div class="document texteaffichage">
                                        <?php include($affiche); ?>
                                      </div>

                                      <div class="document newsletter hidden">
                                        <?php require 'newsletter.php'; ?>
                                      </div>
                                  </section>
                          </div>

                <footer>
                  <?php require "footer.php"; ?>
                </footer>

            <div class="footerV2">
              <?php require 'footerV2.php'; ?>
            </div>

    </div>

  </body>
</html>
