<?php
  $img_vsav = $bdd->query("select lien_image from image where id ='1';");
    $img_vsav = $img_vsav->fetch();
  $img_fpt = $bdd->query("select lien_image from image where id ='2';");
    $img_fpt = $img_fpt->fetch();
  $img_virt = $bdd->query("select lien_image from image where id ='3';");
    $img_virt = $img_virt->fetch();
  $img_ccf = $bdd->query("select lien_image from image where id ='4';");
    $img_ccf = $img_ccf->fetch();
  ?>
<h2>Vehicules de Miribel</h2>

<div class="vehicule">

  <div class="vsav1">
    <img src="<?php echo $img_vsav['lien_image']; ?>" alt="Image VSAV1">
    <h3>VSAV1</h3>
  </div>

  <div class="vsav2">
    <img src="<?php echo $img_vsav['lien_image']; ?>" alt="Image VSAV2">
    <h3>VSAV2</h3>
  </div>

  <div class="fptsr">
    <img src="<?php echo $img_fpt['lien_image']; ?>" alt="Image FPT-SR">
    <h3>FPT-SR</h3>
  </div>

  <div class="virt">
    <img src="<?php echo $img_virt['lien_image']; ?>" alt="Image VIRT">
    <h3>VIRT</h3>
  </div>

  <div class="ccf">
    <img src="<?php echo $img_ccf['lien_image']; ?>" alt="Image CCF">
    <h3>CCF</h3>
  </div>

</div>
