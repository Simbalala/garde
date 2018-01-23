<?php
$bdd = new PDO('mysql:host=localhost;dbname=gardec;charset=utf8', 'root','');

$total_cond_vsav = $bdd->query("select count(cond_vsav) as All_Cond_vsav from personnel where cond_vsav = 'oui';" );
  $All_cond_vsav = $total_cond_vsav->fetch();

$total_pl = $bdd->query("select count(pl) as All_pl from personnel where pl = 'oui';" );
  $All_pl = $total_pl->fetch();

$conteur_id_vsav1 = 0;
  $New_conteur_vsav1 = 0;
  $conteur_id_vsav1_2 = 0;
$conteur_id_vsav2 = 0;
  $New_conteur_vsav2 = 0;
$conteur_id_pl = 0;
  $New_conteur_pl = 0;

$vsav1 = 0;
$vsav2 = 0;

/*Boucle Cond VSAV1*/  /*Note: la variable conteur_id se remet tout seul a 1*/

do {

  $conteur_id_vsav1++;

  $tableau_vsav1 = $bdd->query("select id_personnel, nom, prenom, cond_vsav conteur_cond_vsav1 from (personnel inner join attribuer on id_personnel = id_personnel) inner join compteur on id_conteur = id_conteur where id_personnel = '$conteur_id_vsav1';" );
    $tableau_vsav1 = $tableau_vsav1->fetch();



  $conteur_vsav1 = $bdd->query("select conteur_cond_vsav1 from conteur where id_conteur = '$conteur_id_vsav1';");
    $conteur_vsav1 = $conteur_vsav1->fetch();



          if ($tableau_vsav1['cond_vsav'] == 'oui') {

              $New_conteur_vsav1++;

                if ($conteur_vsav1['conteur_cond_vsav1'] == '0') {


                  $Value_cond_vsav1 = $All_cond_vsav['All_Cond_vsav'] - $New_conteur_vsav1;

                        $bdd->query("update conteur set conteur_cond_vsav1 = '". $Value_cond_vsav1. "' WHERE id_conteur = '$conteur_id_vsav1';");

                              echo 'Le conducteur vsav1 est: ' . $tableau_vsav1['nom'] . ' ' . $tableau_vsav1['prenom'] . '<br>';

                              $conteur_id_vsav1_2 = $conteur_id_vsav1;


                  $conteur_id_vsav1 = 0;

                          /*Boucle qui continue le roulement*/

                              do {

                                    $conteur_id_vsav1++;

                                    $tableau_vsav1_2 = $bdd->query("select id_personnel, nom, prenom, cond_vsav  from personnel where id_personnel = '$conteur_id_vsav1';" );
                                      $tableau_vsav1_2 = $tableau_vsav1_2->fetch();

                                    $conteur_vsav1_2 = $bdd->query("select conteur_cond_vsav1 from conteur where id_conteur = '$conteur_id_vsav1';");
                                      $conteur_vsav1_2 = $conteur_vsav1_2->fetch();


                                    if ($conteur_vsav1_2['conteur_cond_vsav1'] != '0') {

                                      $conteur_vsav1_2['conteur_cond_vsav1']--;

                                    }
                                  } while ($conteur_id_vsav1 != $All_cond_vsav['All_Cond_vsav']);




                      $vsav1 = 1;
                }

                else{

                  $conteur_vsav1['conteur_cond_vsav1']--;

                  $bdd->query("update conteur set conteur_cond_vsav1 = '". $conteur_vsav1['conteur_cond_vsav1'] . "' WHERE id_conteur = '$conteur_id_vsav1';");

                  $vsav1 = 0;
                }

            }

          else {
            $vsav1 = 0;
          }

} while ($vsav1 == 0);
*/
/*Boucle Cond VSAV2*/
/*
do {


  $conteur_id_vsav2++;


  $tableau_vsav2 = $bdd->query("select id_personnel, nom, prenom, cond_vsav  from personnel where id_personnel = '$conteur_id_vsav2';" );
    $tableau_vsav2 = $tableau_vsav2->fetch();

  $conteur_vsav2 = $bdd->query("select conteur_cond_vsav2 from conteur where id_conteur = '$conteur_id_vsav2';");
    $conteur_vsav2 = $conteur_vsav2->fetch();



          if ($tableau_vsav2['cond_vsav'] == 'oui') {

              $New_conteur_vsav2++;

                if ($conteur_vsav2['conteur_cond_vsav2'] == '0') {

                    if ($conteur_id_vsav2 == $conteur_id_vsav1_2) {

                      $vsav2 = 0;

                      }

                    else {

                        $Value_cond_vsav2 = $All_cond_vsav['All_Cond_vsav'] - $New_conteur_vsav2;

                        $bdd->query("update conteur set conteur_cond_vsav2 = '". $Value_cond_vsav2. "' WHERE id_conteur = '$conteur_id_vsav2';");

                          echo 'Le conducteur vsav2 est: ' . $tableau_vsav2['nom'] . ' ' . $tableau_vsav2['prenom'] . '<br>';

                          $conteur_id_vsav2_2 = $conteur_id_vsav2;

                          $conteur_id_vsav2 = 0;

                                do {

                                    $conteur_id_vsav2++;

                                    $tableau_vsav2_2 = $bdd->query("select id_personnel, nom, prenom, cond_vsav  from personnel where id_personnel = '$conteur_id_vsav2';" );
                                      $tableau_vsav2_2 = $tableau_vsav2_2->fetch();

                                    $conteur_vsav2_2 = $bdd->query("select conteur_cond_vsav2 from conteur where id_conteur = '$conteur_id_vsav2';");
                                      $conteur_vsav2_2 = $conteur_vsav2_2->fetch();


                                    if ($conteur_vsav2_2['conteur_cond_vsav2'] != '0') {

                                            $conteur_vsav2_2['conteur_cond_vsav2']--;

                                      }

                                    } while ($conteur_id_vsav2 != $All_cond_vsav['All_Cond_vsav']);



                    $vsav2 = 1;

                  }

                }

                else{

                  $conteur_vsav2['conteur_cond_vsav2']--;

                  $bdd->query("update conteur set conteur_cond_vsav2 = '". $conteur_vsav2['conteur_cond_vsav2'] . "' WHERE id_conteur = '$conteur_id_vsav2';");

                  $vsav2 = 0;
                }

            }

          else {
            $vsav2 = 0;
          }

} while ($vsav2 == 0);
*/
/*Boucle Cond PL*/

