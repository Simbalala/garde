

<?php
/*Fonction Mettre id de formation*/
function count_personnel($id_formation)

  {
    require '../bdd.php';

    $count_ca = $bdd->query("SELECT COUNT(id_personnel) as count from competance whERE id_formation = '" . $id_formation . "'")->fetch();

    return $count_ca['count'];
  }


/*Tableau du personnel trier par formation*/
function tab_personnel($id_formation)
  {
    require '../bdd.php';

    $tout_personnel = $bdd-> query("SELECT id_personnel, nom, prenom from personnel INNER join competance on personnel.id = id_personnel WHERE id_formation = '" . $id_formation . "'");

    return $tout_personnel;
  }


/*Recherche l'historique dans le planning*/
function historique_planning($interval, $id_formation, $nb_personnel)
  {
    require '../bdd.php';
    $historique_vsav1 = $bdd->query("SELECT id_personnel, date_add(date_garde, INTERVAL ". $interval ." day) AS historique_date_garde from planning where id_poste_formation = '". $id_formation ."' ORDER BY date_garde DESC LIMIT " . $nb_personnel . "");

    return $historique_vsav1;
  }


/*Verifier si la ligne existe dans le planning*/
function verif_ligne($id_personnel, $id_formation)
  {
    require '../bdd.php';
    $verif_ca = $bdd->query("select COUNT(*) as verification from planning where id_personnel = '" . $id_personnel . "' and id_poste_formation = '" . $id_formation . "'")->fetch();
    return $verif_ca['verification'];
  }


/*Verifie les ligne dans la table planning*/
function verif_planning($id_personnel, $date_garde)
  {
    require '../bdd.php';
    $verif_planning = $bdd->query("SELECT COUNT(*) as verif FROM `planning` WHERE id_personnel = '". $id_personnel ."' and date_garde = '". $date_garde ."'")->fetch();
    return $verif_planning['verif'];
  }


/*créé une nouvelle ligne dans la table planning*/
  function cree_ligne_planning($id_personnel, $id_formation, $date_garde)
    {
      require '../bdd.php';
      $bdd->query("INSERT INTO `planning` (`id`, `id_personnel`, `id_poste_formation`, `date_garde`) VALUES (NULL, '" . $id_personnel . "', '". $id_formation ."', '" . $date_garde . "');");
    }
?>
