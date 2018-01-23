<?php
  $bdd = new PDO('mysql:host=localhost;dbname=gardec;charset=utf8', 'root','');
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Configuration iGarde</title>
   </head>
   <body>
     <h3>Veuillez saisir la date de la prochaine Garde prévue:</h3>

     <form class="date_permiere_garde" action="config.php" method="post">

       <input type="date" name="date_premiere_garde">
       <input type="text" name="administrateur" value="">
       <input type="password" name="pass" value size="30">
       <input type="password" name="passconfirm" value size="30">
       <input type="submit" value="Valider">

     </form>

<?php $date_premiere_grade = $_POST['date_premiere_garde'];

    $bdd->query("INSERT INTO `config`(`id`, `date_premiere_garde`) VALUES (null, '$date_premiere_grade');");


?>
   </body>
 </html>