/*do {


  $conteur_id_pl++;




  $tableau_pl = $bdd->query("select id_personnel, nom, prenom, pl  from personnel where id_personnel = '$conteur_id_pl';" );
    $tableau_pl = $tableau_pl->fetch();

  $conteur_pl = $bdd->query("select conteur_pl from conteur where id_conteur = '$conteur_id_pl';");
    $conteur_pl = $conteur_pl->fetch();



          if ($tableau_pl['pl'] == 'oui') {

                $New_conteur_pl++;

                    if ($conteur_pl['conteur_pl'] == '0') {

                            if ($conteur_id_vsav1_2 == $conteur_id_pl) {
                                  $pl = 0;
                                }

                                elseif ($conteur_id_vsav2_2 == $conteur_id_pl){
                                    $pl = 0;
                                }

                                else{

                                    $Value_pl = $All_pl['All_pl'] - $New_conteur_pl;

                                    $bdd->query("update conteur set conteur_pl = '". $Value_pl. "' WHERE id_conteur = '$conteur_id_pl';");

                                    echo 'Le conducteur PL est: ' . $tableau_pl['nom'] . ' ' . $tableau_pl['prenom'];

                                    $conteur_id_pl = 0;

                                          do {

                                                        $conteur_id_pl++;

                                                        $tableau_pl_2 = $bdd->query("select id_personnel, nom, prenom, pl from personnel where id_personnel = '$conteur_id_pl';" );
                                                          $tableau_pl_2 = $tableau_pl_2->fetch();

                                                        $conteur_pl_2 = $bdd->query("select conteur_pl from conteur where id_conteur = '$conteur_id_pl';");
                                                          $conteur_pl_2 = $conteur_pl_2->fetch();


                                                        if ($conteur_pl_2['conteur_pl'] != '0') {

                                                                $conteur_pl_2['conteur_pl']--;

                                                          }

                                                        } while ($conteur_id_pl != $All_pl['All_pl']);


                                                        $pl = 1;
                                }

                        }

                        else{
                            $conteur_pl['conteur_pl']--;

                            $bdd->query("update conteur set conteur_pl = '". $conteur_pl['conteur_pl'] . "' WHERE id_conteur = '$conteur_id_pl';");

                            $pl = 0;
                        }


              }

              else {
                $pl = 0;
              }



} while ($pl == 0);
*/

?>
