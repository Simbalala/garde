<?php

/*Connection BBD*/
  require '../bdd.php';

/*Fonction*/
  require 'fonction.php';


  /*Prevois la prohcaine garde */
  $prochaine_garde = $bdd->query("SELECT date_add(date_garde, INTERVAL 5 day) as prochaine_garde from planning GROUP by date_garde DESC LIMIT 1")->fetch();


  /* ----- DEBUT CONDUCTEUR VSAV1 -----*/

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

        /*Recupère l'historique des gardes passer at ajoute l'INTERVAL*/
            $historique_cond_vsav1 = historique_planning($interval_cond_vsav1, $post, $nb_cond_vsav);
          $historique_cond_vsav1 = $historique_cond_vsav1->fetchall();


      do {
        $compteur_vsav1++;

              $verif_planning = verif_planning($cond_vsav1[$compteur_vsav1]['id_personnel'], $prochaine_garde['prochaine_garde']);


              if ($verif_planning == 0) {

                /*Verifie si la ligne existe*/
                $verif_cond = verif_ligne($cond_vsav1[$compteur_vsav1]['id_personnel'], $post);

                      if ($verif_cond == 0) {

                          cree_ligne_planning($cond_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                          $cond1 = 1;
                      }


                      else {

                          $historique_cond_vsav1[$compteur_vsav1];

                          echo 'ici verif_planning <br>';

                          if (strtotime($historique_cond_vsav1[$compteur_vsav1]['historique_date_garde']) <= strtotime($prochaine_garde['prochaine_garde']))
                          {
                              echo $historique_cond_vsav1[$compteur_vsav1]['id_personnel'] ."<br>";
                              cree_ligne_planning($historique_cond_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                              $cond1 = 1;
                          }

                          else {
                              echo 'ici else <br>';
                              $cond1 = 0;
                          }
                      }

              }

            else {
              $cond1 = 0;
            }

      } while ($cond1 == 0);
    /* ----- FIN CONDUCTEUR VSAV1 -----*/


  /* ----- DEBUT EQUIPIER VSAV1 -----*/

  $equi1 = 0;
  $compteur_vsav1 = -1;
  $post = 5;


      /*Recupère dans un tableau tout mes equi*/
      $tout_les_equi = tab_personnel(1);
        $equi_vsav1 = $tout_les_equi->fetchall();

      /*Compter personnel*/
          $nb_equi_vsav = count($equi_vsav1);

      /*Interval de jours avent d'etre a nouveaux disponible*/
          $interval_equi_vsav1 = $nb_equi_vsav * 5;

      /*Recupère l'historique des gardes passer at ajoute l'INTERVAL*/
          $historique_equi_vsav1 = historique_planning($interval_equi_vsav1, $post, $nb_equi_vsav);
        $historique_equi_vsav1 = $historique_equi_vsav1->fetchall();


    do {
      $compteur_vsav1++;

            $verif_planning = verif_planning($equi_vsav1[$compteur_vsav1]['id_personnel'], $prochaine_garde['prochaine_garde']);


            if ($verif_planning == 0) {

              /*Verifie si la ligne existe*/
              $verif_equi = verif_ligne($equi_vsav1[$compteur_vsav1]['id_personnel'], $post);

                    if ($verif_equi == 0) {

                        cree_ligne_planning($equi_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                        $equi1 = 1;
                    }


                    else {

                        $historique_equi_vsav1[$compteur_vsav1];

                        echo 'ici verif_planning <br>';

                        if (strtotime($historique_equi_vsav1[$compteur_vsav1]['historique_date_garde']) <= strtotime($prochaine_garde['prochaine_garde']))
                        {
                            echo $historique_equi_vsav1[$compteur_vsav1]['id_personnel'] ."<br>";
                            cree_ligne_planning($historique_equi_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                            $equi1 = 1;
                        }

                        else {
                            echo 'ici else <br>';
                            $equi1 = 0;
                        }
                    }

            }

          else {
            $equi1 = 0;
          }

    } while ($equi1 == 0);
  /* ----- FIN EQUIPIER VSAV1 -----*/



 ?>
