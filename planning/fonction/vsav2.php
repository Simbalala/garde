<?php

/*Connection BBD*/
  require '../bdd.php';

/*Fonction*/
  require 'fonction.php';

  /*Prevois la prohcaine garde */
  $prochaine_garde = $bdd->query("SELECT date_add(date_garde, INTERVAL 5 day) as prochaine_garde from planning GROUP by date_garde DESC LIMIT 1")->fetch();


/* ----- DEBUT CONDUCTEUR VSAV1 -----*/

  /*Déclaration variable interne*/

  $cond1 = 0;
    $compteur_vsav1 = -1;
    $post = 3;


    /*Recupère dans un tableau tout mes cond*/
      $tout_les_cond = tab_personnel(2);
      $cond_vsav1 = $tout_les_cond->fetchall();

    /*Compter personnel*/
      $nb_cond_vsav = count($cond_vsav1);


    /*Interval de jours avent d'etre a nouveaux disponible*/
      $interval_cond_vsav1 = $nb_cond_vsav * 5;


    /*Recupère l'historique des gardes passer et ajoute l'INTERVAL*/
      $historique_cond_vsav1 = historique_planning($interval_cond_vsav1, $post, $nb_cond_vsav);
      $historique_cond_vsav1 = $historique_cond_vsav1->fetchall();


  do {
    $compteur_vsav1++;

          $cond_vsav1[$compteur_vsav1];


      /*Verifie si la ligne existe*/
        $verif_cond = verif_ligne($cond_vsav1[$compteur_vsav1]['id_personnel'], $post);




        if ($verif_cond == 0) {

          cree_ligne_planning($cond_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
          $cond1 = 1;
        }

        else {

          $verif_planning = verif_planning($cond_vsav1[$compteur_vsav1]['id_personnel'], $prochaine_garde['prochaine_garde']);


                    if ($verif_planning == 0) {

                        $historique_cond_vsav1[$compteur_vsav1];

                        if (condition) {
                          # code...
                        }


                          if (strtotime($historique_cond_vsav1[$compteur_vsav1]['historique_date_garde']) <= strtotime($prochaine_garde['prochaine_garde']))
                          {
                              cree_ligne_planning($historique_cond_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                              $cond1 = 1;
                          }

                          else {
                            $cond1 = 0;
                          }
                    }

                    else {
                      $cond1 = 0;
                    }


        }

  } while ($cond1 == 0);

/* ----- FIN CONDUCTEUR VSAV1 -----*/

 ?>
