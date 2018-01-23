<?php

/*Connection BBD*/
  require '../bdd.php';

/*Fonction*/
  require 'fonction.php';


  /*Prevois la prohcaine garde */
  $prochaine_garde = $bdd->query("SELECT date_add(date_garde, INTERVAL 5 day) as prochaine_garde from planning GROUP by date_garde DESC LIMIT 1")->fetch();

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

 ?>
