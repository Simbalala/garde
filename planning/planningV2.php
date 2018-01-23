<?php
$bdd = new PDO('mysql:host=localhost;dbname=gardec;charset=utf8', 'root','');

/*VSAV1*/




$tout_les_equipier = $bdd-> query("SELECT id_personnel, nom, prenom from personnel INNER join competance on personnel.id = id_personnel WHERE id_fromation = '1'");


$tout_les_ca = $bdd-> query("SELECT id_personnel, nom, prenom from personnel INNER join competance on personnel.id = id_personnel WHERE id_fromation = '3'");


?>
