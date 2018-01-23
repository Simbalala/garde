<?php

  /*Connection BBD*/
    require '../bdd.php';

  /*Déclaration variable interne*/

  $ca1 = 0;
  $compteur_vsav1 = -1;
  $post = 1;


  /*Fonction*/
    require 'fonction.php';


/* ----- DEBUT VSAV1 -----*/




  /*Prevois la prohcaine garde */
  $prochaine_garde = $bdd->query("SELECT date_add(date_garde, INTERVAL 5 day) as prochaine_garde from planning GROUP by date_garde DESC LIMIT 1")->fetch();



  /* ----- DEBUT CA VSAV1 -----*/

      /*Recupère dans un tableau tout mes CA*/
      $tout_les_ca = tab_personnel(3);
        $ca_vsav1 = $tout_les_ca->fetchall();

      /*Compter personnel*/
          $nb_ca_vsav = count($ca_vsav1);

      /*Interval de jours avent d'etre a nouveaux disponible*/
          $interval_ca_vsav1 = $nb_ca_vsav * 5;


      /*Recupère l'historique des gardes passer at ajoute l'INTERVAL*/
          $historique_ca_vsav1 = historique_planning($interval_ca_vsav1, $post, $nb_ca_vsav);
        $historique_ca_vsav1 = $historique_ca_vsav1->fetchall();


    do {
      $compteur_vsav1++;

            $ca_vsav1[$compteur_vsav1];




        /*Verifie si la ligne existe*/
            $verif_ca = verif_ligne($ca_vsav1[$compteur_vsav1]['id_personnel'], $post);


          if ($verif_ca == 0) {

            cree_ligne_planning($ca_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
            $ca1 = 1;
          }

          else {

            $verif_planning = verif_planning($ca_vsav1[$compteur_vsav1]['id_personnel'], $prochaine_garde['prochaine_garde']);


                      if ($verif_planning == 0) {

                          $historique_ca_vsav1[$compteur_vsav1];

                            if (strtotime($historique_ca_vsav1[$compteur_vsav1]['historique_date_garde']) <= strtotime($prochaine_garde['prochaine_garde']))
                            {
                                cree_ligne_planning($historique_ca_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                                $ca1 = 1;
                            }

                            else {
                              $ca1 = 0;
                            }
                      }

                      else {
                        $ca1 = 0;
                      }


          }

    } while ($ca1 == 0);
  /* ----- FIN CA VSAV1 -----*/




/* ----- DEBUT EQUIPIER VSAV1 -----*/

  /*Déclaration variable interne*/

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

          $equi_vsav1[$compteur_vsav1];


      /*Verifie si la ligne existe*/
        $verif_equi = verif_ligne($equi_vsav1[$compteur_vsav1]['id_personnel'], $post);




        if ($verif_equi == 0) {

          cree_ligne_planning($equi_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
          $equi1 = 1;
        }

        else {

          $verif_planning = verif_planning($equi_vsav1[$compteur_vsav1]['id_personnel'], $prochaine_garde['prochaine_garde']);


                    if ($verif_planning == 0) {

                        $historique_equi_vsav1[$compteur_vsav1];

                          if (strtotime($historique_equi_vsav1[$compteur_vsav1]['historique_date_garde']) <= strtotime($prochaine_garde['prochaine_garde']))
                          {
                              cree_ligne_planning($historique_equi_vsav1[$compteur_vsav1]['id_personnel'] , $post, $prochaine_garde['prochaine_garde']);
                              $equi1 = 1;
                          }

                          else {
                            $equi1 = 0;
                          }
                    }

                    else {
                      $equi1 = 0;
                    }


        }

  } while ($equi1 == 0);

/* ----- FIN EQUIPIER VSAV1 -----*/


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


    /*Recupère l'historique des gardes passer at ajoute l'INTERVAL*/
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
